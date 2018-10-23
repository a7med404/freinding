<?php if($new!=1): ?>
<div class="form-body">
    <div class="form-group">
        <label for="inputpassword" class="col-md-3 control-label">
            Password
            <span class='require'>*</span>
        </label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                </span>
                <div class="user_pass">
                    <label class="control-label user_error_pass"></label>
                    <?php echo Form::password('password', array('placeholder' => 'Password','id'=>'inputpassword','class' => 'form-control user_pass_buy','id'=>'password','data-parsley-minlength'=>'8')); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputnumber" class="col-md-3 control-label">
            Confirm Password
            <span class='require'>*</span>
        </label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                </span>
                <?php echo Form::password('confirm-password', array('placeholder' => 'Confirm Password','id'=>'inputnumber','class' => 'check_password_confirm form-control','data-parsley-equalto'=>'#password')); ?>

            </div>
        </div>
    </div>
</div>
<div class="box-footer form-actions text-center">
    <!--<a href="<?php echo e($link_return); ?>" class="btn btn-info">Return</a>-->
    <button type="reset" value="Reset" class="btn btn-default">Reset</button>
    <button type="submit" class="btn btn-success" >Change</button>
</div>
<?php else: ?>
<div class="form-body">
    <div class="form-group">
        <label for="inputpassword" class=" control-label btn-warning" style="text-align: center;padding: 20px 80px;">
            Please,Add Personal Information firstly !!
        </label>
    </div>
</div>
<div class="box-footer">
     <!--text-center-->
    <a href="<?php echo e($link_return); ?>" class="btn btn-info">Return</a>
</div>
<?php endif; ?>