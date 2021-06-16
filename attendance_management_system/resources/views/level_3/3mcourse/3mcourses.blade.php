@extends('layouts.admin')
@section('pagetitle', 'Attandance/level3/3M')
@section('content')
<div class="container-fluid"> 
    <div class="row bg-white has-shadow pt-3">
        <div class="col-lg-12">
            <div class="row card-deck">
            @if(isset($m3_courses))
            @foreach($m3_courses as $m3_course)
            <div class="col-lg-2 col-md-4 col-4">
                <div class="card text-white bg-dark" style="border-radius: 5%;">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/attendance3m') }}">
                        @csrf
                            <div class="form-group row">
                                <input id="m3_course" type="text" class="d-none form-control" name="m3_course" value="{{ $m3_course->course_code }}" required autocomplete="m3_course">
                                    <button type="submit" class="btn btn-dark btn-sm btn-block text-center buttonfont">
                                    {{$m3_course->course_code}}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            </div>
        </div>
        
            <div class="col-lg-12">
                @yield('levelcontent')
            </div>
    </div>
</div>    

@endsection