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
}
