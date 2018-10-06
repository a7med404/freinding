<!DOCTYPE html>
<html>
    <head>
        @include('admin.layouts.head')
        @yield('after_head')
    </head>
    <body class="skin-josh" data-url="{{ route('home') }}" data-user="user_id">
            @include('admin.layouts.header')
            <div class="wrapper row-offcanvas row-offcanvas-left">
                @include('admin.layouts.sidebar')
                <aside class="right-side">
                    <section class="content-header">
                    @yield('head_content')
                    </section>
                    <section class="content">
                    @yield('content')
                    </section>
                </aside>
            </div>
            @include('admin.layouts.footer')
            
            <!--<div class="control-sidebar-bg"></div>-->
        
        @include('admin.layouts.foot')
          
        @yield('after_foot')

    </body>
</html>
