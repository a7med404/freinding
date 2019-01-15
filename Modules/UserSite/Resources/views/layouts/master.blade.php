<!DOCTYPE html>
<html>
<head>
    @include('site.layouts.head')
    @yield('after_head')
    {!! $facebook_pixel !!}
</head>
<body site-Homeurl="{{ route('home') }}" data-user="{{ $user_key }}" @if(empty($user_key)) class="landing-page" @endif>
{!! $google_analytic !!}
@include('site.layouts.header')
@yield('content')

@include('site.layouts.footer')

@include('site.layouts.foot')

@yield('after_foot')
</body>
</html>
