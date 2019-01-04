<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Meta -->
<link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>">
<meta name="description" content="<?php echo e($description); ?> " />
<meta name="keywords" content="<?php echo e($keywords); ?>" />
<meta name="reply-to" content="<?php echo e($email); ?>">
<meta name="author" content="Friending">
<meta name="designer" content="Friending">
<meta name="owner" content="<?php echo e(config('app.name', 'Friending')); ?>">
<meta name="revisit-after" content="7 days">

<!-- image -->
<link href="<?php echo e($share_image); ?>" />
<meta name="medium" content="image" />
<meta property="og:type" content="instapp:photo" />

<!-- for Facebook, Pinterest, LinkedIn, Google+ --> 
<meta property="og:image" content="<?php echo e($share_image); ?>">
<meta property="og:url" content="<?php echo e(Request::url()); ?>">
<meta property="og:title" content="<?php echo e($title); ?>">
<meta property="og:site_name" content="<?php echo e(config('app.name', 'Friending')); ?>">
<meta property="fb:app_id" content="485726318457824">
<meta property="og:image:width" content="476"/>
<meta property="og:image:height" content="249"/>

<!-- for Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?php echo e(config('app.name', 'Friending')); ?>">
<meta name="twitter:title" content="<?php echo e($title); ?>">
<meta name="twitter:description" content="<?php echo e($description); ?>">
<meta name="twitter:image" content="<?php echo e($share_image); ?>">  

<!-- CSRF Token -->
<meta name="_token" content="<?php echo e(csrf_token()); ?>"/>

<!-- Title -->
<title><?php echo e($title); ?> </title>
<script src="<?php echo e(asset('olympus/js/webfontloader.min.js')); ?>"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/Bootstrap/dist/css/bootstrap-reboot.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/Bootstrap/dist/css/bootstrap.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/Bootstrap/dist/css/bootstrap-grid.css')); ?>">

<!-- Main Styles CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/css/main.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/css/fonts.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/css/custom.css')); ?>">

<!--tag-style-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>">

<!--cropp-image-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/cropper.css')); ?>">

<!--notifications-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/sweetalert.css')); ?>">



