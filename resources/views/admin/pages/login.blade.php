<!DOCTYPE html>
<html>
    <head>
        @include('admin.layouts.head')
        @section('title') تسجيل دخول 
        @stop

    </head>
    <body>
        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                    <div id="container_demo">
                        <div class="clearfix m-b-lg"></div>
                        <div class="login-logo">
                            <h1> <a href="{{ route('home') }}">Home</a></h1>
                        </div>
                        <!-- /.login-logo -->

                        <div id="container_demo">
                            <a class="hiddenanchor" id="toregister"></a>
                            <a class="hiddenanchor" id="tologin"></a>
                            <a class="hiddenanchor" id="toforgot"></a>
                            <div id="wrapper">
                                <div id="login" class="animate form">
                                    <p class="login-box-msg">Sign in to start your session</p>
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
                                        <button type="submit" class="btn btn-responsive botton-alignment btn-primary btn-sm ">Sign In</button>
                                        <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
                                </div>
                                <!-- /.login-box-body -->
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  
            @include('admin.layouts.foot')
    </body>
</html>



