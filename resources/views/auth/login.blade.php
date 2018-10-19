@extends('site.layouts.app')
@section('content')
    @include('site.home.pagelogout')
    <a class="back-to-top" href="#">
        <img src="{{ asset('olympus/svg-icons/back-to-top.svg') }}" alt="arrow" class="back-icon">
    </a>
@endsection

