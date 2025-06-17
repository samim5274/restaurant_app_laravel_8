<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Table;
use App\Models\Food;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.dashboard');
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

}
