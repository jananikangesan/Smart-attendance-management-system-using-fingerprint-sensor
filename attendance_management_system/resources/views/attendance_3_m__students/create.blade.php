@extends('level_3.3mcourse.3mcourses')
@section('pagetitle', 'Attandance/level3/3M')
@section('levelcontent')
<div class="clearfix">
    <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('attendance_3_m__students.attendance_3_m__student.index') }}"
            class="btn btn-primary" title="Show All Attendance 3 M  Student">
            <span class="fa fa-th-list" aria-hidden="true"></span>
        </a>
    </div>
</div>
<div class="row justify-content-center"> 
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center">
                {{ __('Create 3M Attendance ') }}
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
                        <div class="col-lg-12">
                        <form method="POST" action="{{ route('attendance_3_m__students.attendance_3_m__student.store') }}" accept-charset="UTF-8" id="create_attendance_3_m__student_form" name="create_attendance_3_m__student_form" class="form-horizontal">
                            {{ csrf_field() }}
                            @include ('attendance_3_m__students.form', [
                                                        'attendance3MStudent' => null,
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
@endsection


