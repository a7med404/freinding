<!-- crop image model -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog"
     aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="max-width: 100%;">
                    <img id="image"  data-width="{{isset($width)?$width:110}}" data-height="{{isset($height)?$height:110}}" data-callback="{{isset($callback)?$callback:'ajaxCall'}}"
                         src="https://avatars0.githubusercontent.com/u/3456749">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary" id="crop" data-url="{{route('storePostsPhotosInTemp')}}"
                        data-delete-url="{{route('deleteFromTemp')}}">Crop
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end crop image model-->
