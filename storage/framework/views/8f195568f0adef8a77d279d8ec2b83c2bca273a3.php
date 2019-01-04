<!DOCTYPE html>
<html>
    <head>
        <?php echo $__env->make('admin.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('after_head'); ?>
    </head>
    <body class="skin-josh" data-url="<?php echo e(route('home')); ?>" data-user="user_id">
            <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="wrapper row-offcanvas row-offcanvas-left">
                <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <aside class="right-side">
                    <section class="content-header">
                    <?php echo $__env->yieldContent('head_content'); ?>
                    </section>
                    <section class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                    </section>
                </aside>
            </div>
            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
            <!--<div class="control-sidebar-bg"></div>-->
        
        <?php echo $__env->make('admin.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          
        <?php echo $__env->yieldContent('after_foot'); ?>

    </body>
</html>
