<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function viewAdmin()
    {
        $admin = Admin::paginate('2');
        $title = "ADMIN";
        return view('backend.layouts.admins.admin', compact('title', 'admin'));
    }

    public function viewAdminForm()
    {
        $title = "ADMIN CREATE FORM";
        return view('backend.layouts.admins.adminCreate', compact('title'));
    }

    public function createAdmin(Request $request)
    {
//dd($request->all());

        $request->validate([


        ]);


        $image_name = "";

        if ($request->hasFile('admin_image')) {
            $file = $request->file('admin_image');
            if ($file->isValid()) {

                $image_name = date('Ymdhms') . "." . $file->getClientOriginalExtension();
                $file->storeAs('admin', $image_name);
            }

        }


        Admin::Create([
            'name' => $request->adminname,
            'image' => $image_name,
            'password' => bcrypt($request->adminpassword),
            'role' => $request->adminrole,
            'email' => $request->adminemail,
            'contact' => $request->admincontact,
            'status' => $request->adminstatus

        ]);


        return redirect()->route('admin.view')->with('success', 'Admin Created Successfully');


    }

    public function deleteAdmin($id)
    {

        $admin = Admin::find($id);

        $admin->delete();

        return redirect()->route('admin.view')->with('success', 'Admin Deleted Successfully');
    }


    public function adminLogin()
    {

        return view('backend.layouts.login.login');
    }


    public function adminValidate(Request $request)
    {

        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);

        $credentials = $request->only('email', 'password');
//        dd($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);


    }

    public function adminLogout()
    {

        Auth::logout();

        return redirect()->route('login.view')->with('success', 'Logout Successfully');
    }

    public function adminUpdateForm($id)
    {
        $admin=Admin::find($id);
        $title="Admin Update Form";
        return view('backend.layouts.admins.adminUpdateForm',compact('admin','title'));
    }

    public function adminUpdatePost(Request $request,$id)
    {
        $admin=Admin::find($id)->update([

            'name' => $request->adminname,
//            'image' => $image_name,
            'password' => bcrypt($request->adminpassword),
            'role' => $request->adminrole,
            'email' => $request->adminemail,
            'contact' => $request->admincontact,
            'status' => $request->adminstatus,

        ]);

        return redirect()->route('admin.view')->with('success','Admin Updated Successfully');

    }
}
