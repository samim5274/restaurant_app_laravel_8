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

    public function employeeView() {
        $user = Admin::paginate(15);
        return view('dashboard.employee.epmloyee_Details', compact('user'));
    }

    public function editEmpStatus(Request $request, $id) {
        $findUser = Admin::where('id', $id)->first();
        $findUser->status = $findUser->status == 0 ? 1 : 0;
        $findUser->update();
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function SearchEmp(Request $request) {
        $output = '';
        $search = $request->input('search', '');

        $employees = Admin::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->get();

        if ($employees->count() > 0) {
            foreach ($employees as $key => $val) {
                $imgpath = asset('img/employee/' . $val->photo);
                $link1 = url('/update-employee-status/' . $val->id);
                $statusBtn = $val->status == 1
                    ? '<button class="btn btn-success btn-sm" type="submit">Active</button>'
                    : '<button class="btn btn-danger btn-sm" type="submit">Deactive</button>';

                $output .= '
                    <tr>
                        <td>' . ($key + 1) . '</td>
                        <td><img src="' . $imgpath . '" alt="Image not found" width="100"></td>
                        <td>' . $val->name . '</td>
                        <td>' . $val->email . '</td>
                        <td>' . $val->phone . '</td>
                        <td>' . $val->address . '</td>
                        <td>' . $val->dob . '</td>
                        <td>' . $val->role . '</td>
                        <td class="text-center">
                            <form action="' . $link1 . '" method="get">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                ' . $statusBtn . '
                            </form>
                        </td>
                    </tr>';
            }
        } else {
            $output = '<tr><td colspan="9" class="text-center text-danger">No employees found.</td></tr>';
        }

        return response($output);
    }

    public function printEmp() {
        $user = Admin::all();
        return view('dashboard.employee.epmloyee_Details_print', compact('user'));
    }

    public function profileView($id) {
        $user = Admin::where('id', $id)->first();
        // dd($data);
        return view('dashboard.profile.profile', compact('user'));
    }

    public function editProfile(Request $request, $id) {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $user = Admin::where('id', $id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->dob = $request->input('dob');
        $password = Hash::make($request->input('password'));
        
        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->with('error', 'Password not match. Please try again.');
        } 


        if ($request->file('photo')) {

            if ($user->photo) {
                $path = public_path('img/employee/' . $user->photo);
                logger("Trying to delete: " . $path);
                if (file_exists($path)) {
                    unlink($path);
                } else {
                    logger("File not found: " . $path);
                }
            }

            $file = $request->file('photo');
            if ($file->isValid()) {
                $ext = $file->getClientOriginalExtension();
                $fileName = 'user-' . time() . '.' . $ext;

                $location = public_path('img/employee/');

                if (!file_exists($location)) {
                    mkdir($location, 0755, true);
                }

                $file->move($location, $fileName);
                $user->photo = $fileName;
            }
        }

        $user->update();
        // dd($user, $request->file('photo'));
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function changePass(Request $request, $id) {
        
        $oldPass = $request->input('current_password','');
        $newPass = $request->input('new_password','');
        $reTypePass = $request->input('confirm_password','');

        if($newPass == $reTypePass) {
            $user = Admin::where('id', $id)->first();

            if (!Hash::check($oldPass, $user->password)) {
                return back()->with('error', 'Current password is incorrect.');
            } else {
                $user->password = Hash::make($request->input('new_password',''));
                $user->update();
                return redirect()->back()->with('success', 'Password changed successfully.');
            }
        } else {
            return redirect()->back()->with('warning', 'Password not match successfully.');
        }

        
    }
}
