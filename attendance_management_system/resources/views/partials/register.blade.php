<div id="modal20" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal20" aria-hidden="true">
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
            <h4>Create an Account</h4>
            <p>Don't have an account? Create your account. It's take less then a minutes</p>
            <form class="s12" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <div class="input-field s12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="User Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
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
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="password">
                        <p id="passwordHelpBlock" class="form-text text-muted"
                            style="font-size:1.0em !important; color:#0000A0">
                            Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1
                            Lowercase, 1 Numeric and 1 special character.
                        </p>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Conform Password">
                    </div>
                </div>
                <div>
                    <div class="input-field s4">
                        <input type="submit" value="Register" class="waves-effect waves-light log-in-btn">
                    </div>
                </div>
                <div>
                    <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
                            data-target="#modal10">Are you a already member ? Login</a> </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
@parent

<script>
$(function () {
    $('#registerForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#registerForm input").removeClass("is-invalid");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "{{ route('register') }}",
            data: formData,
            success: () => window.location.assign("{{ route('home') }}"),
            error: (response) => {
                if(response.status === 422) {
                    let errors = response.responseJSON.errors;
                    Object.keys(errors).forEach(function (key) {
                        $("#" + key + "Input").addClass("is-invalid");
                        $("#" + key + "Error").children("strong").text(errors[key][0]);
                    });
                } else {
                    window.location.reload();
                }
            }
        })
    });
})
</script>
@endsection