
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>YourAds</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('frontend')}}/assets/img/logo40.png" rel="icon">
    <link href="{{asset('frontend')}}/assets/img/logo40.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('frontend')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('frontend')}}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: FlexStart - v1.2.0
    * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{route('home.page')}}" class="logo d-flex align-items-center">
            <img src="{{asset('frontend')}}/assets/img/logo30.png" alt="">
            <span>YourAds</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                @auth()

                    <li><a class="login" href="{{route('user.dashboard')}}">Dashboard</a></li>

                @else
                <li><a class="login" href="{{route('login.form')}}">Login</a></li>
                <li><a class="register" href="{{route('registration.form')}}">Register</a></li>
                @endauth


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
