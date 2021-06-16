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
                    {{ __('STUDENT UPDATE') }}
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br /> 
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('student_update', ['id' => $student->st_id]) }}">
                        @method('PATCH') 
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
                                        <input id="st_name" type="text" class="form-control @error('st_name') is-invalid @enderror" name="st_name" value="{{ $student->st_name }}" required autocomplete="st_name">
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
                                        <input id="st_regno" type="text" class="form-control @error('st_regno') is-invalid @enderror" name="st_regno" value="{{ $student->st_regno }}" placeholder="2010/CSC/000" required autocomplete="st_regno">
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
                                            <option value="1S" {{($student->st_level == "1S")? 'selected':''}} >1S</option>
                                            <option value="1G" {{($student->st_level == "1G")? 'selected':''}} >1G</option>
                                            <option value="2S" {{($student->st_level == "2S")? 'selected':''}}>2S</option>
                                            <option value="2G" {{($student->st_level == "2G")? 'selected':''}}>2G</option>
                                            <option value="3S" {{($student->st_level == "3S")? 'selected':''}} >3S</option>
                                            <option value="3G" {{($student->st_level == "3G")? 'selected':''}} >3G</option>
                                            <option value="3M" {{($student->st_level == "3M")? 'selected':''}}>3M</option>
                                            <option value="4S" {{($student->st_level == "4S")? 'selected':''}} >4S</option>
                                            <option value="4M"{{($student->st_level == "4M")? 'selected':''}} >4M</option>
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
                                        <input id="st_acyear" type="text" class="form-control @error('st_acyear') is-invalid @enderror" name="st_acyear" value="{{ $student->st_acyear }}" required autocomplete="st_acyear">
                                        @error('st_acyear')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="st_fid" class="col-lg-4 col-form-label text-lg-right">{{ __('Fingerprint ID') }}</label>
                                    <div class="col-lg-6">
                                        <input id="st_fid" type="text" class="form-control @error('st_fid') is-invalid @enderror" name="st_fid" value="{{ old('st_fid') }}" placeholder="fingerprint id"  autocomplete="st_fid">
                                        @error('st_fid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-lg-7 offset-lg-4">
                                        <a class="btn btn-info btn-close" href="{{ url('/tables/students') }}">Cancel</a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
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
