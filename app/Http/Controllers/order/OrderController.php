<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Table;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;
use Auth;
use Illuminate\Support\Carbon;

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
        $order = Order::count() + 1;
        $invoice = Carbon::now()->format('Ymd').Auth::guard('admin')->id().$order;
        $count = Cart::where('reg', $invoice)->count();
        // dd($table, $food);
        return view('dashboard.menu.menu', compact('food','table','count'));
    }

    public function tableBooked($id) {
        
        $table = Table::where('id',$id)->first();
        if(!$table) {
            return redirect()->back()->with('warning','This item not availabel righ now');
        } else {
            $table->status = 2;

            $order = new Order;
            $order->userId  = Auth::guard('admin')->id();
            $order->foodId = 0;
            $order->tableId = $table->id;

            // $order->save();
            // $table->update();
            return redirect()->route('menu.view')->with('success', 'Your table is booked for you. Now you can select your food and order now.');
        }
        
    }

    public function addCart($id) {
        $data = Food::where('id', $id)->first();
        if($data) {
            $cart = new Cart;

            $order = Order::count() + 1;
            $invoice = Carbon::now()->format('Ymd').Auth::guard('admin')->id().$order;

            $findFood = Cart::where('reg', $invoice)->where('foodId', $data->id)->first();
            if($findFood) {
                return redirect()->route('menu.view')->with('warning', 'Item already added. Try to another item. If you add more quentity then go to cart.');
            }

            $cart->reg = $invoice; 
            $cart->date = Carbon::now()->format('Y-m-d'); 
            $cart->userId = Auth::guard('admin')->id();
            $cart->foodId = $data->id;
            $cart->price = $data->price;

            //dd($cart);
            $cart->save();
            return redirect()->route('menu.view')->with('success', 'Item add to card successfully.');
        } else {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
    }

    public function cartView() {

        $order = Order::count() + 1;
        $invoice = Carbon::now()->format('Ymd').Auth::guard('admin')->id().$order;
        $count = Cart::where('reg', $invoice)->count();

        $cart = Cart::with('food','user')->get();

        return view('dashboard.cart.cart', compact('count', 'cart'));
    }
}
