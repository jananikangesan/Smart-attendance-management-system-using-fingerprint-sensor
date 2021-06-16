@extends('layouts.admin')
@section('pagetitle','User')
@section('content')

<style>
 
    .vl{
    border-left: 3px solid black;
    height: 310px;
    position: absolute ;
    left:35%;
    margin-left:-1px;
    top:-1;
    }

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('User Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update', ['id' => $user->id]) }}">
                        @method('PATCH') 
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
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user ->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user ->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                    <div class="col-md-6">
                                        <select id="role" type="role" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ $user ->role }}" required autocomplete="role">
                                            <option value=1 {{$user ->role == 1 ? 'selected' : ''}}>Admin</option>
                                            <option value=0 {{$user ->role == 0 ? 'selected' : ''}}>User</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="password1" name="password" class="custom-control-input" value="!password">
                                        <label class="custom-control-label" for="password1">change password</label>
                                        <p class="custom-control" style="color: #aa21fa;">set to default "!password"</p>
                                    </div>
                                    <div class="col-md-8 offset-md-4 custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="password2" name="password" class="custom-control-input" value="password!">
                                        <label class="custom-control-label" for="password2">don't change password</label>
                                    </div>
                                </div>

                                {{--<div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $user ->password }}" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>--}}

                                <div class="form-group row mb-0">
                                    <div class="col-md-7 offset-md-4">
                                        <a class="btn btn-info btn-close" href="{{ url('/tables/users') }}">Cancel</a>
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
