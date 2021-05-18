@include('backend.partials.header')
<body>
<header class="header">
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
<div class="login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>Password Recovery</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form action="{{route('password.update')}}" method="post" class="form-validate">
                                @method('PUT')
                                @csrf

                                @if(session()->has('success'))

                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                @if(session()->has('successError'))

                                    <div class="alert alert-danger">
                                        {{ session()->get('successError') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{$error}}</div>
                                    @endforeach
                                @endif


                                <input type="email" name="email" value="{{$tokenValidate->email}}" hidden>

                                <br>
                                <div class="form-group">
                                    <input id="login-username" type="password" name="password" required data-msg="Please enter your new password" class="input-material">
                                    <label for="login-username" class="label-material">New Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                            </form>
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
