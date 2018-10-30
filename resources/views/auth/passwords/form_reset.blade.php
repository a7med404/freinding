<div class="title h6">Reset Password</div>
<form class="content" role="form" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="form-group label-floating is-empty mb-10">
                @include('site.layouts.alert_save')
            </div>
            <div class="form-group label-floating is-empty mb-10">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </div>


            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group label-floating is-empty {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Your Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group label-floating is-empty {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Your Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>  

            <div class="form-group label-floating is-empty {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="control-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-lg btn-primary full-width">Reset Password</button>
            <div class="or"></div>

            <p>Don’t you have an account? <a href="{{ route('register') }}">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
        </div>
    </div>
</form>