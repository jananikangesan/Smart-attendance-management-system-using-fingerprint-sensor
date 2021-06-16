@extends('level_3.3mcourse.3mcourses')
@section('pagetitle', 'Attandance/level3/3M')
@section('levelcontent')

        <div class="col-lg-12">
            <section class="landing">
                <hr />
                <div class="row">
                    <div class="col-6 d-flex justify-content-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn" data-toggle="modal" data-target="#weeklyModal" style="background:#8601af !important; color:#fff;">
                            3M Weekly Report
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
                                        <form action="{{ url('/3m/weeklyreport') }}" method="POST" enctype="multpart/form-data">
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
                                                {{--<button class="btn btn-info" type="submit">Get Report</button>--}}
                                                <button class="btn btn-info mx-3" type="submit" name="action" value="get_report">Get Report</button>
                                                <button class="btn btn-info" type="submit" name="action" value="download_pdf">Download <i class="fa fa-download" aria-hidden="true"></i></button>
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
                        <a class="btn" href="{{url('/3m/finalreport')}}" role="button" style="background:#8601af !important; color:#fff;">3M final report</a>
                        <form action="{{ url('/finalpdf3m') }}" method="POST" target="blank">
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
                <a href="{{ route('attendance_3_m__students.attendance_3_m__student.create') }}" class="btn btn-success" title="Create New Attendance 3 M  Student">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($attendance3MStudents) == 0)
            <div class="panel-body text-center">
                <h4>No Attendance 3M Available.</h4>
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
                    @foreach($attendance3MStudents as $attendance3MStudent)
                        <tr>
                            <td>{{ $attendance3MStudent->course_code }}</td>
                            <td>{{ $attendance3MStudent->date }}</td>
                            <td>{{ $attendance3MStudent->hours }}</td>
                            <td>{{ $attendance3MStudent->hall }}</td>
                            
                            <td>
                                @if (is_array($attendance3MStudent->attendance_mark) || is_object($attendance3MStudent->attendance_mark))
                                
                                    @foreach($attendance3MStudent->attendance_mark as $student)
                                        {{$student}},
                                    @endforeach
                                @else
                                {{ __('zero attendance') }}
                                @endif  
                            </td>

                            <td>

                                <form method="POST" action="{!! route('attendance_3_m__students.attendance_3_m__student.destroy', $attendance3MStudent->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('attendance_3_m__students.attendance_3_m__student.show', $attendance3MStudent->id ) }}" class="btn btn-info" title="Show Attendance 3 M  Student">
                                            <i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('attendance_3_m__students.attendance_3_m__student.edit', $attendance3MStudent->id ) }}" class="btn btn-primary" title="Edit Attendance 3 M  Student">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Attendance 3 M  Student" onclick="return confirm(&quot;Click Ok to delete Attendance 3 M  Student.&quot;)">
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
            {!! $attendance3MStudents->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection