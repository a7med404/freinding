@extends('site.layouts.app')
@section('content')
@include('usersite::profilelist')
@include('site.home.sideleft')
@include('site.home.sideright')
@include('site.layouts.header')
@include('usersite::profileheader')
<!-- Your Account Personal Information -->
<div class="container">
    <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Personal Information</h6>
                </div>
                <div class="ui-block-content">
                    <!-- Personal Information Form  -->
                    @if($form_type=='personal')
                    @include('usersite::form_personal')
                    @endif
                    <!-- ... end Personal Information Form  -->
                </div>
            </div>
        </div>
        <div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12  responsive-display-none">
            <div class="ui-block">
                <!-- Your Profile  -->
                @include('usersite::listmenu')
                <!-- ... end Your Profile  -->
            </div>
        </div>
    </div>
</div>
<!-- ... end Your Account Personal Information -->
@include('site.home.popup')
@endsection

