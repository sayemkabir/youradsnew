<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ad;
use App\Models\PasswordReset;
use App\Models\UserAd;
use App\Models\DepositBalance;
use App\Models\WithdrawBalance;
use App\Mail\UserCreated;
use App\Mail\RecoverPassword;
use App\Mail\UserEmailVerify;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        $request->validate([

            'userName'=>'required',
            'password'=>'required|min:6',
            'email'=>'required|email',
            'status'=>'required',
            'UserImage'=>'required',

        ]);

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
        return redirect()->route('user.view')->with('success', 'User created Successfully');
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
        $title = "User Update Form";
        $user_edit = User::find($id); 
        return view('backend.layouts.earners.userUpdate', compact('title', 'user_edit'));
    }


    public function userUpdate(Request $request, $id)
    {

        $request->validate([

            'userName'=>'required',
            'password'=>'required|min:6',
            'email'=>'required|email',
            'status'=>'required',
            'updateDeposit'=>'required',
            'UserImage'=>'required',

        ]);

        $user_file = "";

        if ($request->hasFile('UserImage')) {

            $file = $request->file('UserImage');
            if ($file->isValid()) {

                $user_file = date('Ymdhms') . "." . $file->getClientOriginalExtension();
                $file->storeAs('users', $user_file);
            }
        }

        $user_update = User::find($id)->update([

            'user_name' => $request->userName,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'user_status' => $request->status,
            'deposit_balance' => $request->updateDeposit,
            'user_image' => $user_file


        ]);
        return redirect()->route('user.view')->with('success', 'User Updated Successfully');


    }


//Frontend
    public function createUserFrontend(Request $request)
    {


//        $user_file = "";
//
//        if ($request->hasFile('UserImage')) {
//
//            $file = $request->file('UserImage');
//            if ($file->isValid()) {
//
//                $user_file = date('Ymdhms') . "." . $file->getClientOriginalExtension();
//                $file->storeAs('users', $user_file);
//            }
//        }

        $request->validate([

            'userName'=>'required',
            'password'=>'required|min:6',
            'email'=>'required|email|unique:users',

        ]);


        $userRegistration=User::create([

            'user_name' => $request->userName,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'user_image' => 'unnamed.png'


        ]);

        Mail::to($request->email)->send(new UserCreated($userRegistration));



        return redirect()->route('registration.form')->with('success', 'Account Created successfully !');
    }


    public function userDashboard()
    {

        $depositShow=DepositBalance::with('userDeposit')->where('user_id',auth('user')->user()->id)->orderby('created_at','desc')->get();
        $withdrawShow=WithdrawBalance::with('userPaymentWithdrawRequest')->where('user_id',auth('user')->user()->id)->orderby('created_at','desc')->get();

        return view('userDashboard.layouts.userDashboard',compact('depositShow','withdrawShow'));
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

            'email' => 'required|email',
            'password' => 'required|min:6'

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

        return redirect()->route('login.form')->with('success', 'Logged Out Successfully');
    }


//Profile
    public function userProfile()
    {
        $user_update=User::find(auth('user')->user()->id);
        $adclicks=UserAd::where('user_id',auth('user')->user()->id)->get();
        $surfads = Ad::where('user_id', auth('user')->user()->id)->orderby('created_at','desc')->get();
        return view('userDashboard.layouts.profile.userProfile', compact('surfads','adclicks','user_update'));
    }

    public function userUpdateFrontend(Request $request)
    {
//        dd($request->all());
//
//        $user_file = "";
//
//        if ($request->hasFile('UserImage')) {
//
//            $file = $request->file('UserImage');
//            if ($file->isValid()) {
//
//                $user_file = date('Ymdhms') . "." . $file->getClientOriginalExtension();
//                $file->storeAs('users', $user_file);
//            }
//        }
//        $oldPassCheck=User::find(auth('user')->user()->id)->where('password',bcrypt($request->oldPassword));
//dd($oldPassCheck);
        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);

        $user_credentials = $request->only('email', 'password');
//        dd($user_credentials);
        if (Auth::guard('user')->attempt($user_credentials)) {

            $user_update = User::find(auth('user')->user()->id)->update([

                'user_name' => $request->userName,
                'password' => bcrypt($request->newPassword),
                'email' => $request->newEmail,
//            'user'
//            'user_status' => $request->status,
//            'deposit_balance' => $request->updateDeposit,


            ]);
            return redirect()->back()->with('success', 'User Details Updated Successfully');

        }else{

            return redirect()->back()->with('oldPassword','Old Password Does not match');
        }




    }
public function userWalletUpdateFrontend(Request $request)
{

    $request->validate([

        'email' => 'required|email',
        'password' => 'required|min:6'

    ]);

    $user_credentials = $request->only('email', 'password');
//        dd($user_credentials);
    if (Auth::guard('user')->attempt($user_credentials)) {

        $user_update = User::find(auth('user')->user()->id)->update([


            'wallet_address' => $request->walletaddress,
//


        ]);
        return redirect()->back()->with('successwallet', 'Wallet Updated Successfully');


    }else{
        return redirect()->back()->with('CanceledWallet', 'Entered Password is incorrect. Please Try Again');

    }
}

    public function userPhotoUpdateFrontend(Request $request)
    {

        $request->validate(
            [
                'UserImage'=>'required',
            ]
        );


        $user_file = "";

        if ($request->hasFile('UserImage')) {

            $file = $request->file('UserImage');
            if ($file->isValid()) {

                $user_file = date('Ymdhms') . "." . $file->getClientOriginalExtension();
                $file->storeAs('users', $user_file);
            }
        }

        $user_update = User::find(auth('user')->user()->id)->update([


            'user_image' => $user_file,
//


        ]);
        return redirect()->back()->with('successPhoto', 'Photo Updated Successfully');




    }


    public function passwordRecovery()
    {

        return view('frontend.layouts.login.passwordRecovery');
    }


    public function passwordRecoveryValidate(Request $request)
    {
        $request->validate([

            'email'=>'required|email'

        ]);

        $userEmailValidate=User::where('email',$request->email)->first();

        $token = Str::random(40);

//        $passwordRest = DB::table('password_resets')->insert([
//            'email'=>$request->email,
//            'token'=>$token
//        ]);



//        dd(count($userEmailValidate))
        if ($userEmailValidate)
        {

            $passwordRest = PasswordReset::insert([
                'email'=>$request->email,
                'token'=>$token
            ]);
            Mail::to($request->email)->send(new RecoverPassword($userEmailValidate,$token));
            return redirect()->back()->with('success','An email was sent to your mailbox. please check and recover your password!!!');

        }else{

            return redirect()->back()->with('successError','Your entered mail did not MATCH with our Database. Please try again with correct email!!!');
        }



    }


    public function passwordRecoveryForm($id)
    {
//        dd($id);
        $tokenValidate=PasswordReset::where('token',$id)->first();


        if ($tokenValidate)

        {
            return view('frontend.layouts.login.passwordForm',compact('tokenValidate'));

        }else{

            return redirect()->route('password.recovery')->with('successError','Token Expired. RESET your password again by using your email !!!');


        }

//        dd($tokenValidate);

    }

    public function passwordUpdate(Request $request)
    {
        $passwordUpdate=User::where('email',$request->email)->update([

            'password'=>bcrypt($request->password)

        ]);

        $passResetDelete=PasswordReset::where('email',$request->email)->delete();
        return redirect()->route('login.form')->with('success','Password Changed Successfully. Do-Login.');
    }


    public function userEmailVerificationMailer(Request $request)
    {

        $userEmail=User::where('email',auth('user')->user()->email)->first();
        Mail::to($request->email)->send(new UserEmailVerify($userEmail));
        return redirect()->route('user.profile')->with('successEmail','An verification link was sent to your email !!!');
    }

    public function userEmailValidationMessage($id)
    {
        $userEmailCheck=User::where('email',decrypt($id))->where('v_status','not_verified')->first();


        if ($userEmailCheck){
        $userEmailCheck->update([

            'v_status'=>'verified'

        ]);

        return view('frontend.layouts.login.userEmailMessage');

        }else{

            return view('frontend.layouts.login.userEmailMessageVerified');
        }

    }



}







