@if($profile_user->id != Auth::id())
  @php
  $status=Auth::user()->check($profile_user->id);
  $status_follow=Auth::user()->checkFollow($profile_user->id)
  @endphp
  <div class="card mb-5">
    <div class="card-body">
      <div class="row">
        <div class=" col-lg-12 col-md-5 col-sm-12 ">
          <div class="text-center">
            <button data-url="{{$status['url']}}" data-toggle="tooltip"
            title="{{$status['status']}}"
            class="{{$status['class']}}">
            <i class="{{$status['icon']}}"></i>
            <span>{{$status['text']}}</span>
          </button>
          <button data-url="{{$status_follow['url']}}" data-toggle="tooltip"
            title="{{$status_follow['status']}}"
            class="{{$status_follow['class']}}">
            <i class="{{$status['icon']}}"></i>
            <span>{{$status_follow['text']}}</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<buttons-component v-bind:user="{{$profile_user->id}}"></buttons-component>
@endif
