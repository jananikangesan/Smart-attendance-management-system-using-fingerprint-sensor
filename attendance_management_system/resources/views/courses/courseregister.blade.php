@extends('layouts.admin')
@section('pagetitle','Course')
@section('content')

<style>
    .a{
        float: center;
        padding-top: 2px;
         padding-left: 30%;
         font-weight: bold;
         font-family: 'Times New Roman', Times, serif      
    }
    .vl{
        border-left: 3px solid black;
        height: 340px;
        position: absolute ;
        /* left:34%; */
        margin-left:-1px;
        top:-1;
    }
    .card-header{
        font-size:40px;
        background-color:lightgray;
        float: center;
        padding-left: 5%;
        font-family: 'Times New Roman', Times, serif    
    }
    .card-body{
        padding-top: 30px;
    }
    .row-content{
        padding-top:40px; 
        float: center;
    }
    .card{
        border-color:rgb(203, 212, 229);     
    }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('COURSE REGISTER') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/course/store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row d-lg-none">
                                    <div class="col text-center">
                                        <img src="{{url('/image/uojlogo.png')}}" alt="image" height="200px" width="200px">
                                    </div>
                                    {{--<div class="col">
                                        <h1>UOJ</h1>
                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-12 d-none d-lg-block text-center">
                                        <img src="{{url('/image/uojlogo.png')}}" alt="image" height="200px" width="200px">
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-lg-12 d-none d-lg-block ">
                                        <h1 class="text-center display-3 ">UOJ</h1>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-lg-12 d-none d-lg-block ">
                                        <h4 class="text-center h4font ">JAFFNA</h4>
                                    </div>                       
                                </div>
                            </div>
                            <div class="col-lg-1 d-none d-lg-block">
                                <hr class="vl">
                            </div>

                            <div class="col-lg-7">     
                                <div class="form-group row">
                                    <label for="course_code" class="col-lg-4 col-form-label text-lg-right">{{ __('Course Code') }}</label>
                                    <div class="col-lg-6">
                                        <input id="course_code" type="text" class="form-control @error('course_code') is-invalid @enderror" name="course_code" value="{{ old('course_code') }}" placeholder="CSCXXXSX or CSCXXXGX" autocomplete="course_code">
                                        @error('course_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="course_name" class="col-lg-4 col-form-label text-lg-right">{{ __('Course Name') }}</label>
                                    <div class="col-lg-6">
                                        <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name') }}" placeholder="course name" required autocomplete="course_name">
                                        @error('course_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="course_level" class="col-lg-4 col-form-label text-lg-right">{{ __('Course Level') }}</label>
                                    <div class="col-lg-6">
                                        <select id="course_level" class="form-control @error('course_level') is-invalid @enderror" name="course_level">
                                            <option>Select Level</option>
                                            <option value="1S">1S</option>
                                            <option value="1G">1G</option>
                                            <option value="2S">2S</option>
                                            <option value="2G">2G</option>
                                            <option value="3S">3S</option>
                                            <option value="3G">3G</option>
                                            <option value="3M">3M</option>
                                            <option value="4S">4S</option>
                                            <option value="4M">4M</option>
                                        </select>
                                        @error('course_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lect_id" class="col-lg-4 col-form-label text-lg-right">{{ __('Lecturer') }}</label>
                                    <div class="col-lg-6">
                                        <select id="lect_id" class="form-control @error('lect_id') is-invalid @enderror" name="lect_id">
                                            <option>Select Lecturer</option>   
                                            @foreach($lecturers as $lecturer)
                                              <option value="{{$lecturer -> lect_id}}">{{$lecturer -> lect_title.$lecturer -> lect_name}}</option>
                                            @endforeach
                                        </select>
                                        {{--<input id="lect_id" type="text" class="form-control @error('lect_id') is-invalid @enderror" name="name" value="{{ old('lect_id') }}" required autocomplete="lect_id">--}}
                                        @error('lect_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="assistant_lect_id" class="col-lg-4 col-form-label text-lg-right">{{ __('Assistant Lecturer') }}</label>
                                    <div class="col-lg-6">
                                        <select id="assistant_lect_id" class="form-control @error('assistant_lect_id') is-invalid @enderror" name="assistant_lect_id">
                                            <option>Select Assistant Lecturer</option>   
                                            @foreach($alecturers as $alecturer)
                                                <option value="{{$alecturer -> lect_id}}">{{$lecturer -> lect_title.$alecturer -> lect_name}}</option>
                                            @endforeach
                                        </select>
                                        {{--<input id="assistant_lect_id" type="text" class="form-control @error('assistant_lect_id') is-invalid @enderror" name="assistant_lect_id" value="{{ old('assistant_lect_id') }}" required autocomplete="assistant_lect_id">--}}
                                        @error('assistant_lect_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="semester" class="col-lg-4 col-form-label text-lg-right">{{ __('Semester') }}</label>
                                    <div class="col-lg-6">
                                        <select id="semester" class="form-control @error('semester') is-invalid @enderror" name="semester">
                                            <option>Select Semester</option>
                                            <option value="1">Semester 1</option>
                                            <option value="2">Semester 2</option>
                                        </select>
                                        @error('semester')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-lg-6 offset-lg-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
