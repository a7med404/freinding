@if(empty($user_key))
    @include('site.layouts.headerlogout')
@else
    @include('site.layouts.headerlogin')
@endif
<div class="header-spacer"></div>