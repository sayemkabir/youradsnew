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

        $payment=DepositBalance::where('created_at','desc')->get();
        return view('userDashboard.layouts.deposit.depositForm',compact('payment'));

    }

    public function balanceWithdraw()
    {
        $payment=WithdrawBalance::where('created_at','desc')->get();
        return view('userDashboard.layouts.withdraw.withdrawForm',compact('payment'));
    }

    public function balanceDepositSuccess(Request $request)
    {

        $request->validate([

            'bitcoinAmount'=>'required',
            'depositMethod'=>'required',

        ]);

        $deposit=DepositBalance::create([

            'user_id'=>auth('user')->user()->id,
            'deposit_balance'=>$request->bitcoinAmount,
            'payment_method'=>$request->depositMethod,

        ]);

        return view('userDashboard.layouts.deposit.depositMessage',compact('deposit'));
        }

        public function balanceWithdrawSuccess(Request $request)
    {

        $request->validate([

            'bitcoinAmount'=>'required',
            'withdrawMethod'=>'required',

        ]);

        $check=User::find(auth('user')->user()->id);
        $remaining=$check->balance;
        $withdrawAmount=$request->bitcoinAmount;
//        dd($withdrawAmount);
        if($remaining>=$withdrawAmount){


            $deposit=WithdrawBalance::create([

                'user_id'=>auth('user')->user()->id,
                'withdraw_balance'=>$request->bitcoinAmount,
                'payment_method'=>$request->withdrawMethod,

            ]);

    return redirect()->route('balance.withdraw.message')->with('success','Withdraw Request Was Placed Successfully');


        }
return redirect()->back()->with('success','Requested Amount Exceeds Your Main Balance. Please Try Again.');
        }

//BACKEND
    public function depositRequests()
    {
        $title='Deposit Requests';
        $deposit=DepositBalance::with('userDeposit')->orderby('created_at','desc')->paginate(5);
//        dd($deposit);
        return view('backend.layouts.Payment.depositRequests',compact('deposit','title'));

    }

    public function withdrawRequests()
    {
        $title='Withdraw Requests';
        $deposit=WithdrawBalance::with('userPaymentWithdrawRequest')->orderby('created_at','desc')->paginate('5');
        return view('backend.layouts.Payment.withdrawRequest',compact('deposit','title'));
    }


    public function withdrawBalanceUpdate($id)
    {

        $paymentupdate=WithdrawBalance::find($id);

        $paymentupdate->update([

            'status'=>'processed'

        ]);

        User::where('id',$paymentupdate->user_id)->decrement('balance',$paymentupdate->withdraw_balance);

        return redirect()->back();
    }

    public function withdrawBalanceUpdateDeny($id)
    {

        $paymentupdate=WithdrawBalance::find($id);

        $paymentupdate->update([

            'status'=>'denied'

        ]);

        return redirect()->back();
    }

    public function withdrawBalanceUpdateDenyBalance($id)
    {
        $paymentupdate=WithdrawBalance::find($id);
        $paymentupdate->update([

            'status'=>'denied'

        ]);

        User::where('id',$paymentupdate->user_id)->increment('balance',$paymentupdate->withdraw_balance);

        return redirect()->back();

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

    public function depositBalanceUpdateDeny($id)
    {

        $paymentupdate=DepositBalance::find($id);

        $paymentupdate->update([

            'status'=>'denied'

        ]);


        return redirect()->back();
    }

    public function depositBalanceUpdateDenyBalance($id)
    {

        $paymentupdate=DepositBalance::find($id);

        $paymentupdate->update([

            'status'=>'denied'

        ]);
        User::where('id',$paymentupdate->user_id)
            ->decrement('deposit_balance',$paymentupdate->deposit_balance);

        return redirect()->back();
    }


    public function balanceWithdrawMessage()
    {
        return view('userDashboard.layouts.withdraw.withdrawMessage');
    }


//    public function balanceUpdateAds($id)
//    {
//
//        $paymentupdate=Ad::find($id);
//
//
//
//        User::where('id',$paymentupdate->user_id)->decrement('deposit_balance',$paymentupdate->total_price);
//
//
//
//    }


//Report Generate


    public function reportWithdraw()
    {
        $allBooking=[];
        $fromDate=null;
        $toDate=null;

                $title='Withdraw Report Generate';


        if(isset($_GET['from_date']) && isset($_GET['to_date']) )
        {
            $fromDate=date('Y-m-d',strtotime($_GET['from_date']));
            $toDate=date('Y-m-d',strtotime($_GET['to_date']));

//            $allBooking=Booking::whereDate('booking_from',$fromDate)->get();
            $allBooking=WithdrawBalance::with('userPaymentWithdrawRequest')->orderby('created_at','desc')->whereBetween('created_at',[$fromDate,$toDate])->get();
//            dd($allBooking);
        }

        return view('backend.layouts.report.withdrawReport',compact('allBooking','fromDate','toDate','title'));

    }


    public function reportDeposit()
    {
        $allBooking=[];
        $fromDate=null;
        $toDate=null;

        $title='Deposit Report Generate';


        if(isset($_GET['from_date']) && isset($_GET['to_date']) )
        {
            $fromDate=date('Y-m-d',strtotime($_GET['from_date']));
            $toDate=date('Y-m-d',strtotime($_GET['to_date']));

//            $allBooking=Booking::whereDate('booking_from',$fromDate)->get();
            $allBooking=DepositBalance::with('userDeposit')->orderby('created_at','desc')->whereBetween('created_at',[$fromDate,$toDate])->get();
//            dd($allBooking);
        }

        return view('backend.layouts.report.depositReport',compact('allBooking','fromDate','toDate','title'));

    }


    public function depositFormMain()
    {
        return view('userDashboard.layouts.deposit.depositFromMain');
    }

    public function depositCategory()
    {
        return view('userDashboard.layouts.deposit.depositCategories');
    }


    public function depositMainBalance(Request $request)
    {

//        $authBalance=auth('user')->user()->balance;

        $request->validate([

            'bitcoinAmount'=>"required"
        ]);

        if (auth('user')->user()->balance>=$request->bitcoinAmount)
        {

        $mainDepositCredit=DepositBalance::create([

            'user_id'=>auth('user')->user()->id,
            'deposit_balance'=>$request->bitcoinAmount,
            'payment_method'=>$request->depositMethod,
            'status'=>'processed'

        ]);



        User::where('id',auth('user')->user()->id)->decrement('balance',$request->bitcoinAmount);
        User::where('id',auth('user')->user()->id)->increment('deposit_balance',$request->bitcoinAmount);
//        $depositCredit->increment('deposit_balance',$request->bitcoinAmount);



        return redirect()->back()->with('success','Deposit Was Successful');
        }else{
            return redirect()->back()->with('successN','Your Requested Balance Exceeds Your Main Balance');
        }
    }



}
