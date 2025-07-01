<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Mail;
use App\Mail\TestMail;
use Auth;
use App\Models\Cart;
use App\Models\Order;

class MailController extends Controller
{
    public function sendMail() {
        $user = Auth::guard('admin')->user();

        $order = Order::count();
        $reg = Carbon::now()->format('Ymd').Auth::guard('admin')->id().$order;

        $cartItems = Cart::with('food')->where('reg', $reg)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'No cart items found for invoice.');
        }

        $data = [
            'name' => $user->name,
            'date' => now()->format('Y-m-d'),
            'reg' => $reg,
            'items' => []
        ];

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
        Mail::to($mailAddress)->send(new TestMail($data));
    
        return redirect()->back()->with('success', 'Email send successfully');
    }
}
