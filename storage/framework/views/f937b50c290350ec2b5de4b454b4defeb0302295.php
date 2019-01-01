<input type="hidden" class="form-control valu_user_key hidden" name="user_key" value="">

<div class="form-group label-floating is-empty " >
    <label class="control-label">Your City</label>
    <?php echo Form::text('address', null, array('placeholder' => 'City','id'=>'address','class' => '  form-control')); ?>

</div>

<div class="form-group label-floating is-select">
    <label class="control-label">Your Nationality</label>
    <?php echo Form::select('nationality',allNationals() ,null, array('id'=>'nationality','class' => 'selectpicker form-control')); ?>

</div>
<div class="form-group label-floating is-select">
    <label class="control-label">Social Status</label>
    <?php echo Form::select('social_status',socialstatusType() ,null, array('id'=>'social_status','class' => 'selectpicker form-control')); ?>

</div>
<button type="submit"  style="margin-top:30px" class="btn btn-purple btn-lg full-width add_register_three" id="add_register_three"> Next</button>
