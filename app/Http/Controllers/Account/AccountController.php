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
            return back()->withErrors(['error' => 'No admin user is logged in.']);
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

    public function specificPrint($id) {
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('id', $id)->where('date', $date)->with(['category', 'subcategory', 'user'])->orderBy('date', 'desc')->get();
        if (!$expenses) {
            return back()->withErrors(['error' => 'Expenses item not find. Please try again.']);
        }
        return view('dashboard.account.specificExpensesPrint', compact('expenses'));
    }

    public function catRpt() {
        $category = Category::all();
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('date', $date)->with(['category', 'subcategory', 'user'])->orderBy('date', 'desc')->get();
        $total = Expenses::where('date', $date)->sum('amount');
        return view('dashboard.account.report.category', compact('expenses','category','total'));
    }

    public function searchCategory(Request $request) {
        $validatedData = $request->validate([
            'dtpStartDate' => ['required', 'date'],
            'dtpEndDate' => ['required', 'date', 'after_or_equal:dtpStartDate'],
            'cbxCategory' => ['required'],  
        ], [
            'dtpStartDate.required' => 'Start Date is required.',
            'dtpStartDate.date' => 'Start Date must be a valid date.',
            'dtpEndDate.required' => 'End Date is required.',
            'dtpEndDate.date' => 'End Date must be a valid date.',
            'dtpEndDate.after_or_equal' => 'End Date cannot be earlier than Start Date.',
            'cbxCategory.required' => 'Please select a category.',
            'cbxCategory.exists' => 'Selected category is invalid.',
        ]);
        $category = Category::all();
        $dateStart = $request->dtpStartDate;
        $dateEnd = $request->dtpEndDate;
        $expenses = Expenses::with(['category', 'subcategory'])
                            ->where('catId', $request->cbxCategory)
                            ->whereBetween('date', [$dateStart, $dateEnd])                            
                            ->orderBy('id', 'desc')
                            ->get();
        $total = Expenses::where('catId', $request->cbxCategory)
                            ->whereBetween('date', [$dateStart, $dateEnd])   
                            ->sum('amount');
        // dd($expenses);
        return view('dashboard.account.report.category', compact('expenses','category','total'));
    }

    public function subCatRpt() {
        $category = Category::all();
        $subCategory = Subcategory::all();
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('date', $date)->with(['category', 'subcategory', 'user'])->orderBy('date', 'desc')->get();
        $total = Expenses::where('date', $date)->sum('amount');
        return view('dashboard.account.report.sub_category', compact('expenses','category','subCategory','total'));
    }

    public function searchSubCat(Request $request) {
        $validatedData = $request->validate([
            'dtpStartDate'   => ['required', 'date'],
            'dtpEndDate'     => ['required', 'date', 'after_or_equal:dtpStartDate'],
            'cbxCategory'    => ['required', 'exists:categories,id'],  
            'cbxsubcategory' => ['required', 'exists:subcategories,id'],
        ], [
            'dtpStartDate.required'        => 'Start Date is required.',
            'dtpStartDate.date'            => 'Start Date must be a valid date.',
            
            'dtpEndDate.required'          => 'End Date is required.',
            'dtpEndDate.date'              => 'End Date must be a valid date.',
            'dtpEndDate.after_or_equal'    => 'End Date cannot be earlier than Start Date.',
            
            'cbxCategory.required'         => 'Please select a category.',
            'cbxCategory.exists'           => 'Selected category is invalid.',
            
            'cbxsubcategory.required'      => 'Please select a sub-category.',
            'cbxsubcategory.exists'        => 'Selected sub-category is invalid.',
        ]);

        $category = Category::all();
        $subCategory = Subcategory::all();
        $dateStart = $request->dtpStartDate;
        $dateEnd = $request->dtpEndDate;
        $expenses = Expenses::with(['category', 'subcategory'])
                            ->where('catId', $request->cbxCategory)
                            ->where('subcatId', $request->cbxsubcategory)
                            ->whereBetween('date', [$dateStart, $dateEnd])                            
                            ->orderBy('id', 'desc')
                            ->get();
        $total = Expenses::where('catId', $request->cbxCategory)
                            ->where('subcatId', $request->cbxsubcategory)
                            ->whereBetween('date', [$dateStart, $dateEnd])   
                            ->sum('amount');
        // dd($expenses, $total);
        return view('dashboard.account.report.sub_category', compact('expenses','category','subCategory','total'));
    }
}
