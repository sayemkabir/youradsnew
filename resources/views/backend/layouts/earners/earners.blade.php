@extends('backend.welcome')
@section('operation')

    <center><a href="{{route('user.create.view')}}"><button type="button"  class="btn btn-primary align-content-center" >
           <i class="icon-user-outline"></i> &nbsp CREATE USER
        </button></a></center><br>

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover ">

        <thead>

        <th scope="col">ID</th>
        <th scope="col">PHUDU</th>
        <th scope="col">NAME</th>
        <th scope="col">E-MAIL</th>
        <th scope="col">Bitcoin Wallet Address</th>
        <th scope="col">Balance</th>
        <th scope="col">Deposit Balance</th>
        <th scope="col">STATUS</th>

        <th scope="col">ACTIONS</th>

        </thead>
        <tbody>

        @foreach($user_create as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <img  style="width: 100px; " src="{{url('/images/users/'.$data->user_image)}}" alt="IMAGE NOT FOUND">
                </td>
                <td>{{$data->user_name}}</td>
                <td >{{$data->email}}</td>
                <td >{{$data->wallet_address}}</td>
                <td >{{$data->balance}}</td>
                <td >{{$data->deposit_balance}}</td>
                <td >{{$data->user_status}}</td>
                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="{{route('user.delete',$data->id)}}">Delete</a>
                    <a class="btn btn-info" href="{{route('user.update.form',$data->id)}}">Edit</a>
                </td>
            </tr>

        @endforeach


        </tbody>
    </table>
    <br>
    {{$user_create->links()}}


@endsection
