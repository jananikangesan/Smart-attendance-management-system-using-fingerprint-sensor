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
                    <div class="col-sm-6 text-center">
                        <p class="text-center"><b>Level: </b>3G</p>
                    </div>
                    <div class="col-sm-6 text-center">
                        <p class="text-center"><b>Semester: </b>{{ $semester }}</p>
                    </div>
                    
                </div>
            </div>
        </div>


        <div class="table-responsive" style="display:flex !important;">
            <table class="table table-striped table-hover table-bordered"  >
                <thead class="thead-dark" style="background: #053469; color:#fff;">
                    <tr>
                        <th colspan="3">Course Code</th>
                       
                        @foreach($course as $c)
                         @foreach($g3_hourssum as $hourssum)  
                           @if($hourssum->course_code ==$c->course_code )
                             <th colspan="2">
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
                        <th colspan="3">No.of Lecture Hours</th>
                       
                        @foreach($course as $c)
                         @foreach($g3_hourssum as $hourssum)  
                           @if($hourssum->course_code ==$c->course_code )
                             <th colspan="2">
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
                        <th>No</th>
                        <th>Registration No</th>
                        <th>Full Name</th>
                        @foreach($course as $c)
                         @foreach($g3_hourssum as $hourssum)  
                           @if($hourssum->course_code ==$c->course_code )
                             <th>Attn</th>
                             <th>%</th>
                            @endif  
                          @endforeach      
    
                        @endforeach   
                    </tr>
    
                </thead>
                <tbody style="background: #e3e6da; color:rgb(14, 13, 13);">
                    @php $i=1; @endphp
                @foreach($g3_st as $key => $g3st)
                    <tr>
                        <td>{{ $i }}</td>
                        @php $i=$i+1; @endphp
                        {{-- <td>{{$g3_st ->firstitem()+$key}}</td>  --}}
                        <td>{{ $g3st->st_regno }}</td>
                        <td>{{ $g3st->st_name }}</td>
    
                            @foreach($course as $c)     
                                @php  
                                  $st_hours=0; 
                                @endphp
    
                                @foreach($attendances as $attendance)
                                    @if($c->course_code == $attendance->course_code)
                                         @if (is_array($attendance->attendance_mark) || is_object($attendance->attendance_mark))
                                            @if(in_array( $g3st->st_regno,$attendance->attendance_mark))  
                                                    @php 
                                                        $st_hours=$st_hours+ $attendance->hours;
                                                    @endphp
                                            @endif
                                        @endif 
                                    @endif  
                                @endforeach
    
                                @foreach($g3_hourssum as $hourssum)  
                                    @if($hourssum->course_code ==$c->course_code )
                                        <td>
                                            @php 
                                                echo $st_hours;  
                                            @endphp 
                                        </td>
                                    @endif  
                                @endforeach 
    
                                @foreach($g3_hourssum as $hourssum)  
                                    @if($hourssum->course_code ==$c->course_code )
                                        <td>
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