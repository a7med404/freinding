@extends('site.layouts.app')
@section('content')
    <div class="container">
        <div class="row display-flex">
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="landing-content">
                    @include('auth.form_title')
                </div>
            </div>
            <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
                <!-- Login-Registration Form  -->
                <div class="registration-login-form">
                    <!-- Nav tabs -->
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
                            <div class="title h6">Register to Friending</div>
                            <form class="content" id="register" role="form" method="POST"
                                  action="{{ route('register') }}"
                                  aria-label="{{ __('Register') }}">
                                {{ csrf_field() }}

                                <div class="draw_form_register" id="draw_form_register">
                                    <div class="form-group label-floating is-empty mb-10">
                                        @include('site.layouts.alert_save')
                                    </div>


                                    <div class="row">
                                        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group label-floating is-empty {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="control-label">User Name</label>
                                                <input id="user_name_buy" type="text" class="form-control user_name_buy"
                                                       name="name" value="{{ old('name') }}" required autofocus>
                                                <span class="hide form-control  error-span user_error_namess"
                                                      id="user_error_namess"></span>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
                                                @endif
                                            </div>
                                            <div class="form-group label-floating is-empty {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="control-label">Your Email</label>
                                                <input id="user_email_buy" type="email"
                                                       class="form-control user_email_buy" name="email"
                                                       value="{{ old('email') }}" required>
                                                <span class="hide form-control  error-span user_error_emailss"
                                                      id="user_error_emailss"></span>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
                                                @endif
                                            </div>
                                            <div class="form-group label-floating is-empty {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="control-label">Your Password</label>
                                                <input id="user_pass_buy" type="password"
                                                       class="form-control user_pass_buy" name="password" required>
                                                <span class="hide form-control  error-span user_error_pass"
                                                      id="user_error_pass"></span>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
                                                @endif
                                            </div>
                                            <div class="form-group label-floating is-empty">
                                                <label for="password-confirm" class="control-label">Confirm
                                                    Password</label>
                                                <input id="check_password_confirm" type="password"
                                                       class="form-control check_password_confirm"
                                                       name="password_confirmation" required>
                                            </div>
                                            <div class="remember">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="optionsCheckboxes" class="user_terms_condition"
                                                               id="user_terms_condition" type="checkbox">
                                                        I accept the <a href="#">Terms and Conditions</a> of the website
                                                    </label>
<br>
                                                       <em class="err" style="display: none">Required!,  please accept our terms and
                                                           conditions.  </em>

                                                </div>
                                                <span class="hide form-control  error-span user_error_terms"
                                                      id="user_error_terms"></span>
                                            </div>
                                            <button type="submit"
                                                    class="btn btn-purple btn-lg full-width registration"
                                            >Registration
                                            </button>
                                            @include('auth.social')
                                            <p>Do you have an account? <a href="{{ route('login') }}">Login Now!</a></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ... end Login-Registration Form  -->
            </div>
        </div>
    </div>
@endsection
@section('after_foot')
    <script>

$(document).on('submit','#register',function(){
            if (!$('input[name="optionsCheckboxes"]').is(':checked')) {
                $('.err').show();
                return false;
            } else {
                $('.err').hide();

                $('#register').submit();
            }
        })

        $("#register").validate({
            errorElement: "em",
            rules: {

                name: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#user_pass_buy"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                      optionsCheckboxes: {
         required : true
                }
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                optionsCheckboxes: "Required!,  please accept our terms and conditions.",
                agree: "Please accept our policy",
                topic: "Please select at least 2 topics"
            }
        });





    </script>

    <style>
        em{
            color:red;
        }
    </style>
@endsection



