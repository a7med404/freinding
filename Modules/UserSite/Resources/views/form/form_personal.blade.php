{!! Form::open(array('route' => 'profile.setting.store', 'method'=>'post','class' => '','data-parsley-validate'=>"")) !!}
<div class="text-center mb-10">
    @include('site.layouts.alert_save')
</div>
<div class="row">
    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group label-floating">
            <label class="control-label">User Name</label>
            {!! Form::text('name', $user->name, array('placeholder' => 'User Name','class' => 'form-control','data-rangelength'=>'[3,100]')) !!}
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Your Email</label>
            {!! Form::email('email', $user->email, array('placeholder' => 'Your Email','class' => 'form-control','required'=>'','data-parsley-type'=>"email")) !!}
        </div>
        <div class="form-group date-time-picker label-floating">
            <label class="control-label">Your Birthday</label>
            <input name="datetimepicker" value="{{$user->birthdate}}" />
            <span class="input-group-addon">
                <svg class="olymp-month-calendar-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
            </span>
        </div>
    </div>

    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group label-floating">
            <label class="control-label">Display Name</label>
            {!! Form::text('display_name', $user->display_name, array('placeholder' => 'Display Name','class' => 'form-control','data-rangelength'=>'[3,100]')) !!}
        </div>

        <div class="form-group label-floating is-select">
            <label class="control-label">Gender</label>
            {!! Form::select('gender',statusGender() ,$user->gender, array('id'=>'gender','class' => 'selectpicker form-control')) !!}
        </div>

        <div class="form-group label-floating">
            <label class="control-label">Your Phone Number</label>
            {!! Form::text('phone', $user->phone, array('placeholder' => 'Phone','id'=>'phone','class' => ' user_phone_buy form-control')) !!}
        </div>
    </div>

    <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="form-group label-floating is-select">
            <label class="control-label">Your Nationality</label>
            {!! Form::text('nationality', $user->nationality, array('placeholder' => 'Nationality','id'=>'nationality','class' => 'selectpicker form-control')) !!}
        </div>
    </div>
    <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="form-group label-floating is-select">
            <label class="control-label">Your Country</label>
            {!! Form::select('country',allCountry() ,$user->country, array('id'=>'country','class' => 'selectpicker form-control')) !!}

        </div>
    </div>
    <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="form-group label-floating is-select">
            <label class="control-label">Your City</label>
            {!! Form::text('address', $user->address, array('placeholder' => 'City','id'=>'address','class' => '  form-control')) !!}
        </div>
    </div>

    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group label-floating">
            <label class="control-label">Write a little description about you</label>
            {!! Form::textarea('about_me', $user->about_me, array('placeholder' => 'About me','id'=>'about_me','rows'=>'3','class' => '  form-control')) !!}
        </div>
        <div class="form-group label-floating is-select">
            <label class="control-label">Social Status</label>
            {!! Form::select('social_status',socialstatusType() ,$user->social_status, array('id'=>'social_status','class' => 'selectpicker form-control')) !!}
        </div>

<!--        <div class="form-group label-floating is-empty">
            <label class="control-label">Religious Belifs</label>
            <input class="form-control" placeholder="" type="text">
        </div>-->
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="form-group label-floating">
            <label class="control-label">Your Occupation</label>
            {!! Form::text('occupation', $user->occupation, array('placeholder' => 'Occupation','id'=>'occupation','class' => '  form-control')) !!}
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Working at</label>
            {!! Form::text('address_jop', $user->address_jop, array('placeholder' => 'Working at','id'=>'address_jop','class' => '  form-control')) !!}
        </div>

<!--        <div class="form-group label-floating is-select">
            <label class="control-label">Your Gender</label>
            <select class="selectpicker form-control">
                <option value="MA">Male</option>
                <option value="FE">Female</option>
            </select>
        </div>-->

<!--        <div class="form-group label-floating">
            <label class="control-label">Political Incline</label>
            <input class="form-control" placeholder="" type="text" value="Democrat">
        </div>-->
    </div>
<!--    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="form-group with-icon label-floating">
            <label class="control-label">Your Facebook Account</label>
            <input class="form-control" type="text" value="www.facebook.com/james-spiegel95321">
            <i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i>
        </div>
        <div class="form-group with-icon label-floating">
            <label class="control-label">Your Twitter Account</label>
            <input class="form-control" type="text" value="www.twitter.com/james_spiegelOK">
            <i class="fab fa-twitter c-twitter" aria-hidden="true"></i>
        </div>
        <div class="form-group with-icon label-floating is-empty">
            <label class="control-label">Your RSS Feed Account</label>
            <input class="form-control" type="text">
            <i class="fa fa-rss c-rss" aria-hidden="true"></i>
        </div>
        <div class="form-group with-icon label-floating">
            <label class="control-label">Your Dribbble Account</label>
            <input class="form-control" type="text" value="www.dribbble.com/thecowboydesigner">
            <i class="fab fa-dribbble c-dribbble" aria-hidden="true"></i>
        </div>
        <div class="form-group with-icon label-floating is-empty">
            <label class="control-label">Your Spotify Account</label>
            <input class="form-control" type="text">
            <i class="fab fa-spotify c-spotify" aria-hidden="true"></i>
        </div>
    </div>-->
  
    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
        <input name="submit" class="btn btn-primary btn-lg full-width" value="Save all Changes" type="submit">
    </div>
    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
        <button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
    </div>
</div>
{!! Form::close() !!}