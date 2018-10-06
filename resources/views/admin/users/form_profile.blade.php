<div class="col-md-4">
    <div class="text-center">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <input id="image" name="image" type="hidden" value="{{ $image }}">
            @if($image == Null)
            <img src="{{ asset('css/admin/img/authors/avatar.jpg') }}" width="200" class="img-responsive img-radius" height="150" alt="user">
            @else
            <img  src="{{ $image }}"  width="200" width="200" class="img-responsive img-radius" height="150" alt="riot"/>
            @endif
            <div class="clearfix"></div>
            @if(Auth::user()->can('access-all', 'user-all'))
            <a href="{{URL::asset('filemanager/dialog.php?type=1&akey=admin_panel&field_id=image')}}" class="btn iframe-btn btn-success fa fa-download" type="button"></a>
            @else
            <a href="{{URL::asset('filemanager/dialog.php?type=0&akey=user&field_id=image')}}" class="btn iframe-btn btn-success fa fa-download" type="button"></a>
            @endif
            <a class="btn btn-danger fa fa-remove  remove_image_link" type="button"></a>
            <!--            <div class="fileinput-new thumbnail img-file">
                            <img src="{{ asset('css/admin/img/authors/avatar.jpg') }}" width="200" class="img-responsive" height="150" alt="riot">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-max">
                        </div>
                        <div>
                            <span class="btn btn-default btn-file ">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="...">
                            </span>
                            <a class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
            -->
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
                            @if(isset($user->name))
                            <a data-pk="1" class="editable data_form" data-id="name"  data-title="Edit User Name">{{$user->name}}</a>
                            {!! Form::text('name', null, array('placeholder' => 'Name','id'=>'name','class' => ' hidden form-control user_name_buy','required'=>'')) !!}
                            @else
                            {!! Form::text('name', null, array('placeholder' => 'Name','id'=>'name','class' => ' form-control user_name_buy','required'=>'')) !!}
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Display Name</td>
                    <td>
                        <div class="user_dispaly">
                            <label class="control-label user_error_dispaly"></label>
                            @if(isset($user->display_name))
                            <a data-pk="1" class="editable data_form" data-id="display_name" data-title="Edit display Name">{{$user->display_name}}</a>
                            {!! Form::text('display_name', null, array('placeholder' => 'Display Name','id'=>'display_name','class' => ' hidden user_display_name form-control')) !!}
                            @else
                            {!! Form::text('display_name', null, array('placeholder' => 'Display Name','id'=>'display_name','class' => 'user_display_name form-control')) !!}
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>
                        <div class="user_email">
                            <label class="control-label user_error_email"></label>
                            @if(isset($user->email))
                            <a data-pk="1" class="editable data_form" data-id="email" data-title="Edit E-mail">{{$user->email}}</a>
                            {!! Form::text('email', null, array('placeholder' => 'Email','id'=>'email','class' => ' hidden  user_email_buy form-control','required'=>'','data-parsley-type'=>"email")) !!}
                            @else
                            {!! Form::text('email', null, array('placeholder' => 'Email','id'=>'email','class' => ' user_email_buy form-control','required'=>'','data-parsley-type'=>"email")) !!}
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>
                        <div class="user_phone">
                            <label class="control-label user_error_phone"></label>
                            @if(isset($user->phone))
                            <a data-pk="1" class="editable data_form" data-id="phone" data-title="Edit Phone Number">{{$user->phone}}</a>
                            {!! Form::text('phone', null, array('placeholder' => 'Phone','id'=>'phone','class' => ' hidden user_phone_buy form-control')) !!}
                            @else
                            {!! Form::text('phone', null, array('placeholder' => 'Phone','id'=>'phone','class' => ' user_phone_buy form-control')) !!}
                            @endif
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
                                {!! Form::text('birthdate', null, array('placeholder' => 'Birthdate','id'=>'rangepicker4','class' => 'user_birth_date form-control')) !!}
                            </div>
                        </div>
                    </td>
                </tr>
                @if($new==1)
                <tr>
                    <td>Password</td>
                    <td>
                        <div class="user_pass">
                            <label class="control-label user_error_pass"></label>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control user_pass_buy','id'=>'password','data-parsley-minlength'=>'8')) !!}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'check_password_confirm form-control','data-parsley-equalto'=>'#password')) !!}
                    </td>
                </tr>
                @endif
                @if(Auth::user()->can('access-all', 'user-all'))
                <tr>
                    <td>Roles</td>
                    <td>
                        @if(isset($userRole)&&!empty($userRole))
                        <a data-pk="1" class="editable data_form" data-id="roles" data-title="Edit Roles">
                            @if(!empty($user->roles))
                            @foreach($user->roles as $v)
                            <small class="label bg-green" style="color: #000;">{{ $v->display_name }}</small>
                            @endforeach
                            @endif
                        </a>
                        <div class="hidden roles_div">
                            {!! Form::select('roles[]', $roles,$userRole, array('id'=>'roles','class' => 'select2 form-control','multiple')) !!}
                        </div>
                        @else
                        {!! Form::select('roles[]', $roles,$userRole, array('id'=>'roles','class' => 'select2 form-control','multiple')) !!}
                        @endif
                    </td>
                </tr>
                @endif
                <tr>
                    <td>Gender</td>
                    <td>
                        @if(isset($user->gender))
                        <a data-pk="1" class="editable  data_form" data-id="gender" data-title="Edit Gender">{{$user->gender}}</a>
                        <div class="hidden gender_div">
                            {!! Form::select('gender',statusGender() ,null, array('id'=>'gender','class' => ' hidden select2 form-control')) !!}
                        </div>
                        @else
                        {!! Form::select('gender',statusGender() ,null, array('id'=>'gender','class' => '  select2 form-control')) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        @if(isset($user->address))
                        <a data-pk="1" class="editable  data_form" data-id="address" data-title="Edit Address">{{$user->address}}</a>
                        {!! Form::text('address', null, array('placeholder' => 'Address','id'=>'address','class' => ' hidden form-control','required'=>'','data-parsley-type'=>"email")) !!}
                        @else
                        {!! Form::text('address', null, array('placeholder' => 'Address','id'=>'address','class' => '  form-control','required'=>'','data-parsley-type'=>"email")) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        @if(isset($user->country))
                        <a data-pk="1" class="editable  data_form" data-id="country" data-title="Edit City">{!!countryData($user->country)!!}</a>
                        <div class="hidden country_div">   
                            {!! Form::select('country',allCountry() ,null, array('id'=>'country','class' => ' hidden select2 form-control')) !!}
                        </div>
                        @else
                        {!! Form::select('country',allCountry() ,null, array('id'=>'country','class' => 'select2 form-control')) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Nationality</td>
                    <td>
                        @if(isset($user->nationality))
                        <a data-pk="1" class="editable  data_form" data-id="nationality" data-title="Edit Nationality">{{$user->nationality}}</a>
                        {!! Form::text('nationality', null, array('placeholder' => 'Nationality','id'=>'nationality','class' => ' hidden form-control','required'=>'','data-parsley-type'=>"email")) !!}
                        @else
                        {!! Form::text('nationality', null, array('placeholder' => 'Nationality','id'=>'nationality','class' => '  form-control','required'=>'','data-parsley-type'=>"email")) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Address Jop</td>
                    <td>
                        @if(isset($user->address_jop))
                        <a data-pk="1" class="editable  data_form" data-id="address_jop" data-title="Edit Address Jop">{{$user->address_jop}}</a>
                        {!! Form::text('address_jop', null, array('placeholder' => 'Address Jop','id'=>'address_jop','class' => ' hidden form-control','required'=>'','data-parsley-type'=>"email")) !!}
                        @else
                        {!! Form::text('address_jop', null, array('placeholder' => 'Address Jop','id'=>'address_jop','class' => '  form-control','required'=>'','data-parsley-type'=>"email")) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>social_status</td>
                    <td>
                        @if(isset($user->social_status))
                        <a id="status" class=" data_form" data-id="social_status" data-type="select" data-pk="1" data-value="1" data-title="Status">{!!socialstatusData($user->social_status)!!}</a>
                        <div class="hidden social_status_div">
                            {!! Form::select('social_status',socialstatusType() ,null, array('id'=>'social_status','class' => ' hidden select2 form-control')) !!}
                        </div>
                        @else
                        {!! Form::select('social_status',socialstatusType() ,null, array('id'=>'social_status','class' => ' select2 form-control')) !!}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        @if(isset($user->is_active))
                        <a id="status" class=" data_form" data-id="is_active" data-type="select" data-pk="1" data-value="1" data-title="Status">{!!statusData($user->is_active)!!}</a>
                        <div class="hidden is_active_div">
                            {!! Form::select('is_active',statusType() ,null, array('id'=>'is_active','class' => ' hidden select2 form-control')) !!}
                        </div>
                        @else
                        {!! Form::select('is_active',statusType() ,null, array('id'=>'is_active','class' => ' select2 form-control')) !!}
                        @endif
                    </td>
                </tr>
                @if(isset($user->created_at))
                <tr>
                    <td>Created At</td>
                    <td>{!!Time_Elapsed_String('@' . strtotime($user->created_at))!!}</td>
                <tr>
                    @endif
            </table>
            <div class="box-footer text-center">
                <a href="{{$link_return}}" class="btn btn-info">Return</a>
                <a id='btnCheck_basic_inform' class="btn btn-success btnCheck_basic_inform">Save</a>
                <button type="submit" id="submit_basic_inform" class="btn btn-success hidden submit_basic_inform" >Save</button>
            </div>
        </div>
    </div>
</div>
