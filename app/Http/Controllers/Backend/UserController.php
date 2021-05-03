<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function viewUsers()
    {

        $user_create = User::paginate('2');
        $title = "USERS LIST";
        return view('backend.layouts.earners.earners', compact('user_create', 'title'));
    }









    public function createUser(Request $request)
    {


        $user_file = "";

        if ($request->hasFile('UserImage')) {

            $file = $request->file('UserImage');
            if ($file->isValid()) {

                $user_file = date('Ymdhms') . "." . $file->getClientOriginalExtension();
                $file->storeAs('users', $user_file);
            }
        }


        User::create([

            'user_name' => $request->userName,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'user_status' => $request->status,
            'user_image' => $user_file


        ]);
        return redirect()->route('user.view')->with('success','User created Successfully');
    }












    public function viewCreate()
    {
        $title = "EARNERS CREATE";
        return view('backend.layouts.earners.earnerCreate', compact('title'));

    }









    public function userDelete($id)
    {

        $user = User::find($id);

        $user->delete();

        return redirect()->route('user.view')->with('success', 'User Was Kicked Out Of The Website Successfully');
    }


    public function userUpdateForm($id)
    {
        $title="User Update Form";
        $user_edit=User::find($id);
        return view('backend.layouts.earners.userUpdate',compact('title','user_edit'));
    }


    public function userUpdate(Request $request,$id)
    {

        $user_update=User::find($id)->update([

            'user_name' => $request->userName,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'user_status' => $request->status,
            'deposit_balance' => $request->updateDeposit,
//            'user_image' => $user_file


        ]);
        return redirect()->route('user.view')->with('success','User Updated Successfully');


    }










//Frontend
    public function createUserFrontend(Request $request)
    {


        $user_file = "";

        if ($request->hasFile('UserImage')) {

            $file = $request->file('UserImage');
            if ($file->isValid()) {

                $user_file = date('Ymdhms') . "." . $file->getClientOriginalExtension();
                $file->storeAs('users', $user_file);
            }
        }


        User::create([

            'user_name' => $request->userName,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'user_image' => $user_file


        ]);
        return redirect()->route('registration.form')->with('success','Account Created successfully !');
    }


    public function userDashboard()
    {
        return view('userDashboard.layouts.userDashboard');
    }








    public function loginForm()
    {

        return view('frontend.layouts.login.loginWeb');
    }










    public function registrationForm()
    {

        return view('frontend.layouts.login.registrationWeb');
    }






    public function userValidate(Request $request)
    {

        $request->validate([

            'email'=>'required|email',
            'password'=>'required|min:6'

        ]);

        $user_credentials = $request->only('email', 'password');
//        dd($user_credentials);
        if (Auth::guard('user')->attempt($user_credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);

    }


    public function userLogout()
    {
        Auth::guard('user')->logout();

        return redirect()->route('login.form')->with('success','Logged Out Successfully');
    }



    //user payment



}







