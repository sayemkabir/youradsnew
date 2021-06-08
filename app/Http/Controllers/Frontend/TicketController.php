<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function userTicket(Request $request)
    {
        $request->validate([

            'subject' => 'required',
            'message' => 'required'

        ]);

        $checkTicket = Ticket::where('user_id', auth('user')->user()->id)->where('date', now()->format('Y-m-d'))->first();

        if ($checkTicket) {

            return redirect()->back('user.profile')->with('success', 'Your Ticket Was Created Successfully !!!');


        } else {


            $userTicketCreate = Ticket::create([


                'user_id' => $request->userId,
                'subject' => $request->subject,
                'message' => $request->message,
                'date' => $request->date


            ]);


        }

    }

    public function ticketView()
    {
        $title="TICKETS";
        $ticket=Ticket::with('userTicket')->paginate('5');

        return view('backend.layouts.tickets.ticketsView',compact('ticket','title'));

    }

    public function ticketDelete($id)
    {
        $tickets=Ticket::find($id);
        $tickets->delete();

        return redirect()->back()->with('success','Ticket Deleted Successfully');
    }


}
