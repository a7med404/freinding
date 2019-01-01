<div class="ui-block-title">
    <h6 class="title">Personal Information</h6>
</div>
<div class="ui-block-content">
    <?php echo Form::open(array('route' => 'profile.setting.store', 'method'=>'post','class' => '','data-parsley-validate'=>"")); ?>

    <div class="text-center mb-10">
        <?php echo $__env->make('site.layouts.alert_save', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">User Name</label>
                <?php echo Form::text('name', $user->name, array('class' => 'form-control','data-rangelength'=>'[3,100]')); ?>

            </div>
            <div class="form-group label-floating">
                <label class="control-label">Your Email</label>
                <?php echo Form::email('email', $user->email, array('class' => 'form-control','required'=>'','data-parsley-type'=>"email")); ?>

            </div>
            <div class="form-group date-time-picker label-floating">
                <label class="control-label">Your Birthday</label>
                <input name="datetimepicker" value="<?php echo e($user->birthdate); ?>"/>
                <span class="input-group-addon">
                    <svg class="olymp-month-calendar-icon icon"><use
                                xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
                </span>
            </div>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">Nickname</label>
                <?php echo Form::text('display_name', $user->display_name, array('class' => 'form-control','data-rangelength'=>'[3,100]')); ?>

            </div>

            <div class="form-group label-floating is-select">
                <label class="control-label">Gender</label>
                <?php echo Form::select('gender',statusGender() ,$user->gender, array('id'=>'gender','class' => 'selectpicker form-control')); ?>

            </div>

            <div class="form-group label-floating">
                <label class="control-label">Your Phone Number</label>
                <?php echo Form::text('phone', $user->phone, array('id'=>'phone','class' => ' user_phone_buy form-control')); ?>

            </div>
        </div>

    <!--        <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="form-group label-floating is-select">
                <label class="control-label">Your Country</label>
                <?php echo Form::select('country',allCountry() ,$user->country, array('id'=>'country','class' => 'selectpicker form-control')); ?>


            </div>
        </div>-->
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">Write a little description about you</label>
                <?php echo Form::textarea('about_me', $user->about_me, array('id'=>'about_me','rows'=>'8','class' => '  form-control')); ?>

            </div>

        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating is-select">
                <label class="control-label">Your Nationality</label>
                <select name="nationality" id="nationality" class="selectpicker form-control">
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->country); ?>"   <?php if($user->nationality == $country->country): ?>
                        selected="selected"
                                <?php endif; ?>
                        ><?php echo e($country->country); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div style="display: block;text-align: center;margin-left: auto;margin-right: auto;" class="loader"><img
                        class="loader"
                        src="<?php echo e(asset('olympus/img/loader.gif')); ?>"
                        alt="Loading....">
            </div>
                                    <select name="country" id="select2">
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->city_ascii); ?>"   <?php if($user->country == $city->city_ascii): ?>
                        selected="selected"
                                <?php endif; ?>
                        ><?php echo e($city->city_ascii); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>            
            <br>
            
                
                
            
            
            <div class="form-group label-floating is-select">
                <label class="control-label">Relationship</label>
                <?php echo Form::select('social_status',socialstatusType() ,$user->social_status, array('id'=>'social_status','class' => 'selectpicker form-control')); ?>

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
    <?php echo Form::close(); ?>

</div>




    
        
            
                
                
            
            
                
            
            
                
                
            
        
    


<?php $__env->startSection("after_foot"); ?>
<style>
        .loader{
        width:60px;
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
                url: "<?php echo e(route('getcities')); ?>",
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

<?php $__env->stopSection(); ?>