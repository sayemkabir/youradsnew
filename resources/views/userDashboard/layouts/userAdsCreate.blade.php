@extends('userDashboard.master')
@section('userDashboard')

    <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->

    <!-- Icons font CSS-->
    <link href="{{asset('formAd')}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{asset('formAd')}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('formAd')}}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('formAd')}}/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('formAd')}}/css/main.css" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <div class="wrapper wrapper--w790">
        <div class="card card-5">
            <div class="card-heading">
               <center>
                   @if(session()->has('success'))

                       <div class="alert alert-danger">
                           {{ session()->get('success') }}
                       </div>
                   @endif



                   <h2 style="color: goldenrod">Create An Ad Campaign</h2>

               </center>
            </div>
            <div class="card-body">
                <form action="{{route('advertise.ads.post')}}" method="post" >

                    @csrf
                    <div class="form-row m-b-55">
                        <div class="name">Ad Name</div>&nbsp;
                        <div class="value">
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group-desc">
                                        <input required class="input--style-5" type="text" name="adname" placeholder="Enter Ad Name">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Ad Link</div>&nbsp;
                        <div class="value">
                            <div class="input-group">
                                <input required class="input--style-5" type="text" name="adlink" placeholder="Enter Website/Content/Video Address That You Want To Post As An Advertisement">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Ad Description</div>&nbsp;
                        <div class="value">
                            <div class="input-group">
                                <textarea class="form-control" name="adcontent"  cols="10" rows="10" placeholder="Enter Ad Description"></textarea>                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Select Category </div>

                        <select required name="categoryid" id="categoryid">
                            <option  selected="selected">Choose option</option>
                            @foreach($categoriesid as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-row">
                        <div class="name">Ad Duration</div>&nbsp;

                        <select required name="adduration" id="adduration">
                            <option  selected="selected">Choose option</option>
                            <option value="5">5 seconds</option>
                            <option value="10">10 seconds</option>
                            <option value="30">30 seconds</option>
                            <option value="60">60 seconds</option>
                            <option value="120">120 seconds</option>
                        </select>
                    </div>


                    <div class="form-row m-b-55">
                        <div class="name">Cost per Click</div>&nbsp;
                        <div class="value">
                            <div class="row row-refine">
                                <div class="col-12">
                                    <div class="input-group-desc">
                                        <input readonly class="input--style-5" id="customer_name" min="1" type="number" name="adprice" placeholder="price will be automatically calculated here">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="form-row m-b-55">
                        <div class="name">Ad Click Target</div>&nbsp;
                        <div class="value">
                            <div class="row row-refine">
                                <div class="col-12">
                                    <div class="input-group-desc">
                                        <input required class="input--style-5" min="1" type="number" name="adclicks" id="adclicks" placeholder="Enter the number of clicks for the ad">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="form-row m-b-55">
                        <div class="name">Total Price</div>&nbsp;
                        <div class="value">
                            <div class="row row-refine">
                                <div class="col-12">
                                    <div class="input-group-desc">
                                        <input readonly class="input--style-5" min="1" type="number" id="totalprice" name="adtotalprice" placeholder="Your Current Deposit Balance is {{auth('user')->user()->deposit_balance}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <center><button class="btn btn--radius-2 btn--red" type="submit">Create Advertisement</button></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{asset('formAd')}}/vendor/jquery/jquery.min.js"></script>

@push('customer_js')
    <script>
        let categoryId = document.querySelector('#categoryid');
        let customer_name = document.querySelector('#customer_name');
        let customer_total = document.querySelector('#totalprice');
        // let customer_phone = document.querySelector('#customer_phone');
        // let invoice_no = document.querySelector('#invoice_no');
    // console.log(customer_id);


        categoryId.addEventListener('change', (e) => {
            let id = e.target.value;

            const url = "{{ url('post-fetch') }}/" + id;
            fetch(url)
                .then(res => res.json())
                .then(res => {
                    customer_name.value = res.customer.price;

                })
        })

        let adduration = document.querySelector("#adduration");

        adduration.addEventListener('change',(e)=>{

            var selectedValue = e.target.value;

            var id=categoryId.value;

            const url = "{{ url('post-fetch') }}/" + id;
            fetch(url)
                .then(res => res.json())
                .then(res => {
                    customer_name.value = Number.parseFloat(res.customer.price) * Number.parseFloat(selectedValue);

                })
        })

        let adclicks = document.querySelector("#adclicks");

        adclicks.addEventListener('change',(e)=>{

            var selectedValue = e.target.value;

            var id=customer_name.value;

            const url = "{{ url('post-fetch') }}/" + id;
            fetch(url)
                .then(res => res.json())
                .then(res => {
                    customer_total.value = Number.parseFloat(id) * Number.parseFloat(selectedValue);

                })
        })


    </script>
 @endpush

<!-- Vendor JS-->
<script src="{{asset('formAd')}}/vendor/select2/select2.min.js"></script>
<script src="{{asset('formAd')}}/vendor/datepicker/moment.min.js"></script>
<script src="{{asset('formAd')}}/vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="{{asset('formAd')}}/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

{{--    <form action="{{route('advertise.ads.post')}}" method="post">--}}

{{--        @if(session()->has('success'))--}}

{{--            <div class="alert alert-success">--}}
{{--                {{ session()->get('success') }}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        @csrf--}}

{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <div class="form-group">--}}

{{--                            <label for="">ENTER Ad NAME:</label>--}}
{{--                            <input type="text" name="adname" placeholder="Enter Ad Name" class="form-control">--}}

{{--                        </div>--}}

{{--                        <div class="form-group">--}}

{{--                            <label for="">Ad LINK:</label>--}}
{{--                            <input type="text" class="form-control" name="adlink" placeholder="Enter Website/Content/Video Address That You Want To Post As An Advertisement">--}}



{{--                        </div>--}}

{{--                        <div class="form-group">--}}

{{--                            <label for="" >ENTER Ad CONTENT:</label>--}}
{{--                            <textarea class="form-control" name="adcontent"  cols="20" rows="10" placeholder="Enter Ad Description"></textarea>--}}

{{--                        </div>--}}

{{--                        <div class="form-group">--}}

{{--                            <label for="">SELECT CATEGORY:</label>--}}
{{--                            <select name="categoryid" class="form-control">--}}
{{--                                @foreach($categoriesid as $data)--}}
{{--                                    <option value="{{$data->id}}">{{$data->name}}</option>--}}
{{--                                @endforeach--}}

{{--                            </select>--}}

{{--                        </div>--}}

{{--                        <div class="form-group">--}}

{{--                            <label for="" >Ad DURATION:</label>--}}
{{--                            <select class="form-control" name="adduration" >--}}

{{--                                <option value="30 sec">30 seconds</option>--}}
{{--                                <option value="60 sec">60 seconds</option>--}}
{{--                                <option value="120 sec">120 seconds</option>--}}

{{--                            </select>--}}

{{--                        </div>--}}

{{--                        <div class="form-group">--}}

{{--                            <label for="" >Ad CLICKS:</label>--}}


{{--                            <input type="number" name="adclicks" placeholder="Enter the number of clicks for the ad" class="form-control">--}}

{{--                            --}}{{--            <select class="form-control" name="adclicks" >--}}

{{--                            --}}{{--                <option value="1000">1000</option>--}}
{{--                            --}}{{--                <option value="5000">5000</option>--}}
{{--                            --}}{{--                <option value="10000">10000</option>--}}
{{--                            --}}{{--                <option value="50000">50000</option>--}}
{{--                            --}}{{--                <option value="100000">100000</option>--}}
{{--                            --}}{{--                <option value="50000">500000</option>--}}
{{--                            --}}{{--                <option value="100000">1000000</option>--}}

{{--                            --}}{{--            </select>--}}

{{--                        </div>--}}

{{--                        <div class="form-group">--}}

{{--                            <label for="" >Ad PRICE:</label>--}}

{{--                            <input type="number" name="adprice" placeholder="price will be automatically calculated" class="form-control">--}}



{{--                        </div>--}}

{{--                        <div class="form-group">--}}

{{--                            <label for="" >TOTAL PRICE:</label>--}}

{{--                            <input type="number" name="adtotalprice" placeholder="price will be automatically calculated" class="form-control">--}}



{{--                        </div>--}}



{{--                    </div>--}}

{{--                    <button type="submit"  class="btn btn-success" >SUBMIT</button>--}}

{{--                </div></div></div><br><br>--}}
{{--    </form>--}}
{{--    <br><br><br><br>--}}





@endsection
