@extends('backend.welcome')
@section('operation')

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover ">

        <thead>

        <th scope="col">Payment Id</th>

        <th scope="col">User Id</th>
        <th scope="col">User Name</th>
        <th scope="col">E-mail</th>


        <th scope="col">Requested Deposit Balance</th>
        <th scope="col">Payment Method</th>
        <th scope="col">Status</th>

        <th scope="col">ACTIONS</th>

        </thead>
        <tbody>


@foreach($deposit as $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->user_id}}</td>
                <td>{{$data->userPaymentDepositRequest->user_name}}</td>
                <td>{{$data->userPaymentDepositRequest->email}}</td>
                <td>{{$data->deposit_balance}}</td>
                <td>{{$data->payment_method}}</td>
                <td>{{$data->status}}</td>

                <td>
                    <a class="btn btn-success" href="">Approve</a>
                    <a class="btn btn-danger" href="">Deny</a>
                </td>
            </tr>
@endforeach



        </tbody>
    </table>
    <br>

@endsection