<div class="ui-block-title">
    <h6 class="title">Personal Information</h6>
</div>
<div class="ui-block-content">
    {!! Form::open(array('route' => 'profile.setting.store', 'method'=>'post','class' => '','data-parsley-validate'=>"")) !!}
    <div class="text-center mb-10">
        @include('site.layouts.alert_save')
    </div>
    <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">User Name</label>
                {!! Form::text('name', $user->name, array('class' => 'form-control','data-rangelength'=>'[3,100]')) !!}
            </div>
            <div class="form-group label-floating">
                <label class="control-label">Your Email</label>
                {!! Form::email('email', $user->email, array('class' => 'form-control','required'=>'','data-parsley-type'=>"email")) !!}
            </div>
            <div class="form-group date-time-picker label-floating">
                <label class="control-label">Your Birthday</label>
                <input name="datetimepicker" value="{{$user->birthdate}}"/>
                <span class="input-group-addon">
                    <svg class="olymp-month-calendar-icon icon"><use
                                xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
                </span>
            </div>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">Nickname</label>
                {!! Form::text('display_name', $user->display_name, array('class' => 'form-control','data-rangelength'=>'[3,100]')) !!}
            </div>

            <div class="form-group label-floating is-select">
                <label class="control-label">Gender</label>
                {!! Form::select('gender',statusGender() ,$user->gender, array('id'=>'gender','class' => 'selectpicker form-control')) !!}
            </div>

            <div class="form-group label-floating">
                <label class="control-label">Your Phone Number</label>
                {!! Form::text('phone', $user->phone, array('id'=>'phone','class' => ' user_phone_buy form-control')) !!}
            </div>
        </div>

    <!--        <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="form-group label-floating is-select">
                <label class="control-label">Your Country</label>
                {!! Form::select('country',allCountry() ,$user->country, array('id'=>'country','class' => 'selectpicker form-control')) !!}

            </div>
        </div>-->
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">Write a little description about you</label>
                {!! Form::textarea('about_me', $user->about_me, array('id'=>'about_me','rows'=>'8','class' => '  form-control')) !!}
            </div>

        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating is-select">
                <label class="control-label">Your Nationality</label>
                <select name="nationality" id="nationality" data-live-search="true" class="selectpicker form-control">
                    @foreach($countries as $country)
                        <option value="{{strtolower($country->nationality_en)}}"
                                @if (strtolower($user->nationality )== strtolower($country->nationality_en))
                                selected="selected"
                                @endif
                        >{{$country->nationality_en}}</option>
                    @endforeach
                </select>
            </div>

            {{--<div style="display: block;text-align: center;margin-left: auto;margin-right: auto;" class="loader"><img--}}
            {{--class="loader"--}}
            {{--src="{{ asset('olympus/img/loader.gif') }}"--}}
            {{--alt="Loading....">--}}
            {{--</div>--}}
            <div class="form-group label-floating is-select">
                <label class="control-label">Your City</label>
                <select name="country" class="selectpicker form-control" data-live-search="true" id="select2 ">
                    @foreach($cities as $city)
                        <option value="{{strtolower($city->name_en)}}"
                                @if (strtolower($user->country )== strtolower($city->name_en))
                                selected="selected"
                                @endif
                        >{{$city->name_en}}</option>
                    @endforeach
                </select>
            </div>
            {{--<br>--}}
            {{--<div class="form-group label-floating is-select">--}}
            {{--<label class="control-label">Living City</label>--}}
            {{--{!! Form::text('address', $user->address, array('id'=>'address','class' => 'select2  form-control')) !!}--}}
            {{--</div>--}}

            <div class="form-group label-floating is-select">
                <label class="control-label">Relationship</label>
                {!! Form::select('social_status',socialstatusType() ,$user->social_status, array('id'=>'social_status','class' => 'selectpicker form-control')) !!}
            </div>
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
            <button class="btn btn-secondary btn-lg full-width" id="restore">Restore all Attributes</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>


{{--<div class="modal fade" id="delete-modal">--}}
{{--<div class="modal-dialog">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
{{--<h4 class="modal-title">Delete </h4>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--Do you want to confirm the delete ? ؟--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-default" data-dismiss="modal">No</button>--}}
{{--<button id="confirm-delete" type="button" class="btn btn-danger">Yes</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

@section("after_foot")
    @include('posts::script_news')
    <style>
        .loader {
            width: 60px;
            display: none;
        }
    </style>
    <script>
        name = $('input[name=name]').val();
        email = $('input[name=email]').val();
        social_status = $('select[name=social_status]').val();
        about_me = $('textarea[name=about_me]').val();
        address = $('input[name=address]').val();
        nationality = $('select[name=nationality]').val();
        phone = $('input[name=phone]').val();
        gender = $('select[name=gender]').val();
        display_name = $('input[name=display_name]').val();
        datetimepicker = $('input[name=datetimepicker]').val();

        $("#restore").click(function () {
//            $('#delete-modal').modal('show');

            $('input[name=name]').val(name);
            $('input[name=email]').val(email);
            $('select[name=social_status]').val(social_status);
            $('.selectpicker').selectpicker('refresh');

            $('input[name=address]').val(address);
            $('input[name=about_me]').val(about_me);
            $('select[name=nationality]').val(nationality);
            $('.selectpicker').selectpicker('refresh');

            $('input[name=phone]').val(phone);
            $('select[name=gender]').val(gender);
            $('.selectpicker').selectpicker('refresh');

            $('input[name=display_name]').val(display_name);
            $('input[name=datetimepicker]').val(datetimepicker);
            return false;
        })
        $('.top-header').bind('mouseover', function () {
            $('.cangecover').fadeIn();
        });
        $(".top-header").mouseleave(function () {
            $('.cangecover').fadeOut();

        });

        $(document).on('change', '#nationality', function () {
            $('#select2').hide('slow');
            $('.loader').show('slow');
            $('.errnationality').hide('slow');

            country = $("#nationality option:selected").text();
            console.log(country);


            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('#csfr').val()
                },
                url: "{{ route('getcities') }}",
                method: "GET",
                data: {country: country},
                success: function (data) {
                    console.log(data);

                    $("#select2 option").remove();
                    for (var i = 0; i < data.length; i++) {
                        $('#select2').append($('<option>', {
                            value: data[i].city_ascii,
                            text: data[i].city_ascii
                        }));
                    }
                    $('#select2').show('slow');
                    $('.loader').hide('slow');

                }
            });
        });


    </script>

@endsection
