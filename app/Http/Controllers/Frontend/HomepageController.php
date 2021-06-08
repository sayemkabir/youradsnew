<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage(){

        $categories=Category::all();


//        $checkBook = Ticket::query()->where('user_id', auth('user')->user()->id);
//        //            ->where('user_id',auth()->user()->id) // for this user
////                    ->where('slot_id',$request->slot_id) //for specific slot
//
//        $checkBook->where(function ($query) use ($fromDate, $toDate) {
//            $query->whereBetween('booking_from', [$fromDate, $toDate])
//                ->orWhereBetween('booking_to', [$fromDate, $toDate]);
//        });
//        $checkBook = $checkBook->get();



        return view('frontend.homepage',compact('categories'));
    }


//    public function checkTicket()
//    {
//        $checkTicket=Ticket::where('user_id',auth('user')->user()->id)->where('created_at',now()->format('Y-m-d h:i:s'))->first();
//        return view('frontend.homepage',compact('checkTicket'));
//    }
}
