<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Table;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;
use Auth;
use Illuminate\Support\Carbon;

class SaleController extends Controller
{
    public function totalSale() {
        $data = Order::paginate(13);
        $total = Order::sum('total');
        $totalPay = Order::sum('pay');
        $totalDiscount = Order::sum('discount');
        $totalPayable = Order::sum('payable');
        $totalDue = Order::sum('due');
        $sumTotal = Order::sum('pay');
        return view('dashboard.report.total_sale', compact('data','total','totalPay','totalDiscount','totalPayable','totalDue','sumTotal'));
    }

    public function dueCollectioListView() {
        $data = Order::paginate(13);
        $total = Order::sum('total');
        $totalPay = Order::sum('pay');
        $totalDiscount = Order::sum('discount');
        $totalPayable = Order::sum('payable');
        $totalDue = Order::sum('due');
        $sumTotal = Order::sum('pay');
        return view('dashboard.report.totalDue', compact('data','total','totalPay','totalDiscount','totalPayable','totalDue','sumTotal'));
    }

    public function getPdf($reg) {
        $invoice = Cart::where('reg', $reg)->with('food')->get();
        $grandTotal = Order::where('reg', $reg)->first();
        $cart = Cart::where('reg', $reg)->with('food')->first();
        // dd($invoice);
        if($invoice->isEmpty()) {
            return redirect()->back()->with('warning', 'This item is not available right now.');
        }
               
        $pdf = Pdf::loadView('dashboard.print.invoice', compact('invoice','grandTotal','cart'));
        return $pdf->download('Invoice-'.time().'-'.$cart->reg.'.pdf');
    }

    public function downloadPdf($reg) {
        $invoice = Cart::where('reg', $reg)->with('food')->get();
        $grandTotal = Order::where('reg', $reg)->first();
        $cart = Cart::where('reg', $reg)->with('food')->first();
        // dd($invoice);
        if($invoice->isEmpty()) {
            return redirect()->back()->with('warning', 'This item is not available right now.');
        }
        // return view('dashboard.print.download', compact('invoice','cart','grandTotal'));
        $pdf = Pdf::loadView('dashboard.print.download', compact('invoice','grandTotal','cart'));
        return $pdf->download('Invoice-'.time().'-'.$cart->reg.'.pdf');
    }
}
