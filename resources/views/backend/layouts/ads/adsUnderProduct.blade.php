@extends('backend.welcome')
@section('operation')


    <center><a href="{{route('ads.form')}}"><button type="button"  class="btn btn-primary align-content-center" >
                <i class="icon-computer"></i> &nbsp; CREATE ADS
            </button></a></center>

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif



    {{--        <div class="col-sm-3">--}}
    {{--            <div class="form-group">--}}

    {{--                <label for="">Sort By:</label>--}}
    {{--                <select name="categoryid" class="form-control">--}}
    {{--                    <option value="">Select Category</option>--}}
    {{--                    @foreach($categories as $category)--}}
    {{--                        <option value="{{$category->id}}">{{$category->name}}</option>--}}
    {{--                    @endforeach--}}

    {{--                </select>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    <div class="form-control-label">
        <div class="row-cols-md-6">
            &nbsp; &nbsp; &nbsp; <label style="color: whitesmoke; size: 200px;" for=""><h5>Sort By:</h5></label>
            <div class="dropdown">
                &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="all">All Ads</a>
                    @foreach($categories as $category)
                        <a class="dropdown-item" href="{{route('ads.sort',$category->id)}}">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>

    <table class="table table-bordered table-hover word-warp">

        <thead>

        <th scope="col">ID</th>
        <th scope="col">Ad NAME</th>
        <th scope="col">Ad LINK</th>
        <th scope="col">CATEGORY NAME</th>
        <th scope="col">STATUS</th>
        <th scope="col">Ad CLICKS</th>
        <th scope="col">TARGETED CLICKS</th>
        <th scope="col">Ad DURATION</th>
        <th scope="col">ACTIONS</th>


        </thead>
        <tbody>

        @foreach($ads as $key=>$data)

            <tr>
                <th style="width: 40px;" scope="row">{{$key+1}}</th>
                <td>{{$data->ad_name}}</td>
                <td >
                    <h3 style="color: whitesmoke"> <span id="count">{{$data->ad_duration}}</span> seconds </h3>


                    <a style="width: 200px; overflow: hidden;" id="startClock" onclick="jQuery()" href="{{route('ads.post',$data->id)}}" target="_blank">{{$data->ad_link}}</a>

                </td>
                <td style="width: 50px;">{{$data->adCategory->name}}</td>
                <td >{{$data->ad_status}}</td>
                <td style="width: 50px;">{{$data->adClicks->count()}}</td>
                <td style="width: 50px;">{{$data->ad_clicks}}</td>
                <td style="width: 50px;">{{$data->ad_duration}}</td>
                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="{{route('ads.delete',$data->id)}}">Delete</a>
                    <a class="btn btn-info" href="">Edit</a>

                </td>

            </tr>


        @endforeach

        {{--        @foreach ($categories as $category)--}}
        {{--            <div class="col text-center mb-6">--}}
        {{--                <h2>{{ $category }}</h2>--}}
        {{--            </div>--}}
        {{--            <div class="row px-4 px-xl-10">--}}
        {{--                @foreach($category->employees->sortBy('employee_order') as $worker)--}}
        {{--                    // some content--}}
        {{--                @endforeach--}}
        {{--            </div>--}}
        {{--        @endforeach--}}



        </tbody>



    </table>
    <br>
    <br>

    {{$ads->links()}}

@endsection
