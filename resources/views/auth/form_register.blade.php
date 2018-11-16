<div class="title h6">Register to Friending</div>
<form class="content" role="form" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="form-group label-floating is-empty mb-10">
                @include('site.layouts.alert_save')
            </div>
            <div class="form-group label-floating is-empty {{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="control-label">Display Name</label>
                <input id="display_name" type="text" class="form-control" name="display_name" value="{{ old('display_name') }}" required autofocus>
                @if ($errors->has('display_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('display_name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group label-floating is-empty {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">User Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group label-floating is-empty {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">Your Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
            <div class="form-group label-floating is-empty">
                <label for="password-confirm" class="control-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
            <div class="form-group date-time-picker label-floating hidden">
                <label class="control-label">Your Birthday</label>
                <input name="datetimepicker" value="10/24/1984" />
                <!--<input name="birthdate" value="10/24/1984" />-->
                <span class="input-group-addon">
                    <svg class="olymp-calendar-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
                </span>
            </div>
            <div class="form-group label-floating is-select hidden">
                <label class="control-label">Your Gender</label>
                <select name="gender" class="selectpicker form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="remember">
                <div class="checkbox">
                    <label>
                        <input name="optionsCheckboxes" type="checkbox">
                        I accept the <a href="#">Terms and Conditions</a> of the website
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-purple btn-lg full-width">Registration</button>                               
            <p>Do you have an account? <a href="{{ route('login') }}">Login Now!</a></p>
        </div>
    </div>
</form>