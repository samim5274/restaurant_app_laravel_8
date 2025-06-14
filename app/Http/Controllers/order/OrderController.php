<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Table;
use App\Models\Food;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function orderView() {
        $table = Table::where('status','1')->paginate(10);
        $food = Food::where('status', 1)->paginate(10);
        return view('dashboard.order.order', compact('food','table'));
    }

    public function menuView() {
        $table = Table::where('status','1')->paginate(10);
        $food = Food::where('status', 1)->paginate(10);
        // dd($table, $food);
        return view('dashboard.menu.menu', compact('food','table'));
    }

    public function tableBooked($id) {
        
        $table = Table::where('id',$id)->first();
        $table->status = 2;

        $order = new Order;
        $order->userId  = Auth::guard('admin')->id();
        $order->foodId = 0;
        $order->tableId = $table->id;

        $order->save();
        $table->update();
        return redirect()->back()->with('success', 'Your table is booked for you.');
    }
}
