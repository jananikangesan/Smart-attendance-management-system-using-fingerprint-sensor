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
    @if($message = Session::get('error'))
        <script>
            $(function() {
                $('#modal10').modal({
                    show: true
                });
            });
        </script>
    @endif
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
                                    <li><a href="#!" data-toggle="modal" data-target="#modal10">{{ __('Sign In') }}</a></li>
                                    @if(Route::has('register'))
                                        <li><a href="#!" data-toggle="modal" data-target="#modal20">{{ __('Sign Up') }}</a></li>
                                    @endif
                                @else
                                    <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                    <li><a href="#!" data-toggle="modal" data-target="#modal40">{{ __('Password Change') }}</a></li>
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
                                    <li><a href="#!" data-toggle="modal" data-target="#modal10">Sign In</a></li>
                                    @if(Route::has('register'))
                                        <li><a href="#!" data-toggle="modal" data-target="#modal20">Sign Up</a></li>
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
                                                    <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#modal40">Password Change</a>
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
        <div id="modal10" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <div class="form-group row">
                        <div class="col-lg-12 d-none d-lg-block text-center">
                            <img src="{{ url('/image/uojlogo.png') }}" alt="image" height="200px"
                                width="200px">
                        </div>
                        <div class="w-100"></div>
                        <div class="col-lg-12 d-none d-lg-block">
                            <h1 class="text-center h1font" style="font-size:5.0em !important; padding-top:15px !important;">U O J</h1>
                        </div>
                        <div class="col-lg-12 d-none d-lg-block">
                            <h4 class="text-center h4font" style="font-size:2.0em !important; padding:15px !important;">JAFFNA</h4>
                        </div>
                    </div>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="{{ url('/image/cancel.png') }}" alt="" />
                    </a>
                    <h4>Login</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    @if($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form class="s12"method="POST" action="{{ route('login') }}">
                    @csrf
                        <div>
                            <div class="input-field s12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="required" autocomplete="email" autofocus="autofocus" placeholder = "E-mail">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="required" autocomplete="current-password" placeholder = "Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div>
                            <div class="s12 log-ch-bx">
                                <p>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Remember me</label>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
                                    data-target="#modal30">Forgot password</a> | <a href="#" data-dismiss="modal"
                                    data-toggle="modal" data-target="#modal20">Create a new account</a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- REGISTER SECTION -->
        <div id="modal20" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <div class="form-group row">
                        <div class="col-lg-12 d-none d-lg-block text-center">
                            <img src="{{ url('/image/uojlogo.png') }}" alt="image" height="200px"
                                width="200px">
                        </div>
                        <div class="w-100"></div>
                        <div class="col-lg-12 d-none d-lg-block">
                            <h1 class="text-center h1font" style="font-size:5.0em !important; padding-top:15px !important;">U O J</h1>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-lg-12 d-none d-lg-block">
                            <h4 class="text-center h4font" style="font-size:2.0em !important; padding:15px !important;">JAFFNA</h4>
                        </div>
                    </div>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="{{ url('/image/cancel.png') }}" alt="" />
                    </a>
                    <h4>Create an Account</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form class="s12" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div>
                            <div class="input-field s12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="User Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">
                                <p id="passwordHelpBlock" class="form-text text-muted" style="font-size:1.0em !important; color:#0000A0">
                                    Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
                                </p>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Conform Password">
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Register" class="waves-effect waves-light log-in-btn">
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
                                    data-target="#modal10">Are you a already member ? Login</a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- FORGOT SECTION -->
        <div id="modal30" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <div class="form-group row">
                        <div class="col-lg-12 d-none d-lg-block text-center">
                            <img src="{{ url('/image/uojlogo.png') }}" alt="image" height="200px"
                                width="200px">
                        </div>
                        <div class="w-100"></div>
                        <div class="col-lg-12 d-none d-lg-block">
                            <h1 class="text-center h1font" style="font-size:5.0em !important; padding-top:15px !important;">U O J</h1>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-lg-12 d-none d-lg-block">
                            <h4 class="text-center h4font" style="font-size:2.0em !important; padding:15px !important;">JAFFNA</h4>
                        </div>
                    </div>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                    </a>
                    <h4>Forgot password</h4>
                    <p style="color:red">please contact the site administrator.</p>
                    {{--<form class="s12" method="POST" action="{{ route('password.email') }}">
                    @csrf
                        <div>
                            <div class="input-field s12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Submit" class="waves-effect waves-light log-in-btn"> </div>
                        </div>
                        
                    </form>--}}
                    <hr />
                    <div>
                        <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
                            data-target="#modal10">Are you a already member ? Login</a> | <a href="#"
                            data-dismiss="modal" data-toggle="modal" data-target="#modal20">Create a new
                            account</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PASSWORD CHANGE SECTION -->
        <div id="modal40" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <div class="form-group row">
                        <div class="col-lg-12 d-none d-lg-block text-center">
                            <img src="{{ url('/image/uojlogo.png') }}" alt="image" height="200px"
                                width="200px">
                        </div>
                        <div class="w-100"></div>
                        <div class="col-lg-12 d-none d-lg-block">
                            <h1 class="text-center h1font" style="font-size:5.0em !important; padding-top:15px !important;">U O J</h1>
                        </div>
                        <div class="col-lg-12 d-none d-lg-block">
                            <h4 class="text-center h4font" style="font-size:2.0em !important; padding:15px !important;">JAFFNA</h4>
                        </div>
                    </div>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="{{ url('/image/cancel.png') }}" alt="" />
                    </a>
                    <h4>Change Password with Current Password</h4>
                    {{--<p>Don't have an account? Create your account. It's take less then a minutes</p>--}}
                    <form class="s12"method="POST" action="{{ route('change.password') }}">
                    @csrf
                        <div>
                            <div class="input-field s12">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password" required="required" autofocus="autofocus" placeholder = "Current Password">
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" required="required" autofocus="autofocus" placeholder = "New Password">
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password" required="required" autofocus="autofocus" placeholder = "New Confirm Password">
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Update Password" class="waves-effect waves-light log-in-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Import jQuery before materialize.js-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>