<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Meta -->
<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
<meta name="description" content="{{ $description }} " />
<meta name="keywords" content="{{ $keywords }}" />
<meta name="reply-to" content="{{ $email }}">
<meta name="author" content="Project">
<meta name="designer" content="Project">
<meta name="owner" content="{{ config('app.name', 'Project') }}">
<meta name="revisit-after" content="7 days">

<!-- image -->
<link href="{{ $share_image  }}" />
<meta name="medium" content="image" />
<meta property="og:type" content="instapp:photo" />

<!-- for Facebook, Pinterest, LinkedIn, Google+ --> 
<meta property="og:image" content="{{ $share_image  }}">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:title" content="{{ $title  }}">
<meta property="og:site_name" content="{{ config('app.name', 'Project') }}">
<meta property="fb:app_id" content="485726318457824">
<meta property="og:image:width" content="476"/>
<meta property="og:image:height" content="249"/>

<!-- for Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ config('app.name', 'Project') }}">
<meta name="twitter:title" content="{{ $title  }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $share_image }}">  

<!-- CSRF Token -->
<meta name="_token" content="{{ csrf_token() }}"/>

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
<link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/fonts.min.css') }}">

