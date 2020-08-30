@extends('site.layouts.app')
@section('content')
@include('usersite::profile_header')
<!-- Your Account Personal Information -->
<div class="container">
    <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
            <div class="ui-block">
                    <!-- Personal Information Form  -->
                    @if($form_type=='personal')
                    @include('usersite::form.form_personal')
                    @elseif($form_type=='changepassword')
                    @include('usersite::form.form_change_password')
                    @elseif($form_type=='countsetting')
                    @include('usersite::form.form_account_setting')
                    @endif
                    <!-- ... end Personal Information Form  -->
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
<!-- ... end Your Account Personal Information -->
@include('site.home.popup')
@include('site.partials.crop-image',['width'=>1220,'height'=>400,'callback'=>'updateHeaderImage','crop'=>'square','table'=>'headers','id'=>'header-image-modal'])
@include('site.partials.crop-image',['width'=>110,'height'=>110,'callback'=>'ajaxCall','crop'=>'circle','table'=>'users','id'=>'user-modal'])
    <div class="image-container" style="display: none">
        <span class="close-image">
            <i class="fas fa-times fa-2x"></i>
        </span>
        <div class="text-center">
            <img src="{{asset('storage/images/headers/1b6c8467-f6dc-1eb6-a028-66447ff63c9a.jpg')}}" alt="image" class="image-user">
        </div>
    </div>
@endsection


