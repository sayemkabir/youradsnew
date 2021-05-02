@extends('backend.welcome')
@section('operation')


    <form action="{{route("admin.update.post",$admin->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')

        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <div class="form-group" >
                        <label for="">ENTER ADMIN NAME:</label>
                        <input required type="text" value="{{$admin->name}}" name="adminname" namespace="Enter Admin Name" class="form-control">

                    </div>

                    <div class="form-group" >
                        <label for="">ENTER PASSWORD:</label>
                        <input required type="password" value="{{$admin->password}}" name="adminpassword" namespace="Enter password" class="form-control">

                    </div>

                    <div class="form-group" >
                        <label for="">ENTER E-MAIL:</label>
                        <input required type="email" value="{{$admin->email}}" name="adminemail" namespace="Enter E-mail..." class="form-control">

                    </div>


                    <div class="form-group">

                        <label for="">ENTER CONTACT NO:</label>
                        <input required type="number" value="{{$admin->contact}}" name="admincontact" class="form-control" >

                    </div>

                    <div class="form-group">
                        <label for="">ENTER ROLE:</label>
                        <div class="col-sm-4">
                            <select name="adminrole"  class="form-control">


{{--                                <option value="">Select Admin Type</option>--}}
                                <option @if($admin->role) selected @endif value="Super Admin">SUPER ADMIN</option>
                                <option @if($admin->role) selected @endif value="Admin">ADMIN</option>


                            </select>


                        </div>
                    </div>

                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="">UPLOAD PHOTO:</label><br>
                            <input type="file" name="admin_image" placeholder="Please Select An Image">


                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" >
                            <label for="">STATUS:</label>
                            <select type="option" name="adminstatus"  class="form-control">
{{--                                <option value="">Select Admin Status</option>--}}
                                <option @if($admin->status) selected @endif value="Active">Active</option>
                                <option @if($admin->status) selected @endif value="Inactive">Inactive</option>
                            </select>

                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div></div></div>


    </form>




@endsection
