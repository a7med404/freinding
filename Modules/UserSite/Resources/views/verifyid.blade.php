@extends('site.layouts.app')
@section('content')
    <div class="main-header">
        <div class="content-bg-wrap bg-group"></div>
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                    <div class="main-header-content">
                        <h1>Verify your profile</h1>
                        <p>Make your profile verified</p>
                    </div>
                </div>
            </div>
        </div>
        <img class="img-bottom" src="{{ asset('olympus/img/account-bottom.png') }}" alt="friends">
    </div>

    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="row">
                    <div class="col col-lg-12 col-sm-12 col-12" style="background: white;">
                        <p class="title">REQUEST VERIFICATION</p>
                        <div class="ui-block">
                            <div class="alert" id="message" style="display: none"></div>
                            <div id="underprocessdiv" style="display: none;">
                                <div id="underprocessdiv">
                                    <div class="titlestatuswarn">UNDER REVIEW</div>
                                    <p class="desc">Your request under review , you'll receive a notification letting
                                        you know if your account has been verified or not. If your request is denied,
                                        you can submit a new request after 30 days.</p><br>
                                </div>
                            </div>

                            @if(isset($checkuserimageid) && $checkuserimageid->status =='underprocess')
                                <div id="underprocessdiv">
                                    <div class="titlestatuswarn">UNDER REVIEW</div>
                                    <p class="desc">Your request under review , you'll receive a notification letting
                                        you know if your account has been verified or not. If your request is denied,
                                        you can submit a new request after 30 days.</p><br>
                                </div>
                            @elseif(isset($checkuserimageid) &&$checkuserimageid->status =='unverified')
                                <div id="unverifieddiv">
                                    <img style="width: 80px;" src="{{ asset('olympus/img/refused.png') }}"  id="idimage">
                                    <div style="margin-bottom:30px;margin-top: 18px;" class="titlestatusrefuesed">REFUSDED</div>
                                    <p style="text-align: center;" class="desc">Unfortuntely, Your Verification request is refused. Keep in mind that you can submit a new request after 30 days.</p>
                                    <br><br><br>
                                </div>
                            @elseif(isset($checkuserimageid) && $checkuserimageid->status =='verified')
                                <div id="verifieddiv">

                                    <img style="width: 80px;" src="{{ asset('olympus/img/success.png') }}"  id="idimage">
                                    <div style="margin-bottom:30px;margin-top: 18px;" class="titlestatussuccess">CONGRATULATION</div>
                                <p class="desc">Your Verification request is approved.  Keep in mind that Admin can remove verified badges at any time, and may take away your badge or disable your account if you Changing your nickname </p>
<br><br><br>

                                </div>
                            @else
                                <div id="notuploaded">
                                    <form method="post" id="upload_form" enctype="multipart/form-data">
                                        <div class="loader"><img class="loader"
                                                                 src="{{ asset('olympus/img/loader.gif') }}"
                                                                 alt="Loading....">
                                        </div>
                                        <input type="hidden" id="csfr" value="{{ csrf_token() }}">
                                        <img src="{{ asset('olympus/img/imgid.png') }}"  class="classimg" id="idimage">


                                        <div class="form-group center">
                                            <label for="file-upload" class="custom-file-upload">
                                                Upload your ID image
                                            </label>

                                            <input id="file-upload" class="file" type="file" name="select_file"/>
                                        </div>

                                        <p class="desc">
                                            Kindly provide the required form of identification (example:
                                            government-issued photo ID). The new name with the verified badge will be
                                            the same your name writing in ID. Keep in mind that even if your account is
                                            eligible for verification, submitting a request doesn't guarantee that your
                                            account will be verified
                                        </p>
                                        <br>


                                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <input type="submit" name="upload" id="upload"
                                                   class="btn btn-primary btn-lg full-width" value="Upload">
                                        </div>
                                    </form>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>


            <div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12  responsive-display-none">
                <div class="ui-block">
                    <!-- Your Profile  -->
                @include('usersite::list-menu')
                <!-- ... end Your Profile  -->
                </div>
            </div>
        </div>
    </div>



@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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

        $(".file").change(function () {
            readURL(this);
        });


        $('#upload_form').on('submit', function (event) {
            $('.loader').show();
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('#csfr').val()
                },
                url: "{{ route('postverify') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    $(".classimg").attr("src", data.src);
                    $('.loader').hide('slow');
                    $('#notuploaded').remove();
                    $('#unverifieddiv').remove();
                    $('#underprocessdiv').show('slow');
                }
            });
        });
    });
</script>


<style>
    input#file-upload {
        position: relative;
        top: 65px;
        border: none;
        width: 27%;
        margin-left: auto;
        margin-right: auto;
    }

    input#file-upload::-webkit-file-upload-button {
        color: #8c8c8c;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 13px 10px;
        background: white;
        cursor: pointer;
    }

    .custom-file-upload {
        position: relative;
        top: 70px;
        margin-left: 15px;
        display: block;
        font-size: 17px;
    }

    img#idimage {
        width: 20%;
        display: block;
        margin-bottom: 0px;
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
    }

    .loader {
        left: 40%;
        top: 25%;
        height: 6em;
        position: absolute;
        width: 6em;
        z-index: 9999;
        margin-left: auto;
        margin-right: auto;
        display: none;
    }

    /*div#underprocess {*/
    /*position: absolute;*/
    /*top: 90px;*/
    /*margin-left: 15px;*/
    /*display: block;*/
    /*font-size: 17px;*/
    /*float: right;*/
    /*color: orange;*/
    /*width: 70%;*/
    /*}*/



    span.notver {
        color: red;
        font-size: 16px;
        margin: 15px;
        position: absolute;
        font-style: italic;
    }

    .center {
        margin-right: auto;
        margin-left: auto;
        text-align: center;
        display: block;
        bottom: 68px;
    }

    .title {
        font-size: 18px;
        margin-top: 20px;
        color: #515365;
        font-weight: 700;
    }

    p.desc {
        margin: 15px;
        font-weight: 500;
        font-size: 16px;
        color: #888da8;
    }

    .titlestatuswarn {
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        color: #D18C13;
        margin: 30px;
    }

    .titlestatussuccess{
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        color: #51AF39;
        margin: 30px;
    }

    .titlestatusrefuesed{
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        color: red;
        margin: 30px;
    }
</style>
