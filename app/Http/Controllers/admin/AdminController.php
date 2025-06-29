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


        if (Auth::guard('admin')->attempt(['email'=>$request->txtEmail,'password'=>$request->txtPassword, 'status' => 1])) {
            $userId = Auth::guard('admin')->id();
            $username = Auth::guard('admin')->user()->name;
            return redirect()->route('dashboard.view');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password. Please try again!');
        }
    }

    public function userCreateView() {
        return view('auth.register');
    }

    public function createUser(Request $request) {

        $user = new Admin();

        $username = $request->input('txtName','');
        $email = $request->input('txtEmail','');
        $dob = $request->input('dtpDob','');
        $pass = $request->input('txtPassword','');
        $phone = $request->input('txtPhone','');
        $address = $request->input('txtAddress','');
        $role = $request->input('cbxRole','');

        if (empty($username) || empty($email) || empty($dob) || empty($pass) || empty($phone) || empty($address) || empty($role)) {
            return redirect()->back()->with('error', 'All fields are required.');
        }

        $user = new Admin();
        $user->name = $username;
        $user->email = $email;
        $user->dob = $dob;
        $user->password = Hash::make($pass); 
        $user->phone = $phone;
        $user->address = $address;
        $user->role = $role;
        $user->status = 0;
        $user->save();
        return redirect()->back()->with('success', 'New user created successfully.');
    }
}
