@if($profile_user->id != Auth::id())
<buttons-component v-bind:user="{{$profile_user->id}}"></buttons-component>
@endif
