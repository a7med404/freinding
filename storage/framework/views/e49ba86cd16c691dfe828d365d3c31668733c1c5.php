<?php if(empty($user_key)): ?>
    <?php echo $__env->make('site.layouts.headerlogout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
    <?php if(isset($prof)&&$prof==1): ?>
        <?php echo $__env->make('usersite::profilelist', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('site.home.sideleft', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('site.home.sideright', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('site.layouts.headerlogin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<div class="header-spacer"></div>
