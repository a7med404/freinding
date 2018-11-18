<section class="content">
    <div class="row">
        <h1>Upload Image</h1>
         
        <input id="image" name="image" type="hidden" value="{{ $image }}">
        @if($image == Null)
        <img src="{{ asset('css/admin/img/authors/avatar.jpg') }}" width="200" class="img-responsive img-radius" height="150" alt="user">
        @else
        <img  src="{{ $image }}"  width="200" width="200" class="img-responsive img-radius" height="150" alt="riot"/>
        @endif
        <div class="clearfix"></div>
        @if(Auth::user()->can('access-all', 'user-all'))
        <a href="{{URL::asset('filemanager/dialog.php?type=1&akey=admin_panel&field_id=image')}}" class="btn iframe-btn btn-success fa fa-download" type="button"></a>
        @else
        <a href="{{URL::asset('filemanager/dialog.php?type=0&akey=user&field_id=image')}}" class="btn iframe-btn btn-success fa fa-download" type="button"></a>
        @endif
        <a class="btn btn-danger fa fa-remove  remove_image_link" type="button"></a>
        <hr><hr>
        <h1>Upload Video</h1>
         
        <input id="video" name="video" type="hidden" value="{{ $video }}">
        @if($video == Null)
        <iframe id="myVideo"  webkitallowfullscreen mozallowfullscreen allowfullscreen width="40%" height="150px" frameborder="0"  @if(isset($video)) src="{{$video}}" @else style="display:none;" @endif></iframe>
        @else
        <iframe id="myVideo"  src="{{ $video }}" webkitallowfullscreen mozallowfullscreen allowfullscreen width="40%" height="150px" frameborder="0"  @if(isset($video)) src="{{$video}}" @else style="display:none;" @endif></iframe>
        @endif
        <div class="clearfix"></div>
        @if(Auth::user()->can('access-all', 'user-all'))
        <a href="{{URL::asset('filemanager/dialog.php?type=1&akey=admin_panel&field_id=video')}}" class="btn iframe-btn btn-success fa fa-download" type="button"></a>
        @else
        <a href="{{URL::asset('filemanager/dialog.php?type=0&akey=user&field_id=video')}}" class="btn iframe-btn btn-success fa fa-download" type="button"></a>
        @endif
        <a class="btn btn-danger fa fa-remove  remove_image_link" type="button"></a>
    </div>
</section>

