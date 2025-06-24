<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

use App\Models\Table;
use App\Models\Food;
use App\Models\Order;
use App\Models\Cart;

class DashboardController extends Controller
{
    public function index() {
        $data = Order::paginate(13);
        $total = Order::sum('total');
        $totalPay = Order::sum('pay');
        $totalDiscount = Order::sum('discount');
        $totalPayable = Order::sum('payable');
        $totalDue = Order::sum('due');

        // table report
        $totalTable = Table::count();
        $tableEmpty = Table::where('status', 1)->count();
        $tableOrder = Table::where('status', 3)->count();
        $tableReserved = Table::where('status', 2)->count();

        // food stock
        $food = Food::count();
        $stock = Food::sum('stock');
        return view('dashboard.dashboard', compact('data','total','totalPay','totalDiscount','totalPayable','totalDue','totalTable','tableEmpty','tableOrder','tableReserved','food','stock'));
    }

    // ================================================================= table create section =================================================================

    public function setting() {
        $data = Table::paginate(5);
        $food = Food::paginate(10);
        // dd($data);
        return view('dashboard.setting', compact('data','food'));
    }

    public function tableView() {
        $data = Table::paginate(10);
        return view('dashboard.table.table', compact('data'));
    }

    public function creatTable(Request $request) {
        try {
            $data = new Table;

            $data->tName = $request->input('txtTableNo', '');
            $data->status = $request->input('txtStatus', '');
            $data->remark = $request->input('txtRemark', '');
            // dd($data);
            $data->save();
            return redirect()->back()->with('success','New table created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function editTable(Request $request, $id) {
        try {
            $data = Table::where('id',$id)->first();

            $data->tName = $request->input('txtTableNo', '');
            $data->status = $request->input('txtStatus', '');
            $data->remark = $request->input('txtRemark', '');

            $data->save();
            return redirect()->back()->with('success','Table edited successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function deleteTable(Request $request, $id) {
        $data = Table::where('id',$id)->first();
        if(!$data) {
            return redirect()->back()->with('warning','This item not availabel righ now');
        } else {
            $name = $data->tName; 
            return redirect()->back()->with('warning',$name . ' -> table can not deleted right now. contact with your manager. Thank You!');
        }        
    }

    public function backup() {
        Artisan::call('backup:run', [
            '--only-db' => true
        ]);
        
        $files = Storage::disk('local')->files('Laravel');

        if (empty($files)) {
            return response()->json(['message' => 'No backup file found.'], 404);
        }

        $latestFile = collect($files)->sortDesc()->first();
        return Storage::disk('local')->download($latestFile);
    }
}