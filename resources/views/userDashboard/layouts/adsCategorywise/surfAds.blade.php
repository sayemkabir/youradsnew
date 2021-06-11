@extends('userDashboard.master')
@section('userDashboard')


    <div class="container-fluid">
{{--        <div class="toastr m-t-15">--}}

{{--                <button type="button" class="btn btn-success m-b-10 m-l-5" id="toastr-success-top-right">Success</button>--}}

{{--        </div>--}}
    @if(count($surfads)>0)
        <div class="row">
            @foreach($surfads as $key=>$data)
                @php
                    $checkClick=App\Models\UserAd::where('ad_id',$data->id)->where('user_id',auth('user')->user()->id)->first();
                @endphp
            <div class="col-12">
                <div class="card">
                    <div class="toastr m-t-15">
                    <div class="card-body">
                        <p><h4>{{$key+1}}</h4><i class="fas fa-ad"></i></p><h2>{{$data->ad_name}}</h2>
                        @if($checkClick)
                        <h3 style="color: royalblue"> <span >{{$data->ad_duration}}</span> </h3>
                        @else
                        <h3 style="color: royalblue"> <span id="count-{{$key}}">{{$data->ad_duration}}</span> </h3>
                        @endif


                        @php
                            $duration = explode('sec',$data->ad_duration)[array_key_first(explode('sec',$data->ad_duration))];

                        @endphp


                        @if($checkClick)
                            <a style="width: 200px; overflow: hidden;" href="{{$data->ad_link}}" target="_blank">{{$data->ad_link}}</a>
                        @else
                            <a style="width: 200px; overflow: hidden;" data-duration="{{$duration}}" data-key="{{$key}}" data-id="{{$data->id}}" class="startClock " id="startClock" onclick="jQuery()" href="{{route('ads.post',$data->id)}}" target="_blank">{{$data->ad_link}}</a>
                        @endif


                        <p>{{$data->ad_content}}</p>

                        <p style="color: darkblue;"><img style="width: 25px" src="{{url('/images/coins.png')}}" alt="">&nbsp; {{$data->ad_price}} Satoshi</p>
{{--                        <i style="padding: 0px 0px" class="cc BTC-alt" title="BTC"></i>--}}

                        @if($checkClick)
                        <p style="color: cornflowerblue"><i class="icon-eye menu-icon"></i>&nbsp;Watched</p>
                        @endif
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
