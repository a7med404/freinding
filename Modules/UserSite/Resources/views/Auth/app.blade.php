<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="/">
    <!-- Meta -->
    <title>Friending | @yield('title')</title>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/Bootstrap/dist/css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/Bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/Bootstrap/dist/css/bootstrap-grid.css') }}">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/main.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/fonts.min.css') }}">

    <!--cropp-image-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cropper.css') }}">

    <!--notifications-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
    <!--select2-->
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/select2-bootstrap.min.css') }}">
    @yield('styles')

    <style>
        div#header--standard {
            background: #ff5e3a;
            padding: 16px 2px !important;
        }

        .err {
            background: #ff6e58;
            padding: 10px;
            color: white;
            font-size: 16px;
            margin: 1px;
        }

        .errliving > .error-box {
            bottom: 0px !important;
            height: 190px;
            top: 61px;

        }

        .errnationality > .error-box {
            bottom: 0px !important;
            top: 61px;
            height: 200px;
        }
        .loader{
            width:60px;
            display: none;
        }
        #select2{
            display:none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/custom.css') }}">
<body>
<div class="content-bg-wrap" style="background: url();"></div>
</body>
@include('usersite::Auth.header')
@yield('content')
@include('usersite::Auth.footer')
<script>
    var baseUrl='{{url('').'/'}}';
    var dir='ltr';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
</script>
@yield('scripts')
</html>
