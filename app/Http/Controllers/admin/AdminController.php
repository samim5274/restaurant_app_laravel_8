<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{
    public function loginView() {
        Auth::guard('admin')->logout();
        return view('auth.login');
    }

    public function login(Request $request) {

        $request->validate([
            'txtEmail' => 'required|email',
            'txtPassword' => 'required',
        ]);


        if (Auth::guard('admin')->attempt(['email'=>$request->txtEmail,'password'=>$request->txtPassword])) {
            $userId = Auth::guard('admin')->id();
            $username = Auth::guard('admin')->user()->name;
            return redirect()->route('dashboard.view');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password. Please try again!');
        }
    }
}
