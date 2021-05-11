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
                                <br>
                            <p>Your Request Will Be Processed Within The Next 48 Hours !!!</p><br>

                            <p>

                                <a type="submit" href="{{route('user.dashboard')}}" class="btn mb-1 btn-flat btn-outline-light"><i class="icon icon-check"></i>&nbsp;Go Back To Dashboard</a>


                            </p>


                        </center>



                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


@endsection
