<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserAd;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard(){

        $title="DASHBOARD";
//        $timer=Ad::all();
        $admin=Admin::all();
        $user=User::all();
        $ad=Ad::all();
        $clicks=UserAd::all();
        $ticket=Ticket::all();
        return view('backend.layouts.dashboard.dashboard',compact('title','admin','user','ad','clicks','ticket'));
    }

//    public function welcome()
//    {
//
//    }
}
