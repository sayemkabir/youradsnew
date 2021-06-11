@extends('userDashboard.master')
@section('userDashboard')


<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body" style="background: #0d1313">
                    <h3  style="color: aqua">Balance</h3><br>
                    <div class="d-inline-block">
                        <h2 style="color: deepskyblue"><img style="width: 45px" src="{{url('/images/coins.png')}}" alt=""> {{auth('user')->user()->balance}}</h2>

                        <br>

                        <a  href="{{route('balance.withdraw.form')}}" type="button" class="btn mb-1 btn-primary btn-lg">Withdraw</a>

                    </div>
                    {{--                            <button type="button" class="btn mb-1 btn-rounded btn-primary" disabled="disabled">Primary</button>--}}
                    <span class="float-md-right display-3 opacity-5">   <i class="cc BTC-alt" title="BTC"></i> </span>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-2  ">
                <div class="card-body" style="background: #0d1313; ">
                    <h3 style="color: cyan">Purchase Balance</h3><br>
                    <div class="d-inline-block">
                        <h2 style="color: deepskyblue "><img style="width: 45px" src="{{url('/images/coins.png')}}" alt=""> {{auth('user')->user()->deposit_balance}}</h2>

                        <br>

                        <a href="{{route('deposit.category')}}" type="button" class="btn mb-1 btn-primary btn-lg">Deposit</a>

                    </div>
                    {{--                            <button type="button" class="btn mb-1 btn-rounded btn-primary" disabled="disabled">Primary</button>--}}
                    <span class="float-md-right display-3 opacity-5">   <i class="fa fa-cart-arrow-down"></i> </span>

                </div>
            </div>
        </div>

    </div>

{{--    <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                </div>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--                </div>--}}



                <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body" style="background: black">
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0" style="display: block; height: 400px; overflow: auto; ">
                                <h2 style="color: #868989"> <center> Withdraws/Deposits</center></h2>
                                <thead >
                                <tr style="color: aqua; ">
                                    <th style="position: sticky; top: 0; background: black"><center>User</center></th>
                                    <th style="position: sticky; top: 0; background: black"><center>Payment Type</center></th>
                                    <th style="position: sticky; top: 0; background: black"><center>Requested Amount</center></th>
                                    <th style="position: sticky; top: 0; background: black"><center>Payment Method</center></th>
                                    <th style="position: sticky; top: 0; background: black"><center>Status</center></th>
                                    <th style="position: sticky; top: 0; background: black"><center>Request Created At</center></th>

                                </tr>
                                </thead>

{{--                                @foreach()--}}

                                <tbody style="color: #00f3ff6b">

                                @foreach($depositShow as $key=>$data)

                                    @if($data->status=="pending")
                                    <tr>
                                        <td><img src="{{url('/images/users/',$data->userDeposit->user_image)}}" class=" rounded-circle mr-3" alt="">{{$data->userDeposit->user_name}}</td>
                                        <td><center>Deposit</center></td>
                                        <td><center>{{$data->deposit_balance}}</center></td>
                                        <td>
                                            <span><center>{{$data->payment_method}}</center></span>
                                        </td>
                                        <td>
                                            <center>
                                                <i class="fa fa-circle-o text-warning  mr-2"></i> Pending
                                            </center>
                                            {{--                                        <br>--}}
                                            {{--                                        <br>--}}
                                            {{--                                        <div>--}}
                                            {{--                                            <div class="progress" style="height: 6px">--}}
                                            {{--                                                <div class="progress-bar bg-danger" style="width: 50%"></div>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}
                                        </td>
                                        <td><center>{{$data->created_at}}</center></td>

                                    </tr>
                                    @endif
                                    @endforeach

                                @foreach($withdrawShow as $key=>$data)

                                    @if($data->status=="pending")
                                        <tr>
                                            <td><img src="{{url('/images/users/',$data->userPaymentWithdrawRequest->user_image)}}" class=" rounded-circle mr-3" alt="">{{$data->userPaymentWithdrawRequest->user_name}}</td>
                                            <td><center>Withdraw</center></td>
                                            <td><center>{{$data->withdraw_balance}}</center></td>

                                            <td>
                                                <span><center>{{$data->payment_method}}</center></span>
                                            </td>
                                            <td>
                                                <center>
                                                    <i class="fa fa-circle-o text-warning  mr-2"></i> Pending
                                                </center>{{--                                        <br>--}}
                                                {{--                                        <br>--}}
                                                {{--                                        <div>--}}
                                                {{--                                            <div class="progress" style="height: 6px">--}}
                                                {{--                                                <div class="progress-bar bg-success" style="width: 50%"></div>--}}
                                                {{--                                            </div>--}}
                                                {{--                                        </div>--}}
                                            </td>
                                            <td><center>{{$data->created_at}}</center></td>

                                        </tr>
                                    @endif
                                @endforeach

                                @foreach($withdrawShow as $key=>$data)

                                    @if($data->status=="processed")
                                        <tr>
                                            <td><img src="{{url('/images/users/',$data->userPaymentWithdrawRequest->user_image)}}" class=" rounded-circle mr-3" alt="">{{$data->userPaymentWithdrawRequest->user_name}}</td>
                                            <td><center>Withdraw</center></td>
                                            <td><center>{{$data->withdraw_balance}}</center></td>

                                            <td>
                                                <span><center>Bitcoin</center></span>
                                            </td>
                                            <td>
                                                <center>
                                                    <i class="fa fa-circle-o text-success  mr-2"></i> Processed
                                                </center>{{--                                        <br>--}}
                                                {{--                                        <br>--}}
                                                {{--                                        <div>--}}
                                                {{--                                            <div class="progress" style="height: 6px">--}}
                                                {{--                                                <div class="progress-bar bg-success" style="width: 50%"></div>--}}
                                                {{--                                            </div>--}}
                                                {{--                                        </div>--}}
                                            </td>
                                            <td><center>{{$data->created_at}}</center></td>

                                        </tr>
                                    @endif
                                @endforeach

                                    @foreach($depositShow as $key=>$data)

                                    @if($data->status=="processed")
                                <tr>
                                    <td><img src="{{url('/images/users/',$data->userDeposit->user_image)}}" class=" rounded-circle mr-3" alt="">{{$data->userDeposit->user_name}}</td>
                                    <td><center>Deposit</center></td>
                                    <td><center>{{$data->deposit_balance}}</center></td>

                                    <td>
                                        <span><center>{{$data->payment_method}}</center></span>
                                    </td>
                                    <td>
                                        <center>
                                            <i class="fa fa-circle-o text-success  mr-2"></i> Processed
                                        </center>{{--                                        <br>--}}
{{--                                        <br>--}}
{{--                                        <div>--}}
{{--                                            <div class="progress" style="height: 6px">--}}
{{--                                                <div class="progress-bar bg-success" style="width: 50%"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </td>
                                    <td><center>{{$data->created_at}}</center></td>

                                </tr>
                                    @endif
                                @endforeach

                                @foreach($withdrawShow as $key=>$data)

                                    @if($data->status=="denied")
                                <tr>
                                    <td><img src="{{url('/images/users/',$data->userPaymentWithdrawRequest->user_image)}}" class=" rounded-circle mr-3" alt="">{{$data->userPaymentWithdrawRequest->user_name}}</td>
                                    <td><center>Withdraw</center></td>
                                    <td><center>{{$data->withdraw_balance}}</center></td>

                                    <td>
                                        <span><center>Bitcoin</center></span>
                                    </td>
                                    <td>
                                        <center>
                                            <i class="fa fa-circle-o text-danger  mr-2"></i> Denied
                                        </center>{{--                                        <br>--}}
{{--                                        <br>--}}
{{--                                        <div>--}}
{{--                                            <div class="progress" style="height: 6px">--}}
{{--                                                <div class="progress-bar bg-success" style="width: 50%"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </td>
                                    <td><center>{{$data->created_at}}</center></td>

                                </tr>
                                    @endif
                                @endforeach

                                @foreach($depositShow as $key=>$data)

                                    @if($data->status=="denied")
                                <tr>
                                    <td><img src="{{url('/images/users/',$data->userDeposit->user_image)}}" class=" rounded-circle mr-3" alt="">{{$data->userDeposit->user_name}}</td>
                                    <td><center>Deposit</center></td>
                                    <td><center>{{$data->deposit_balance}}</center></td>

                                    <td>
                                        <span><center>Bitcoin</center></span>
                                    </td>
                                    <td>


                                        <center>
                                            <i class="fa fa-circle-o text-danger  mr-2"></i> Denied
                                        </center>{{--                                        <br>--}}
{{--                                        <br>--}}
{{--                                        <div>--}}
{{--                                            <div class="progress" style="height: 6px">--}}
{{--                                                <div class="progress-bar bg-danger" style="width: 50%"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </td>
                                    <td><center>{{$data->created_at}}</center></td>

                                </tr>
                                    @endif
                                @endforeach





                                </tbody>

{{--                                @endforeach--}}

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- #/ container -->
</div>

@endsection
