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
        return redirect()->back()->with('warning','This item not availabel righ now');
        // $table = Table::where('id',$id)->first();
        // if($table) {
        //     return redirect()->back()->with('warning','This item not availabel righ now');
        // } else {
        //     $table->status = 2;

        //     $order = new Order;
        //     $order->date = Carbon::now()->format('Y-m-d');
        //     $order->cartId = 0;
        //     $order->total = NULL;
        //     $order->status = 0;
        //     $order->userId = Auth::guard('admin')->id();
        //     $order->tableId = $table->id;

        //     $order->save();
        //     $table->update();
        //     return redirect()->route('menu.view')->with('success', 'Your table is booked for you. Now you can select your food and order now.');
        // }        
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

    public function removeCart($id)
    {
        $data = Cart::where('id', $id)->first();
        if($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Item remove to card successfully.');
        } else {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
    }

    public function cartView() {
        $table = Table::where('status', 1)->get();
        $order = Order::count() + 1;
        $invoice = Carbon::now()->format('Ymd').Auth::guard('admin')->id().$order;
        $count = Cart::where('reg', $invoice)->count();

        $cart = Cart::where('reg', $invoice)->with('food','user')->get();

        return view('dashboard.cart.cart', compact('count', 'cart','table','invoice'));
    }

    public function updateQuantity(Request $request) {
        $cart = Cart::find($request->id);

        if ($cart) {
            $cart->quantity = $request->quantity;
            $cart->save();
            return response()->json(['status' => 'success', 'quantity' => $cart->quantity]);
        }

        return response()->json(['status' => 'error', 'message' => 'Cart item not found'], 404);
    }

    public function confirmOrder(Request $request) {
        $order = new Order;

        $request->validate([
            'txtReg' => 'required',
            'txtSubTotal' => 'required',
        ]);

        $table_id = $request->input('cbxTable', '');
        $order->date = Carbon::now()->format('Y-m-d');
        $order->reg = $request->input('txtReg', '');
        $order->total = $request->input('txtSubTotal', '');
        $order->tableId = $table_id;
        $order->status = 1; // 1 order confrim and 2 bill paid, 3 due
        $table = Table::where('id', $table_id)->first();
        $table->status = 3;
        $order->save();
        $table->update();
        return redirect()->route('menu.view')->with('success', 'Your order is confirmed.');
    }

    public function orderList() {
        $order = Order::where('status', 1)->with('table')->orderBy('id', 'desc')->paginate(8);
        // dd($order);
        return view('dashboard.order.orderlist', compact('order'));
    }

    public function payment(Request $request, $reg) {
        
        $request->validate([
            'txtTotal' => 'required|numeric|min:1',
            'txtDiscount' => 'required|numeric|min:0|lte:txtTotal',
            'txtPay' => 'required|numeric|min:0|max:9999999',
        ]);
        
        $order = Order::where('reg', $reg)->first();
        $table = Table::where('id', $order->tableId)->first();

        $discount = $request->input('txtDiscount','');
        $pay = $request->input('txtPay','');
        $payable = $order->total - $discount;

        if(!$order) {
            return redirect()->back()->with('warning','This item not availabel righ now');
        } else {
            $order->discount = $discount;
            $order->payable = $payable;

            if($pay <= $order->total) {
                $order->pay = $pay;
                $order->status = 3;
            } else {
                $order->pay = $pay - $r1 = $pay - $payable;
                $order->status = 2;
            }
        }
        $table->status = 1;
        //dd($order,$table);
        $table->update();
        $order->update();
        return redirect()->back()->with('success','Your payment successfully complete. Thank You!');
    }
}