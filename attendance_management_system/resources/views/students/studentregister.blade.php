@extends('layouts.admin')
@section('pagetitle','Student')
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
    height: 315px;
    position: absolute ;
    left:33%;
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
                    {{ __('STUDENT REGISTER') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/student/store') }}">
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
                                    <div class="col-lg-12 d-none d-lg-block">
                                        <h1 class="text-center display-3">UOJ</h1>
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
                                    <label for="st_name" class="col-lg-4 col-form-label text-lg-right">{{ __('Full Name') }}</label>
                                    <div class="col-lg-6">
                                        <input id="st_name" type="text" class="form-control @error('st_name') is-invalid @enderror" name="st_name" value="{{ old('st_name') }}" placeholder="full name" required autocomplete="st_name">
                                        @error('st_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="st_regno" class="col-lg-4 col-form-label text-lg-right">{{ __('Registration No') }}</label>
                                    <div class="col-lg-6">
                                        <input id="st_regno" type="text" class="form-control @error('st_regno') is-invalid @enderror" name="st_regno" value="{{ old('st_regno') }}" placeholder="2010/CSC/000" required autocomplete="st_regno">
                                        @error('st_regno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="st_level" class="col-lg-4 col-form-label text-lg-right">{{ __('Student Level') }}</label>
                                    <div class="col-lg-6">
                                        <select id="st_level" class="form-control @error('st_level') is-invalid @enderror" name="st_level">
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
                                        @error('st_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="st_acyear" class="col-lg-4 col-form-label text-lg-right">{{ __('Academic Year') }}</label>
                                    <div class="col-lg-6">
                                        <input id="st_acyear" type="text" class="form-control @error('st_acyear') is-invalid @enderror" name="st_acyear" value="{{ old('st_acyear') }}" placeholder="2010/2011" required autocomplete="st_acyear">
                                        @error('st_acyear')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                {{--<div class="form-group row">
                                    <label for="st_fid" class="col-lg-4 col-form-label text-lg-right">{{ __('Fingerprint ID') }}</label>
                                    <div class="col-lg-6">
                                        <input id="st_fid" type="file" class=" @error('st_fid') is-invalid @enderror" name="st_fid" value="{{ old('st_fid') }}"  autocomplete="st_fid">
                                        @error('st_fid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                --}}
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
