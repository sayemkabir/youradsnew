@extends('userDashboard.master')
@section('userDashboard')


    <div class="container-fluid">
        <div class="row">

            @foreach($surfads as $key=>$data)
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h2>{{$data->ad_name}}</h2>
                        <h3 style="color: royalblue"> <span id="count-{{$key}}">{{$data->ad_duration}}</span> </h3>

                        @php
                            $duration = explode('sec',$data->ad_duration)[array_key_first(explode('sec',$data->ad_duration))];

                        @endphp


                        <a style="width: 200px; overflow: hidden;" data-duration="{{$duration}}" data-key="{{$key}}" class="startClock" id="startClock" onclick="jQuery()" href="{{route('ads.post',$data->id)}}" target="_blank">{{$data->ad_link}}</a>
                        <p>{{$data->ad_content}}</p>

                        <p style="color: darkblue;">$&nbsp; {{$data->ad_price}} Satoshi</p>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>


@endsection
