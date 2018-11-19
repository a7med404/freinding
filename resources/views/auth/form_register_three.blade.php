

<input id="valu_user_key" type="hidden" class="form-control valu_user_key hidden" name="user_key" value="{{$user_key }}">

<div class="form-group label-floating is-empty " >
    <label class="control-label">Your City</label>
    {!! Form::text('address', null, array('placeholder' => 'City','id'=>'address','class' => '  form-control')) !!}
</div>

<div class="form-group label-floating is-select">
    <label class="control-label">Your Nationality</label>
    {!! Form::select('nationality',allNationals() ,null, array('id'=>'nationality','class' => 'selectpicker form-control')) !!}
</div>
<div class="form-group label-floating is-select"  style="margin-top:100px">
    <label class="control-label">Social Status</label>
    {!! Form::select('social_status',socialstatusType() ,null, array('id'=>'social_status','class' => 'selectpicker form-control')) !!}
</div>
<button type="submit"  style="margin-top:100px" class="btn btn-purple btn-lg full-width add_register_three" id="add_register_three"> Next</button>
