<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DepositBalance;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function balanceDepositForm()
    {

        $payment=DepositBalance::all();
        return view('userDashboard.layouts.deposit.depositForm',compact('payment'));

    }

    public function balanceDepositSuccess(Request $request)
    {
        $deposit=DepositBalance::create([

            'user_id'=>auth('user')->user()->id,
            'deposit_balance'=>$request->bitcoinAmount,
            'payment_method'=>$request->depositMethod,

        ]);
        return redirect()->route('deposit.balance.message')->with('success','Deposit Request Was Placed Successfully');
    }

//BACKEND
    public function depositRequests()
    {
        $title='Deposit Requests';
        $deposit=DepositBalance::with('userPaymentDepositRequest')->get();
        return view('backend.layouts.Payment.depositRequests',compact('deposit','title'));

    }


    public function depositBalanceUpdate()
    {
     //
    }


    public function depositBalanceMessage()
    {
        $deposit=DepositBalance::orderBy('deposit_balance','desc')->first();
        return view('userDashboard.layouts.deposit.depositMessage',compact('deposit'));
    }
}
