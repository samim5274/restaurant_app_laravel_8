<?php

namespace App\Http\Controllers\food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Table;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Stock;
use Auth;
use App\Notifications\OrderStatusUpdated;
use App\Models\Admin;

class KitchenController extends Controller
{
    public function showOrder() {
        $order = Order::where('date', Carbon::now()->format('Y-m-d'))->orderBy('id', 'desc')->get();
        // dd($order);
        return view('dashboard.kitchen.orderItem', compact('order'));
    }

    public function listOrder($reg) {
        $food = Cart::where('reg',$reg)->with('food')->get();
        return view('dashboard.kitchen.cart', compact('food','reg'));
    }

    public function updateKitchenStatus(Request $request, $reg) {
        if(!$request->input('cbxStatus')) {
            return redirect()->back()->with('error','You must be select status.');
        }

        $order = Order::where('reg', $reg)->first();
        if(!$order) {
            return redirect()->back()->with('warning','Somethimg is wrong. Please try again');
        }
        $order->kitchen = $request->input('cbxStatus');
        // dd($order);
        $order->save();
        
        $admins = Admin::whereIn('role', ['1', '2', '3', '4'])->get();

        foreach($admins as $admin) {
            $admin->notify(new OrderStatusUpdated($order));
        }

        return redirect()->back()->with('success','Your order status updated successfully.');
    }

    public function searchKitchen(Request $request) {
        $output = "";

        $orderList = Order::where('date', Carbon::now()->format('Y-m-d'))->where('reg', 'like', '%'.$request->search.'%')->with('table')->orderBy('id', 'desc')->get();
        
        $statuses = [
            1 => 'Pending',
            2 => 'Preparing',
            3 => 'Ready',
            4 => 'Served'
        ];

        $colors = [
            1 => 'danger',
            2 => 'warning',
            3 => 'info text-white',
            4 => 'success'
        ];

        foreach($orderList as $key => $val) {
            $statusText = $statuses[$val->kitchen] ?? 'Unknown';
            $statusColor = $colors[$val->kitchen] ?? 'secondary';
            $link = url('/list/order/' . $val->reg);
            $output .= '
            <tr>
                <td>' . ++$key . '</td>
                <td>' . $val->date . '</td>
                <td class="text-center"><a href="'.$link.'" class="text-primary font-weight-bold">ORD-' . $val->reg . '</a></td>
                <td class="text-center"><a href="'.$link.'" class="text-primary font-weight-bold">' . ($val->table->tName ?? 'N/A') . '</a></td>
                <td class="text-center">
                    <span class="badge bg-' . $statusColor . '">' . $statusText . '</span>
                </td>
                <td class="text-center">
                    <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#exampleModal'.$val->id.'">Status</button>
                </td>
            </tr>
            <tr class="bg-light font-weight-bold">
                <td colspan="6">Note: All Order is urgent.</td>
            </tr>';
        }
        return response($output);
    }

    public function ItemStockReport() {
        $stock = Stock::with('food')->paginate(28)->onEachSide(2);
        return view('dashboard.report.StockReport', compact('stock'));
    }

    public function dayWiseStockSearch(Request $request) {
        $sDate = $request->input('dtpStartDate','');
        $eDate = $request->input('dtpEndDate','');
        if($sDate == NULL || $eDate == NULL) {
            return redirect()->back()->with('error','You must be select date duration.');
        }
        if ($request->has('download')) {
            $stock = Stock::with('food')->whereBetween('date', [$sDate, $eDate])->get();
            $pdf = Pdf::loadView('dashboard.print.report.stock', compact('stock'));
            return $pdf->download('Stock RPT-'.time().'.pdf');
        }
        $stock = Stock::whereBetween('date', [$sDate, $eDate])->get();
        return view('dashboard.report.dayWiseStockReport', compact('stock'));
    }

    public function downloadAllStock() {
        $stock = Stock::with('food')->get();
        $pdf = Pdf::loadView('dashboard.print.report.stock', compact('stock'));
        return $pdf->download('Stock RPT-'.time().'.pdf');
    }

    public function itemReportView() {
        $food = Food::paginate(28)->onEachSide(2);
        $stock = Stock::with('food')->get();
        // dd($food,$stock);
        return view('dashboard.report.itemReportView', compact('food'));
    }

    public function foodStock($id) {
        $stock = Stock::where('foodId', $id)->with('food')->get();
        if(!$stock) {
            return redirect()->back()->with('error','Data not Found. Thanks');
        }
        $totalIn = Stock::where('foodId', $id)->sum('stockIn');
        $totalOut = Stock::where('foodId', $id)->sum('stockOut');
        $netStock = $totalIn - $totalOut;
        // dd($totalIn, $totalOut, $netStock);
        return view('dashboard.report.foodStock', compact('stock','totalIn','totalOut','netStock'));
    }

    public function itemDayView() {
        $sDate = Carbon::now()->format('Y-m-d');
        $eDate = Carbon::now()->format('Y-m-d');
        $stock = Stock::with('food')->whereBetween('date', [$sDate, $eDate])->get();
        $food = Food::all();
        $totalIn = Stock::with('food')->whereBetween('date', [$sDate, $eDate])->sum('stockIn');
        $totalOut = Stock::with('food')->whereBetween('date', [$sDate, $eDate])->sum('stockOut');
        $netStock = $totalIn - $totalOut;
        return view('dashboard.report.itemDayReport', compact('stock','food','totalIn','totalOut','netStock'));
    }

    public function itemDaySearch(Request $request) {
        $sDate = $request->input('dtpStartDate','');
        $eDate = $request->input('dtpEndDate','');
        $foodid = $request->input('cbxFood','');
        $food = Food::all();

        if($sDate == NULL || $eDate == NULL || $foodid == NULL) {
            return redirect()->back()->with('error','You must be select date duration and must be select item And try again. Thank you!');
        }

        if ($request->has('download')) {
            $stock =Stock::with('food')->whereBetween('date', [$sDate, $eDate])->where('foodId', $foodid)->get();
            $totalIn = Stock::with('food')->whereBetween('date', [$sDate, $eDate])->where('foodId', $foodid)->sum('stockIn');
            $totalOut = Stock::with('food')->whereBetween('date', [$sDate, $eDate])->where('foodId', $foodid)->sum('stockOut');
            $netStock = $totalIn - $totalOut;
            $pdf = Pdf::loadView('dashboard.print.report.stockItem', compact('stock','totalIn','totalOut','netStock'));
            return $pdf->download('Stock RPT-'.$stock[0]->food->name.'-'.time().'.pdf');
        }

        $stock = Stock::with('food')->whereBetween('date', [$sDate, $eDate])->where('foodId', $foodid)->get();
        $totalIn = Stock::with('food')->whereBetween('date', [$sDate, $eDate])->where('foodId', $foodid)->sum('stockIn');
        $totalOut = Stock::with('food')->whereBetween('date', [$sDate, $eDate])->where('foodId', $foodid)->sum('stockOut');
        $netStock = $totalIn - $totalOut;
        return view('dashboard.report.itemDayReport', compact('stock','food','totalIn','totalOut','netStock'));
    }
}
