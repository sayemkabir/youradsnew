<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\DepositBalance;
use App\Models\User;
use App\Models\WithdrawBalance;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function balanceDepositForm()
    {

        $payment=DepositBalance::all();
        return view('userDashboard.layouts.deposit.depositForm',compact('payment'));

    }

    public function balanceWithdraw()
    {
        $payment=WithdrawBalance::all();
        return view('userDashboard.layouts.withdraw.withdrawForm',compact('payment'));
    }

    public function balanceDepositSuccess(Request $request)
    {
        $deposit=DepositBalance::create([

            'user_id'=>auth('user')->user()->id,
            'deposit_balance'=>$request->bitcoinAmount,
            'payment_method'=>$request->depositMethod,

        ]);

        return view('userDashboard.layouts.deposit.depositMessage',compact('deposit'));
        }

//BACKEND
    public function depositRequests()
    {
        $title='Deposit Requests';
        $deposit=DepositBalance::with('userPaymentDepositRequest')->paginate('5');
        return view('backend.layouts.Payment.depositRequests',compact('deposit','title'));

    }


    public function depositBalanceUpdate($id)
    {

        $paymentupdate=DepositBalance::find($id);

        $paymentupdate->update([

            'status'=>'processed'

        ]);

        User::where('id',$paymentupdate->user_id)->increment('deposit_balance',$paymentupdate->deposit_balance);

        return redirect()->back();
    }


    public function balanceUpdateAds($id)
    {

        $paymentupdate=Ad::find($id);



        User::where('id',$paymentupdate->user_id)->decrement('deposit_balance',$paymentupdate->total_price);



    }

}
