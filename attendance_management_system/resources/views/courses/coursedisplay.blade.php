@extends('layouts.admin')
@section('pagetitle','Courses')
@section('content')
<div class="container-fluid"> 
        <div class="row">
            <div class="col-sm-6">
                <div class="table-responsive">
                    <table id="coursetable" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            {{--<th>Course ID</th>--}}
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Semester</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($onescourses as $onescourse)
                        <tr>
                            {{--<td>{{ $onescourse->course_id }}</td>--}}
                            <td>{{ $onescourse->course_code }}</td>
                            <td>{{ $onescourse->course_name }}</td>
                            <td>{{ $onescourse->semester }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection
