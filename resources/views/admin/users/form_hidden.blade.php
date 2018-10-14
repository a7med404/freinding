@if($new!=1)
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
                                {!! Form::text('joined_date', $joined_date, array('placeholder' => 'Joined Date','id'=>'rangepicker4','class' => 'user_birth_date form-control')) !!}
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Lifetime Value</td>
                    <td>
                        <div class="user_dispaly">
                            <label class="control-label user_error_dispaly"></label>
                            @if(isset($lifetime_value))
                            <a data-pk="1" class="editable data_form" data-id="lifetime_value" data-title="Edit display Name">{{$lifetime_value}}</a>
                            {!! Form::text('lifetime_value', $lifetime_value, array('placeholder' => ' Lifetime Value','id'=>'lifetime_value','class' => ' hidden  form-control')) !!}
                            @else
                            {!! Form::text('lifetime_value', $lifetime_value, array('placeholder' => ' Lifetime Value','id'=>'lifetime_value','class' => ' form-control')) !!}
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Average Number of Sessions per User</td>
                    <td>
                        @if(isset($session_num))
                        <a data-pk="1" class="editable  data_form" data-id="session_num" data-title="Edit  Average Number of Sessions per User">{{$session_num}}</a>
                        <div class="hidden session_num_div">
                            {!! Form::select('session_num',fun_session_num() ,$session_num, array('id'=>'session_num','class' => ' hidden select2 form-control')) !!}
                        </div>
                        @else
                        {!! Form::select('session_num',fun_session_num() ,$session_num, array('id'=>'session_num','class' => '  select2 form-control')) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td> Average Session Duration by Minutes</td>
                    <td>
                        @if(isset($session_time))
                        <a data-pk="1" class="editable  data_form" data-id="session_time" data-title="Edit  Average Session Duration by Minutes">{{$session_time}}</a>
                        {!! Form::text('session_time', $session_time, array('placeholder' => ' Average Session Duration by Minutes','id'=>'session_time','class' => ' hidden form-control')) !!}
                        @else
                        {!! Form::text('session_time', $session_time, array('placeholder' => ' Average Session Duration by Minutes','id'=>'session_time','class' => '  form-control')) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td> Most Times Session</td>
                    <td>
                        @if(isset($most_session_time))
                        <a data-pk="1" class="editable  data_form" data-id="most_session_time" data-title="Edit  Most Times Session">{!!$most_session_time!!}</a>
                        {!! Form::text('most_session_time', $most_session_time, array('placeholder' => ' Most Times Session','id'=>'most_session_time','class' => ' hidden form-control')) !!}
                        @else
                        {!! Form::text('most_session_time', null, array('placeholder' => ' Most Times Session','id'=>'most_session_time','class' => '  form-control')) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td> GPS Log </td>
                    <td>
                        @if(isset($gps_log))
                        <a data-pk="1" class="editable  data_form" data-id="gps_log" data-title="Edit  GPS Log">{!!$gps_log!!}</a>
                        {!! Form::text('gps_log', $gps_log, array('placeholder' => ' GPS Log','id'=>'gps_log','class' => ' hidden form-control')) !!}
                        @else
                        {!! Form::text('gps_log', $gps_log, array('placeholder' => ' GPS Log','id'=>'gps_log','class' => '  form-control')) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>WIFI Network Log</td>
                    <td>
                        @if(isset($wifi_netLog))
                        <a data-pk="1" class="editable  data_form" data-id="wifi_netLog" data-title="Edit WIFI Network Log">{!!$wifi_netLog!!}</a>
                        {!! Form::text('wifi_netLog', $wifi_netLog, array('placeholder' => 'WIFI Network Log','id'=>'wifi_netLog','class' => ' hidden form-control')) !!}
                        @else
                        {!! Form::text('wifi_netLog', $wifi_netLog, array('placeholder' => 'WIFI Network Log','id'=>'wifi_netLog','class' => '  form-control')) !!}
                        @endif
                    </td>
                </tr> 
                <tr>
                    <td>Interests & Hobbies</td>
                    <td>
                        @if(isset($inter_hobbies))
                        <a data-pk="1" class="editable  data_form" data-id="inter_hobbies" data-title="Edit Interests & Hobbies">{!!$inter_hobbies!!}</a>
                        {!! Form::textarea('inter_hobbies', $inter_hobbies, array('placeholder' => 'Interests & Hobbies','id'=>'inter_hobbies','rows'=>'3','class' => ' hidden form-control')) !!}
                        @else
                        {!! Form::textarea('inter_hobbies', $inter_hobbies, array('placeholder' => 'Interests & Hobbies','id'=>'inter_hobbies','rows'=>'3','class' => '  form-control')) !!}
                        @endif
                    </td>
                </tr>
            </table>
            <div class="box-footer text-center">
                <!--<a href="{{$link_return}}" class="btn btn-default">Return</a>-->
                <a id='btnCheck_basic_inform' class="btn btn-success btnCheck_basic_inform">Save</a>
                <button type="submit" id="submit_basic_inform" class="btn btn-success hidden submit_basic_inform" >Save</button>
                <button type="reset" value="Reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </div>
</div>
@else
<div class="form-body">
    <div class="form-group">
        <label for="inputpassword" class=" control-label btn-warning" style="text-align: center;padding: 20px 80px;">
            Please,Add Basic Information firstly !!
        </label>
    </div>
</div>
<div class="box-footer">
     <!--text-center-->
    <a href="{{$link_return}}" class="btn btn-info">Return</a>
</div>
@endif