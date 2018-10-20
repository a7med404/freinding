<div class="draw_registers" id="draw_registers">
@if(isset($wrong_form) && !empty($wrong_form))
<p class="alert alert-danger mb-30 "> {{$wrong_form}}</p>
@endif
@if(isset($correct_form) && !empty($correct_form))
<p class="alert alert-success mb-30 ">{{$correct_form}}</p>
@endif
</div>