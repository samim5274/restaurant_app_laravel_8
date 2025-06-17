<?php

namespace App\Http\Controllers\food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Food;

class FoodController extends Controller
{
    public function foodView() {
        $food = Food::paginate(10);
        return view('dashboard.food.food', compact('food'));
    }

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
        if($val) {
            return view('dashboard.food_edit_view', compact('val'));
        }
        else {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
    }

    public function foodEdit(Request $request, $id) {

        $data = Food::where('id',$id)->first();
        if($data) {
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
        } else {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
        
    }

    public function foodDelete($id) {
        $data = Food::where('id',$id)->first();
        // $data->delete();
        if($data) {
            return redirect()->route('food.view')->with('warning','Food was DELETED successfully.');
        }
        else {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
    }

    public function foodStockView() {
        $data = Food::all();
        return view('dashboard.food.stock', compact('data'));
    }
}
