@extends('layouts.app') 
@section('content')
<style>
.vl{
    border-left: 3px solid black;
    height: 300px;
    position: absolute ;
    left:35%;
    margin-left:-1px;
    top:-1;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Login') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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
                                        <h1 class="text-center display-3">U O J</h1>
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
                                @if($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <div class="form-group row row-content">
                                    <label for="email" class="col-lg-4 col-form-label text-lg-right">{{ __('E-Mail Address') }}</label>
                                    <div class="col-lg-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="required" autocomplete="email" autofocus="autofocus">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-lg-4 col-form-label text-lg-right">{{ __('Password') }}</label>
                                        <div class="col-lg-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="required" autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 offset-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-lg-6 offset-lg-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Login') }}
                                        </button>
                                        <br/>
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
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