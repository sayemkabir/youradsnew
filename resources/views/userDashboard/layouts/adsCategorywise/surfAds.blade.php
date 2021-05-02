@extends('userDashboard.master')
@section('userDashboard')


    <div class="container-fluid">
        <div class="row">

            @foreach($surfads as $data)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>{{$data->ad_content}}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>


@endsection
