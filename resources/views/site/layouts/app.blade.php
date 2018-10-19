<!DOCTYPE html>
<html>
    <head>
        @include('site.layouts.head')
        @yield('after_head')
        {!! $facebook_pixel !!}
    </head>
    <body data-url="{{ route('home') }}" data-user="{{ $user_id }}">

        {!! $google_analytic !!} 

        @include('site.layouts.header')
        <main id="main" >
        @yield('content')
        </main>
        @include('site.layouts.footer')
        
        @include('site.layouts.foot')

        @yield('after_foot')
        <!--mazyg-message-->
        <div class="baims-message"></div>
    </body>
</html>
