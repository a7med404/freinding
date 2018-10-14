<?php if($new!=1): ?>
<div class="col-md-9">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="users">
                <tr>
                    <td>Joined Date</td>
                    <td>
                        <div class="user_birth">
                            <label class="control-label user_error_birth"></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                </div>
                                <?php echo Form::text('joined_date', $joined_date, array('placeholder' => 'Joined Date','id'=>'rangepicker4','class' => 'user_birth_date form-control')); ?>

                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Lifetime Value</td>
                    <td>
                        <div class="user_dispaly">
                            <label class="control-label user_error_dispaly"></label>
                            <?php if(isset($lifetime_value)): ?>
                            <a data-pk="1" class="editable data_form" data-id="lifetime_value" data-title="Edit display Name"><?php echo e($lifetime_value); ?></a>
                            <?php echo Form::text('lifetime_value', $lifetime_value, array('placeholder' => ' Lifetime Value','id'=>'lifetime_value','class' => ' hidden  form-control')); ?>

                            <?php else: ?>
                            <?php echo Form::text('lifetime_value', $lifetime_value, array('placeholder' => ' Lifetime Value','id'=>'lifetime_value','class' => ' form-control')); ?>

                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Average Number of Sessions per User</td>
                    <td>
                        <?php if(isset($session_num)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="session_num" data-title="Edit  Average Number of Sessions per User"><?php echo e($session_num); ?></a>
                        <div class="hidden session_num_div">
                            <?php echo Form::select('session_num',fun_session_num() ,$session_num, array('id'=>'session_num','class' => ' hidden select2 form-control')); ?>

                        </div>
                        <?php else: ?>
                        <?php echo Form::select('session_num',fun_session_num() ,$session_num, array('id'=>'session_num','class' => '  select2 form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td> Average Session Duration by Minutes</td>
                    <td>
                        <?php if(isset($session_time)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="session_time" data-title="Edit  Average Session Duration by Minutes"><?php echo e($session_time); ?></a>
                        <?php echo Form::text('session_time', $session_time, array('placeholder' => ' Average Session Duration by Minutes','id'=>'session_time','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::text('session_time', $session_time, array('placeholder' => ' Average Session Duration by Minutes','id'=>'session_time','class' => '  form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td> Most Times Session</td>
                    <td>
                        <?php if(isset($most_session_time)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="most_session_time" data-title="Edit  Most Times Session"><?php echo $most_session_time; ?></a>
                        <?php echo Form::text('most_session_time', $most_session_time, array('placeholder' => ' Most Times Session','id'=>'most_session_time','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::text('most_session_time', null, array('placeholder' => ' Most Times Session','id'=>'most_session_time','class' => '  form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td> GPS Log </td>
                    <td>
                        <?php if(isset($gps_log)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="gps_log" data-title="Edit  GPS Log"><?php echo $gps_log; ?></a>
                        <?php echo Form::text('gps_log', $gps_log, array('placeholder' => ' GPS Log','id'=>'gps_log','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::text('gps_log', $gps_log, array('placeholder' => ' GPS Log','id'=>'gps_log','class' => '  form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>WIFI Network Log</td>
                    <td>
                        <?php if(isset($wifi_netLog)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="wifi_netLog" data-title="Edit WIFI Network Log"><?php echo $wifi_netLog; ?></a>
                        <?php echo Form::text('wifi_netLog', $wifi_netLog, array('placeholder' => 'WIFI Network Log','id'=>'wifi_netLog','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::text('wifi_netLog', $wifi_netLog, array('placeholder' => 'WIFI Network Log','id'=>'wifi_netLog','class' => '  form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr> 
                <tr>
                    <td>Interests & Hobbies</td>
                    <td>
                        <?php if(isset($inter_hobbies)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="inter_hobbies" data-title="Edit Interests & Hobbies"><?php echo $inter_hobbies; ?></a>
                        <?php echo Form::textarea('inter_hobbies', $inter_hobbies, array('placeholder' => 'Interests & Hobbies','id'=>'inter_hobbies','rows'=>'3','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::textarea('inter_hobbies', $inter_hobbies, array('placeholder' => 'Interests & Hobbies','id'=>'inter_hobbies','rows'=>'3','class' => '  form-control')); ?>

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