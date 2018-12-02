<!DOCTYPE html>
<html>
    <head>
        <?php echo $__env->make('site.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('after_head'); ?>
        <?php echo $facebook_pixel; ?>

    </head>
    <body site-Homeurl="<?php echo e(route('home')); ?>" data-user="<?php echo e($user_key); ?>" <?php if(empty($user_key)): ?> class="landing-page" <?php endif; ?>>
        <?php echo $google_analytic; ?> 
        <?php echo $__env->make('site.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        
        <?php echo $__env->make('site.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <?php echo $__env->make('site.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('after_foot'); ?>
    </body>
</html>
