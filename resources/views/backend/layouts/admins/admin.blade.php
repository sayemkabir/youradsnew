@extends('backend.welcome')
@section('operation')




    <center><a href="{{route('admin.form')}}"><button type="button"  class="btn btn-primary align-content-center" >
                <i class="icon-user-1"></i> &nbsp; CREATE ADMIN
            </button></a></center><br>

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">

        <thead>

        <th scope="col">ID</th>
        <th scope="col">ADMIN ER PHUDU</th>
        <th scope="col">ADMIN NAME</th>
        <th scope="col">ROLE</th>
        <th scope="col">E-MAIL</th>
        <th scope="col">CONTACT</th>
        <th scope="col">STATUS</th>
        <th scope="col">ACTIONS</th>


        </thead>
        <tbody>

        @foreach($admin as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <img style="width:100px;" src="{{url('/images/admin/'.$data->image)}}" alt="IMAGE NOT FOUND">
                </td>
                <td>{{$data->name}}</td>
                <td>{{$data->role}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->contact}}</td>
                <td>{{$data->status}}</td>
                <td>

                    <a class="btn btn-info" href="{{route('admin.update.form',$data->id)}}">Edit</a>

                    <a class="btn btn-danger" href="{{route('admin.delete',$data->id)}}">Delete</a>

                </td>

            </tr>


        @endforeach
        </tbody>
    </table><br>



{{$admin->links()}}
@endsection



