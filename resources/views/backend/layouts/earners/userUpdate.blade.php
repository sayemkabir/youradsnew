@extends('backend.welcome')
@section('operation')



    <form action="{{route('user.update',$user_edit->id)}}" method="post" enctype="multipart/form-data">
@method('PUT')
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <div class="form-group" >
                        <label for="">User Name:</label>
                        <input required value="{{$user_edit->user_name}}" type="text" name="userName" namespace="Enter User Name" class="form-control">

                    </div>

                    <div class="form-group" >
                        <label for="">Password:</label>
                        <input required value="{{$user_edit->password}}" type="password" name="password" namespace="Password" class="form-control">

                    </div>

                    <div class="form-group" >
                        <label for="">Enter E-mail:</label>
                        <input required value="{{$user_edit->email}}" type="email" name="email" namespace="Enter E-mail" class="form-control">

                    </div>

                    <div class="form-group" >
                        <label for="">Update Deposit:</label>
                        <input required value="{{$user_edit->deposit_balance}}" type="number" name="updateDeposit" namespace="Enter E-mail" class="form-control">

                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="">UPLOAD PHOTO:</label><br>
                            <input  type="file" name="UserImage" placeholder="Please Select An Image">


                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group" >
                            <label for="">Status:</label>
                            <select required type="option" name="status" id="" class="form-control">
                                <option @if($user_edit->user_status) selected @endif value="active">Active</option>
                                <option @if($user_edit->user_status) selected @endif value="inactive">Inactive</option>
                            </select></div>

                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div></div></div>

    </form>




@endsection
