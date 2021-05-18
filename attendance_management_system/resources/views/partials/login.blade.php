<div id="modal10" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal10" aria-hidden="true">
    <div class="log-in-pop">
        <div class="log-in-pop-left">
            <div class="form-group row">
                <div class="col-lg-12 d-none d-lg-block text-center">
                    <img src="{{ url('/image/uojlogo.png') }}" alt="image" height="200px" width="200px">
                </div>
                <div class="w-100"></div>
                <div class="col-lg-12 d-none d-lg-block">
                    <h1 class="text-center h1font" style="font-size:5.0em !important; padding-top:15px !important;">U O
                        J</h1>
                </div>
                <div class="col-lg-12 d-none d-lg-block">
                    <h4 class="text-center h4font" style="font-size:2.0em !important; padding:15px !important;">JAFFNA
                    </h4>
                </div>
            </div>
        </div>
        <div class="log-in-pop-right">
            <a href="#" class="pop-close" data-dismiss="modal"><img src="{{ url('/image/cancel.png') }}" alt="" />
            </a>
            <h4>Login</h4>
            <p>Don't have an account? Create your account. It's take less then a minutes</p>
            @if($message = Session::get('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form class="s12" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <div class="input-field s12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required="required" autocomplete="email"
                            autofocus="autofocus" placeholder="E-mail">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required="required" autocomplete="current-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="s12 log-ch-bx">
                        <p>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Remember me</label>
                        </p>
                    </div>
                </div>
                <div>
                    <div class="input-field s4">
                        <input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
                </div>
                <div>
                    <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
                            data-target="#modal30">Forgot password</a> | <a href="#" data-dismiss="modal"
                            data-toggle="modal" data-target="#modal20">Create a new account</a> </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
@parent

@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#modal10').modal({
            show: true
        });
    });
    </script>
@endif

@if($message = Session::get('error'))
    <script>
        $(function() {
            $('#modal10').modal({
                show: true
            });
        });
    </script>
@endif

@endsection