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
use App\Models\Stock;
use Auth;
use Illuminate\Support\Carbon;
use App\Mail\SendInvoice;
use Mail;

class OrderController extends Controller
{
    public function orderView() {
        $table = Table::where('status','1')->paginate(10);
        $food = Food::where('status', 1)->paginate(10);
        return view('dashboard.order.order', compact('food','table'));
    }

    public function menuView() {
        $food = Food::where('status', 1)->paginate(10);
        $order = Order::count() + 1;
        $invoice = Carbon::now()->format('Ymd').Auth::guard('admin')->id().$order;
        $count = Cart::where('reg', $invoice)->count();
        // dd($table, $food);
        return view('dashboard.menu.menu', compact('food','count'));
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
            $stock = new Stock();
        
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

            $stock->date = Carbon::now()->format('Y-m-d');
            $stock->foodId = $data->id;
            $stock->reg = $invoice;
            $stock->stockOut += 1;
            $stock->status = 1; // 1 sale, 2 return, 3 stock in and 4 stock out

            $data->stock -= 1;
            //dd($cart);
            $data->update();
            $stock->save();
            $cart->save();
            return redirect()->back()->with('success', 'Item add to card successfully.');
        } else {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
    }

    public function addCart2(Request $request) {
        $request->validate([
            'search' => ['nullable', 'regex:/^[0-9]+$/']
        ]);

        $id = $request->input('search', '');
        $data = Food::where('id', $id)->first();
        if(!$data) {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
        if($data->stock <= 0) {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
        if($data) {
            $cart = new Cart;
            $stock = new Stock();

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

            $stock->date = Carbon::now()->format('Y-m-d');
            $stock->foodId = $data->id;
            $stock->reg = $invoice;
            $stock->stockOut += 1;
            $stock->status = 1; // 1 sale, 2 return, 3 stock in and 4 stock out

            $data->stock -= 1;
            //dd($cart);
            $data->update();
            $stock->save();
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
        $stock = Stock::where('FoodId', $data->foodId)->where('reg', $data->reg)->first();
        
        if($data) {
            $food->stock += $request->input('txtStock','');
            $food->update();
            $stock->delete();
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

        $oldQty = $cart->quantity;
        $diff = $newQty - $oldQty;

        $stock = Stock::where('foodId', $cart->foodId)
                        ->where('reg', $cart->reg)
                        ->first();

        if (!$stock) {
            return response()->json(['status' => 'error', 'message' => 'Stock record not found for this registration']);
        }

        if($diff > 0) {
            $stock->stockOut += $diff;            
        } elseif ($diff < 0) {
            $adjust = abs($diff);
            if ($stock->stockOut < $adjust) {
                return response()->json(['status' => 'error', 'message' => 'Cannot reduce stock below 0']);
            }
            $stock->stockOut -= $adjust;            
        }

        $stock->update();

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
            'cbxTable' => 'required'
        ]);

        $table_id = $request->input('cbxTable', '');
        $order->date = Carbon::now()->format('Y-m-d');
        $order->reg = $request->input('txtReg', '');
        $order->total = $request->input('txtSubTotal', '');
        $order->tableId = $table_id;
        $order->status = 1; // 1 order confrim and 2 bill paid, 3 due
        $order->kitchen = 1; // 1 pendin,2 preparing, 3 ready & 4 served
        $table = Table::where('id', $table_id)->first();
        $table->status = 3; // order
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

        $table->status = 1; // table empty

        //dd($order,$table);
        $table->update();
        $order->update();


        // auto matic send mail when pay order
        
        $user = Auth::guard('admin')->user();

        $cartItems = Cart::with('food')->where('reg', $reg)->get();        
        
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'No cart items found for invoice.');
        }

        $OrderItems = Order::with('table')->where('reg', $reg)->first();

        if (!$OrderItems) {
            return redirect()->back()->with('error', 'No order items found for invoice.');
        }

        $data = [
            'name' => $user->name,
            'date' => now()->format('Y-m-d'),
            'reg' => $reg,
            'items' => [],
            'totals' => []
        ];

        if($OrderItems->table) {
            $data['totals'][] = [
                'table' => $OrderItems->table->tName,
                'total' => $OrderItems->total,
                'discount' => $OrderItems->discount,
                'payable' => $OrderItems->payable,
                'pay' => $OrderItems->pay,
                'due' => $OrderItems->due,
            ];
        }


        foreach($cartItems as $val) {
            if($val->food) {
                $data['items'][] = [
                    'name' => $val->food->name,
                    'qty' => $val->quantity,
                    'price' => $val->price,
                ];
            }            
        }

        if (empty($data['items'])) {
            return redirect()->back()->with('error', 'No food items found in cart.');
        }

        $mailAddress = [
            'valobashi.tumake9999@gmail.com',
        ];    

        // dd($data);
        Mail::to($mailAddress)->send(new SendInvoice($data));

        return redirect()->back()->with('success', $reg);
    }

    public function deleteOrder($reg) {
        $order = Order::where('reg', $reg)->where('kitchen', 0)->orWhere('kitchen', 1)->first();

        if(!$order) {
            return redirect()->back()->with('warning', 'This order can not cancel. Because food already preparing.');
        }
        
        $cartItems = Cart::where('reg', $reg)->get(); 
        $table = Table::where('id', $order->tableId)->first();
        $table->status = 1; // table empty
        //dd($table);

        if (!$order && $cartItems->isEmpty()) {
            return redirect()->back()->with('warning', 'This item is not available right now.');
        }

        if ($order && is_null($order->payable) && is_null($order->pay)) {
            

            // update food stock 
            foreach($cartItems as $item) {
                if($item->food) {
                    $item->food->stock += $item->quantity;
                    $item->food->save();
                }
            }

            $order->delete(); // delete order
            $table->update();

            if ($cartItems->isNotEmpty()) {
                $cartItems->each->delete(); // delete cart item
            }
            return redirect()->back()->with('error', 'Your order and cart item(s) were deleted successfully.');
        }

        return redirect()->back()->with('warning', 'Order cannot be deleted. Food is already made and payment is complete.');
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
        
        return redirect()->back()->with('success', $reg);
        // return redirect()->route('invoice.print', $reg);
    }

    public function printInvoice($reg) {
        $order = Order::where('reg', $reg)->firstOrFail();
        $invoice = Cart::where('reg', $reg)->with('food')->get();
        $grandTotal = Order::where('reg', $reg)->first();
        $cart = Cart::where('reg', $reg)->with('food')->first();
        // dd($invoice);
        if($invoice->isEmpty()) {
            return redirect()->back()->with('warning', 'This item is not available right now.');
        }
        return view('dashboard.print.invoice.print_due', compact('order','invoice','grandTotal', 'cart'));
    }

    public function editOrder($reg) {
        $data = Cart::where('reg',$reg)->with('food')->get();
        $order = Order::where('reg', $reg)->first();
        $table = Table::where('status', 1)->when($order, fn($q) => $q->orWhere('id', $order->tableId))->get();
        // dd($order->toArray());
        // dd($order->tableId);
        $invoice = $reg;
        $count = Cart::where('reg', $invoice)->count();
        $cart = Cart::where('reg', $invoice)->with('food','user')->get();
        return view('dashboard.cart.cart_edit', compact('count', 'cart','table','order','invoice','data'));
    }

    public function editCartItem($reg)
    {
        $food = Food::where('status', 1)->paginate(10);
        $count = Cart::where('reg', $reg)->count();
        return view('dashboard.menu.addItem', compact('food','count','reg'));
    }
    
    public function addEditCartItem($id, $reg) {
        $food = Food::where('id', $id)->first();
        // dd($food, $id, $reg);
        if($food->stock <= 0) {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
        $find = Cart::where('reg', $reg)->where('foodId', $id)->first();
        if($find) {
            return redirect()->back()->with('warning', 'Item already added. Try to another item. If you add more quentity then go to cart.');
        } else {
            $cart = new Cart;

            $cart->reg = $reg;
            $cart->date = Carbon::now()->format('Y-m-d'); 
            $cart->userId = Auth::guard('admin')->id();
            $cart->foodId = $food->id;
            $cart->price = $food->price;
            $food->stock -= 1;
            $food->update();
            $cart->save();
            return redirect()->back()->with('success', 'Item add to card successfully.');
        }
        
    }

    public function orderModify(Request $request, $reg) {
        $order = Order::where('reg', $reg)->first();        
        if(!$order) {
            return redirect()->back()->with('warning','This order not availabel righ now');
        } 
        
        $order->total = $request->input('txtSubTotal', '');

        // free old table
        $oldTableStatus = Table::where('id', $order->tableId)->first();
        if(!$oldTableStatus) {
            return redirect()->back()->with('warning','This table not availabel righ now');
        } 
        
        $oldTableStatus->status = 1; // empty table

        $order->tableId = $table = $request->input('cbxTable', '');
        
        $newTableStatus = Table::where('id', $table)->first();
        if(!$newTableStatus) {
            return redirect()->back()->with('warning','This table update not possible righ now');
        } 
        
        $newTableStatus->status = 3; // order table

        $oldTableStatus->update();
        $newTableStatus->update();
        $order->update();
        return redirect()->route('order.list.view')->with('warning','Your order updated successfully');
    }

    public function liveSearchOrder(Request $request) {
        $output = "";

        $orderList = Order::where('status', 1)->where('reg', 'like', '%'.$request->search.'%')->with('table')->get();

        foreach($orderList as $key => $val) {
            $link = url('/delere/order/'.$val->reg);
            $editOrder = url('/edit/order/' . $val->reg);
            $output .= '
            <tr>
                <td>'.++$key.'</td>
                <td>'.$val->date.'</td>
                <td><a href="'.$editOrder.'" class="text-primary font-weight-bold">ORD-'.$val->reg.'</a></td>
                <td><a href="'.$editOrder.'" class="text-primary font-weight-bold">'.$val->table->tName.'</a></td>
                <td>৳'.$val->total.'</td>
                <td>
                    <button class="btn btn-outline-success btn-sm py-1 px-2" 
                            data-toggle="modal" 
                            data-target="#exampleModal'.$val->id.'" 
                            style="width: auto; font-size: 0.8rem;">
                        <i class="mdi mdi-cash" style="font-size: 1.5rem;"></i>
                    </button>
                </td>
                <td>
                    <a href="'.$link .'" onclick="return confirm(\'Are you sure you want to DELETE this bill?\')">
                        <i class="mdi mdi-delete-forever text-danger"></i>
                    </a>
                </td>
            </tr>';
        }
        return response($output);
    }

    public function liveSearchDue(Request $request) {
        $output = "";

        $orderList = Order::where('status', 3)->where('reg', 'like', '%'.$request->search.'%')->with('table')->get();

        foreach($orderList as $key => $val) {
            
            $output .= '
            <tr>
                <td>'. ++$key .'</td>
                <td>'.$val->date.'</td>
                <td class="text-center">ORD-'.$val->reg.'</td>
                <td class="text-center">'.$val->table->tName.'</td>
                <td class="text-center">৳'.$val->total.'</td>
                <td class="text-center">৳'.$val->discount.'</td>
                <td class="text-center">৳'.$val->payable.'</td>
                <td class="text-center">৳'.$val->pay.'</td>
                <td class="text-center">৳'.$val->due.'</td>
                <td class="text-center"><a href="#"><button class="btn btn-sm btn-success text-white" data-toggle="modal" data-target="#exampleModal'.$val->id.'"><h4 class="m-0">Pay</h4></button></a></td>
            </tr>';
        }
        return response($output);
    }

    public function addToCartAjax($id)
    {
        $data = Food::where('id', $id)->first();

        if($data->stock <= 0) {
            return response()->json(['status' => 'error', 'message' => 'This item is stock out right now.']);
        }

        if (!$data) {
            return response()->json(['status' => 'error', 'message' => 'Food not found']);
        }

        if($data) {
            $cart = new Cart;
            $stock = new Stock();

            $order = Order::count() + 1;
            $invoice = Carbon::now()->format('Ymd').Auth::guard('admin')->id().$order;

            $findFood = Cart::where('reg', $invoice)->where('foodId', $data->id)->first();
            if($findFood) {
                return response()->json(['status' => 'error', 'message' => 'Item already added. Try to another item. If you add more quentity then go to cart.']);
            }

            $cart->reg = $invoice; 
            $cart->date = Carbon::now()->format('Y-m-d'); 
            $cart->userId = Auth::guard('admin')->id();
            $cart->foodId = $data->id;
            $cart->price = $data->price;

            $stock->date = Carbon::now()->format('Y-m-d');
            $stock->foodId = $data->id;
            $stock->reg = $invoice;
            $stock->stockOut += 1;
            $stock->status = 1; // 1 sale, 2 return, 3 stock in and 4 stock out

            $data->stock -= 1;
            $data->update();
            $stock->save();
            $cart->save();

            return response()->json(['status' => 'success', 'message' => 'Food added to cart']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'This item not availabel righ now']);
        }
        
    }

}