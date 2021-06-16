@extends('layouts.admin')
@section('pagetitle','Lecturers')
@section('content')
<div class="container-fluid"> 
        <div class="row">
            <div class="col-sm-12">
                <div style="margin: 15px;" class="row">
                    <div class="col-sm-4">
                        <a href="{{ url('/user/create') }}"
                            class="btn btn-primary">New Lecturer</a>
                    </div>
                    <div class="col-sm-4 offset-sm-4">
                        <form action="{{ url('/tables/lecturers') }}" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_lect" placeholder="Search lecturer and just enter"> <span
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
                    <table id="lecturetable" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Lecturer ID</th>
                            <th>Lecturer Name</th>
                            <th>Lecturer Email</th>
                            <th>Position</th>
                            <th colspan=2>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lecturers as $lecturer)
                        <tr>
                            <td>{{ $lecturer->lect_id }}</td>
                            <td>{{$lecturer->lect_title . $lecturer->lect_name }}</td>
                            <td>{{ $lecturer->lect_email }}</td>
                            <td>{{ $lecturer->position }}</td>
                            <td>
                                <a href="{{ route('lecturer_edit', ['id' => $lecturer->lect_id]) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('lecturer_delete', ['id' => $lecturer->lect_id]) }}" method="post">
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
{{ $lecturers->links() }}
@endsection
