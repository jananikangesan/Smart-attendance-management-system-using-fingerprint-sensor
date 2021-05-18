<div id="modal30" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal30" aria-hidden="true">
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
                <div class="w-100"></div>
                <div class="col-lg-12 d-none d-lg-block">
                    <h4 class="text-center h4font" style="font-size:2.0em !important; padding:15px !important;">JAFFNA
                    </h4>
                </div>
            </div>
        </div>
        <div class="log-in-pop-right">
            <a href="#" class="pop-close" data-dismiss="modal"><img src="{{ url('/image/cancel.png') }}" alt="" />
            </a>
            <h4>Forgot password</h4>
            <p style="color:red">please contact the site administrator.</p>
            {{--<form class="s12" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <div class="input-field s12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div>
                <div class="input-field s4">
                    <input type="submit" value="Submit" class="waves-effect waves-light log-in-btn"> </div>
            </div>

            </form>--}}
            <hr />
            <div>
                <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
                        data-target="#modal10">Are you a already member ? Login</a> | <a href="#" data-dismiss="modal"
                        data-toggle="modal" data-target="#modal20">Create a new
                        account</a>
                </div>
            </div>
        </div>
    </div>
</div>
