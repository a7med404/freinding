<!DOCTYPE html>
<html>
    <head>
        <?php echo $__env->make('admin.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $__env->startSection('title'); ?> تسجيل دخول 
        <?php $__env->stopSection(); ?>

    </head>
    <body>
        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                    <div id="container_demo">
                        <div class="clearfix m-b-lg"></div>
                        <div class="login-logo">
                            <h1> <a href="<?php echo e(route('home')); ?>">Home</a></h1>
                        </div>
                        <!-- /.login-logo -->

                        <div id="container_demo">
                            <a class="hiddenanchor" id="toregister"></a>
                            <a class="hiddenanchor" id="tologin"></a>
                            <a class="hiddenanchor" id="toforgot"></a>
                            <div id="wrapper">
                                <div id="login" class="animate form">
                                    <p class="login-box-msg">Sign in to start your session</p>
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
                                        <button type="submit" class="btn btn-responsive botton-alignment btn-primary btn-sm ">Sign In</button>
                                        <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
                                </div>
                                <!-- /.login-box-body -->
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  
            <?php echo $__env->make('admin.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>



