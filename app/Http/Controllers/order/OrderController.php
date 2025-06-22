<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

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
        if($data->stock <= 0) {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
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

            $data->stock -= 1;
            //dd($cart);
            $data->update();
            $cart->save();
            return redirect()->back()->with('success', 'Item add to card successfully.');
        } else {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
    }

    public function removeCart(Request $request, $id)
    {
        $data = Cart::where('id', $id)->first();
        $food = Food::where('id', $data->foodId)->first();
        // dd($request->all());
        if($data) {
            $food->stock += $request->input('txtStock','');
            $food->update();
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

        if (!$cart) {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found'], 404);
        }

        $food = Food::find($cart->foodId);

        if (!$food) {
            return response()->json(['status' => 'error', 'message' => 'Food item not found']);
        }

        $newQty = $request->quantity;
        $availableStock = $food->stock + $cart->quantity;

        if ($newQty > $availableStock) {
            return response()->json(['status' => 'error', 'message' => 'Food stock not available']);
        }

        $food->stock -= ($newQty - $cart->quantity);
        $food->save();

        $cart->quantity = $newQty;
        $cart->save();

        return response()->json([
            'status' => 'success',
            'quantity' => $cart->quantity,
            'stock' => $food->stock
        ]);

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
        $totalOrder = Order::where('status', 1)->sum('total');
        // dd($order);
        return view('dashboard.order.orderlist', compact('order','totalOrder'));
    }

    public function payment(Request $request, $reg) {
        $request->validate([
            'txtTotal' => 'required|numeric|min:1',
            'txtDiscount' => 'required|numeric|min:0|lte:txtTotal',
            'txtPay' => 'required|numeric|min:0|max:9999999',
        ]);
        
        $order = Order::where('reg', $reg)->first();

        if (!$order) {
            return redirect()->back()->with('warning', 'This item is not available right now.');
        }

        $table = Table::where('id', $order->tableId)->first();

        $discount = $request->input('txtDiscount', 0);
        $pay = $request->input('txtPay', 0);

        $payable = $order->total - $discount;
        $order->discount = $discount;
        $order->payable = $payable;

        if ($pay < $payable) {
            $order->pay = $pay;
            $order->status = 3; // 3 payment due
            $order->due = $payable - $pay;
        }elseif ($pay == $payable) {
            $order->pay = $pay;
            $order->status = 2; // 2 full paid
            $order->due = $payable - $pay;
        } else {
            $order->pay = $payable;
            $order->status = 2; // full paid
            $order->due = 0;
        }

        $table->status = 1;

        //dd($order,$table);
        $table->update();
        $order->update();
        return redirect()->back()->with('success', $reg);
    }

    public function dueCollectionView() {
        $order = Order::where('status', 3)->paginate(8);
        $totalDue = Order::where('status', 3)->sum('due');
        // dd($order, $totalDue);
        return view('dashboard.order.duelist', compact('order','totalDue'));
    }

    public function dueCollection(Request $request, $reg) {
        $request->validate([
            'txtTotal' => 'required|numeric|min:1',
            'txtDiscount' => 'required|numeric|min:0|lte:txtTotal',
            'txtPay' => 'required|numeric|min:0|max:9999999',
        ]);

        $order = Order::where('reg', $reg)->first();
        
        if (!$order) {
            return redirect()->back()->with('warning', 'This item is not available right now.');
        }

        $newDiscount = $request->input('txtDiscount', 0);
        $newPay = $request->input('txtPay', 0);

        $oldDue = $order->due;

        $newPayable = $order->payable - $newDiscount;

        if($newDiscount > $oldDue) {
            return redirect()->back()->with('warning', 'Discount more then due. It is not possible.');
        } else {
            $order->discount += $newDiscount;
            $order->payable -= $newDiscount;
            $order->payable = $newPayable;

            if($newPayable <= $newPay || $oldDue <= $newPay) {
                $order->pay = $newPayable;
            } else {
                $order->pay += $newPay;
            }
            
            if($order->pay == $order->payable) {
                $order->due = 0;
            } else {
                $order->due -= ($newPay + $newDiscount);
            }

            if($order->due <= 0) {
                $order->status = 2;
            } else {
                $order->status = 3;
            }
        }
        
        // dd($order,$order->due,$order->pay);
        $order->update();
        
        return redirect()->back()->with('success',$reg);
    }

    
}