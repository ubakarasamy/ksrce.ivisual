<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

    <title>KSRCE</title>

    {{-- fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Bitter|Noto+Serif|Open+Sans|Roboto+Mono" rel="stylesheet">    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ksrce.css') }}">
    <style>
        #at_staff::before, #at_student::before, #at_stud_profile::before 
        {
            content: none;
        }
        
    </style>
    @yield('inline-styles')
</head>
<body style="font-family: 'Roboto Mono', monospace;">
<!--************************* #app start *****************************************-->
<div id="app">
<!--d-flux start  -->
<div class="d-flex">
<!--************************* Sidebar *****************************************-->
<div class="sidebar ksrce-sidebar">
        <div class="sidebar-brand">
            <p><img src="{{ asset('img/ksrceLogo.png') }}" height="60px" class="p-1">Smart System</p>    
        </div>
        
        <div class="list-stop">
        <ul class="list-unstyled">
            {{-- Profiles --}}
            <li class=" @if($route = Route::current()->getName() == 'home') <?php echo "active"?> @endif"><a href="{{route('home')}}"><i class="fas fa-home"></i>Home</a></li>
            @if(Auth::user()->GetRole() == 1 || Auth::user()->GetRole() == 2)
            <li class=" @if($route = Route::current()->getName() == 'staffprofile-home') <?php echo "active" ?> @endif"><a href="{{route('staffprofile-home')}}"><i class="fas fa-user"></i>Staff Profile</a></li>
            <li class=" @if($route = Route::current()->getName() == 'staffattendance-create' || $route = Route::current()->getName() == 'staff-attendance-bymonth') <?php echo "subactive" ?> @endif"><a href="#at_staff" data-toggle="collapse" aria-expanded="true"><i class="fas fa-graduation-cap"></i>Staff Attendance</a>
                <ul id="at_staff" class="list-unstyled collapse" style="">
                    <li class=" @if($route = Route::current()->getName() == 'staffattendance-create') <?php echo "active" ?> @endif"><a href="{{route('staffattendance-create')}}"><i class="fas fa-plus"></i>Attendace Make</a></li>
                    <li class=" @if($route = Route::current()->getName() == 'staff-attendance-overall') <?php echo "active" ?> @endif"><a href="{{route('staff-attendance-overall')}}"><i class="fas fa-eye"></i>Attendace View</a></li>
                </ul>
            </li>
            @endif
            <li class=" @if($route = Route::current()->getName() == 'studentprofile-home' || $route = Route::current()->getName() == 'stud-bgroup') <?php echo "subactive" ?> @endif"><a href="#at_stud_profile" data-toggle="collapse" aria-expanded="true"><i class="fas fa-graduation-cap"></i>Student Profile</a>
                <ul id="at_stud_profile" class="list-unstyled collapse" style="">
                    <li class=" @if($route = Route::current()->getName() == 'studentprofile-home') <?php echo "active" ?> @endif"><a href="{{route('studentprofile-home')}}"><i class="fas fa-plus"></i>Student Profile</a></li>
                    <li class=" @if($route = Route::current()->getName() == 'stud-bgroup') <?php echo "active" ?> @endif"><a href="{{route('stud-bgroup')}}"><i class="fas fa-eye"></i>Blood Group</a></li>
                </ul>
            </li>
            {{-- Attendances --}}
        <li>
            <a href="#at_student" data-toggle="collapse" aria-expanded="true"><i class="fas fa-graduation-cap"></i>Student Attendace</a>
            <ul id="at_student" class="list-unstyled collapse" style="">
                <li class=" @if($route = Route::current()->getName() == 'studentattendance-create') <?php echo "active" ?> @endif"><a href="{{route('studentattendance-create')}}"><i class="fas fa-plus"></i>Attendace Make</a></li>
                <li class=" @if($route = Route::current()->getName() == 'student-attendance-bymonth') <?php echo "active" ?> @endif"><a href="{{route('student-attendance-bymonth')}}"><i class="fas fa-eye"></i>Attendace View</a></li>
            </ul>
        </li>
            {{-- Semester --}}
            <li class=" @if($route = Route::current()->getName() == 'time-tables') <?php echo "active" ?> @endif"><a href="{{route('time-tables')}}"><i class="fa fa-table"></i>Time Tables</a></li>    
        @if(Auth::user()->GetRole() == 1 || Auth::user()->GetRole() == 2)    
            <li class=" @if($route = Route::current()->getName() == 'close-semester') <?php echo "active" ?> @endif"><a href="{{route('close-semester')}}"><i class="fa fa-cogs"></i>Year and Semester</a></li>
            <li class=" @if($route = Route::current()->getName() == 'staffapprovals-approve') <?php echo "active" ?> @endif"><a href="{{route('staffapprovals-approve')}}"><i class="fa fa-envelope"></i>Leave Approvals</a></li>
        @endif
        </ul>
        </div>
    </div>
<!--************************* Content start *****************************************-->
    <div class="content">
<!--************************* Navbar *****************************************-->
            <nav class="navbar navbar-expand ksrce-main-navbar">
        <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
        <p class="navbar-brand pt-4"> DASHBOARD</p>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="{{asset('img/profile_default_pic.png')}}" style="width:40px;border-radius:50px;">&nbsp{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                        <a href="{{ route('staffprofile.myprofile') }}" class="dropdown-item">Profile</a>
                        <a href="{{ route('staffapprovals-myapprovals') }}" class="dropdown-item">My Approvals</a>
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
    @yield('scripts')

</body>
</html>
