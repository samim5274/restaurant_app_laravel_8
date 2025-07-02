<?php

namespace App\Http\Controllers\food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Table;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;
use Auth;

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
}
