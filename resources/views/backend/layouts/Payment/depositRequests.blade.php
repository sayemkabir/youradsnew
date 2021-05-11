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
                <td>{{$data->userDeposit->user_name}}</td>
                <td>{{$data->userDeposit->email}}</td>
                <td>{{$data->deposit_balance}}</td>
                <td>{{$data->payment_method}}</td>
                <td>{{$data->status}}</td>



                <td>


{{--                         @switch($data->status)--}}
{{--                        --}}
{{--                             @case ('processed')--}}
{{--                             {{$data->status}} <a class="btn btn-danger" href="{{route('deposit.balance.update.deny',$data->id)}}">Deny</a>--}}
{{--                             @break--}}
{{--                             @case ('denied')--}}
{{--                           {{$data->status}} <a class="btn btn-success" href="{{route('deposit.balance.update',$data->id)}}">Approve</a>--}}
{{--                             @break--}}
{{--                             @default--}}{{--@endswitch--}}
<p>
                    @if($data->status=='pending')

                    <a class="btn btn-success" href="{{route('deposit.balance.update',$data->id)}}">Approve</a>
                    <a class="btn btn-danger" href="{{route('deposit.balance.update.deny',$data->id)}}">Deny</a>


                    @elseif($data->status=='denied')

                    <a class="btn btn-success" href="{{route('deposit.balance.update',$data->id)}}">Approve</a>

                     @elseif($data->status=='processed')

                    <a class="btn btn-danger" href="{{route('deposit.balance.update.deny.balance',$data->id)}}">Deny</a>



                @endif
</p>






                </td>
            </tr>
@endforeach



        </tbody>
    </table>
    <br>

{{$deposit->links()}}
@endsection
