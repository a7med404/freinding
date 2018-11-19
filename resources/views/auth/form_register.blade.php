<div class="draw_form_register" id="draw_form_register">
    <div class="form-group label-floating is-empty mb-10">
        @include('site.layouts.alert_save')
    </div>
    @if(!isset($register)||$register==1)
    @include('auth.form_register_first')
    @elseif($register==2)
    @include('auth.form_register_second')
    @elseif($register==3)
    @include('auth.form_register_three')
    @elseif($register==4)
    @include('auth.form_register_four')
    @endif
</div>
