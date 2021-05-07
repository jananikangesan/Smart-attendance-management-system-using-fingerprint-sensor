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
        .ta{
          border: 2px solid black;
          text-align: center;
        }

        table {
          width: 100%;
          border-collapse: collapse;
        }
    </style>
</head> 
<body>
    
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
                    <td><p class="t-left" style="color:#000080;"><b>Level: </b>3S</td>
                    <td><p class="t-left" style="color:#000080;"><b>Semester: </b>{{ $semester }}</td>
                </tr>
                @if(isset($to))
                <tr>
                    <td><p class="t-left" style="color:#000080;"><b>Period: </b>{{ $from }}<b><u> To </u></b>{{ $to }}</p></td>
                </tr>
                @endif
            </table>
        </div>
    </div>
    <div>
        <div class="table-responsive" style="display:flex !important;">
            <table class="table table-striped table-hover table-bordered ta">
                <thead class="thead-dark" style="background: #053469; color:#fff;">
                    <tr class="ta">
                        <th colspan="3" class="ta">Course Code</th>
                       
                        @foreach($course as $c)
                         @foreach($s3_hourssum as $hourssum)  
                           @if($hourssum->course_code ==$c->course_code )
                             <th colspan="2" class="ta">
                               @php 
                                 if($hourssum ->sum !=0)
                                 {
                                  echo   $c->course_code;
                                 }
                                @endphp  
                             </th>
                            @endif  
                          @endforeach      
    
                        @endforeach   
                    </tr>
    
                    <tr>
                        <th colspan="3" class="ta">No.of Lecture Hours</th>
                       
                        @foreach($course as $c)
                         @foreach($s3_hourssum as $hourssum)  
                           @if($hourssum->course_code ==$c->course_code )
                             <th colspan="2" class="ta">
                               @php 
                                 if($hourssum ->sum !=0)
                                 {
                                  echo $hourssum ->sum ;
                                 }
                                @endphp  
                             </th>
                            @endif  
                          @endforeach      
    
                        @endforeach   
                    </tr>
                    
                    <tr>
                        <th class="ta">No</th>
                        <th class="ta">Registration No</th>
                        <th class="ta">Full Name</th>
                        @foreach($course as $c)
                         @foreach($s3_hourssum as $hourssum)  
                           @if($hourssum->course_code ==$c->course_code )
                             <th class="ta">Attn</th>
                             <th class="ta">%</th>
                            @endif  
                          @endforeach      
    
                        @endforeach   
                    </tr>
    
                </thead>
                <tbody style="background: #e3e6da; color:rgb(14, 13, 13);">
                    @php $i=1; @endphp
                @foreach($s3_st as $key => $s3st)
                    <tr>
                        <td class="ta">{{ $i }}</td>
                                    @php $i=$i+1; @endphp
                        {{-- <td>{{$s3_st ->firstitem()+$key}}</td>  --}}
                        <td class="ta">{{ $s3st->st_regno }}</td>
                        <td class="ta">{{ $s3st->st_name }}</td>
    
                            @foreach($course as $c)     
                                @php  
                                  $st_hours=0; 
                                @endphp
    
                                @foreach($attendances as $attendance)
                                    @if($c->course_code == $attendance->course_code)
                                         @if (is_array($attendance->attendance_mark) || is_object($attendance->attendance_mark))
                                            @if(in_array( $s3st->st_regno,$attendance->attendance_mark))  
                                                    @php 
                                                        $st_hours=$st_hours+ $attendance->hours;
                                                    @endphp
                                            @endif
                                        @endif 
                                    @endif  
                                @endforeach
    
                                @foreach($s3_hourssum as $hourssum)  
                                    @if($hourssum->course_code ==$c->course_code )
                                        <td class="ta">
                                            @php 
                                                echo $st_hours;  
                                            @endphp 
                                        </td class="ta">
                                    @endif  
                                @endforeach 
    
                                @foreach($s3_hourssum as $hourssum)  
                                    @if($hourssum->course_code ==$c->course_code )
                                        <td class="ta">
                                            @php 
                                                if($hourssum ->sum !=0)
                                                {
                                                    $percentage= $st_hours /$hourssum->sum  ;
                                                    echo round( $percentage*100,2);
                                                }
                                                else{
                                                    echo 0; 
                                                }
                                            @endphp  
                                        </td>
                                    @endif  
                                @endforeach   
                            @endforeach
                    </tr> 
                @endforeach 
                </tbody>
            </table>  
        </div>          
    </div>
        
</body>
</html>