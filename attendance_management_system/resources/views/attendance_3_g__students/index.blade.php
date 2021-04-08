@extends('level_3.3gcourse.3gcourses')
@section('pagetitle', 'Attandance/level3/3G')
@section('levelcontent')

        <div class="col-lg-12">
            <section class="landing">
                <hr />
                <div class="row">
                    <div class="col-6 d-flex justify-content-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn" data-toggle="modal" data-target="#weeklyModal" style="background:#8601af !important; color:#fff;">
                            3G Weekly Report
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="weeklyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">Weekly Report</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/3g/weeklyreport') }}" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="fromdate">From:</label>
                                                    <input type="date" class="form-control" name="fromdate"
                                                        id="fromdate" placeholder="From">
                                                </div>
                                                <div class="col">
                                                    <label for="todate">To:</label>
                                                    <input type="date" class="form-control" name="todate" id="todate"
                                                        placeholder="To">
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-end p-3">
                                                <button class="btn btn-info" type="submit">Get Report</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-flex justify-content-center">
                        <a class="btn" href="{{url('/3g/finalreport')}}" role="button" style="background:#8601af !important; color:#fff;">3G final report</a>
                        <form action="{{ url('/finalpdf3g') }}" method="POST" target="blank">
                            @csrf
                            
                        <button class="btn btn-primary" type="submit" ><i class="fa fa-download" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
                {{--<hr /> --}}
            </section>
        </div>

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('attendance_3_g__students.attendance_3_g__student.create') }}" class="btn btn-success" title="Create New Attendance 3 G  Student">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($attendance3GStudents) == 0)
            <div class="panel-body text-center">
                <h4>No Attendance 3G Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Date</th>
                            <th>Hours</th>
                            <th>Hall</th>
                            <th>Attendance Mark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($attendance3GStudents as $attendance3GStudent)
                        <tr>
                            <td>{{ $attendance3GStudent->course_code }}</td>
                            <td>{{ $attendance3GStudent->date }}</td>
                            <td>{{ $attendance3GStudent->hours }}</td>
                            <td>{{ $attendance3GStudent->hall }}</td>
                            {{--<td>{{ optional($attendance3SStudent->student)->st_regno }}</td>--}}
                            <td>
                                @if (is_array($attendance3GStudent->attendance_mark) || is_object($attendance3GStudent->attendance_mark))
                                
                                    @foreach($attendance3GStudent->attendance_mark as $student)
                                        {{$student}},
                                    @endforeach
                                @else
                                {{ __('zero attendance') }}
                                @endif  
                            </td>

                            <td>

                                <form method="POST" action="{!! route('attendance_3_g__students.attendance_3_g__student.destroy', $attendance3GStudent->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('attendance_3_g__students.attendance_3_g__student.show', $attendance3GStudent->id ) }}" class="btn btn-info" title="Show Attendance 3 S  Student">
                                            <i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('attendance_3_g__students.attendance_3_g__student.edit', $attendance3GStudent->id ) }}" class="btn btn-primary" title="Edit Attendance 3 S  Student">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Attendance 3 G  Student" onclick="return confirm(&quot;Click Ok to delete Attendance 3 G  Student.&quot;)">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $attendance3GStudents->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection