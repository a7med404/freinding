<!DOCTYPE html>
<html>
    <head>
        <?php echo $__env->make('site.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('after_head'); ?>
        <?php echo $facebook_pixel; ?>

    </head>
    <body data-url="<?php echo e(route('home')); ?>" data-user="<?php echo e($user_id); ?>">

        <?php echo $google_analytic; ?> 

        <?php echo $__env->make('site.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <main id="main" >
        <?php echo $__env->yieldContent('content'); ?>
        </main>
        <?php echo $__env->make('site.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <?php echo $__env->make('site.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('after_foot'); ?>
        <!--mazyg-message-->
        <div class="baims-message"></div>
    </body>
</html>
