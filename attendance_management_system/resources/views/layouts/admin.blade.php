<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'SAMS')</title>
    <link rel = "icon" href ="http://lms.jfn.ac.lk/lms/pluginfile.php/1/core_admin/logo/0x150/1585272725/UoJ_logo.png" type = "image/x-icon"> 
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Righteous&display=swap" rel="stylesheet">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><img src="{{ asset('image/SAMS3.png') }}" width="120px" alt="..." class="img-fluid d-inline-block align-top"></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><img src="{{ asset('image/SAMS3.png') }}" width="120px" alt="..." class="img-fluid d-inline-block align-top"></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="fa fa-search"></i></a></li>
                <!-- Logout    -->
                <li class="nav-item">
                  <a href="{{ route('logout') }}" class="nav-link logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="d-none d-sm-inline">{{ __('Logout') }}</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    <i class="fa fa-sign-out"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{ URL::asset('/image/1.png') }}" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h3">{{ Auth::user()->name }}</h1>
              <i class="fa fa-circle text-success">Online</i>
            </div>
          </div>
          {{--<!-- Sidebar Navidation Menus--><span class="heading">Main</span>--}}
          <ul class="list-unstyled">
            <li class="active"><a href="/admin/home"> <i class="fa fa-home"></i>Dashboard</a></li>
            <li><a href="{{ url('/semester') }}"> <i class="fa fa-refresh"></i>Semester</a></li>
            <li><a href="{{ url('/level/update') }}"> <i class="fa fa-circle-o-notch"></i>Level</a></li>
            <li><a href="#registerdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-plus"></i>Register</a>
              <ul id="registerdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('/student') }}">Student</a></li>
                <li><a href="{{ url('/lecturer') }}">Lecturer</a></li>
                <li><a href="{{ url('/admin') }}">Admin</a></li>
              </ul>
            </li>
            <li><a href="{{ url('/course') }}"> <i class="fa fa-book"></i>Courses</a></li>
            <li><a href="#tablesdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-table"></i>Tables </a>
              <ul id="tablesdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('/tables/users') }}">User</a></li>
                <li><a href="{{ url('/tables/students') }}">Student</a></li>
                <li><a href="{{ url('/tables/lecturers') }}">Lecturer</a></li>
                <li><a href="{{ url('/tables/courses') }}">Courses</a></li>
              </ul>
            </li>
            <li><a href="#AttendancesdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-address-book-o"></i>Attendances</a>
              <ul id="AttendancesdropdownDropdown" class="collapse list-unstyled ">
                <li>
                  <a href="#Level1AttendancesdropdownDropdown" aria-expanded="false" data-toggle="collapse">level 1</a>
                  <ul id="Level1AttendancesdropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">1S</a></li>
                    <li><a href="#">1G</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#Level2AttendancesdropdownDropdown" aria-expanded="false" data-toggle="collapse">level 2</a>
                  <ul id="Level2AttendancesdropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">2S</a></li>
                    <li><a href="#">2G</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#Level3AttendancesdropdownDropdown" aria-expanded="false" data-toggle="collapse">level 3</a>
                  <ul id="Level3AttendancesdropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{ url('/attendance_3_s__students') }}">3S</a></li>
                    <li><a href="{{ url('/attendance_3_g__students') }}">3G</a></li>
                    <li><a href="{{ url('/attendance_3_m__students') }}">3M</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#Level4AttendancesdropdownDropdown" aria-expanded="false" data-toggle="collapse">level 4</a>
                  <ul id="Level4AttendancesdropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">4S</a></li>
                    <li><a href="#">4M</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            {{--<li><a href="{{url('/tables/level_courses')}}"> <i class="fa fa-bar-chart"></i>Semester</a></li>--}}
            {{--<li><a href="forms.html"> <i class="fa fa-clone"></i>Forms </a></li>--}}
            <li>
              <a href="{{ route('logout') }}" class="nav-link logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-in"></i>Login page
                  {{--<span>{{ __('Login page') }}</span>--}}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </a>
            </li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h1 class="no-margin-bottom">@yield('pagetitle')</h1>
            </div>
          </header>
          <div class="row d-none">
            <!-- HEADING-->
            <div class="col-xl-6 col-md-6 col-12">
                <div class="ml-1 py-5 titlel-box text-center">
                  <h1 class="display-1 h1font">SMART</h1>
                  <h1 class="display-2 h1font">ATTENDANCES</h1>
                  <h1 class="display-2 h1font">MANAGEMENT</h1>
                  <h1 class="display-1 h1font">SYSTEM</h1>
                </div>
            </div>
            <!-- IMAGE-->
            <div class="col-xl-6 col-md-6 col-12">
              <div class="m-5">
                <img src="{{url('/image/phone.png')}}" width="100%" height="100%" class="rounded mx-auto d-block" alt="Responsive image">
              </div>
            </div>
          </div>
          <!-- Addition content Section    -->
          <section>
            <div>
                @yield('content')
            </div>
          </section>
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">

                  <p>&copy;2020 <a href="http://www.csc.jfn.ac.lk/" class="external"> DEPARTMENT OF COMPUTER SCIENCE </a> ALL RIGHTS RESERVED - JAFFNA</p>

                </div>
                <div class="col-sm-6 text-right">
                  <p><a href="http://www.jfn.ac.lk/" class="external">UNIVERSITY OF JAFFNA</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/charts-home.js') }}"></script>
    <!-- Main File-->
    <script src="{{ asset('js/front.js') }}"></script>
  </body>
</html>