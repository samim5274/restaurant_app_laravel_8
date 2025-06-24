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
        $date = Carbon::now()->format('Y-m-d');
        $order = Order::where('date', $date)->where('status', 1)->get();
        // dd($order);
        return view('dashboard.kitchen.orderItem', compact('order'));
    }

    public function listOrder($reg) {
        $food = Cart::where('reg',$reg)->with('food')->get();
        return view('dashboard.kitchen.cart', compact('food','reg'));
    }

    public function updateKitchenStatus(Request $request, $reg) {
        $order = Order::where('reg', $reg)->get();
        if(!$order) {
            return redirect()->back()->with('warning','Somethimg is wrong. Please try again');
        }
        $order->kitchen = $request->input('status');
        // dd($order);
        // $order->update();
        return redirect()->back()->with('success','Your order status updated successfully.');
    }
}
