@extends('layouts.admin')
@section('pagetitle','Lecturer')
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
    height: 300px;
    position: absolute ;
    left:43%;
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
  
}

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('LECTURER REGISTER') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/lecturer/store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row d-lg-none">
                                    <div class="col text-center">
                                        <img src="{{url('/image/uojlogo.png')}}" alt="image" height="200px" width="200px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-12 d-none d-lg-block text-center">
                                        <img src="{{url('/image/uojlogo.png')}}" alt="image" height="200px" width="200px">
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-lg-12 d-none d-lg-block">
                                        <h1 class="text-center display-3 ">UOJ</h1>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-lg-12 d-none d-lg-block">
                                        <h4 class="text-center h4font">JAFFNA</h4>
                                    </div>                       
                                </div>
                            </div>
                            <div class="col-lg-1 d-none d-lg-block">
                                <hr class="vl">
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group row">
                                    <label for="lect_title" class="col-lg-4 col-form-label text-lg-right">{{ __('Title') }}</label>
                                    <div class="col-lg-6">
                                        <select id="lect_title" class="form-control @error('lect_title') is-invalid @enderror" name="lect_title">
                                            <option>Select Title</option>
                                            <option value="Mr.">Mr</option>
                                            <option value="Mrs.">Mrs</option>
                                            <option value="Miss.">Miss</option>
                                            <option value="Dr.">Dr</option>
                                            <option value="Prof.">Prof</option>
                                            <option value="Rev.">Rev</option>
                                        </select>
                                        @error('lect_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="lect_name" class="col-lg-4 col-form-label text-lg-right">{{ __('lecturer Name') }}</label>
                                    <div class="col-lg-6">
                                        <input id="lect_name" type="text" class="form-control @error('lect_name') is-invalid @enderror" name="lect_name" value="{{ old('lect_name') }}" placeholder="name" required autocomplete="lect_name">
                                        @error('lect_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lect_email" class="col-lg-4 col-form-label text-lg-right">{{ __('Email Address') }}</label>
                                    <div class="col-lg-6">
                                        <input id="lect_email" type="text" class="form-control @error('lect_email') is-invalid @enderror" name="lect_email" value="{{ old('lect_email') }}" placeholder="email" required autocomplete="lect_email">
                                        @error('lect_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="position[]" class="col-lg-4 col-form-label text-lg-right">{{ __('Position') }}</label>
                                    <div class="col-lg-6">
                                        <select id="position" class="form-control @error('position') is-invalid @enderror" name="position[]" multiple="multiple">
                                            <option value="HOD">HOD</option>
                                            <option value="lecturer" selected>lecturer</option>
                                            <option value="assistentlecturer">assistentlecturer</option>
                                        </select>
                                        @error('position')
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
