<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
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
}
