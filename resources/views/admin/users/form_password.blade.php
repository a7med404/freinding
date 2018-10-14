@if(isset($user) && $user->id == Auth::user()->id)
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
                    {!! Form::password('password', array('placeholder' => 'Password','id'=>'inputpassword','class' => 'form-control user_pass_buy','id'=>'password','data-parsley-minlength'=>'8')) !!}
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
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','id'=>'inputnumber','class' => 'check_password_confirm form-control','data-parsley-equalto'=>'#password')) !!}
            </div>
        </div>
    </div>
</div>
<div class="box-footer form-actions text-center">
    <!--<a href="{{$link_return}}" class="btn btn-info">Return</a>-->
    <button type="reset" value="Reset" class="btn btn-default">Reset</button>
    <button type="submit" class="btn btn-success" >Change</button>
</div>
@else
<div class="form-body">
    <div class="form-group">
        <label for="inputpassword" class=" control-label btn-warning" style="text-align: center;padding: 20px 80px;">
            @if($new==1)
            Please,Add Basic Information firstly !!
            @else
            Not owner this account ,so Can't change this password !!
            @endif
        </label>
    </div>
</div>
<div class="box-footer">
     <!--text-center-->
    <a href="{{$link_return}}" class="btn btn-info">Return</a>
</div>
@endif