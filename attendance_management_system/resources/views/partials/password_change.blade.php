<div id="modal40" class="modal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="modal40" aria-hidden="true">
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
            <h4>Change Password with Current Password</h4>
            {{--<p>Don't have an account? Create your account. It's take less then a minutes</p>--}}
            <form class="s12" method="POST" action="{{ route('change.password') }}">
                @csrf
                <div>
                    <div class="input-field s12">
                        <input id="password" type="password" class="form-control" name="current_password"
                            autocomplete="current-password" required="required" autofocus="autofocus"
                            placeholder="Current Password">
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input id="new_password" type="password" class="form-control" name="new_password"
                            autocomplete="current-password" required="required" autofocus="autofocus"
                            placeholder="New Password">
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input id="new_confirm_password" type="password" class="form-control"
                            name="new_confirm_password" autocomplete="current-password" required="required"
                            autofocus="autofocus" placeholder="New Confirm Password">
                    </div>
                </div>
                <div>
                    <div class="input-field s4">
                        <input type="submit" value="Update Password" class="waves-effect waves-light log-in-btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
@parent

@if($errors->has('current_password') || $errors->has('new_password'))
    <script>
    $(function() {
        $('#modal40').modal({
            show: true
        });
    });
    </script>
@endif

@if($message = Session::get('error'))
    <script>
        $(function() {
            $('#modal40').modal({
                show: true
            });
        });
    </script>
@endif

@endsection
