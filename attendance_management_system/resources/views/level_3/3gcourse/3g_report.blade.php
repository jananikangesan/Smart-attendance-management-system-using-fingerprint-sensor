@extends('level_3.3gcourse.3gcourses')
@section('pagetitle', 'Attandance/level3/3G/final-report')
@section('levelcontent')

<div class="col-sm-12" style="border: 5px solid; border-radius: 8px; padding:0px !important; margin-bottom:10px;">
    <div class="row justify-content-center">
        <div class="col-sm-3 col-12 p-3 justify-content-center">
            <div class="brand-text d-none d-lg-inline-block"><img
                    src="{{ asset('image/SAMS.png') }}" width="200px" alt="..."
                    class="img-fluid d-inline-block align-top"></div>
            <div class="brand-text d-none d-sm-inline-block d-lg-none"><img
                    src="{{ asset('image/SAMS.png') }}" width="200px" alt="..."
                    class="img-fluid d-inline-block align-top"></div>
        </div>
        <div class="col-sm-9 col-12">
            <div class="row">
                <div class="col-sm-12 text-center p-2">
                    <h1 class="h1font">Percentage Report of the Attendance</h1>
                </div>
                <div class="col-sm-6 text-center">
                    <p class="text-center"><b>Department: </b>Department of Computer Science</p>
                </div>
                <div class="col-sm-6 text-center">
                    <p class="text-center"><b>Level: </b>3G</p>
                </div>
                <div class="col-sm-6 text-center">
                    <p class="text-center"><b>Semester: </b>{{ $semester }}</p>
                </div>
                @if(isset($to))
                <div class="col-sm-6">
                    <p class="text-center"><b>Period: </b>{{ $from }}<b><u> To </u></b>{{ $to }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="table-responsive" style="display:flex !important;">
        <table class="table table-striped table-hover table-bordered">
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
            <tbody>
            @foreach($g3_st as $key => $g3st)
                <tr>
                    <td>{{$g3_st ->firstitem()+$key}}</td> 
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
    {{ $g3_st->appends(request()->input())->links() }}
@endsection