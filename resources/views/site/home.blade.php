@extends('site.layouts.app')
@section('content')
    @if(empty($user_key))
        @include('site.home.pagelogout')
    @else
        @include('site.home.pagelogin')
    @endif
@endsection

