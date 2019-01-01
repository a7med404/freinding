<!DOCTYPE html>
<html>
<head>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/Bootstrap/dist/css/bootstrap-reboot.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/Bootstrap/dist/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/Bootstrap/dist/css/bootstrap-grid.css')); ?>">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/css/main.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/css/fonts.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('olympus/css/custom.css')); ?>">

    <!--tag-style-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/select2.min.css')); ?>">

    <!--cropp-image-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/cropper.css')); ?>">

    <!--notifications-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/sweetalert.css')); ?>">


<body>
<div class="content-bg-wrap" style="background: url(../img/testimonial-header.png);"></div>
<!-- Header Standard Landing  -->
<div class="header--standard header--standard-landing" id="header--standard">
    <div class="container">
        <div class="">
            <!--header--standard-wrap-->
            <a href="<?php echo e(route('home')); ?>" class="logo">
                <div class="img-wrap">
                    <img src="<?php echo e(asset('olympus/img/logo.png')); ?>" alt="Friending">
                    <img src="<?php echo e(asset('olympus/img/logo-colored-small.png')); ?>" alt="Friending" class="logo-colored">
                </div>
                <div class="title-block">
                    <h6 class="logo-title">Friending</h6>
                    <div class="sub-title">SOCIAL NETWORK</div>
                </div>
            </a>
            <a href="#" class="open-responsive-menu js-open-responsive-menu">
                <svg class="olymp-menu-icon">
                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                </svg>
            </a>
            <div class="nav nav-pills nav1 header-menu">
                <div class="mCustomScrollbar">
                    <ul>
                        <li class="nav-item">
                            <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">About us</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Terms & Conditions</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact us</a>
                        </li>
                        <li class="close-responsive-menu js-close-responsive-menu">
                            <svg class="olymp-close-icon">
                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                            </svg>
                        </li>
                        <li class="nav-item js-expanded-menu">
                            <a href="#" class="nav-link">
                                <svg class="olymp-menu-icon">
                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                                </svg>
                                <svg class="olymp-close-icon">
                                    <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard"></div>
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <form method="post" class="needs-validation" novalidate id="stepthree" action="<?php echo e(url('updateuserthree')); ?>">
                <?php echo csrf_field(); ?>
                <div class="ui-block">

                    <div class="ui-block-title">
                        <h6 class="title">Registration Steps</h6>
                    </div>
                    <div class="ui-block-content">
                        <div class="crumina-module crumina-heading with-title-decoration">
                            <h5 class="heading-title">Step 3</h5>
                        </div>

                        <?php if($errors->any()): ?>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="err"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">RELATIONSHIP</label>
                                    <select class="selectpicker form-control" name="relationship">
                                        <option value="none">None</option>
                                        <option value="single">Single</option>
                                        <option value="inrelationship">In a Relationship</option>
                                        <option value="engaged">Engaged</option>
                                        <option value="married">Married</option>
                                    </select>
                                </div>


                                <div class="form-group label-floating is-select">
                                    <label class="control-label">NATIONALITY</label>
                                    <select class="selectpicker form-control nationality"  name="nationality" REQUIRED>
                                        <option value="">-- select one --</option>
                                        <option value="afghan">Afghan</option>
                                        <option value="albanian">Albanian</option>
                                        <option value="algerian">Algerian</option>
                                        <option value="american">American</option>
                                        <option value="andorran">Andorran</option>
                                        <option value="angolan">Angolan</option>
                                        <option value="antiguans">Antiguans</option>
                                        <option value="argentinean">Argentinean</option>
                                        <option value="armenian">Armenian</option>
                                        <option value="australian">Australian</option>
                                        <option value="austrian">Austrian</option>
                                        <option value="azerbaijani">Azerbaijani</option>
                                        <option value="bahamian">Bahamian</option>
                                        <option value="bahraini">Bahraini</option>
                                        <option value="bangladeshi">Bangladeshi</option>
                                        <option value="barbadian">Barbadian</option>
                                        <option value="barbudans">Barbudans</option>
                                        <option value="batswana">Batswana</option>
                                        <option value="belarusian">Belarusian</option>
                                        <option value="belgian">Belgian</option>
                                        <option value="belizean">Belizean</option>
                                        <option value="beninese">Beninese</option>
                                        <option value="bhutanese">Bhutanese</option>
                                        <option value="bolivian">Bolivian</option>
                                        <option value="bosnian">Bosnian</option>
                                        <option value="brazilian">Brazilian</option>
                                        <option value="british">British</option>
                                        <option value="bruneian">Bruneian</option>
                                        <option value="bulgarian">Bulgarian</option>
                                        <option value="burkinabe">Burkinabe</option>
                                        <option value="burmese">Burmese</option>
                                        <option value="burundian">Burundian</option>
                                        <option value="cambodian">Cambodian</option>
                                        <option value="cameroonian">Cameroonian</option>
                                        <option value="canadian">Canadian</option>
                                        <option value="cape verdean">Cape Verdean</option>
                                        <option value="central african">Central African</option>
                                        <option value="chadian">Chadian</option>
                                        <option value="chilean">Chilean</option>
                                        <option value="chinese">Chinese</option>
                                        <option value="colombian">Colombian</option>
                                        <option value="comoran">Comoran</option>
                                        <option value="congolese">Congolese</option>
                                        <option value="costa rican">Costa Rican</option>
                                        <option value="croatian">Croatian</option>
                                        <option value="cuban">Cuban</option>
                                        <option value="cypriot">Cypriot</option>
                                        <option value="czech">Czech</option>
                                        <option value="danish">Danish</option>
                                        <option value="djibouti">Djibouti</option>
                                        <option value="dominican">Dominican</option>
                                        <option value="dutch">Dutch</option>
                                        <option value="east timorese">East Timorese</option>
                                        <option value="ecuadorean">Ecuadorean</option>
                                        <option value="egyptian">Egyptian</option>
                                        <option value="emirian">Emirian</option>
                                        <option value="equatorial guinean">Equatorial Guinean</option>
                                        <option value="eritrean">Eritrean</option>
                                        <option value="estonian">Estonian</option>
                                        <option value="ethiopian">Ethiopian</option>
                                        <option value="fijian">Fijian</option>
                                        <option value="filipino">Filipino</option>
                                        <option value="finnish">Finnish</option>
                                        <option value="french">French</option>
                                        <option value="gabonese">Gabonese</option>
                                        <option value="gambian">Gambian</option>
                                        <option value="georgian">Georgian</option>
                                        <option value="german">German</option>
                                        <option value="ghanaian">Ghanaian</option>
                                        <option value="greek">Greek</option>
                                        <option value="grenadian">Grenadian</option>
                                        <option value="guatemalan">Guatemalan</option>
                                        <option value="guinea-bissauan">Guinea-Bissauan</option>
                                        <option value="guinean">Guinean</option>
                                        <option value="guyanese">Guyanese</option>
                                        <option value="haitian">Haitian</option>
                                        <option value="herzegovinian">Herzegovinian</option>
                                        <option value="honduran">Honduran</option>
                                        <option value="hungarian">Hungarian</option>
                                        <option value="icelander">Icelander</option>
                                        <option value="indian">Indian</option>
                                        <option value="indonesian">Indonesian</option>
                                        <option value="iranian">Iranian</option>
                                        <option value="iraqi">Iraqi</option>
                                        <option value="irish">Irish</option>
                                        <option value="israeli">Israeli</option>
                                        <option value="italian">Italian</option>
                                        <option value="ivorian">Ivorian</option>
                                        <option value="jamaican">Jamaican</option>
                                        <option value="japanese">Japanese</option>
                                        <option value="jordanian">Jordanian</option>
                                        <option value="kazakhstani">Kazakhstani</option>
                                        <option value="kenyan">Kenyan</option>
                                        <option value="kittian and nevisian">Kittian and Nevisian</option>
                                        <option value="kuwaiti">Kuwaiti</option>
                                        <option value="kyrgyz">Kyrgyz</option>
                                        <option value="laotian">Laotian</option>
                                        <option value="latvian">Latvian</option>
                                        <option value="lebanese">Lebanese</option>
                                        <option value="liberian">Liberian</option>
                                        <option value="libyan">Libyan</option>
                                        <option value="liechtensteiner">Liechtensteiner</option>
                                        <option value="lithuanian">Lithuanian</option>
                                        <option value="luxembourger">Luxembourger</option>
                                        <option value="macedonian">Macedonian</option>
                                        <option value="malagasy">Malagasy</option>
                                        <option value="malawian">Malawian</option>
                                        <option value="malaysian">Malaysian</option>
                                        <option value="maldivan">Maldivan</option>
                                        <option value="malian">Malian</option>
                                        <option value="maltese">Maltese</option>
                                        <option value="marshallese">Marshallese</option>
                                        <option value="mauritanian">Mauritanian</option>
                                        <option value="mauritian">Mauritian</option>
                                        <option value="mexican">Mexican</option>
                                        <option value="micronesian">Micronesian</option>
                                        <option value="moldovan">Moldovan</option>
                                        <option value="monacan">Monacan</option>
                                        <option value="mongolian">Mongolian</option>
                                        <option value="moroccan">Moroccan</option>
                                        <option value="mosotho">Mosotho</option>
                                        <option value="motswana">Motswana</option>
                                        <option value="mozambican">Mozambican</option>
                                        <option value="namibian">Namibian</option>
                                        <option value="nauruan">Nauruan</option>
                                        <option value="nepalese">Nepalese</option>
                                        <option value="new zealander">New Zealander</option>
                                        <option value="ni-vanuatu">Ni-Vanuatu</option>
                                        <option value="nicaraguan">Nicaraguan</option>
                                        <option value="nigerien">Nigerien</option>
                                        <option value="north korean">North Korean</option>
                                        <option value="northern irish">Northern Irish</option>
                                        <option value="norwegian">Norwegian</option>
                                        <option value="omani">Omani</option>
                                        <option value="pakistani">Pakistani</option>
                                        <option value="palauan">Palauan</option>
                                        <option value="panamanian">Panamanian</option>
                                        <option value="papua new guinean">Papua New Guinean</option>
                                        <option value="paraguayan">Paraguayan</option>
                                        <option value="peruvian">Peruvian</option>
                                        <option value="polish">Polish</option>
                                        <option value="portuguese">Portuguese</option>
                                        <option value="qatari">Qatari</option>
                                        <option value="romanian">Romanian</option>
                                        <option value="russian">Russian</option>
                                        <option value="rwandan">Rwandan</option>
                                        <option value="saint lucian">Saint Lucian</option>
                                        <option value="salvadoran">Salvadoran</option>
                                        <option value="samoan">Samoan</option>
                                        <option value="san marinese">San Marinese</option>
                                        <option value="sao tomean">Sao Tomean</option>
                                        <option value="saudi">Saudi</option>
                                        <option value="scottish">Scottish</option>
                                        <option value="senegalese">Senegalese</option>
                                        <option value="serbian">Serbian</option>
                                        <option value="seychellois">Seychellois</option>
                                        <option value="sierra leonean">Sierra Leonean</option>
                                        <option value="singaporean">Singaporean</option>
                                        <option value="slovakian">Slovakian</option>
                                        <option value="slovenian">Slovenian</option>
                                        <option value="solomon islander">Solomon Islander</option>
                                        <option value="somali">Somali</option>
                                        <option value="south african">South African</option>
                                        <option value="south korean">South Korean</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="sri lankan">Sri Lankan</option>
                                        <option value="sudanese">Sudanese</option>
                                        <option value="surinamer">Surinamer</option>
                                        <option value="swazi">Swazi</option>
                                        <option value="swedish">Swedish</option>
                                        <option value="swiss">Swiss</option>
                                        <option value="syrian">Syrian</option>
                                        <option value="taiwanese">Taiwanese</option>
                                        <option value="tajik">Tajik</option>
                                        <option value="tanzanian">Tanzanian</option>
                                        <option value="thai">Thai</option>
                                        <option value="togolese">Togolese</option>
                                        <option value="tongan">Tongan</option>
                                        <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                        <option value="tunisian">Tunisian</option>
                                        <option value="turkish">Turkish</option>
                                        <option value="tuvaluan">Tuvaluan</option>
                                        <option value="ugandan">Ugandan</option>
                                        <option value="ukrainian">Ukrainian</option>
                                        <option value="uruguayan">Uruguayan</option>
                                        <option value="uzbekistani">Uzbekistani</option>
                                        <option value="venezuelan">Venezuelan</option>
                                        <option value="vietnamese">Vietnamese</option>
                                        <option value="welsh">Welsh</option>
                                        <option value="yemenite">Yemenite</option>
                                        <option value="zambian">Zambian</option>
                                        <option value="zimbabwean">Zimbabwean</option>
                                    </select>
                                    <div class="invalid-feedback errnationality">
                                        <div class="error-box">
                                            <div class="danger">
                                                <svg class="olymp-little-delete">
                                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use>
                                                </svg>
                                            </div>
                                            <h5 class="title">Nationality REQUIRED</h5>
                                            <p>Enter your Nationality</p>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Living City</label>
                                    <input class="form-control living" name="livingcity"  type="text"
                                           placeholder="" required>

                                    <div class="invalid-feedback errliving">
                                        <div class="error-box">
                                            <div class="danger">
                                                <svg class="olymp-little-delete">
                                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use>
                                                </svg>
                                            </div>
                                            <h5 class="title">Living City REQUIRED</h5>
                                            <p>Enter your LivingCity</p>
                                        </div>
                                    </div>


                                    <span class="material-input"></span>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>

                <br> <br>
                <div class="row">
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn btn-md btn-success" style="margin-left: auto; margin-right: auto;
display: block; background: #00c46a; padding: 10px 55px;" type="submit">Next
                        </button>

                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
</body>


<style>
    div#header--standard {
        background: #ff5e3a;
        padding: 16px 2px !important;
    }

    .err {
        background: #ff6e58;
        padding: 10px;
        color: white;
        font-size: 16px;
        margin: 1px;
    }
    .errliving > .error-box {
        bottom: 0px !important;
        height: 190px;
        top: 61px;

    }
    .errnationality > .error-box {
        bottom: 0px !important;
        top: 61px;
        height: 200px;
    }
</style>

<?php echo $__env->make('site.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    $(document).ready(function () {
        $(document).on('submit', '#stepthree', function () {

          if ($(".living").val() === "") {
                $('.errnationality').hide('slow');
                $('.errliving').show('slow');

            }else{
                $('#stepthree').submit();
            }
            return false;
        });
    });
</script>


