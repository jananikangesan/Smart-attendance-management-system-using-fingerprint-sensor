@extends('layouts.admin')
@section('pagetitle','Students')
@section('content')
<div class="container-fluid"> 
        <div class="row">
            <div class="col-sm-12">
                <div style="margin: 15px;" class="row">
                    <div class="col-sm-4">
                        <a href="{{ url('/student') }}"
                            class="btn btn-primary">New Student</a>
                    </div>
                    <div class="col-sm-4 offset-sm-4">
                        <form action="{{ url('/tables/students') }}" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_student" placeholder="Search student and just enter"> <span
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
                    <table id="studenttable" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Student Registration</th>
                            <th>Student Level</th>
                            <th>academic year</th>
                            <th>Fingerprint ID</th>
                             <th colspan=2>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->st_id }}</td>
                            <td>{{ $student->st_name }}</td>
                            <td>{{ $student->st_regno }}</td>
                            <td>{{ $student->st_level }}</td>
                            <td>{{ $student->st_acyear }}</td>
                            <td>{{ $student->st_fid }}</td>
                            <td>
                                <a href="{{ route('student_edit', ['id' => $student->st_id]) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('student_delete', ['id' => $student->st_id]) }}" method="post">
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
{{ $students->links() }}
@endsection
