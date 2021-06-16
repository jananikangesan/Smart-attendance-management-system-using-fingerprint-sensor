@extends('layouts.admin')
@section('pagetitle','Courses')
@section('content')
<div class="container-fluid"> 
        <div class="row">
            <div class="col-sm-12">
                <div style="margin: 15px;" class="row">
                    <div class="col-sm-4">
                        <a href="{{ url('/course') }}"
                            class="btn btn-primary">New Course</a>
                    </div>
                    <div class="col-sm-4 offset-sm-4">
                        <form action="{{ url('/tables/courses') }}" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_course" placeholder="Search course and just enter"> <span
                                    class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="coursetable" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Course ID</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Course Level</th>
                            <th>Lecturer Name</th>
                            <th>Assistant Lecturer Name</th>
                            <th colspan=2>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->course_id }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->course_level }}</td>
                            {{--<td>{{ $course->lect_id }}</td>--}}
                            <td>
                            @foreach($lecturers as $lecturer)
                                @if($course->lect_id == $lecturer -> lect_id)
                                    {{$lecturer -> lect_title. $lecturer -> lect_name }}
                                @endif
                            @endforeach
                            </td>
                            {{--<td>{{ $course->assistant_lect_id }}</td>--}}
                            <td>
                            @foreach($lecturers as $lecturer)
                                @if($course->assistant_lect_id == $lecturer -> lect_id)
                                    {{$lecturer -> lect_title . $lecturer -> lect_name }}
                                @endif
                            @endforeach
                            </td>
                            <td>
                                <a href="{{ route('course_edit', ['id' => $course->course_id]) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('course_delete', ['id' => $course->course_id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
{{ $courses->links() }}
@endsection
