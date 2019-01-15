@if(empty($user_key))
    @include('site.layouts.headerlogout')
@else
    @if(isset($prof)&&$prof==1)
        @include('usersite::profile-list')
    @endif
    @include('site.home.sideleft')
    @include('site.home.sideright')
    @include('site.layouts.headerlogin')
@endif
<div class="header-spacer"></div>
