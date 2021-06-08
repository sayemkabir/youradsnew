@extends('userDashboard.master')
@section('userDashboard')
    <div class="container-fluid">
        @if(auth('user')->user()->v_status=='verified')


    <div class="row">

        @foreach($adcategories as $data)

                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <img style="width: 520px; height: 350px;" class="img-fluid" src="{{url('/images/categories/',$data->image)}}" alt="">
                        <div class="card-body">
                            <h5  class="card-title">{{$data->name}}</h5><br>
                            <p style="height: 50px;" class="card-text">{{$data->description}}</p><br>

                        </div>

                        <a type="submit" href="{{route('surf.ads.view',$data->id)}}" class="btn mb-1 btn-secondary">Watch Ads<span class="btn-icon-right"><i class="icon-eye menu-icon"></i></span>
                        </a>
                        <br>
                    </div>
                </div>


        @endforeach




    </div>
        @else
            <br>
            <br>
            <center>
                <h1 style="color: red">Ops!!! Your Account Is Not Verified !!!</h1>
                <br>
                <h2 style="color: royalblue">You need to verify your account to see the ads.</h2>
            </center>

        @endif


    </div>

@endsection
