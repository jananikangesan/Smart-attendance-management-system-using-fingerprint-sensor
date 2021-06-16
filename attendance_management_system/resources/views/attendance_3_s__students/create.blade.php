@extends('level_3.3scourse.3scourses')
@section('pagetitle', 'Attandance/level3/3S')
@section('levelcontent')
<div class="clearfix">
    <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('attendance_3_s__students.attendance_3_s__student.index') }}"
            class="btn btn-primary" title="Show All Attendance 3 S  Student">
            <span class="fa fa-th-list" aria-hidden="true"></span>
        </a>
    </div>
</div>
<div class="row justify-content-center"> 
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center">
                {{ __('Create 3S Attendance ') }}
            </div>
            <div class="card-body">

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row d-lg-none">
                                <div class="col text-center">
                                    <img src="{{url('/image/uojlogo.png')}}" alt="image" height="200px" width="200px">
                                </div>
                            </div>
                        </div>
                        {{--<div class="col-lg-4">
                            <div class="form-group row">
                                <div class="col-lg-12 d-none d-lg-block text-center">
                                    <img src="{{url('/image/uojlogo.png')}}" alt="image" height="200px" width="200px">
                                </div>
                                <div class="w-100"></div>
                                <div class="col-lg-12 d-none d-lg-block">
                                    <h1 class="text-center display-3">UOJ</h1>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-lg-12 d-none d-lg-block">
                                    <h4 class="text-center h4font">JAFFNA</h4>
                                </div>                       
                            </div>
                        </div>
                        <div class="col-lg-1 d-none d-lg-block">
                            <hr class="vl">
                        </div>--}}

                        <div class="col-lg-12">
                        <form method="POST" action="{{ route('attendance_3_s__students.attendance_3_s__student.store') }}" accept-charset="UTF-8" id="create_attendance_3_s__student_form" name="create_attendance_3_s__student_form" class="form-horizontal">
                            {{ csrf_field() }}
                            @include ('attendance_3_s__students.form', [
                                                        'attendance3SStudent' => null,
                                                    ])

                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input class="btn btn-primary" type="submit" value="Add">
                                    </div>
                                </div>

                        </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


{{--    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Create New Attendance 3 S  Student</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('attendance_3_s__students.attendance_3_s__student.index') }}" class="btn btn-primary" title="Show All Attendance 3 S  Student">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('attendance_3_s__students.attendance_3_s__student.store') }}" accept-charset="UTF-8" id="create_attendance_3_s__student_form" name="create_attendance_3_s__student_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('attendance_3_s__students.form', [
                                        'attendance3SStudent' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>
--}}
@endsection


