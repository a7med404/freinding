<div class="ui-block-title">
    <h6 class="title">Change Password</h6>
</div>
<div class="ui-block-content">
    <?php echo Form::open(array('route' => 'profile.setting.store', 'method'=>'post','class' => '','data-parsley-validate'=>"")); ?>

    <div class="text-center mb-10">
        <?php echo $__env->make('site.layouts.alert_save', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">Confirm Current Password</label>
                <input type="password" name="user_pass"  data-rangelength="[6,50]"  data-required="true"  class="form-control" />
            </div>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating is-empty">
                <label class="control-label">Your New Password</label>
                <input type="password" name="password"  data-rangelength="[6,50]"  data-required="true" id="password" class="form-control" />
            </div>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating is-empty">
                <label class="control-label">Confirm New Password</label>
                 <input type="password" name="password_confirmation" data-rangelength="[6,50]"  data-required="true" data-equalto="#password" class="form-control" />
            </div>
        </div>
        <div class="col col-lg-12 col-sm-12 col-sm-12 col-12">
            <div class="remember">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                    </label>
                </div>
                <a href="<?php echo e(route('password.request')); ?>" class="forgot">Forgot my Password</a>
            </div>
        </div>

        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <input name="email_pass" class="btn btn-primary btn-lg full-width" value="Change Password Now!" type="submit">
        </div>

    </div>
    <?php echo Form::close(); ?>

</div>