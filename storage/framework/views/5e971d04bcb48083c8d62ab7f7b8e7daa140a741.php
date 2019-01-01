<div class="draw_form_register" id="draw_form_register">
    <div class="form-group label-floating is-empty mb-10">
        <?php echo $__env->make('site.layouts.alert_save', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php if(!isset($register)): ?> <?php $register =1 ?> <?php endif; ?>
    <div class="form_register_first <?php if($register!=1): ?> hide <?php endif; ?>" id="form_register_first"><?php echo $__env->make('auth.form_register_first', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
    <div class="form_register_second <?php if($register!=2): ?> hide <?php endif; ?>" id="form_register_second"><?php echo $__env->make('auth.form_register_second', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
    <div class="form_register_three <?php if($register!=3): ?> hide <?php endif; ?>" id="form_register_three"><?php echo $__env->make('auth.form_register_three', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
    <div class="form_register_four <?php if($register!=4): ?> hide <?php endif; ?>" id="form_register_four"><?php echo $__env->make('auth.form_register_four', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
</div>
