@extends('backend.welcome')
@section('operation')


    <form action="{{route('admin.create')}}" method="post" enctype="multipart/form-data">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

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
                        <label for="">ENTER ADMIN NAME:</label>
                        <input required type="text" name="adminname" namespace="Enter Admin Name..." class="form-control">

                    </div>

                    <div class="form-group" >
                        <label for="">ENTER PASSWORD:</label>
                        <input required type="password" name="adminpassword" namespace="Enter password..." class="form-control">

                    </div>

                    <div class="form-group" >
                        <label for="">ENTER E-MAIL:</label>
                        <input required type="email" name="adminemail" namespace="Enter E-mail..." class="form-control">

                    </div>


                    <div class="form-group">

                        <label for="">ENTER CONTACT NO:</label>
                        <input required min="1" type="number" name="admincontact" class="form-control" >

                    </div>

                    <div class="form-group">
                        <label for="">ENTER ROLE:</label>
                        <div class="col-sm-4">
                            <select required name="adminrole" class="form-control">


                                <option value="">Select Admin Type</option>
                                <option value="Super Admin">SUPER ADMIN</option>
                                <option value="Admin">ADMIN</option>


                            </select>


                        </div>
                    </div>

                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="">UPLOAD PHOTO:</label><br>
                            <input required type="file" name="admin_image" placeholder="Please Select An Image">


                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" >
                            <label for="">STATUS:</label>
                            <select required type="option" name="adminstatus" id="" class="form-control">
                                <option value="">Select Admin Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>

                        </div>
                    </div>

                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div></div></div>


    </form>




@endsection
