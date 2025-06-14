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

    public function foodView() {
        $food = Food::paginate(10);
        return view('dashboard.food.food', compact('food'));
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
        $name = $data->tName; 
        return redirect()->back()->with('warning',$name . ' -> table can not deleted right now. contact with your manager. Thank You!');
    }

    // ================================================================= food create section =================================================================

    public function createFood(Request $request) {
        try {
            $data = new Food;

            $data->name = $request->input('txtFoodName','');
            $data->price = $request->input('txtPrice','');
            $data->category = $request->input('txtCategory','');
            $data->stock = $request->input('txtStock','');
            $data->status = $request->input('txtStatus','');
            
            $data->ingredients = $request->input('txtIngredients','');
            $data->remark = $request->input('remark','');

            $request->validate([
                'image' => 'nullable|image|max:5120', // max:5120 = 5MB
            ]);


            if ($request->file('image')) {

                $file = $request->file('image');
                if ($file->isValid()) {
                    $ext = $file->getClientOriginalExtension();
                    $fileName = 'food-' . time() . '.' . $ext;

                    $location = public_path('img/food');

                    if (!file_exists($location)) {
                        mkdir($location, 0755, true);
                    }

                    $file->move($location, $fileName);
                    $data->image = $fileName;
                }
            } 

            // dd([
            //     'hasFile' => $request->hasFile('image'),
            //     'file' => $request->file('image'),
            //     'errorCode' => $request->file('image')->getError(),
            // ]);

            // dd([
            //     'hasFile' => $request->hasFile('image'),
            //     'file' => $request->file('image'),
            //     'all' => $request->all()
            // ]);


            // dd($data, $request->all());
            $data->save();
            return redirect()->route('food.view')->with('success','New food item added successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function foodEditView(Request $request, $id) {
        $val = Food::where('id',$id)->first();
        // dd($val);
        return view('dashboard.food_edit_view', compact('val'));
    }

    public function foodEdit(Request $request, $id) {

        $data = Food::where('id',$id)->first();

        $data->name = $request->input('txtFoodName','');
        $data->price = $request->input('txtPrice','');
        $data->category = $request->input('txtCategory','');
        $data->stock = $request->input('txtStock','');
        $data->status = $request->input('txtStatus','');
        
        $data->ingredients = $request->input('txtIngredients','');
        $data->remark = $request->input('remark','');

        $request->validate([
            'image' => 'nullable|image|max:5120', // max:5120 = 5MB
        ]);

        if ($request->file('image')) {
            if ($data->image) {
                $path = public_path('/img/food/' . $data->image);
                logger("Trying to delete: " . $path);
                if (file_exists($path)) {
                    unlink($path);
                } else {
                    logger("File not found: " . $path);
                }
            }

            $file = $request->file('image');
            if ($file->isValid()) {
                $ext = $file->getClientOriginalExtension();
                $fileName = 'food-' . time() . '.' . $ext;

                $location = public_path('img/food');

                if (!file_exists($location)) {
                    mkdir($location, 0755, true);
                }

                $file->move($location, $fileName);
                $data->image = $fileName;
            }
        } else {
            $data->image = $data->image;
        }

        $data->update();
        // dd($request->all(), $data);
        return redirect()->route('food.view')->with('success','Food information updated successfully.');
    }

    public function foodDelete($id) {
        $data = Food::where('id',$id)->first();
        // $data->delete();
        return redirect()->route('food.view')->with('warning','Food was DELETED successfully.');
    }
}
