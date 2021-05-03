@extends('userDashboard.master')
@section('userDashboard')



    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h2>Withdraw</h2>
                        <form action="{{route('balance.deposit.success')}}" method="post">
                            @csrf
                            <p>Chose a method for payment: <br>
                                <select required  class="form-control input-rounded form-control-lg" name="depositMethod" id="">
                                    <option disabled selected value="">Select Payment Method</option>
                                    <option value="Bitcoin"><i class="cc BTC-alt" title="BTC"></i> Bitcoin</option>
                                    <option disabled value="">More payment method coming soon....</option>
                                </select>
                            </p>
                            <p>
                                Enter Bitcoin Amount: <br>
                                <input class="form-control input-rounded" type="number" name="bitcoinAmount" placeholder="Enter the bitcoin amount you want to deposit">
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
