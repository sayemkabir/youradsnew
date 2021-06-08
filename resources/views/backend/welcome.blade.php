
<!DOCTYPE html>
<html>
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
                   <span> <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Your</strong><strong>Ads</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">Y</strong><strong>A</strong></div></span></a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle"><i class="fa fa-bars"></i></button>
            </div>
            <!-- Tasks-->




            @php

            $checkTicket=App\Models\Ticket::with('userTicket')->get();

            @endphp


                <div class="right-menu list-inline no-margin-bottom">
                    <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
                    <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle"><i class="icon-email"></i><span class="badge dashbg-1">{{$checkTicket->count()}}</span></a>
                        <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages">

                            @if(count($checkTicket)>0)
                                @foreach($checkTicket as $data)
                                <a href="{{route('ticket.view')}}" class="dropdown-item message d-flex align-items-center">
                                <div class="profile"><img style="width: 100px" src="{{url('/images/users/',$data->userTicket->user_image)}}" alt="..." class="img-fluid">
{{--                                    @auth('user')--}}
{{--                            <div class="status online"></div>--}}
{{--                                    @endauth--}}
                                    <div class="status online"></div>

                                </div>
                        <div class="content">   <strong class="d-block">{{$data->userTicket->user_name}}</strong><span class="d-block">{{$data->subject}}</span><small class="date d-block">{{$data->created_at}}</small></div></a>

                            @endforeach

                                    <a  href="{{route('ticket.view')}}" class="dropdown-item text-center message"><strong>See All Tickets <i class="fa fa-angle-right"></i></strong></a>


                        @else

                       <center> <div class="content" >   <span class="d-block" style="color: cyan; padding: 33px 0px">Yay ! There's no ticket !</span></div></center>

                @endif

                    </div>
                    </div>



                <!-- Tasks end-->

                <!-- Log out               -->
                <div class="list-inline-item logout"><a id="logout" href="{{route('admin.logout')}}" class="nav-link">Logout <i class="icon-logout"></i></a></div>
            </div>
        </div>
    </nav>
</header>
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
@include("backend.partials.sidebar")
<!-- Sidebar Navigation end-->
    <br>
    <br>
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">{{$title}}</h2>

            </div>
        </div>
        @yield('operation')



    </div>

</div>
<br>
<br>





@include("backend.partials.footer")
