@extends('userDashboard.master')
@section('userDashboard')


    <div class="container-fluid">
{{--        <div class="toastr m-t-15">--}}

{{--                <button type="button" class="btn btn-success m-b-10 m-l-5" id="toastr-success-top-right">Success</button>--}}

{{--        </div>--}}
    @if(count($surfads)>0)
        <div class="row">
            @foreach($surfads as $key=>$data)
            <div class="col-12">
                <div class="card">
                    <div class="toastr m-t-15">
                    <div class="card-body">
                        <p><h4>{{$key+1}}</h4><i class="fas fa-ad"></i></p><h2>{{$data->ad_name}}</h2>
                        <h3 style="color: royalblue"> <span id="count-{{$key}}">{{$data->ad_duration}}</span> </h3>

                        @php
                            $duration = explode('sec',$data->ad_duration)[array_key_first(explode('sec',$data->ad_duration))];

                        @endphp


                        <a style="width: 200px; overflow: hidden;" data-duration="{{$duration}}" data-key="{{$key}}" data-id="{{$data->id}}" class="startClock " id="startClock" onclick="jQuery()" href="{{route('ads.post',$data->id)}}" target="_blank">{{$data->ad_link}}</a>

                        <p>{{$data->ad_content}}</p>

                        <p style="color: darkblue;">$&nbsp; {{$data->ad_price}} Satoshi</p>
                    </div>

                </div>
                </div>
            </div>
            @endforeach

        </div>
        @else

           <center> <p>There's no ad currently in this category!!!<br>
                   <a href="{{route('advertise.ads')}}">Create your Own Ad in this category NOW!!!</a></p></center>

        @endif
    </div>


@endsection
