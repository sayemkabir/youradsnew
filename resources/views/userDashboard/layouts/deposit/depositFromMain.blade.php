@extends('userDashboard.master')
@section('userDashboard')

    <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->

    <!-- Icons font CSS-->
    <link href="{{asset('formAd')}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{asset('formAd')}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('formAd')}}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('formAd')}}/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('formAd')}}/css/main.css" rel="stylesheet" media="all">
</head>

<body><br>
{{--                                                <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">--}}
<div class="wrapper wrapper--w790">
    <div class="card card-5">





        <div class="card-body" style="background: #90a8d4">
            <form action="{{route('deposit.main.balance.credit')}}" method="post">

                @if(session()->has('success'))

                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('successN'))

                    <div class="alert alert-danger">
                        {{ session()->get('successN') }}
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
                @csrf
                <h1 style="color: aqua"><center>DEPOSIT</center></h1>
                <br>

                <div  class="form-row">
                    <div style="width: 500px;" class="name">Payment method: </div>
                    <input style="width: 29%; padding: 0px 34px" type="text" readonly value="Main Balance" class="input--style-5" name="depositMethod">

                </div>


                {{--                <div class="form-row">--}}
                {{--                    <div style="width: 195px;" class="name">Your Wallet Address:</div>&nbsp;--}}
                {{--                    <div class="value">--}}
                {{--                        <div class="input-group">--}}
                {{--                            <input required type="text" @if(auth('user')->user()->wallet_address)value="{{auth('user')->user()->wallet_address}}" readonly @endif  placeholder="You don't have a saved wallet address. Please update wallet address or put one here to withdraw now. " class="input--style-5">--}}

                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="form-row">
                    <div style="width: 195px;" class="name">Enter Bitcoin Amount:</div>&nbsp;
                    <div class="value">
                        <div class="input-group">
                            <input required min="0" max="{{auth('user')->user()->balance}}" class="input--style-5" type="number" name="bitcoinAmount" placeholder="Enter the bitcoin amount you want to deposit">
                            {{--                            <input required min="100000" class="input--style-5" type="number" name="bitcoinAmount" placeholder="Enter the bitcoin amount. Your Current Balance Is {{auth('user')->user()->balance}}">--}}
{{--                            <label >The Minimum Deposit Amount is 100000 Satoshi !!!</label>--}}

                        </div>

                    </div>
                </div>

                <div>
                    <button class="btn btn--radius-2 btn--red" type="submit"><i class="icon icon-check"></i>&nbsp; DEPOSIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--                                                </div>--}}

<!-- Jquery JS-->
<script src="{{asset('formAd')}}/vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="{{asset('formAd')}}/vendor/select2/select2.min.js"></script>
<script src="{{asset('formAd')}}/vendor/datepicker/moment.min.js"></script>
<script src="{{asset('formAd')}}/vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="{{asset('formAd')}}/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}

{{--                <div class="col-12">--}}
{{--                        <div class="card gradient-1">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2>DEPOSIT</h2>--}}
{{--                            <form action="{{route('balance.deposit.success')}}" method="post">--}}
{{--                                @if ($errors->any())--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        <div class="alert alert-danger">{{$error}}</div>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                                @csrf--}}
{{--                            <p>Chose a method for payment: <br>--}}
{{--                                <select required  class="form-control input-rounded form-control-lg" name="depositMethod" id="">--}}
{{--                                    <option disabled selected value="">Select Payment Method</option>--}}
{{--                                    <option value="Bitcoin"><i class="cc BTC-alt" title="BTC"></i> Bitcoin</option>--}}
{{--                                    <option disabled value="">More payment method coming soon....</option>--}}
{{--                                </select>--}}
{{--                                </p>--}}
{{--                            <p>--}}
{{--                                Enter Bitcoin Amount: <br>--}}
{{--                                <input required min="100000" class="form-control input-rounded" type="number" name="bitcoinAmount" placeholder="Enter the bitcoin amount you want to deposit">--}}
{{--                                    <div id="emailHelp" class="form-text">The Minimum Deposit Amount is 100000 Satoshi !!!</div>--}}

{{--                                    </p>--}}
{{--&nbsp;--}}
{{--                            <div class="col-md-4 col-sm-12">--}}
{{--                            <button type="submit" class="btn mb-1 btn-flat btn-outline-light"><i class="icon icon-check"></i>&nbsp; CONFIRM</button></div>--}}


{{--                            </form>--}}
{{--                        </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--        </div>--}}
{{--    </div>--}}


@endsection
