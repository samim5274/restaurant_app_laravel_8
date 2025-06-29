<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Carbon;

use App\Models\Table;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Expenses;

class DashboardController extends Controller
{
    public function index() {
        // === TODAY ===
        $today = Carbon::now()->format('Ymd');

        $total = Order::where('date', $today)->sum('total');
        $totalPay = Order::where('date', $today)->sum('pay');
        $totalDiscount = Order::where('date', $today)->sum('discount');
        $totalPayable = Order::where('date', $today)->sum('payable');
        $totalDue = Order::where('date', $today)->sum('due');

        $expenses = Expenses::where('date', $today)->sum('amount');

        // === 7 DAYS ===
        $startDate = Carbon::now()->subDays(6)->format('Ymd');
        $endDate = $today;

        $total7 = Order::whereBetween('date', [$startDate, $endDate])->sum('total');
        $totalPay7 = Order::whereBetween('date', [$startDate, $endDate])->sum('pay');
        $totalDiscount7 = Order::whereBetween('date', [$startDate, $endDate])->sum('discount');
        $totalPayable7 = Order::whereBetween('date', [$startDate, $endDate])->sum('payable');
        $totalDue7 = Order::whereBetween('date', [$startDate, $endDate])->sum('due');

        $expenses7 = Expenses::whereBetween('date', [$startDate, $endDate])->sum('amount');

        // === 1 MONTH ===
        $startDate1 = Carbon::now()->subMonth()->format('Ymd');
        $endDate1 = $today;

        $totalMonth = Order::whereBetween('date', [$startDate1, $endDate1])->sum('total');
        $totalPayMonth = Order::whereBetween('date', [$startDate1, $endDate1])->sum('pay');
        $totalDiscountMonth = Order::whereBetween('date', [$startDate1, $endDate1])->sum('discount');
        $totalPayableMonth = Order::whereBetween('date', [$startDate1, $endDate1])->sum('payable');
        $totalDueMonth = Order::whereBetween('date', [$startDate1, $endDate1])->sum('due');

        $expensesMonth = Expenses::whereBetween('date', [$startDate1, $endDate1])->sum('amount');

        // === TABLE REPORT ===
        $totalTable = Table::count();
        $tableEmpty = Table::where('status', 1)->count();
        $tableOrder = Table::where('status', 3)->count();
        $tableReserved = Table::where('status', 2)->count();

        // === FOOD STOCK ===
        $food = Food::count();
        $stock = Food::sum('stock');
        $shortStock = Food::where('stock','<=', 5)->count();

        return view('dashboard.dashboard', compact(
            'total', 'totalPay', 'totalDiscount', 'totalPayable', 'totalDue',
            'total7', 'totalPay7', 'totalDiscount7', 'totalPayable7', 'totalDue7',
            'totalMonth', 'totalPayMonth', 'totalDiscountMonth', 'totalPayableMonth', 'totalDueMonth',
            'expenses', 'expenses7', 'expensesMonth',
            'totalTable', 'tableEmpty', 'tableOrder', 'tableReserved',
            'food', 'stock', 'shortStock'
        ));


    }

    // ================================================================= table create section =================================================================

    public function setting() {
        $data = Table::paginate(5);
        $food = Food::paginate(10);
        // dd($data);
        return view('dashboard.setting', compact('data','food'));
    }

    public function tableView() {
        $data = Table::paginate(10);
        return view('dashboard.table.table', compact('data'));
    }

    public function creatTable(Request $request) {
        try {
            $data = new Table;

            $data->tName = $request->input('txtTableNo', '');
            $data->status = $request->input('txtStatus', '');
            $data->remark = $request->input('txtRemark', '');
            // dd($data);
            $data->save();
            return redirect()->back()->with('success','New table created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function editTable(Request $request, $id) {
        try {
            $data = Table::where('id',$id)->first();

            $data->tName = $request->input('txtTableNo', '');
            $data->status = $request->input('txtStatus', '');
            $data->remark = $request->input('txtRemark', '');

            $data->save();
            return redirect()->back()->with('success','Table edited successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function deleteTable(Request $request, $id) {
        $data = Table::where('id',$id)->first();
        if(!$data) {
            return redirect()->back()->with('warning','This item not availabel righ now');
        } else {
            $name = $data->tName; 
            return redirect()->back()->with('warning',$name . ' -> table can not deleted right now. contact with your manager. Thank You!');
        }        
    }

    public function backup() {
        Artisan::call('backup:run', [
            '--only-db' => true
        ]);
        
        $files = Storage::disk('local')->files('Laravel');

        if (empty($files)) {
            return response()->json(['message' => 'No backup file found.'], 404);
        }

        $latestFile = collect($files)->sortDesc()->first();
        return Storage::disk('local')->download($latestFile);
    }
}