@extends('usersite::Auth.app')
@section('title','Step Two')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form method="post" class="needs-validation" novalidate id="steptwo" enctype="multipart/form-data"
                      action="{{url('update-user-two')}}">
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


                                        <img src="{{ asset('storage/images/users/default.png') }}"
                                             class="classimg profileimg" id="idimage"
                                             style="border-radius: 10% !important;">

                                        <input type="file" name="profileimage" hidden id="file_field"/>
                                        <div class="upload-btn-wrapper">
                                            <button style="background: white" type="button"
                                                    class="btn btn-md-2 open-modal btn-border-think custom-color c-grey"
                                            >Upload a file
                                            </button>
                                            <input type="file" class="sr-only" hidden id="input" name="image"
                                                   accept="image/*">
                                        </div>
                                    </div>
                                    <div class="progress myProgress1"
                                         style="width: 100%;display: none;">
                                        <div class="progress-bar myProgressBar1 progress-bar-striped progress-bar-animated"
                                             role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                             aria-valuemax="100">0%
                                        </div>
                                    </div>
                                    {{--<div class='progress' id="progressDivId">--}}
                                        {{--<div class='progress-bar' id='progressBar'></div>--}}
                                        {{--<div class='percent' id='percent'>0%</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Nickname</label>
                                        <input id="nicknamee" class="form-control" name="nickname" type="text"
                                               placeholder="" required>
                                        <span class="material-input"></span>
                                    </div>

                                    <div class="form-group label-floating is-select">
                                        <label class="control-label">Gender</label>
                                        <select class="selectpicker form-control" name="gendar">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>


                                    {{--<div class="form-group date-time-picker label-floating">--}}
                                    {{--<label class="control-label">Your Birthday</label>--}}
                                    {{--<input class="birth" placeholder="" name="datetimepicker" value="{{date('d/m/Y')}}">--}}
                                    {{--<span class="input-group-addon">--}}
                                    {{--<svg class="olymp-month-calendar-icon icon"><use--}}
                                    {{--xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}
                                    <div class="form-group date-time-picker label-floating ">
                                        <label class="control-label">Your Birthday</label>
                                        <input name="datetimepicker" value="{{date('d/m/Y')}}">
                                        <span class="input-group-addon">
                                        <svg class="olymp-month-calendar-icon icon"><use
                                                    xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
                                    </span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <br>
                    <br>
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
@endsection
@section('styles')
    <style>

        .flatpickr-input[readonly] {
            background-color: transparent !important;
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

        .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.endRange.nextMonthDay {
            background: #00c46a !important;
            -webkit-box-shadow: none;
            box-shadow: none;
            color: #fff;
            border-color: #00c46a !important;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('scripts')
    @include('site.partials.crop-image',['width'=>110,'height'=>110,'callback'=>'ajaxCall'])
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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

            let optional_config = {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                maxDate: "today"
            }
            $("[name=datetimepicker]").flatpickr(optional_config);
            $('.open-modal').on('click', function () {
                $('#input').click();
            })
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
@endsection



