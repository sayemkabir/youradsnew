@extends('backend.welcome')
@section('operation')

    <form action="{{route('category.update.post',$category_edit->id)}}" method="post" enctype="multipart/form-data">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        @csrf
        @method("PUT")
        <div class="container">
            <div class="row">
                <div class="col-sm-8">

            <div class="form-group">
                <label for="categoryname">Category Name</label>
                <input required type="text" value="{{$category_edit->name}}" id="categoryname" name="categoryname" placeholder="Enter category name" class="form-control">


            </div>

            <div class="form-group">

                <label for="" >UPLOAD IMAGE</label><br>
                <input required type="file"  name="categoryImage" placeholder="Enter Image Here" >


            </div>

                    <div class="form-group">
                        <label for="categoryname">Category Name</label>
                        <input min="1" required type="number" id="categoryname" name="categoryprice" placeholder="Enter Price Here" class="form-control">


                    </div>

            <div class="form-group">
                <label for="categorydescription">Description</label><br>
                <textarea required name="categorydescription" value="{{$category_edit->description}}"  id="categorydescription" placeholder="Enter Description" class="form-control" cols="20" rows="5"></textarea>
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        </div></div></div>

    </form>

@endsection
