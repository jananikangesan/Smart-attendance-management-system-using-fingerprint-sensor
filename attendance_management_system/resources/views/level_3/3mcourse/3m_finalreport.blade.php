@extends('level_3.3mcourse.3mcourses')
@section('pagetitle', 'Attandance/level3/3M/'.$course)
@section('levelcontent')
     
        @if($m3_coursecount == 0)
        <div class="panel-body text-center">
            <hr />
            <h4>{{$course}} Attendance is not available.</h4>
        </div>
        @else
            <div class="col-lg-12">
                <section class="landing">
                    <hr />
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center">
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#weeklyModal">
                                Weekly Report
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="weeklyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Weekly Report</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/weeklyreport3m') }}" method="POST" enctype="multpart/form-data">
                                                @csrf
                                                    <div class="form-row">
                                                        <input type="hidden" class="form-control" name="course" id="course" value="{{ $course }}">
                                                        <div class="col">
                                                            <label for="fromdate">From:</label>
                                                            <input type="date" class="form-control" name="fromdate" id="fromdate" placeholder="From">
                                                        </div>
                                                        <div class="col">
                                                            <label for="todate">To:</label>
                                                            <input type="date" class="form-control" name="todate" id="todate" placeholder="To">
                                                        </div>
                                                    </div>
                                                    <div class="form-row justify-content-end p-3">
                                                        <button class="btn btn-info mx-3" type="submit" name="action" value="get_report">Get Report</button>
                                                        <button class="btn btn-info" type="submit" name="action" value="download_pdf">Download <i class="fa fa-download" aria-hidden="true"></i></button>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <form action="{{ url('/finalreport3m') }}" method="POST">
                            @csrf
                                <div class="form-row">
                                    <input type="hidden" class="form-control" name="course" id="course" value="{{ $course }}">
                                </div>
                                    <button class="btn btn-info" type="submit">Final Report</button>
                            </form>

                            <form action="{{ url('/report3m') }}" method="POST" target="blank">
                                @csrf
                                    <div class="form-row">
                                        <input type="hidden" class="form-control" name="course" id="course" value="{{ $course }}">
                                    </div>
                                    <button class="btn btn-primary" type="submit" ><i class="fa fa-download" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        
                        
                    </div>
                    <hr />
                </section>
            </div>

            <div class="col-sm-12" style="border: 5px solid; border-radius: 8px; padding:0px !important; margin-bottom:10px;">
                    <div class="row justify-content-center">
                        <div class="col-sm-3 col-12 p-3 justify-content-center">
                            <div class="brand-text d-none d-lg-inline-block"><img src="{{ asset('image/SAMS.png') }}" width="200px" alt="..." class="img-fluid d-inline-block align-top"></div>
                            <div class="brand-text d-none d-sm-inline-block d-lg-none"><img src="{{ asset('image/SAMS.png') }}" width="200px" alt="..." class="img-fluid d-inline-block align-top"></div>
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
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark" style="background: #053469; color:#fff;">
                                <tr>
                                    <th>NO</th>
                                    <th>Registration No</th>
                                    <th>Student Name</th>
                                    <th>Total Number of Attended Lecture Hours</th>
                                    <th>Attendance Percentage(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                 {{-- @php $i=1; @endphp --}}
                                @foreach($m3_st as $key => $m3st)
                                <tr>
                                    {{-- <td>{{ $i }}</td> --}}
                                    {{-- @php $i=$i+1; @endphp --}}
                                    <td>{{$m3_st ->firstitem()+$key}}</td>
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
            {{ $m3_st->appends(request()->input())->links() }}  
        @endif      
@endsection