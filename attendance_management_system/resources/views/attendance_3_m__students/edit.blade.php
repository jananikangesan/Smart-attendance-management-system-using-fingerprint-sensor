@extends('level_3.3mcourse.3mcourses')
@section('pagetitle', 'Attandance/level3/3M')
@section('levelcontent')

    <div class="clearfix">
        <div class="btn-group btn-group-sm pull-right" role="group">
            <a href="{{ route('attendance_3_m__students.attendance_3_m__student.index') }}"
                class="btn btn-primary" title="Show All Attendance 3 M  Student">
                <span class="fa fa-th-list" aria-hidden="true"></span>
            </a>

            <a href="{{ route('attendance_3_m__students.attendance_3_m__student.create') }}"
                class="btn btn-success" title="Create New Attendance 3 M  Student">
                <span class="fa fa-plus" aria-hidden="true"></span>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('3M Attendance Update') }}
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row d-lg-none">
                                <div class="col text-center">
                                    <img src="{{ url('/image/uojlogo.png') }}" alt="image"
                                        height="200px" width="200px">
                                </div>
                            </div>
                        </div>
                       

            <div class="col-lg-12">
                <form method="POST"
                    action="{{ route('attendance_3_m__students.attendance_3_m__student.update', $attendance3MStudent->id) }}"
                    id="edit_attendance_3_m__student_form" name="edit_attendance_3_m__student_form"
                    accept-charset="UTF-8" class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    @include('attendance_3_m__students.form', [
                    'attendance3MStudent' => $attendance3MStudent,
                    ])

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input class="btn btn-primary" type="submit" value="Update">
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