<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Expenses;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function setting() {
        $category = Category::paginate(10)->onEachSide(1);
        $Subcategory = Subcategory::with('category')->paginate(10)->onEachSide(2);
        // dd($Subcategory );
        return view('dashboard.account.expensesSetting', compact('category','Subcategory'));
    }

    public function addCategory(Request $request) {
        $data = new Subcategory();
        $data->name = $request->input('txtCategory','');
        // dd($data);
        $data->save();
        return redirect()->back()->with('success', 'Category added successfully.');
    }

    public function addSubCategory(Request $request) {
        $data = new Subcategory();
        $data->catId = $request->input('cbxCategory','');
        $data->name = $request->input('txtSubCategory','');
        // dd($data);
        $data->save();
        return redirect()->back()->with('success', 'Sub-Category added successfully.');
    }

    public function dailyExpenses() {
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('date', $date)->with('category','subcategory','user')->paginate(10)->onEachSide(2);
        $total = Expenses::where('date', $date)->sum('amount');
        $category = Category::all();
        $Subcategory = Subcategory::with('category')->get();
        return view('dashboard.account.dailyExpenses', compact('expenses','category','total'));
    }

    public function getSubcategory(Request $request, $id)
    {
        $subCategory = Subcategory::where('catId', $id)->get();
        return response()->json(['subCategory'=>$subCategory]);
    }

    public function addExpenses(Request $request) {
        $request->validate([
            'cbxCategory' => 'required|exists:categories,id',
            'cbxsubcategory' => 'required|exists:subcategories,id',
            'txtAmount' => 'required|numeric|min:0.01',
        ]);
        
        $userId = optional(Auth::guard('admin')->user())->id;
        if (!$userId) {
            return back()->withErrors(['message' => 'No admin user is logged in.']);
        }
        $data = new Expenses();
        
        $data->catId = $request->input('cbxCategory', '');
        $data->subcatId = $request->input('cbxsubcategory', '');
        $data->userId = $userId;
        $data->date = Carbon::now()->format('Ymd');
        $data->amount = $request->input('txtAmount', '');
        // dd($userId, $data);
        $data->save();
        return redirect()->back()->with('success', 'Daily expenses added successfully.');
    }

    public function printExpenses() {
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('date', $date)->with(['category', 'subcategory'])->orderBy('date', 'desc')->get();
        $total = Expenses::where('date', $date)->sum('amount');
        return view('dashboard.account.expensesPrint', compact('expenses','total'));
    }
}
