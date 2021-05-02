@extends('userDashboard.master')
@section('userDashboard')
    <div class="container-fluid">


    <div class="row">

        @foreach($adcategories as $data)

                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <img style="width: 520px; height: 450px;" class="img-fluid" src="{{url('/images/categories/',$data->image)}}" alt="">
                        <div class="card-body">
                            <h5  class="card-title">{{$data->name}}</h5><br>
                            <p style="height: 150px;" class="card-text">{{$data->description}}</p>

                        </div>

                        <a type="submit" href="{{route('surf.ads.view',$data->id)}}" class="btn mb-1 btn-secondary">Watch Ads<span class="btn-icon-right"><i class="icon-eye menu-icon"></i></span>
                        </a>
                        <br>
                    </div>
                </div>


        @endforeach

    </div>


    </div>

@endsection
