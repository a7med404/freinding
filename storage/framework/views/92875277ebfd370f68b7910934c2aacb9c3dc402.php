<div class="title h6">Login to your Account</div>
<form class="content" role="form" method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="row">
        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="form-group label-floating is-empty mb-10">
                <?php echo $__env->make('site.layouts.alert_save', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <div class="form-group label-floating is-empty <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password" class="control-label">Your Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
                <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            <div class="remember">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                    </label>
                </div>
                <a href="<?php echo e(route('password.request')); ?>" class="forgot">Forgot my Password</a>
            </div>
            <button type="submit" class="btn btn-lg btn-primary full-width">Login</button>
            <div class="or"></div>

            <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login with Facebook</a>

            <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login with Twitter</a>

            <p>Don’t you have an account? <a href="<?php echo e(route('register')); ?>">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
        </div>
    </div>
</form>