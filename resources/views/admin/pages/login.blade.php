<!DOCTYPE html>
<html>
    <head>
        @include('admin.layouts.head')
        @section('title') تسجيل دخول 
        @stop
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/register/bootstrap.min.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/register/register.css') }}">
    </head>
    <body>
        <div class="container">
            <!--Content Section Start -->
            <div class="row">
                <div class="box animation flipInX">
                    <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="logo" class="img-responsive mar"></a>
                    <h3 class="text-primary">Sign in to start your session</h3>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login') }}">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" placeholder="email" value="{{ old('email') }}" required autofocus>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" placeholder="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <input type="submit" class="btn btn-block btn-primary" value="Sign IN">
                        <p>Don’t you have an account? <a href="{{ route('register') }}">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
                    </form>
                </div>
            </div>
            <!-- //Content Section End -->
        </div>
        @include('admin.layouts.foot')
        <!--global js starts-->
    </body>
</html>



