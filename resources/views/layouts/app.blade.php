<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
<!--************************* #app start *****************************************-->
<div id="app">
<!--d-flux start  -->
<div class="d-flex">
<!--************************* Sidebar *****************************************-->
<div class="sidebar ksrce-sidebar">
        <div class="sidebar-brand">
            <p><img src="{{ asset('img/ksrceLogo.png') }}" height="60px" class="p-1"> Smart System</p>    
        </div>
        <ul class="list-unstyled">
            <li><a href="{{route('home')}}"><i class="fa fa-fw fa-link"></i>Home</a></li>
            <li class="active"><a href="{{route('staffprofile-home')}}"><i class="fa fa-fw fa-link"></i> Staff Profile</a></li>
        </ul>
    </div>
<!--************************* Content start *****************************************-->
    <div class="content">
<!--************************* Navbar *****************************************-->
            <nav class="navbar navbar-expand ksrce-main-navbar">
        <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
        <p class="navbar-brand pt-4" > DASHBOARD</p>
    
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp&nbsp  {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                        <a href="staff-profile-view.html" class="dropdown-item">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<!--************************* yield Content *****************************************-->
    @yield('content')

    </div>

<!--************************* Content end *****************************************-->
</div>
<!--d-flux end  -->
        
</div>
<!--************************* #app end *****************************************-->

<!--************************* Scripts *****************************************-->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootadmin.min.js') }}"></script>
    <script src="{{ asset('js/charts.min.js') }}"></script>
    <script src="{{ asset('js/chartsoverall.js') }}"></script>
</body>
</html>
