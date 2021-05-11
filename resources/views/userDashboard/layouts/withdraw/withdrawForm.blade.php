@extends('userDashboard.master')
@section('userDashboard')



    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card gradient-1">
                    <div class="card-body">
                        <center><h1>Withdraw</h1></center>
                        @if(session()->has('success'))

                            <div class="alert alert-danger">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{route('balance.withdraw.success')}}" method="post">
                            @csrf
                            <p>
                                <label for="">Chose a payment method:</label>
                                <select required  class="form-control input-rounded form-control-lg" name="depositMethod" id="">
                                    <option disabled selected value="">Select Payment Method</option>
                                    <option value="Bitcoin"><i class="cc BTC-alt" title="BTC"></i> Bitcoin</option>
                                    <option disabled value="">More payment method coming soon....</option>
                                </select>
                            </p>
                            <p>
                                <label for="">Your Wallet Address:</label>
                                <input required type="text" value="{{auth('user')->user()->wallet_address}}" placeholder="You don't have a saved wallet address. Please update wallet address or put one here to withdraw now. " class="form-control input-rounded">

                                 </p>
                            <p>
                                <label for="">Enter Bitcoin Amount:</label>
                                <input class="form-control input-rounded" type="number" name="bitcoinAmount" placeholder="Enter the bitcoin amount. Your Current Balance Is {{auth('user')->user()->balance}} Satoshi">

                            </p>
                            &nbsp;
                            <div class="col-md-4 col-sm-12">
                                <button type="submit" class="btn mb-1 btn-flat btn-outline-light"><i class="icon icon-check"></i>&nbsp; CONFIRM</button></div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


@endsection
