@extends('backend.welcome')
@section('operation')

    <!-- Button trigger modal -->
    <center><button type="button"  class="btn btn-primary align-content-center" data-toggle="modal" data-target="#exampleModal">
            <i class="icon-controls"></i>   &nbsp;   ADD CATEGORY
    </button></center><br>

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('danger'))

        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div>
    @endif

    <table class="table table-bordered table-hover ">

    <thead>

    <th scope="col">ID</th>
    <th scope="col">IMAGE</th>
    <th scope="col">NAME</th>
    <th scope="col">DESCRIPTION</th>
    <th scope="col">HANDLE</th>

    </thead>
    <tbody>

@foreach($categories as $data)

    <tr>
        <th scope="row">{{$data->id}}</th>
        <td>
            <img style="width: 100px;" src="{{url('images/categories/',$data->image)}}" alt="IMAGE KOI VAI??">
        </td>
        <td>{{$data->name}}</td>
        <td style="width: 50%">{{$data->description}}</td>
        <td>
            <a class="btn btn-success" href="">View</a>
            <a class="btn btn-danger" href="{{route('category.delete',$data->id)}}">Delete</a>
            <a class="btn btn-info"  href="{{route('category.update',$data->id)}}">Edit</a>
        </td>
    </tr>

@endforeach


</tbody>
</table>

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CATEGORY</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('category.create')}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="categoryname">Category Name</label>
                            <input type="text" id="categoryname" name="categoryname" placeholder="Enter category name" class="form-control">


                        </div>

                        <div class="form-group">
                            <label for="categoryname">Category Name</label>
                            <input type="number" id="categoryname" name="categoryprice" placeholder="Enter Price Here" class="form-control">


                        </div>

                        <div class="form-group">

                            <label for="" >UPLOAD IMAGE</label><br>
                            <input type="file" name="categoryImage" placeholder="Enter Image Here" >


                        </div>

                        <div class="form-group">
                            <label for="categorydescription">Description</label><br>
                            <textarea name="categorydescription" id="categorydescription" placeholder="Enter Description" class="form-control" cols="20" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
