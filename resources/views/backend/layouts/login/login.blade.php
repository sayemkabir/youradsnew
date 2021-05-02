@include('backend.layouts.login.loginPartials.loginHeader')


<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('form')}}/images/img-01.png" alt="IMG">
            </div>




            <form class="login100-form validate-form" action="{{route('admin.login')}}" method="post">
                @csrf


					<span class="login100-form-title">
						Admin Login
					</span>


                @if(session()->has('success'))

                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif



                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">

                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">

							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>
                <br><br>
                <br><br>
                <br>

                {{--                <div class="text-center p-t-136">--}}
                {{--                    <a class="txt2" href="#">--}}
                {{--                        Create your Account--}}
                {{--                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </form>
            <div class="container-fluid text-center">
                <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                <center><p class="no-margin-bottom">2021 &copy; All rights reserved to <a href="https://www.facebook.com/me.sayem.islam/"> Sayem Kabir</a></p></center>
            </div>

        </div>
    </div>
</div>


@include('backend.layouts.login.loginPartials.loginFooter')
