<?php

namespace App\Http\Controllers\food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Food;
use App\Models\Stock;

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
            return view('dashboard.food.food_edit_view', compact('val'));
        }
        else {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
    }

    public function stockIn(Request $request, $id) {
        $food = Food::where('id',$id)->first();
        
        if(!$food) {
            return redirect()->back()->with('warning','This item not availabel righ now');
        }
        $stock = new Stock();
        $stock->stockIn = $request->input('txtStock','');
        $stock->date = Carbon::now()->format('Y-m-d');
        $stock->status = 2; // stock in
        $stock->reg = 0;
        $stock->foodId = $id;
        $stock->remark = 'N/A';
        $food->stock += $request->input('txtStock','');
        $food->update();
        $stock->save();
        return redirect()->back()->with('success','Food Stock in successfully.');
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
        $data = Food::paginate(15);
        return view('dashboard.food.stock', compact('data'));
    }

    public function SpecificFoodView($id) {
        $food = Food::where('id',$id)->first();
        $category = Food::where('category', $food->category)->where('id', '!=', $food->id)->paginate(4);
        // dd($category);
        return view('dashboard.food.one_Food', compact('food','category'));
    }

    public function liveSearch(Request $request) {
        
        $output = "";

        $food = Food::where('name', 'like','%'.$request->search.'%')->orWhere('id', 'like','%'.$request->search.'%')->orWhere('category', 'like','%'.$request->search.'%')->get();

        foreach($food as $val) {
            $name = strlen($val->name) > 22 ? substr($val->name, 0, 22) . '...' : $val->name;
            $ingradient = strlen($val->ingredients) > 40 ? substr($val->ingredients, 0, 40) . '...' : $val->ingredients;
            $imagePath = asset('img/food/' . $val->image);
            $link = url('/specific-food-view/'.$val->id);
            $addCart = url('/add-to-cart/'.$val->id);

            $output .= '
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card h-100 shadow-sm">
                    '.'<a href="'.$link.'"><img src="'.$imagePath.'" class="card-img-top" alt="image not found"></a>'.'
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">'.'<a href="'.$link.'">'.$name.' - ৳'.$val->price.'/-</a>'.'</h4>
                        <p>'.$ingradient.'</p>
                        '.'<a href="'.$addCart.'" class="mt-auto btn btn-outline-success w-100">
                            <i class="mdi mdi-cart-plus fa-lg" aria-hidden="true" style="font-size: 1rem;"></i>
                            <span style="font-size: 1rem;" class="mb-0">Add Cart</span>
                        </a>'.'
                    </div>  
                </div>  
            </div>';
        }
        return response($output);
    }
}
