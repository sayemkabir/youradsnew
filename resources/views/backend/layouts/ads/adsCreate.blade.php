@extends('backend.welcome')
@section('operation')


    <form action="{{route('ads.create')}}" method="post">


        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif



            @csrf

      <div class="container">
          <div class="row">
              <div class="col-sm-10">
        <div class="form-group">

            <label for="">ENTER Ad NAME:</label>
            <input required type="text" name="adname" placeholder="Enter Ad Name" class="form-control">

        </div>

                  <div class="form-group">

                      <label for="">Ad LINK:</label>
                      <input required type="text" class="form-control" name="adlink" placeholder="Enter Website/Content/Video Address That You Want To Post As An Advertisement">



                  </div>

        <div class="form-group">

            <label for="" >ENTER Ad CONTENT:</label>
            <textarea required class="form-control" name="adcontent"  cols="20" rows="10" placeholder="Enter Ad Description"></textarea>

        </div>

                  <div class="form-group">

                      <label for="">SELECT CATEGORY:</label>
                      <select required name="categoryid" class="form-control">
                          <option selected disabled value="">Select Category</option>
                          @foreach($categoriesid as $data)
                              <option value="{{$data->id}}">{{$data->name}}</option>
                          @endforeach

                      </select>

                  </div>

                  <div class="form-group">

                      <label for="" >Ad DURATION:</label>
                      <select required class="form-control" name="adduration" >

                          <option disabled selected value="5 sec">Select Duration</option>
                          <option value="5 sec">5 seconds</option>
                          <option value="10 sec">10 seconds</option>
                          <option value="30 sec">30 seconds</option>
                          <option value="60 sec">60 seconds</option>
                          <option value="120 sec">120 seconds</option>

                      </select>

                  </div>

        <div class="form-group">

            <label for="" >Ad CLICKS:</label>


            <input required min="1" type="number" name="adclicks" placeholder="Enter the number of clicks for the ad" class="form-control">

{{--            <select class="form-control" name="adclicks" >--}}

{{--                <option value="1000">1000</option>--}}
{{--                <option value="5000">5000</option>--}}
{{--                <option value="10000">10000</option>--}}
{{--                <option value="50000">50000</option>--}}
{{--                <option value="100000">100000</option>--}}
{{--                <option value="50000">500000</option>--}}
{{--                <option value="100000">1000000</option>--}}

{{--            </select>--}}

        </div>

                  <div class="form-group">

                      <label for="" >Ad PRICE:</label>

                      <input required min="1" type="number" name="adprice" placeholder="price will be automatically calculated" class="form-control">



                  </div>

                  <div class="form-group">

                      <label for="" >TOTAL PRICE:</label>

                      <input required min="1" type="number" name="adtotalprice" placeholder="price will be automatically calculated" class="form-control">



                  </div>



        </div>

        <button type="submit" class="btn btn-success" >SUBMIT</button>

              </div></div></div><br><br>
    </form>
    <br><br><br><br>

@endsection
