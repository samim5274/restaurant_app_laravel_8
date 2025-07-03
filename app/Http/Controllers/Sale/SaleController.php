<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Table;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;
use Auth;

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
        $data = Order::where('status', 3)->paginate(13);
        $total = Order::where('status', 3)->sum('total');
        $totalPay = Order::where('status', 3)->sum('pay');
        $totalDiscount = Order::where('status', 3)->sum('discount');
        $totalPayable = Order::where('status', 3)->sum('payable');
        $totalDue = Order::where('status', 3)->sum('due');
        $sumTotal = Order::where('status', 3)->sum('pay');
        return view('dashboard.report.totalDue', compact('data','total','totalPay','totalDiscount','totalPayable','totalDue','sumTotal'));
    }

    public function getPdf($reg) {
        $invoice = Cart::where('reg', $reg)->with('food')->get();
        $grandTotal = Order::where('reg', $reg)->first();
        $cart = Cart::where('reg', $reg)->with('food')->first();
        // dd($grandTotal);
        if($invoice->isEmpty()) {
            return redirect()->back()->with('warning', 'This item is not available right now.');
        }
        // return view('dashboard.print.invoice', compact('invoice','grandTotal','cart'));
        $pdf = Pdf::loadView('dashboard.print.report.invoice', compact('invoice','grandTotal','cart'));
        return $pdf->download('Invoice-'.time().'-'.$cart->reg.'.pdf');
    }

    public function downloadPdf($reg) {
        $user = Auth::guard('admin')->user();
        $invoice = Cart::where('reg', $reg)->with('food')->get();
        $grandTotal = Order::where('reg', $reg)->first();
        $cart = Cart::where('reg', $reg)->with('food')->first();
        // dd($invoice);
        if($invoice->isEmpty()) {
            return redirect()->back()->with('warning', 'This item is not available right now.');
        }
        return view('dashboard.print.invoice.payment_order', compact('invoice','user','cart','grandTotal'));
        // $pdf = Pdf::loadView('dashboard.print.invoice.payment_order', compact('invoice','grandTotal','cart'));
        // return $pdf->download('Invoice-'.time().'-'.$cart->reg.'.pdf');
    }

    public function dayWiseReport() {
        $sevenDaysAgo = Carbon::now()->subDays(7)->toDateString();
        $today = Carbon::now()->toDateString();
        $order = Order::whereBetween('date', [$sevenDaysAgo, $today])->get();
        return view('dashboard.report.dayWiseReport', compact('order'));
    }

    public function SearchReportDateWise(Request $request) {
        
        if(!$request->dtpStartDate || !$request->dtpEndDate) {
            return redirect()->back()->with('warning', 'This date wise data not available right now.');
        }
        
        $request->validate([
            'dtpStartDate' => ['required', 'date'],
            'dtpEndDate'   => ['required', 'date', 'after_or_equal:dtpStartDate'],
        ], [
            'dtpStartDate.required' => 'Start date is required.',
            'dtpEndDate.required'   => 'End date is required.',
            'dtpEndDate.after_or_equal' => 'End date must be after or equal to start date.',
        ]);
        
        $startDate = $request->dtpStartDate;
        $endDate = $request->dtpEndDate;

        $order = Order::whereBetween('date', [$startDate, $endDate])->with('table')->get();
        
        if ($order->isEmpty()) {
            return redirect()->back()->with('warning', 'No data available for the selected date range.');
        }

        if ($request->has('download')) {
            $pdf = Pdf::loadView('dashboard.print.report.report_print', compact('order', 'startDate', 'endDate'));
            return $pdf->download('RPT-'.time().'-'.$startDate.'-to-'.$endDate.'.pdf');
        }
        
        return view('dashboard.report.dayWiseReport', compact('order', 'startDate', 'endDate'));
    }

    public function download() {
        $sevenDaysAgo = Carbon::now()->subDays(7)->toDateString();
        $today = Carbon::now()->toDateString();
        $order = Order::whereBetween('date', [$sevenDaysAgo, $today])->with('table')->get();
        // return view('dashboard.print.report_print', compact('order'));
        $pdf = Pdf::loadView('dashboard.print.report.report_print', compact('order'));
        return $pdf->download('RPT-'.time().'-'.$sevenDaysAgo.'-to-'.$today.'.pdf');
    }

    public function viewOrder($reg) {
        $food = Cart::where('reg', $reg)->get();
        $total = Cart::where('reg', $reg)->sum('price');
        $count = Cart::where('reg', $reg)->count();
        $order = Order::where('reg', $reg)->first();
        // dd($food);
        return view('dashboard.print.cart', compact('food','order','count','total','reg'));
    }
}
