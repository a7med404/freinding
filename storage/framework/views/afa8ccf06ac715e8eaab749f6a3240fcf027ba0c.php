<div class="title h6">Reset Password</div>
<form class="content" role="form" method="POST" action="<?php echo e(route('password.email')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="row">
        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="form-group label-floating is-empty mb-10">
                <?php echo $__env->make('site.layouts.alert_save', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="form-group label-floating is-empty mb-10">
                <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
                <?php endif; ?>
            </div>

            <div class="form-group label-floating is-empty <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label for="email" class="control-label">Your Email</label>
                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-lg btn-primary full-width">Send Password Reset Link</button>
            <div class="or"></div>

            <p>Don’t you have an account? <a href="<?php echo e(route('register')); ?>">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
        </div>
    </div>
</form>