@extends('level_3.3mcourse.3mcourses')
@section('pagetitle', 'Attandance/level3/3M')
@section('levelcontent')

    <div class="row justify-content-center">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">

                <div class="pull-right">

                    <form method="POST"
                        action="{!! route('attendance_3_m__students.attendance_3_m__student.destroy', $attendance3MStudent->id) !!}"
                        accept-charset="UTF-8">
                        <input name="_method" value="DELETE" type="hidden">
                        {{ csrf_field() }}
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('attendance_3_m__students.attendance_3_m__student.index') }}"
                                class="btn btn-primary" title="Show All Attendance 3 M  Student">
                                <i class="fa fa-th-list" aria-hidden="true"></i>
                            </a>

                            <a href="{{ route('attendance_3_m__students.attendance_3_m__student.create') }}"
                                class="btn btn-success" title="Create New Attendance 3 M  Student">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>

                            <a href="{{ route('attendance_3_m__students.attendance_3_m__student.edit', $attendance3MStudent->id ) }}"
                                class="btn btn-primary" title="Edit Attendance 3 M Student">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>

                            <button type="submit" class="btn btn-danger" title="Delete Attendance 3 M  Student"
                                onclick="return confirm(&quot;Click Ok to delete Attendance 3 M  Student.?&quot;)">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>

                </div>

            </div>

            <div class="panel-body">
                <section class="landing">
                        <h1 class="text-center">
                           
                            {{ $attendance3MStudent->course_code }}
                            {{':'}}
                            {{ $attendance3MStudent->date }}
                        </h1>
                        <hr/>
                        <dl class="row">
                            <dt class="col-sm-3 text-right">Course Code : </dt>
                            <dd class="col-sm-9 text-left">{{ $attendance3MStudent->course_code }}</dd>
                            <dt class="col-sm-3 text-right">Course Name : </dt>
                            <dd class="col-sm-9 text-left">
                                @foreach($m3_cname as $m3cname)
                                                  @if ($m3cname ->course_code ==  $attendance3MStudent->course_code )
                                                   {{ $m3cname->course_name }}
                                                  @endif
                                                @endforeach
                               </dd>
                            <dt class="col-sm-3 text-right">Date : </dt>
                            <dd class="col-sm-9 text-left">{{ $attendance3MStudent->date }}</dd>
                            <dt class="col-sm-3 text-right">Hours : </dt>
                            <dd class="col-sm-9 text-left">{{ $attendance3MStudent->hours }}</dd>
                            <dt class="col-sm-3 text-right">Hall : </dt>
                            <dd class="col-sm-9 text-left">{{ $attendance3MStudent->hall }}</dd>
                            <dt class="col-sm-3 text-right">Students : </dt>
                          
                            <dd class="col-sm-9 text-left">   
                            
                                     @if (is_array($attendance3MStudent->attendance_mark) || is_object($attendance3MStudent->attendance_mark))
                                     <table id="view" class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Registration No</th>
                                                <th>Student Name</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody> 
                                     @foreach($attendance3MStudent->attendance_mark as $student)
                                        <tr>          
                                        <td> {{ $student }} </td>
                                                @foreach($m3_reg as $m3reg)
                                                  @if ($m3reg ->st_regno == $student)
                                                   <td>  {{$m3reg ->st_name}} </td>
                                            
                                                  @endif
                                                @endforeach
                                        </tr> 
                                        @endforeach
                                
                            
                                    @else
                                        {{ __('zero attendance') }}
                                    @endif
                                   
                                </tbody> 
                            </table>     
                            </dd>
                        </dl>
                </section>
            </div>
        </div>
    </div>
@endsection