<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        @auth('admin')
        <img class="img-fluid" style="width: 100px;" src="{{url('/images/admin/',auth('admin')->user()->image)}}" alt="IMAGE NAi"> &nbsp; &nbsp; &nbsp; &nbsp;
          <div class="title">

            <center><h1 class="h5">{{auth('admin')->user()->name}}</h1></center>
            <center><p>{{auth('admin')->user()->role}}</p></center>
        </div>
        @endauth
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->role=='Super Admin')
        <li ><a href="{{route('dashboard')}}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{route('admin.view')}}"> <i class="icon-user-outline"></i>Admins </a></li>
        <li><a href="{{route('category.name')}}"> <i class="icon-controls"></i>Categories </a></li>

        <li><a href="{{route('ads.view')}}"> <i class="icon-windows"></i>Ads </a></li>
        <li><a href="{{route('user.view')}}"> <i class="icon-user-1"></i>Users </a></li>
        <li><a href="{{route('deposit.requests')}}"> <i class="icon-cloud"></i>Deposit Requests</a></li>
        <li><a href="{{route('withdraw.requests')}}"> <i class="icon-bill"></i>Withdraw Requests</a></li>
        @endif
            @if(auth('admin')->user()->role=='Admin')
                <li ><a href="{{route('dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{route('admin.view')}}"> <i class="icon-user-outline"></i>Admins </a></li>
                <li><a href="{{route('category.name')}}"> <i class="icon-controls"></i>Categories </a></li>

                <li><a href="{{route('ads.view')}}"> <i class="icon-windows"></i>Ads </a></li>
                <li><a href="{{route('user.view')}}"> <i class="icon-user-1"></i>Users </a></li>

            @endif
            {{--        <li><a href="#users" aria-expanded="false" data-toggle="collapse"> <i class="icon-user-1"></i>Users </a>--}}
    {{--           <ul id="users" class="collapse list-unstyled ">--}}
    {{--        <li><a href="{{route('advertisers.view')}}">Advertisers</a></li>--}}
    {{--        <li><a href="{{route('earner.name')}}">Earners</a></li>--}}
        </ul>
    {{--        </li>--}}
</nav>
