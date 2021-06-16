@extends('lecturer_dashboard.lecturer')
@section('lecturercontent')

<!--SECTION START-->
<div class="udb">
    <div class="udb-sec udb-cour-stat">
        <h4><img src="images/icon/db3.png" alt="" /> Course Status</h4>
        @if($coursecount == 0)
            <div class="panel-body text-center">
                <h4>{{$course}} Attendance is not available.</h4>
            </div>
        @else
        <div class="row">
            <div class="col-xs-6">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#weeklyModal">Weekly Report</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="weeklyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Weekly Report</h3>
                                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>--}}
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/weeklyatt') }}" method="POST" enctype="multpart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <input type="hidden" class="form-control" name="course" id="course" value="{{ $course }}">
                                        <input type="hidden" name="course_level" value="{{ $level}}">
                                        <input type="hidden" name="course_name" value="{{ $name}}">
                                        <div class="col-xs-6">
                                            <label for="fromdate">From:</label>
                                            <input type="date" class="form-control" name="fromdate" id="fromdate"
                                                placeholder="From">
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="todate">To:</label>
                                            <input type="date" class="form-control" name="todate" id="todate"
                                                placeholder="To">
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
            <div class="col-xs-6">
                <div class="d-flex justify-content-center">
                    <form action="{{ url('/att') }}" method="POST" target="blank" enctype="multpart/form-data">
                        @csrf
                        <div class="form-row">
                            <input type="hidden" class="form-control" name="course" id="course" value="{{ $course }}">
                            <input type="hidden" name="course_level" value="{{ $level}}">
                            <input type="hidden" name="course_name" value="{{ $name}}">
                        </div>
                        <button class="btn btn-info mx-3" type="submit" name="action" value="get_report">Get Report</button>
                        <button class="btn btn-primary" type="submit" name="action" value="download_pdf"><i class="fa fa-download" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="pro-con-table">
            <div class="col-sm-12" style="border: 5px solid; border-radius: 8px; padding:0px !important; margin-bottom:10px;">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-12">
                        <div class="row">
                            <div class="col-sm-12 text-center p-2">
                                <h1 class="h1font" style="line-height: 1.2;">Percentage Report of the Attendance</h1>
                            </div>
                            <div class="col-sm-6">
                                <p class="t-left"><b>Course Code: </b>{{ $course }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="t-left"><b>Course Name: </b>{{ $name }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="t-left"><b>Level: </b>{{ $level }}</p>
                            </div>
                            <div class="col-sm-6">
                                @if(isset($from))
                                <td><p class="t-left"><b>Period: </b>{{ $from }}<b><u> To </u></b>{{ $to }}</p></td>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <p class="t-left"><b>Number of Lecture Hours: </b>{{ $hourssum ." hours"}} </p>
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
                            @foreach($st as $key => $s3st)
                            <tr>
                                {{-- <td>{{ $i }}</td> --}}
                                {{-- @php $i=$i+1; @endphp --}}
                                <td>{{$st ->firstitem()+$key}}</td>
                                <td>{{ $s3st->st_regno }}</td>
                                <td>{{ $s3st->st_name }}</td>

                                @php
                                $st_count=0;
                                $st_hours=0;
                                @endphp

                                @foreach($attendances as $attendance)
                                @if (is_array($attendance->attendance_mark) ||
                                is_object($attendance->attendance_mark))

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
                                    $percentage= $st_hours /$hourssum ;
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
        </div>
        @endif
    </div>
    {{ $st->appends(request()->input())->links() }}             
</div>
<!--SECTION END-->
 
@endsection