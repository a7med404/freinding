@extends('site.layouts.app')
@section('after_head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    @include('usersite::profile_header')
    <div class="container">
        <div class="row">
        		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12 l-side">
                @include('usersite::list-menu')
            </div>
              @if($profile_user->id != Auth::id())
              <buttons-component v-bind:user="{{$profile_user->id}}"></buttons-component>
              @endif
            <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="text-center" style="margin: 0 auto;">
                        <span class="h4" style="color: #9a9fbf;">No Friends Yet.</span>

                    </div>
                </div>
            </div>
            <div class="col col-xl-3 order-xl-3 col-lg-3 order-lg-3 col-md-12 order-md-3 col-sm-12  responsive-display-none">
                @include('usersite::friends-photos-videos')
            </div>
        </div>
    </div>
    @include('site.home.popup')
    @include('site.partials.crop-image',['width'=>1220,'height'=>400,'callback'=>'updateHeaderImage','crop'=>'square','table'=>'headers','id'=>'header-image-modal'])
    @include('site.partials.crop-image',['width'=>110,'height'=>110,'callback'=>'ajaxCall','crop'=>'circle','table'=>'users','id'=>'user-modal'])
    <div class="image-container" style="display: none">
        <span class="close-image">
            <i class="fas fa-times fa-2x"></i>
        </span>
        <div class="text-center">
            <img src="{{asset('storage/images/headers/1b6c8467-f6dc-1eb6-a028-66447ff63c9a.jpg')}}" alt="image"
                 class="image-user">
        </div>
    </div>
@endsection
@section('after_foot')
@endsection
