<!--/**
 * Created by PhpStorm.
 * User: AbdilFattah
 * Date: 2019-01-05
 * Time: 05:44 PM
 */-->
<!-- model tag friends -->
<div class="modal fade" id="tagged-friends-modal" tabindex="-1" role="dialog" aria-labelledby="taggedFriendsModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taggedFriendsModalLabel">Tagged Friends</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body h400-scroll-y">
                <!--topics-->
                <div id="waitForTaggedFriends" class="custom-loader"></div>
                <ul id="tagged-friends-section" class="widget w-friend-pages-added notification-list friend-requests dynamicContent">
                  </ul>
                <!--end-topics-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end model tag friends -->