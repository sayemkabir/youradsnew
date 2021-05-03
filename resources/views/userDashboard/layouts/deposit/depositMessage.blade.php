@extends('userDashboard.master')
@section('userDashboard')



    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card gradient-1">
                    <div class="card-body">
                        <center>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <h1>Please Make Payment</h1><br>
                            <h4 class="font-weight-bold"><p>Please send exactly {{$deposit->deposit_balance}} BTC to address below</p></h4>
                        <div class="row-cols-md-4">
                                <p>

                                <p id="p1" class="text-success">1655KAQib7a3xjUc1bRqhUK1eoC1kJURkQ</p>

                            </p>
                                   <p> <button onclick="copyToClipboard('#p1')">Copy Wallet address!</button></p>
                            <br>
                                </div>
                                <p>

                                    <a type="submit" href="https://www.blockchain.com/btc/address/1655KAQib7a3xjUc1bRqhUK1eoC1kJURkQ" target="_blank" class="btn mb-1 btn-flat btn-outline-light"><i class="icon icon-check"></i>&nbsp; Check Payment</a>
                                </p>
                            <p> The bitcoin deposit will be automatically added in your purchase balance after 1 confirmations in the bitcoin network. </p>

                        </center>



                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


@endsection
