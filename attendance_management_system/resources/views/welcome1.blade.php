<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Smart Attendance Management System</title>
        <link rel = "icon" href ="http://lms.jfn.ac.lk/lms/pluginfile.php/1/core_admin/logo/0x150/1585272725/UoJ_logo.png" type = "image/x-icon"> 
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            <div class="content py-5">
                <div class="container-fluid float-left">
                    <!-- </div> -->
                    <!-- Counts Section -->
                    <section class="dashboard-counts section-padding">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- HEADING-->
                                <div class="col-md-6 col-sm-12">
    
                                    <div class="ml-1 py-5 text-center">
                                        <h1>SMART</h1>
                                        <h1>ATTENDANCES</h1>
                                        <h1>MANAGEMENT</h1>
                                        <h1>SYSTEM</h1>
                                    </div>
    
                                    <div class="row ml-1 py-5">
                                        <!-- Count item widget-->
                                        {{--<div class="col-xl-3 col-md-3 col-6">
                                            <div class="wrapper count-title d-flex"></div>
                                        </div>--}}
                                        <!-- Count item widget-->
                                        <div class="col-md-4 col-4 flex-center">
                                            <div class="wrapper count-title d-flex">
                                                <div class="count-number">
                                                    <h2>400+</h2>
                                                    <div class="name Count_name">students</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Count item widget-->
                                        <div class="col-md-4 col-4 flex-center">
                                            <div class="wrapper count-title d-flex">
                                                <div class="count-number">
                                                    <h2>50+</h2>
                                                    <div class="name Count_name">lectures</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Count item widget-->
                                        <div class="col-md-4 col-4 flex-center">
                                            <div class="wrapper count-title d-flex">
                                                <div class="count-number">
                                                    <h2>100+</h2>
                                                    <div class="name Count_name">couress</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                                <!-- IMAGE-->
                                <div class="col-md-6 col-sm-12">
                                    <div class="m-5">
                                        <img
                                            src="{{url('/image/phone.png')}}"
                                            width="80%"
                                            height="100%"
                                            class="rounded mx-auto d-block"
                                            alt="Responsive image">
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </section>
                    <!-- <hr style="width: 100%; color: black; height: 1px; background-color:black;"
                    /> -->
                </div>
            </div> 
          </div>
    </body>
</html>
