<!--/**
 * Created by PhpStorm.
 * User: AbdilFattah
 * Date: 2019-01-05
 * Time: 05:44 PM
 */-->
<!-- model tag friends -->
<div class="modal fade" id="topics-modal" tabindex="-1" role="dialog" aria-labelledby="topicsModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topicsModalLabel">Add Topics</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--topics-->
                <div id="topics-post-section">
                    <select class="js-example-placeholder-multiple" id="topic_list" name="topic_list[]" multiple="multiple">
                        <option></option>
                    </select>
                </div>
                <!--end-topics-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="addTopics" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- end model tag friends -->