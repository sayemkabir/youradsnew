@extends('backend.welcome')
@section('operation')






    @if(session()->has('success'))

        <div class="alert alert-danger">
            {{ session()->get('success') }}
        </div>
    @endif

    <table  class="table table-bordered table-hover table-responsive">

        <thead>

        <th scope="col">Ticket ID</th>
        <th scope="col">Username</th>
        <th scope="col">E-mail</th>
        <th scope="col">Subject</th>
        <th  scope="col">Message</th>
        <th scope="col">ACTIONS</th>


        </thead>
        <tbody>

        @foreach($ticket as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->userTicket->user_name}}</td>
                <td>{{$data->userTicket->email}}</td>
                <td>{{$data->subject}}</td>
                <td >{{$data->message}}</td>
                <td>

                    <a class="btn btn-danger" href="{{route('ticket.delete',$data->id)}}">Delete</a>

                </td>

            </tr>


        @endforeach
        </tbody>
    </table><br>



    {{$ticket->links()}}
@endsection



