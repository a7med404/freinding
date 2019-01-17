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
        <script>
            var baseUrl='{{url('').'/'}}';
            var dir='ltr';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        </script>
        @yield('after_foot')
        @yield('scripts')
    </body>
</html>
