<div class="draw_form_register" id="draw_form_register">
    <div class="form-group label-floating is-empty mb-10">
        @include('site.layouts.alert_save')
    </div>
    @if(!isset($register)) @php $register =1 @endphp @endif
    <div class="form_register_first @if($register!=1) hide @endif" id="form_register_first">@include('auth.form_register_first')</div>
    <div class="form_register_second @if($register!=2) hide @endif" id="form_register_second">@include('auth.form_register_second')</div>
    <div class="form_register_three @if($register!=3) hide @endif" id="form_register_three">@include('auth.form_register_three')</div>
    <div class="form_register_four @if($register!=4) hide @endif" id="form_register_four">@include('auth.form_register_four')</div>
</div>
