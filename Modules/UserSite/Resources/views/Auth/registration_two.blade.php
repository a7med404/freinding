<!DOCTYPE html>
<html>
<head>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/Bootstrap/dist/css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/Bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/Bootstrap/dist/css/bootstrap-grid.css') }}">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/main.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/fonts.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('olympus/css/custom.css') }}">

    <!--tag-style-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">

    <!--cropp-image-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cropper.css') }}">

    <!--notifications-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">


<body>
<div class="content-bg-wrap" style="background: url(../img/testimonial-header.png);"></div>
<!-- Header Standard Landing  -->
<div class="header--standard header--standard-landing" id="header--standard">
    <div class="container">
        <div class="">
            <!--header--standard-wrap-->
            <a href="{{ route('home') }}" class="logo">
                <div class="img-wrap">
                    <img src="{{ asset('olympus/img/logo.png') }}" alt="Friending">
                    <img src="{{ asset('olympus/img/logo-colored-small.png') }}" alt="Friending" class="logo-colored">
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
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
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
            <form method="post" class="needs-validation" novalidate id="steptwo" enctype="multipart/form-data"
                  action="{{url('updateusertwo')}}">
                @csrf
                <div class="ui-block">

                    <div class="ui-block-title">
                        <h6 class="title">Registration Steps</h6>
                    </div>

                    <div class="ui-block-content">
                        <div class="crumina-module crumina-heading with-title-decoration">
                            <h5 class="heading-title">Step 2</h5>
                        </div>

                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="err">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="row">
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="imgupload" style="text-align: center">
                                    <div style="display: none" class="loader"><img class="loader"
                                                                                   src="{{ asset('olympus/img/loader.gif') }}"
                                                                                   alt="Loading....">
                                    </div>


                                    <img src="{{ asset('storage/images/users/default.png') }}" class="classimg" id="idimage">


                                    <div class="upload-btn-wrapper">
                                        <button style="background: white"
                                                class="btn btn-md-2 btn-border-think custom-color c-grey">Upload a file
                                        </button>
                                        <input type="file" name="profileimage" id="file-upload"/>
                                        <div class="invalid-feedback fileerr">
                                            <div class="error-box">
                                                <div class="danger">
                                                    <svg class="olymp-little-delete">
                                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use>
                                                    </svg>
                                                </div>
                                                <h5 class="title">Upload your image</h5>
                                                <p>Select jpeg, png, jpg Image</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">NICKNAME</label>
                                    <input id="nicknamee" class="form-control" name="nickname" type="text"
                                           placeholder="" required>
                                    <div class="invalid-feedback nickna">
                                        <div class="error-box">
                                            <div class="danger">
                                                <svg class="olymp-little-delete">
                                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use>
                                                </svg>
                                            </div>
                                            <h5 class="title">NICKNAME REQUIRED</h5>
                                            <p>Enter your nickname</p>
                                        </div>
                                    </div>
                                    <span class="material-input"></span>
                                </div>

                                <div class="form-group label-floating is-select">
                                    <label class="control-label">GENDAR</label>
                                    <select class="selectpicker form-control" name="gendar">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>


                                <div class="form-group date-time-picker label-floating">
                                    <label class="control-label">Your Birthday</label>
                                    <input class="birth" placeholder="" name="datetimepicker" value="24/10/1984">
                                    <div class="invalid-feedback birtherr">
                                        <div class="error-box">
                                            <div class="danger">
                                                <svg class="olymp-little-delete">
                                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use>
                                                </svg>
                                            </div>
                                            <h5 class="title">Birthday Required</h5>
                                            <p>Enter your birthday</p>
                                        </div>
                                    </div>
                                    <span class="input-group-addon">
                    <svg class="olymp-month-calendar-icon icon"><use
                                xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
                </span>
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

    .upload-btn-wrapper {
        overflow: hidden;
        display: inline-block;
        top: 40%;
        position: absolute;
        margin-left: 40px;
        cursor: pointer;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
    }

    img#idimage {
        width: 150px;
        height: 150px;
    }

    .fileerr > .error-box {
        position: relative !important;
        right: 0px !important;
    }

    .birtherr > .error-box {
        bottom: 0px !important;
        top: 20px !important;
        height: 190px;
    }

    .err {
        background: #ff6e58;
        padding: 10px;
        color: white;
        font-size: 16px;
        margin: 1px;
    }

</style>

@include('site.layouts.foot')

<script>
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    console.log("here");

                    $('.classimg').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file-upload").change(function () {
            readURL(this);
        });

        $(document).on('submit', '#steptwo', function () {
//                        if ($('#file-upload').get(0).files.length === 0) {
//                            $('.fileerr').show('slow');
//                        }


            if ($('.birth').val() === '') {
                $('.birtherr').show('slow');
            } else {
                $('#steptwo').submit();
            }
            return false;
        });
    });
</script>


