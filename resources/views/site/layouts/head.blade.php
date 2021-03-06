<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<base href="/">
<!-- Meta -->
<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
<meta name="description" content="{{ $description }} " />
<meta name="keywords" content="{{ $keywords }}" />
<meta name="reply-to" content="{{ $email }}">
<meta name="author" content="Friending">
<meta name="designer" content="Friending">
<meta name="owner" content="{{ config('app.name', 'Friending') }}">
<meta name="revisit-after" content="7 days">

<!-- image -->
<link href="{{ $share_image  }}" />
<meta name="medium" content="image" />
<meta property="og:type" content="instapp:photo" />

<!-- for Facebook, Pinterest, LinkedIn, Google+ -->
<meta property="og:image" content="{{ $share_image  }}">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="{{ $title  }}">
<meta property="og:site_name" content="{{ config('app.name', 'Friending') }}">
<meta property="fb:app_id" content="485726318457824">
<meta property="og:image:width" content="476"/>
<meta property="og:image:height" content="249"/>

<!-- for Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ config('app.name', 'Friending') }}">
<meta name="twitter:title" content="{{ $title  }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $share_image }}">

<!-- CSRF Token -->
<meta name="_token" content="{{ csrf_token() }}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="userId" content="{{ Auth::check() ? auth()->user()->id : '' }}"/>

<!-- Title -->
<title>{{ $title }} </title>
<script src="{{ asset('olympus/js/webfontloader.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('olympus/Bootstrap/dist/css/bootstrap-reboot.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('olympus/Bootstrap/dist/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('olympus/Bootstrap/dist/css/bootstrap-grid.css') }}">

<!-- Main Styles CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/main.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/main-edit.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/fonts.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/custom.css') }}">

<!--tag-style-->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">

<!--cropp-image-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/cropper.css') }}">

<!--notifications-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}"> --}}

<link rel="stylesheet" type="text/css" href="{{ asset('css/posts/posts.css') }}">

<!--select2-->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/select2.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/select2-bootstrap.min.css') }}"> --}}
