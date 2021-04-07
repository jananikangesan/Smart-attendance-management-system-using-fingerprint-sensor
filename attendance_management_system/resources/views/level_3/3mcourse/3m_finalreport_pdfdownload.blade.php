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
   {{-- <link rel="stylesheet" href="{{public_path('css/a.css') }}">  --}}
    
    <link rel="stylesheet" href="{{public_path('css/fontastic.css') }}">
    
    <link rel="stylesheet" href="{{public_path('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{public_path('css/custom.css') }}">
</head> 
<body>
    <div class="container">
        @if($m3_coursecount == 0)
        <div class="panel-body text-center">
            <hr />
            <h4>{{$course}} Attendance is not available.</h4>
        </div>
        @else
            <div class="col-sm-12" style="border: 5px solid; border-radius: 8px; padding:0px !important; margin-bottom:10px;">
                    <div class="row justify-content-center">
                       
                        <div class="col-sm-3 col-12 p-3 justify-content-center">
                            <div class="brand-text d-none d-lg-inline-block"><img src="{{public_path('image/DCS-logo.png') }}" width="200px" alt="..." class="img-fluid d-inline-block align-top"></div>
                            {{-- <div class="brand-text d-none d-sm-inline-block d-lg-none"><img src="{{public_path('image/SAMS.png') }}" width="200px" alt="..." class="img-fluid d-inline-block align-top"></div> --}}
                        </div>
                       
                    
                        <div class="col-sm-9 col-12">
                            <div class="row">
                                <div class="col-sm-12 text-center p-2">
                                    <h1 class="h1font">Percentage Report of the Attendance</h1>
                                </div>
                                <div class="col-sm-6">
                                    <p class="t-left"><b>Course Code: </b>{{ $course }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="t-left"><b>Course Name: </b>@foreach($m3_cname as $m3cname) {{ $m3cname->course_name }} @endforeach</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="t-left"><b>Level: </b>3M</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="t-left"><b>Lecturer Name: </b>@foreach($lecturer_name as $lname) {{$lname->lect_title. $lname -> lect_name}} @endforeach</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="t-left"><b>Number of Lecture Hours: </b>{{ $m3_hourssum ." hours"}}  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="display:flex !important;">
                        <table class="table table-striped table-hover " border="1px">
                            <thead class="thead-dark" style="background: #053469; color:#fff;">
                                <tr>
                                    <th>NO</th>
                                    <th>Registration No</th>
                                    <th>Student Name</th>
                                    <th>Total Number of Attended Lecture Hours</th>
                                    <th>Attendance Percentage(%)</th>
                                </tr>
                            </thead>
                            <tbody style="color:rgb(12, 11, 11);" >
                                @php $i=1; @endphp
                                @foreach($m3_st as $key => $m3st)
                                <tr>
                                    <td>{{ $i }}</td>
                                    @php $i=$i+1; @endphp
                                    {{-- <td>{{$s3_st ->firstitem()+$key}}</td> --}}
                                    <td>{{ $m3st->st_regno }}</td>
                                    <td>{{ $m3st->st_name }}</td>

                                    @php  
                                        $st_count=0; 
                                        $st_hours=0; 
                                    @endphp

                                    @foreach($attendances as $attendance)
                                        @if (is_array($attendance->attendance_mark) || is_object($attendance->attendance_mark))
                                    
                                            @if(in_array( $m3st->st_regno,$attendance->attendance_mark))  
                                                @php 
                                                    $st_count=$st_count+1; 
                                                    $st_hours=$st_hours+ $attendance->hours;
                                                @endphp
                                            @endif
                                        @endif  
                                    @endforeach
                                    <th> 
                                        @php 
                                            echo $st_hours;  
                                        @endphp 
                                    </th>
                                    <th>
                                        @php 
                                            if($m3_hourssum !=0)
                                            {
                                                $percentage= $st_hours /$m3_hourssum  ;
                                                echo round( $percentage*100,2);
                                            }
                                            else{
                                                echo 0; 
                                            }
                                        @endphp  
                                    </th> 
                            
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
            </div>
            {{-- {{ $s3_st->appends(request()->input())->links() }}   --}}
        @endif
    </div>
</body>
</html>