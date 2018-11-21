

<input id="valu_user_key" type="hidden" class="form-control valu_user_key hidden" name="user_key" value="{{$user_key }}">
<div class="form-group label-floating is-empty {{ $errors->has('display_name') ? ' has-error' : '' }}">
    <label for="display_name" class="control-label">Display Name</label>
    <input id="user_name_buy" type="text" class="form-control user_name_buy" name="display_name" value="{{ old('display_name') }}" required autofocus>
    <span class="hide form-control  error-span user_error_namess" id="user_error_namess"></span>
    @if ($errors->has('display_name'))
    <span class="help-block">
        <strong>{{ $errors->first('display_name') }}</strong>
    </span>
    @endif
</div>
<div class="form-group date-time-picker label-floating">
    <label class="control-label">Your Birthday</label>
    <input name="datetimepicker" value="10/24/1984" />
    <!--<input name="birthdate" value="10/24/1984" />-->
    <span class="input-group-addon">
        <svg class="olymp-calendar-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
    </span>
</div>
<div class="form-group label-floating is-select">
    <label class="control-label">Your Gender</label>
    <select name="gender" class="selectpicker form-control">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>
<button type="submit" class="btn btn-purple btn-lg full-width add_register_second" id="add_register_second"> Next</button>
