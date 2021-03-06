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
   {{-- <link rel="stylesheet" href="{{public_path('css/a.css') }}">--}}
    
    <link rel="stylesheet" href="{{public_path('css/fontastic.css') }}">
    
    <link rel="stylesheet" href="{{public_path('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{public_path('css/custom.css') }}">
    <style>
		/* Pattern styles */
		.left-half {
		  float: left;
		  width: 25%;
          margin: 1%;
		}
		.right-half {
		  float: left;
		  width: 70%;
          text-align: center;
          margin: 1%;
		}
    </style>
</head> 
<body>
    <div class="container">
        @if($coursecount == 0)
        <div class="panel-body text-center">
            <hr />
            <h4>{{$course}} Attendance is not available.</h4>
        </div>
        @else
            <div class="col-sm-12" style="border: 2px solid; border-radius: 8px; padding:0px !important; margin-bottom:10px;">
                <div>
                    <div class="left-half">
                        <img src="{{public_path('image/DCS-logo.png') }}" width="100%" alt="...">
                    </div>
                    <div class="right-half">
                        <h1 class="h1font" style="color:#000080;">Percentage Report of the Attendance</h1>
                    </div>
                </div>

                <div>
                    <table style="width:100%; margin-top: 8%;">
                        <tr>
                            <td><p class="t-left" style="color:#000080;"><b>Course Code: </b>{{ $course }}</p></td>
                            <td><p class="t-left" style="color:#000080;"><b>Course Name: </b>{{ $name}}</p></td>
                        </tr>
                        <tr>
                            <td><p class="t-left" style="color:#000080;"><b>Level: </b>{{ $level }}</p></td>
                            {{--<td><p class="t-left" style="color:#000080;"><b>Lecturer Name: </b>@foreach($lecturer_name as $lname) {{$lname->lect_title. $lname -> lect_name}} @endforeach</p></td>--}}
                        </tr>
                        <tr>
                            <td><p class="t-left" style="color:#000080;"><b>Number of Lecture Hours: </b>{{ $hourssum ." hours"}}</p></td>
                            @if(isset($from))
                                <td><p class="t-left" style="color:#000080;"><b>Period: </b>{{ $from }}<b><u> To </u></b>{{ $to }}</p></td>
                            @endif
                        </tr>
                    </table>
                </div>

                <div class="table-responsive" style="display:flex !important;">
                    <table class="table table-striped table-hover " >
                            <thead class="thead-dark" style="background: #053469; color:#fff;">
                                <tr>
                                    <th>NO</th>
                                    <th>Registration No</th>
                                    <th>Student Name</th>
                                    <th>Total Number of Attended Lecture Hours</th>
                                    <th>Attendance Percentage(%)</th>
                                </tr>
                            </thead>
                            <tbody style="background: #e3e6da; color:rgb(14, 13, 13);">
                                @php $i=1; @endphp
                                @foreach($st as $key => $s3st)
                                <tr>
                                    <td>{{ $i }}</td>
                                    @php $i=$i+1; @endphp
                                    {{-- <td>{{$st ->firstitem()+$key}}</td> --}}
                                    <td>{{ $s3st->st_regno }}</td>
                                    <td>{{ $s3st->st_name }}</td>

                                    @php  
                                        $st_count=0; 
                                        $st_hours=0; 
                                    @endphp

                                    @foreach($attendances as $attendance)
                                        @if (is_array($attendance->attendance_mark) || is_object($attendance->attendance_mark))
                                    
                                            @if(in_array( $s3st->st_regno,$attendance->attendance_mark))  
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
                                            if($hourssum !=0)
                                            {
                                                $percentage= $st_hours /$hourssum  ;
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
            {{-- {{ $st->appends(request()->input())->links() }}   --}}
        @endif
    </div>
</body>
</html>