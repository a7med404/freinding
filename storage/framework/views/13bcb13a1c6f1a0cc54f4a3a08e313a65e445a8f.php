<?php if($new!=1): ?>
<div class="col-md-4">
    <div class="text-center">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail img-file">
                 <!--img-radius-->
                <?php if($image_card == Null): ?>
                <img src="<?php echo e(asset('css/admin/img/authors/avatar.jpg')); ?>" width="200" class="img-responsive" height="150" alt="user">
                <?php else: ?>
                <img  src="<?php echo e($image_card); ?>"  width="200" width="200" class="img-responsive" height="150" alt="riot"/>
                <?php endif; ?>                       
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail img-max">
            </div>
            <div>
                <span class="btn btn-default btn-file ">
                    <span class="fileinput-new">Select image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="hidden" id="valImgsData" class="valImgsData" name="image_card" value="<?php echo e($image_card); ?>">
                    <input type="file" name="...">
                </span>
                <a class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="users">
                <tr>
                    <td>ID Verification</td>
                    <td>
                        <div class="user_dispaly">
                            <label class="control-label user_error_dispaly"></label>
                            <?php if(isset($id_verificat)): ?>
                            <a data-pk="1" class="editable data_form" data-id="id_verificat" data-title="Edit display Name"><?php echo e($id_verificat); ?></a>
                            <?php echo Form::text('id_verificat', $id_verificat, array('placeholder' => 'ID Verification','id'=>'id_verificat','class' => ' hidden  form-control')); ?>

                            <?php else: ?>
                            <?php echo Form::text('id_verificat', $id_verificat, array('placeholder' => 'ID Verification','id'=>'id_verificat','class' => ' form-control')); ?>

                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Social Network Accounts</td>
                    <td>
                        <?php if(!empty($social_net)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="social_net" data-title="Edit Social Network Accounts"><?php echo $social_net; ?></a>
                        <?php echo Form::select('social_net[]', $social_net,$social_netCounts, array('placeholder' => 'Social Network Accounts','id'=>'social_net','class' => 'select2-tags hidden form-control','multiple')); ?>

                        <?php else: ?>
                        <?php echo Form::select('social_net[]', $social_net,$social_netCounts, array('placeholder' => 'Social Network Accounts','id'=>'social_net','class' => 'select2-tags hidden form-control','multiple')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <div class="box-footer text-center">
                <!--<a href="<?php echo e($link_return); ?>" class="btn btn-default">Return</a>-->
                <a id='btnCheck_basic_inform' class="btn btn-success btnCheck_basic_inform">Save</a>
                <button type="submit" id="submit_basic_inform" class="btn btn-success hidden submit_basic_inform" >Save</button>
                <button type="reset" value="Reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="form-body">
    <div class="form-group">
        <label for="inputpassword" class=" control-label btn-warning" style="text-align: center;padding: 20px 80px;">
            Please,Add Basic Information firstly !!
        </label>
    </div>
</div>
<div class="box-footer">
     <!--text-center-->
    <a href="<?php echo e($link_return); ?>" class="btn btn-info">Return</a>
</div>
<?php endif; ?>