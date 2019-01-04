<!DOCTYPE html>
<html>
    <head>
        <?php echo $__env->make('admin.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $__env->startSection('title'); ?> تسجيل دخول 
        <?php $__env->stopSection(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/admin/register/bootstrap.min.css')); ?>">
        <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/admin/register/register.css')); ?>">
    </head>
    <body>
        <div class="container">
            <!--Content Section Start -->
            <div class="row">
                <div class="box animation flipInX">
                    <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/logo.png')); ?>" alt="logo" class="img-responsive mar"></a>
                    <h3 class="text-primary">Sign in to start your session</h3>
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('admin.login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <input id="email" type="email" class="form-control" name="email" placeholder="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group has-feedback <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <input id="password" type="password" placeholder="password" class="form-control" name="password" required>

                            <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                            <?php endif; ?>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <input type="submit" class="btn btn-block btn-primary" value="Sign IN">
                        <p>Don’t you have an account? <a href="<?php echo e(route('register')); ?>">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
                    </form>
                </div>
            </div>
            <!-- //Content Section End -->
        </div>
        <?php echo $__env->make('admin.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--global js starts-->
    </body>
</html>



