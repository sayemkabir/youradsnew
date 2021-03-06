@extends('backend.welcome')
@section('operation')


    <form action="{{route('user.create')}}" method="post" enctype="multipart/form-data">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        @csrf
<div class="container">
    <div class="row">
        <div class="col-sm-8">

    <div class="form-group" >
            <label for="">User Name:</label>
            <input required type="text" name="userName" namespace="Enter User Name" class="form-control">

        </div>

        <div class="form-group" >
            <label for="">Password:</label>
            <input required type="password" name="password" namespace="Password" class="form-control">

        </div>

        <div class="form-group" >
            <label for="">Enter E-mail:</label>
            <input required type="email" name="email" namespace="Enter E-mail" class="form-control">

        </div>
            <div class="col-sm-10">
            <div class="form-group">
                    <label for="">UPLOAD PHOTO:</label><br>
                    <input required type="file" name="UserImage" placeholder="Please Select An Image">


            </div>
            </div>

<div class="col-sm-3">
        <div class="form-group" >
            <label for="">Status:</label>
            <select required type="option" name="status" id="" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select></div>

        </div>
</div>
     <button type="submit" class="btn btn-success">Submit</button>
        </div></div></div>

    </form>


@endsection
