
<div class="form-group label-floating is-empty {{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">User Name</label>
    <input id="user_name_buy" type="text" class="form-control user_name_buy" name="name" value="{{ old('name') }}" required autofocus>
    <span class="hide form-control  error-span user_error_namess" id="user_error_namess"></span>
    @if ($errors->has('name'))
    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
</div>
<div class="form-group label-floating is-empty {{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="control-label">Your Email</label>
    <input id="user_email_buy" type="email" class="form-control user_email_buy" name="email" value="{{ old('email') }}" required>
    <span class="hide form-control  error-span user_error_emailss" id="user_error_emailss"></span>
    @if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
</div>
<div class="form-group label-floating is-empty {{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="control-label">Your Password</label>
    <input id="user_pass_buy" type="password" class="form-control user_pass_buy" name="password" required>
    <span class="hide form-control  error-span user_error_pass" id="user_error_pass"></span>
    @if ($errors->has('password'))
    <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif
</div>
<div class="form-group label-floating is-empty">
    <label for="password-confirm" class="control-label">Confirm Password</label>
    <input id="check_password_confirm" type="password" class="form-control check_password_confirm" name="password_confirmation" required>
</div>
<div class="remember">
    <div class="checkbox">
        <label>
            <input name="optionsCheckboxes" class="user_terms_condition" id="user_terms_condition" type="checkbox">
            I accept the <a href="#">Terms and Conditions</a> of the website
        </label>
    </div>
    <span class="hide form-control  error-span user_error_terms" id="user_error_terms"></span>
</div>
<button type="submit" class="btn btn-purple btn-lg full-width add_register_first" id="add_register_first">Registration</button>
@include('auth.social')
<p>Do you have an account? <a href="{{ route('login') }}">Login Now!</a></p>
