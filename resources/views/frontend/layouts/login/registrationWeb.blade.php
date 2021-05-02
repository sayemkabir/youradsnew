@include('backend.partials.header')

<body>

<header class="header ">
    <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">Close <i class="fa fa-close"></i></div>
                <form id="searchForm" action="#">
                    <div class="form-group">
                        <input type="search" name="search" placeholder="What are you searching for...">
                        <button type="submit" class="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="http://localhost/yourads/public/" class="navbar-brand">
                    <img src="{{asset('frontend')}}/assets/img/logo30.png" alt="">
                    <span><div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Your</strong><strong>Ads</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">Y</strong><strong>A</strong></div></span></a>
                <!-- Sidebar Toggle Btn-->

            </div>
            <div class="right-menu list-inline no-margin-bottom">

                <!-- Tasks-->

                <!-- Tasks end-->

                <!-- Log out               -->
                <div class="list-inline-item logout"><a  href="" class="nav-link">About Us <i class="icon-info"></i></a></div>
            </div>
        </div>
    </nav>
</header>

<div class="registration-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>Create Account</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            @if(session()->has('success'))

                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form class="text-left form-validate" action="{{route('user.create.frontend')}}" method="post">
                                @csrf
                                <div class="form-group-material">
                                    <input id="register-username" type="text" name="userName" required data-msg="Please enter your username" class="input-material">
                                    <label for="register-username" class="label-material">Username</label>
                                </div>
                                <div class="form-group-material">
                                    <input id="register-email" type="email" name="email" required data-msg="Please enter a valid email address" class="input-material">
                                    <label for="register-email" class="label-material">Email Address      </label>
                                </div>
                                <div class="form-group-material">
                                    <input id="register-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                                    <label for="register-password" class="label-material">Password        </label>
                                </div>
                                <div class="form-group terms-conditions text-center">
                                    <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="checkbox-template">
                                    <label for="register-agree">I agree with the terms and policy</label>
                                </div>
                                <div class="form-group text-center">
                                    <input id="register" type="submit" value="Register" class="btn btn-primary">
                                </div>
                            </form><small>Already have an account? </small><a href="{{route('login.form')}}" class="signup">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="preloader"></div>

    <footer class="footer">

        <div class="copyrights text-center">
            <p class="no-margin-bottom">2021 &copy; All rights reserved to <a href="https://www.facebook.com/me.sayem.islam/"> Sayem Kabir</a></p>
        </div>


    </footer>


    <!-- JavaScript files-->
    <script src="{{asset("backend")}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset("backend")}}/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="{{asset("backend")}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset("backend")}}/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="{{asset("backend")}}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{asset("backend")}}/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{asset("backend")}}/js/charts-home.js"></script>
    <script src="{{asset("backend")}}/js/front.js"></script>
    <script type="text/javascript">

        $("html,body").scrollTop(100);

    </script>
</body>
</html>
