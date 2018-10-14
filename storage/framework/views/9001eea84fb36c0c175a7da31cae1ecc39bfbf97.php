<div class="col-md-4">
    <div class="text-center">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail img-file">
                <?php if($image == Null): ?>
                <img src="<?php echo e(asset('css/admin/img/authors/avatar.jpg')); ?>" width="200" class="img-responsive img-radius" height="150" alt="user">
                <?php else: ?>
                <img  src="<?php echo e($image); ?>"  width="200" width="200" class="img-responsive img-radius" height="150" alt="riot"/>
                <?php endif; ?>                       
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail img-max">
            </div>
            <div>
                <span class="btn btn-default btn-file ">
                    <span class="fileinput-new">Select image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="hidden" id="valImgsData" class="valImgsData" name="image" value="<?php echo e($image); ?>">
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
                    <td>User Name</td>
                    <td>
                        <div class="user_name">
                            <label class="control-label user_error_name"></label>
                            <?php if(isset($user->name)): ?>
                            <a data-pk="1" class="editable data_form" data-id="name"  data-title="Edit User Name"><?php echo e($user->name); ?></a>
                            <?php echo Form::text('name', null, array('placeholder' => 'Name','id'=>'name','class' => ' hidden form-control user_name_buy','required'=>'')); ?>

                            <?php else: ?>
                            <?php echo Form::text('name', null, array('placeholder' => 'Name','id'=>'name','class' => ' form-control user_name_buy','required'=>'')); ?>

                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Display Name</td>
                    <td>
                        <div class="user_dispaly">
                            <label class="control-label user_error_dispaly"></label>
                            <?php if(isset($user->display_name)): ?>
                            <a data-pk="1" class="editable data_form" data-id="display_name" data-title="Edit display Name"><?php echo e($user->display_name); ?></a>
                            <?php echo Form::text('display_name', null, array('placeholder' => 'Display Name','id'=>'display_name','class' => ' hidden user_display_name form-control')); ?>

                            <?php else: ?>
                            <?php echo Form::text('display_name', null, array('placeholder' => 'Display Name','id'=>'display_name','class' => 'user_display_name form-control')); ?>

                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>
                        <div class="user_email">
                            <label class="control-label user_error_email"></label>
                            <?php if(isset($user->email)): ?>
                            <a data-pk="1" class="editable data_form" data-id="email" data-title="Edit E-mail"><?php echo e($user->email); ?></a>
                            <?php echo Form::text('email', null, array('placeholder' => 'Email','id'=>'email','class' => ' hidden  user_email_buy form-control','required'=>'','data-parsley-type'=>"email")); ?>

                            <?php else: ?>
                            <?php echo Form::text('email', null, array('placeholder' => 'Email','id'=>'email','class' => ' user_email_buy form-control','required'=>'','data-parsley-type'=>"email")); ?>

                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>
                        <div class="user_phone">
                            <label class="control-label user_error_phone"></label>
                            <?php if(isset($user->phone)): ?>
                            <a data-pk="1" class="editable data_form" data-id="phone" data-title="Edit Phone Number"><?php echo e($user->phone); ?></a>
                            <?php echo Form::text('phone', null, array('placeholder' => 'Phone','id'=>'phone','class' => ' hidden user_phone_buy form-control')); ?>

                            <?php else: ?>
                            <?php echo Form::text('phone', null, array('placeholder' => 'Phone','id'=>'phone','class' => ' user_phone_buy form-control')); ?>

                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td>
                        <div class="user_birth">
                            <label class="control-label user_error_birth"></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                </div>
                                <?php echo Form::text('birthdate', null, array('placeholder' => 'Birthdate','id'=>'rangepicker4','class' => 'user_birth_date form-control')); ?>

                            </div>
                        </div>
                    </td>
                </tr>
                <?php if($new==1): ?>
                <tr>
                    <td>Password</td>
                    <td>
                        <div class="user_pass">
                            <label class="control-label user_error_pass"></label>
                            <?php echo Form::password('password', array('placeholder' => 'Password','class' => 'form-control user_pass_buy','id'=>'password','data-parsley-minlength'=>'8')); ?>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <?php echo Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'check_password_confirm form-control','data-parsley-equalto'=>'#password')); ?>

                    </td>
                </tr>
                <?php endif; ?>
                <?php if(Auth::user()->can('access-all', 'user-all')): ?>
                <tr>
                    <td>Roles</td>
                    <td>
                        <?php if(isset($userRole)&&!empty($userRole)): ?>
                        <a data-pk="1" class="editable data_form" data-id="roles" data-title="Edit Roles">
                            <?php if(!empty($user->roles)): ?>
                            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <small class="label btn-success"><?php echo e($v->display_name); ?></small>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </a>
                        <div class="hidden roles_div">
                            <?php echo Form::select('roles[]', $roles,$userRole, array('id'=>'roles','class' => 'select2 form-control','multiple')); ?>

                        </div>
                        <?php else: ?>
                        <?php echo Form::select('roles[]', $roles,$userRole, array('id'=>'roles','class' => 'select2 form-control','multiple')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td>Gender</td>
                    <td>
                        <?php if(isset($user->gender)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="gender" data-title="Edit Gender"><?php echo e($user->gender); ?></a>
                        <div class="hidden gender_div">
                            <?php echo Form::select('gender',statusGender() ,null, array('id'=>'gender','class' => ' hidden select2 form-control')); ?>

                        </div>
                        <?php else: ?>
                        <?php echo Form::select('gender',statusGender() ,null, array('id'=>'gender','class' => '  select2 form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <?php if(isset($user->address)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="address" data-title="Edit Address"><?php echo e($user->address); ?></a>
                        <?php echo Form::text('address', null, array('placeholder' => 'Address','id'=>'address','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::text('address', null, array('placeholder' => 'Address','id'=>'address','class' => '  form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        <?php if(isset($user->country)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="country" data-title="Edit City"><?php echo countryData($user->country); ?></a>
                        <div class="hidden country_div">   
                            <?php echo Form::select('country',allCountry() ,null, array('id'=>'country','class' => ' hidden select2 form-control')); ?>

                        </div>
                        <?php else: ?>
                        <?php echo Form::select('country',allCountry() ,null, array('id'=>'country','class' => 'select2 form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Nationality</td>
                    <td>
                        <?php if(isset($user->nationality)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="nationality" data-title="Edit Nationality"><?php echo $user->nationality; ?></a>
                        <?php echo Form::text('nationality', null, array('placeholder' => 'Nationality','id'=>'nationality','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::text('nationality', null, array('placeholder' => 'Nationality','id'=>'nationality','class' => '  form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Occupation </td>
                    <td>
                        <?php if(isset($user->occupation)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="occupation" data-title="Edit Occupation"><?php echo $user->occupation; ?></a>
                        <?php echo Form::text('occupation', null, array('placeholder' => 'Occupation','id'=>'occupation','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::text('occupation', null, array('placeholder' => 'Occupation','id'=>'occupation','class' => '  form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Working at</td>
                    <td>
                        <?php if(isset($user->address_jop)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="address_jop" data-title="Edit Working at"><?php echo $user->address_jop; ?></a>
                        <?php echo Form::text('address_jop', null, array('placeholder' => 'Working at','id'=>'address_jop','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::text('address_jop', null, array('placeholder' => 'Working at','id'=>'address_jop','class' => '  form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>social_status</td>
                    <td>
                        <?php if(isset($user->social_status)): ?>
                        <a id="status" class=" data_form" data-id="social_status" data-type="select" data-pk="1" data-value="1" data-title="Status"><?php echo socialstatusData($user->social_status); ?></a>
                        <div class="hidden social_status_div">
                            <?php echo Form::select('social_status',socialstatusType() ,null, array('id'=>'social_status','class' => ' hidden select2 form-control')); ?>

                        </div>
                        <?php else: ?>
                        <?php echo Form::select('social_status',socialstatusType() ,null, array('id'=>'social_status','class' => ' select2 form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td> About me</td>
                    <td>
                        <?php if(isset($user->about_me)): ?>
                        <a data-pk="1" class="editable  data_form" data-id="about_me" data-title="Edit About me"><?php echo $user->about_me; ?></a>
                        <?php echo Form::textarea('about_me', null, array('placeholder' => 'About me','id'=>'about_me','rows'=>'3','class' => ' hidden form-control')); ?>

                        <?php else: ?>
                        <?php echo Form::textarea('about_me', null, array('placeholder' => 'About me','id'=>'about_me','rows'=>'3','class' => '  form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <?php if(isset($user->is_active)): ?>
                        <a id="status" class=" data_form" data-id="is_active" data-type="select" data-pk="1" data-value="1" data-title="Status"><?php echo statusData($user->is_active); ?></a>
                        <div class="hidden is_active_div">
                            <?php echo Form::select('is_active',statusType() ,null, array('id'=>'is_active','class' => ' hidden select2 form-control')); ?>

                        </div>
                        <?php else: ?>
                        <?php echo Form::select('is_active',statusType() ,null, array('id'=>'is_active','class' => ' select2 form-control')); ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php if(isset($user->created_at)): ?>
                <tr>
                    <td>Created At</td>
                    <td><?php echo Time_Elapsed_String('@' . strtotime($user->created_at)); ?></td>
                <tr>
                    <?php endif; ?>
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
