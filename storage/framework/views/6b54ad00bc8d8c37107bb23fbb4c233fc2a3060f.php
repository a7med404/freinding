<?php if(empty($user_key)): ?>
    <?php echo $__env->make('site.layouts.headerlogout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('site.layouts.headerlogin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>