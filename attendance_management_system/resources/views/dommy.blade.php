<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SAMS')</title>
    <link rel = "icon" href ="http://lms.jfn.ac.lk/lms/pluginfile.php/1/core_admin/logo/0x150/1585272725/UoJ_logo.png" type = "image/x-icon"> 
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ public_path('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    {{-- <link rel="stylesheet" href="{{public_path('vendor/font-awesome/css/font-awesome.min.css') }}"> --}}
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ public_path('css/fontastic.css') }}">
    <!-- Google fonts - Poppins -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Righteous&display=swap" rel="stylesheet"> --}}
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ public_path('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ public_path('css/custom.css') }}">
</head>
<body>
    <div class="container">
            <div class="col-sm-12" style="border: 5px solid; border-radius: 8px; padding:0px !important; margin-bottom:10px;">
                    <div class="row justify-content-center">
                        
                        <div class="col-sm-9 col-12">
                            <div class="row">
                                <div class="col-sm-6 text-center p-2">
                                    <h1 class="h1font">Percentage Report of the Attendance</h1>
                                </div>
                               
                               
                                <div class="col-sm-6">
                                    <p class="t-left"><b>Level: </b>3S</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="display:flex !important;">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark" style="background: #053469; color:#fff;">
                                <tr>
                                    <th>NO</th>
                                    <th>Student Name</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>abc</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>          
    </div>
</body>
</html>