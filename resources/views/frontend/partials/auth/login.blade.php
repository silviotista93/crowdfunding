<div class="modal fade bd-example-modal-lg xs-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="fundpress-tab-nav-v5">
                <!--=====================================
		       TAB LOGIN Y SING UP
                ======================================-->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#login" role="tab" data-toggle="tab">
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#signup" role="tab" data-toggle="tab">
                            {{ __('Signup') }}
                        </a>
                    </li>
                </ul>
            </div>
            <!--=====================================
		  INICIAR SESION
            ======================================-->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fadeInRights show fade in active" id="login">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }} ">
                        @csrf
                        <div class="xs-input-group-v2">
                            <i class="icon icon-profile-male"></i>
                            <input type="email" name="email" id="xs_user_login_name" class="xs-input-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('PlaceHolder_email') }}" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="xs-input-group-v2">
                            <i class="icon icon-key2"></i>
                            <input type="password" name="password" id="xs_login_password" class="xs-input-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('PlaceHolder_password') }}" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="xs-submit-wraper xs-mb-20">
                            <input type="submit" name="submit" value="{{ __('btn_login') }}" id="xs_contact_get_action" class="btn btn-warning btn-block">
                        </div>
                        <p class="xs-mb-20">or</p>
                        <div class="xs-submit-wraper xs-mb-20">
                            <a href="{{route('social_auth',['driver' => 'facebook'])}}" id="xs_facebook" class="btn btn-info btn-block">{{ __('btn_login_facebook') }}</a>
                        </div>
                        <div class="xs-submit-wraper">
                            <a href="{{route('social_auth',['driver' => 'google'])}}"  class="btn btn-success btn-block">{{ __('btn_login_google') }}</a>
                        </div>
                    </form>
                </div>
                <!--=====================================
		      REGISTRAR
                ======================================-->
                <div role="tabpanel" class="tab-pane fadeInRights fade" id="signup">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="xs-input-group-v2">
                            <i class="icon icon-profile-male"></i>
                            <input type="text" name="name" id="xs_register_name" class="xs-input-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('PlaceHolder_name') }}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="xs-input-group-v2">
                            <i class="icon icon-envelope2"></i>
                            <input type="email" name="email" id="xs_register_email" class="xs-input-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('PlaceHolder_email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="xs-input-group-v2">
                            <i class="icon icon-key2"></i>
                            <input type="password" name="password" id="xs_register_password" class="xs-input-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('PlaceHolder_password') }}" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="xs-input-group-v2">
                            <i class="icon icon-key2"></i>
                            <input type="password" name="password_confirmation" id="xs_register_repeat_pass" class="xs-input-control" placeholder="{{ __('PlaceHolder_password_confirmation') }}">
                        </div>
                        <div class="xs-submit-wraper xs-mb-20">
                            <button type="submit" value="login now" id="xs_register_get_action" class="btn btn-warning btn-block">{{ __('btn_register') }}</button>
                        </div>
                        <p class="xs-mb-20">or</p>
                        <div class="xs-submit-wraper xs-mb-20">
                            <a href="{{route('social_auth',['driver' => 'facebook'])}}" id="xs_facebook" class="btn btn-info btn-block">{{ __('btn_login_facebook') }}</a>
                        </div>
                        <div class="xs-submit-wraper">
                            <a href="{{route('social_auth',['driver' => 'google'])}}"  class="btn btn-success btn-block">{{ __('btn_login_google') }}</a>
                        </div>
                    </form>
                </div><!-- tab-pane -->
            </div><!-- tab-content -->
        </div>
    </div>
</div><!-- End modal --><!-- End home section -->
