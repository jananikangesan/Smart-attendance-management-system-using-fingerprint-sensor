<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SAMS')</title>
    <link rel = "icon" href ="http://lms.jfn.ac.lk/lms/pluginfile.php/1/core_admin/logo/0x150/1585272725/UoJ_logo.png" type = "image/x-icon"> 
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Righteous&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- ALL CSS FILES -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="{{ asset('css/style-mob.css') }}" rel="stylesheet" />
</head>
<body>
    
<!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo-mob">
                        <a href="#!"><img src="{{ asset('image/SAMS.png') }}" alt="" width="100px">
                        </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            
                            <h4>{{-- Auth::user()->name --}}</h4>
                            <h4>{{ isset(Auth::user()->user) ? Auth::user()->user : 'Profile' }}</h4>
                            <ul>
                                @guest
                                    <li><a href="" data-toggle="modal" data-target="#modal10">{{ __('Sign In') }}</a></li>
                                    @if(Route::has('register'))
                                        <li><a href="" data-toggle="modal" data-target="#modal20">{{ __('Sign Up') }}</a></li>
                                    @endif
                                @else
                                    <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                    <li><a href="" data-toggle="modal" data-target="#modal40">{{ __('Password Change') }}</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="app">
        <div class="top-logo shadow-sm" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="#!"><img src="{{ asset('image/SAMS.png') }}" alt=""
                                    width="100px" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                @guest
                                    <li><a href="" data-toggle="modal" data-target="#modal10">Sign In</a></li>
                                    @if(Route::has('register'))
                                        <li><a href="" data-toggle="modal" data-target="#modal20">Sign Up</a></li>
                                    @endif
                                @else
                                    <li>
                                        <a href="{{ url('/') }}">{{ __('Home') }}</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <ul>
                                                <li>
                                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#modal40">Password Change</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </li>
                                @endguest
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- COPY RIGHTS -->
        <section class="wed-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-left" style="font-size:0.8em !important;">&copy;2020 DEPARTMENT OF COMPUTER SCIENCE ALL RIGHTS RESERVED - JAFFNA</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text"><a href="http://www.jfn.ac.lk/" class="external">UNIVERSITY OF JAFFNA</a></p>
                    </div>
                </div>
            </div>
        </section>
    
    </div>

<!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
    <section>
        <!-- LOGIN SECTION -->
        @include('partials.login')
        <!-- REGISTER SECTION -->
        @include('partials.register')
        <!-- FORGOT SECTION -->
        @include('partials.forget_password')
        <!-- PASSWORD CHANGE SECTION -->
        @include('partials.password_change')
    </section>

    <!--Import jQuery before materialize.js-->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    @yield('scripts')
</body>
</html>