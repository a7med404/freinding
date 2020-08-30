<div class="card">
    <div class="card-body" style="padding: 0;">
        <div class="your-profile">
            <div class="ui-block-title ui-block-title-small">
                <h4 class="font-weight-bold">Friends</h4>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    @if(count($profile_user->friends())>0)
                        @foreach( $profile_user->friends() as $friend)
                            <div class="col-lg-3">
                                <img src="{{$friend->mini_image}}" title="{{$friend->display_name}}"
                                     data-toggle="tooltip" alt="{{$friend->display_name}}">
                            </div>
                        @endforeach
                    @else
                        <ul class="unstyled p-4 text-center">
                            <li class="h4" style="color: #9a9fbf;">No Friends Yet.</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body" style="padding: 0;">
        <div class="your-profile">
            <div class="ui-block-title ui-block-title-small">
                <h3 class="font-weight-bold">Latest Photos</h3>
            </div>
            <ul class="unstyled p-4">
                <li class="h4" style="color: #9a9fbf;">No Photos Yet.</li>
            </ul>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body" style="padding: 0;">
        <div class="your-profile">
            <div class="ui-block-title ui-block-title-small">
                <h3 class="font-weight-bold">Latest Videos</h3>
            </div>
            <ul class="unstyled p-4">
                <li class="h4" style="color: #9a9fbf;">No Videos Yet.</li>
            </ul>
        </div>
    </div>
</div>