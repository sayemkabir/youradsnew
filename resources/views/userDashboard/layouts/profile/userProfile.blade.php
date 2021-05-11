@extends('userDashboard.master')
@section('userDashboard')



<!--*******************
    Preloader start
********************-->


    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->

        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-4">
                                <img class="mr-3" src="{{url('/images/users',auth('user')->user()->user_image)}}" width="80" height="80" alt="">
                                <div class="media-body">
                                    <h3 class="mb-0">{{auth('user')->user()->user_name}}</h3>
{{--                                    <p class="text-muted mb-0">Canada</p>--}}
                                </div>
                            </div>

                            <div class="row mb-5">

                                <div class="col">

                                    <div class="card card-profile text-center">
                                        <span class="mb-1 text-primary"><i class="fas fa-folder-plus"></i></span>
                                        <h3 class="mb-0">{{$surfads->count()}}</h3>
                                        <p class="text-muted px-4">Ad Created</p>
                                    </div>


                                </div>
                                <div class="col">
                                    <div class="card card-profile text-center">
                                        <span class="mb-1 text-warning"><i class="fas fa-ad"></i></span>
                                        <h3 class="mb-0">{{$adclicks->count()}}</h3>
                                        <p class="text-muted">Ad Clicked</p>
                                    </div>
                                </div>

{{--                                <div class="col-12 text-center">--}}
{{--                                    <ul class="nav nav-tabs mb-3" role="tablist">--}}
{{--                                        <li class="nav-item">--}}
{{--                                    <a data-toggle="tab" href="#home" class="nav-link btn btn-danger px-5"><i class="fas fa-wrench"></i>&NonBreakingSpace; Update Profile</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                            </div>

{{--                            <ul class="card-profile__info">--}}
{{--                                <li><strong class="text-dark mr-4">Email</strong> <span>{{auth('user')->user()->email}}</span></li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">User Profile</h4>
                                    <!-- Nav tabs -->
                                    <div class="default-tab">
                                        <ul class="nav nav-tabs mb-3" role="tablist">
                                            <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#home">Update Profile</a>
{{--                                            </li>--}}
{{--                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Profile</a>--}}
{{--                                            </li>--}}
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact">Update Wallet Address</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#message">My Ads</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade" id="home" role="tabpanel">
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
{{--                                                <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">--}}
                                                    <div class="wrapper wrapper--w790">
                                                        <div class="card card-5">


                                                                    @if(session()->has('success'))

                                                                        <div class="alert alert-success">
                                                                            {{ session()->get('success') }}
                                                                        </div>
                                                                    @endif

                                                            <div class="card-body">
                                                                <form action="{{route('user.update.frontend')}}" method="post" >
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="form-row m-b-55">
                                                                        <div class="name">User Name</div>&nbsp;
                                                                        <div class="value">
                                                                            <div class="row row-space">
                                                                                <div class="col-12">
                                                                                    <div class="input-group-desc">
                                                                                        <input required class="input--style-5" type="text" name="userName" placeholder="Enter New Username">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="name">Old Password</div>&nbsp;
                                                                        <div class="value">
                                                                            <div class="input-group">
                                                                                <input required class="input--style-5" type="password" name="" placeholder="Enter Old Password">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="name">New Password</div>&nbsp;
                                                                        <div class="value">
                                                                            <div class="input-group">
                                                                                <input required class="input--style-5" type="password" name="password" placeholder="Enter New Password">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="name">E-mail</div>&nbsp;
                                                                        <div class="value">
                                                                            <div class="input-group">
                                                                                <input required class="input--style-5" type="email" name="email" placeholder="Enter New E-mail">
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div>
                                                                        <button class="btn btn--radius-2 btn--red" type="submit">Update Profile</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
{{--                                                </div>--}}

                                                <!-- Jquery JS-->
                                                <script src="{{asset('formAd')}}/vendor/jquery/jquery.min.js"></script>
                                                <!-- Vendor JS-->
                                                <script src="{{asset('formAd')}}/vendor/select2/select2.min.js"></script>
                                                <script src="{{asset('formAd')}}/vendor/datepicker/moment.min.js"></script>
                                                <script src="{{asset('formAd')}}/vendor/datepicker/daterangepicker.js"></script>

                                                <!-- Main JS-->
                                                <script src="{{asset('formAd')}}/js/global.js"></script>

                                                </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

                                                </html>
                                            </div>
{{--                                            <div class="tab-pane fade" id="profile">--}}
{{--                                                <div class="p-t-15">--}}
{{--                                                    <h4>This is profile title</h4>--}}
{{--                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>--}}
{{--                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="tab-pane fade" id="contact">
                                                <div class="p-t-15">

                                                    <div class="wrapper wrapper--w790">
                                                        <div class="card card-5">


                                                            @if(session()->has('successwallet'))

                                                                <div class="alert alert-success">
                                                                    {{ session()->get('successwallet') }}
                                                                </div>
                                                            @endif

                                                            <div class="card-body">
                                                                <form action="{{route('user.wallet.update.frontend')}}" method="post" >
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <center>

                                                                        <div class="name"><h2>Bitcoin Wallet Address:</h2></div>&nbsp;
                                                                        <div class="value">
                                                                            <div class="row row-space">
                                                                                <div class="col-12">
                                                                                    <div class="input-group-desc">
                                                                                        <input required class="input--style-5" value="{{$user_update->wallet_address}}" type="text" name="walletaddress" placeholder="Enter A Bitcoin Wallet Address">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    </center>




                                                                    <div>
                                                                        <center><button class="btn btn--radius-2 btn--red" type="submit">Save Wallet</button></center>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {{--                                                </div>--}}

                                                <!-- Jquery JS-->
                                                    <script src="{{asset('formAd')}}/vendor/jquery/jquery.min.js"></script>
                                                    <!-- Vendor JS-->
                                                    <script src="{{asset('formAd')}}/vendor/select2/select2.min.js"></script>
                                                    <script src="{{asset('formAd')}}/vendor/datepicker/moment.min.js"></script>
                                                    <script src="{{asset('formAd')}}/vendor/datepicker/daterangepicker.js"></script>

                                                    <!-- Main JS-->
                                                    <script src="{{asset('formAd')}}/js/global.js"></script>

                                                    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

                                                    </html>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade show active" id="message">
                                                <div class="p-t-15">

                                                     @if(session()->has('successad'))

                                                            <div class="alert alert-success">
                                                                {{ session()->get('successad') }}
                                                            </div>
                                                        @endif

                                                        @foreach($surfads as $key=>$data)



                                                             <div class="card">
                                                                <div class="card-body">

                                                                    <p><h4>{{$key+1}}</h4><i class="fas fa-ad"></i></p><h2>{{$data->ad_name}}</h2>
                                                                    <h3 style="color: royalblue"> <span id="count-{{$key}}">{{$data->ad_duration}}</span> </h3>

                                                                    @php
                                                                        $duration = explode('sec',$data->ad_duration)[array_key_first(explode('sec',$data->ad_duration))];

                                                                    @endphp


                                                                    <a style="width: 200px; overflow: hidden;" data-duration="{{$duration}}" data-key="{{$key}}" class="startClock" id="startClock" onclick="jQuery()" href="{{$data->ad_link}}" target="_blank">{{$data->ad_link}}</a>
                                                                    <p>{{$data->ad_content}}</p>

                                                                    <p style="color: darkblue;">$&nbsp; {{$data->ad_price}} Satoshi</p>
                                                                </div>
                                                             </div>
                                                                @endforeach



                                                       </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
</div>


@endsection

{{--<div class="p-t-15">--}}
{{--    @if(session()->has('success'))--}}

{{--        <div class="alert alert-success">--}}
{{--            {{ session()->get('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @foreach($surfads as $key=>$data)--}}
{{--        <div class="card">--}}

{{--            <div class="card-body">--}}
{{--                <h2>{{$data->ad_name}}</h2>--}}
{{--                <h3 style="color: royalblue"> <span id="count-{{$key}}">{{$data->ad_duration}}</span> </h3>--}}

{{--                @php--}}
{{--                    $duration = explode('sec',$data->ad_duration)[array_key_first(explode('sec',$data->ad_duration))];--}}

{{--                @endphp--}}


{{--                <a style="width: 200px; overflow: hidden;" data-duration="{{$duration}}" data-key="{{$key}}" class="startClock" id="startClock" onclick="jQuery()" href="{{route('ads.post',$data->id)}}" target="_blank">{{$data->ad_link}}</a>--}}
{{--                <p>{{$data->ad_content}}</p>--}}

{{--                <p style="color: darkblue;">$&nbsp; {{$data->ad_price}} Satoshi</p>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--</div>--}}
