$(document).ready((e) => {
    let $share_url = "";

    $('body').on('click', '#sharePost', (e) => {
        e.preventDefault();
        const clickedItem = $(e.target);
        $share_url = clickedItem.data('share-url');
        let $post_id = $(clickedItem).data('id');
        $('#Modal-Share').find('.btn-share-section').attr('id', 'addShare' + $post_id);

        let $author = $(clickedItem).closest('.hentry').children('.hentry').children('.post__author').children().not('.more').clone();
        if ($author.length === 0) {
            $author = $(clickedItem).closest('.hentry').children('.post__author').children().not('.more').clone();
        }
        $('#Modal-Share').find('.post__author').html($author);

        let $text = $(clickedItem).closest('.hentry').children('.hentry').children('p').html();
        if (!$text) {
            $text = $(clickedItem).closest('.hentry').children('p').html();
        }
        if ($text) $('#Modal-Share').find('p').html($text);
        else $('#Modal-Share').find('p').remove();

        let $picture_section = $(clickedItem).closest('.hentry').children('.hentry').children('.picture-section').clone();
        if ($picture_section.length === 0) {
            $picture_section = $(clickedItem).closest('.hentry').children('.picture-section').clone();
        }
        if ($picture_section) $('#Modal-Share').find('.picture-section').replaceWith($picture_section);
        else $('#Modal-Share').find('.picture-section').remove();

        let $video_section = $(clickedItem).closest('.hentry').children('.hentry').children('.video-section').clone();
        if ($video_section.length === 0) {
            $video_section = $(clickedItem).closest('.hentry').children('.video-section').clone();
        }
        if ($video_section) $('#Modal-Share').find('.video-section').replaceWith($video_section);
        else $('#Modal-Share').find('.video-section').remove();

        let $topic_section = $(clickedItem).closest('.hentry').children('.hentry').children('.topic-section').clone();
        if ($topic_section.length === 0) {
             $topic_section = $(clickedItem).closest('.hentry').children('.topic-section').clone();
        }
        if ($topic_section) $('#Modal-Share').find('.topic-section').replaceWith($topic_section);
        else $('#Modal-Share').find('.topic-section').remove();

        $('#Modal-Share').modal();
    });

    $('#Modal-Share').on('hidden.bs.modal', () => {
        $('#Modal-Share').html(`<div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Share Post </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                               <div class="form-group label-floating is-empty">
                                    <label class="control-label">Share what you are thinking here...</label>
                                    <textarea class="form-control" id="taxt-share"
                                              placeholder="" style="width: 100%; margin-bottom: 5px"></textarea>
                               </div>
                                    <div class="ui-block">
                                        <article class="hentry post video">
                                            <div class="post__author author vcard inline-items">
                                            </div>
                                            <p style="word-wrap: break-word;"></p>
                                            <div class="picture-section" data-slide="fade">
                                            </div>
                                            <div class="video-section swiper-container" data-slide="fade">
                                            </div>
                                            <div class="topic-section" style="display: inline-block;">
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close
                                </button>
                                <button id="addShare" type="button" data-url="` + $share_url + `"
                                class="btn btn-primary btn-share-section">Share
                                </button>
                                </div>
                                </div>
                                </div>`);
    });

    $('body').on('click', '[id^=addShare]', (e) => {
        e.preventDefault();
        const clickedItem = $(e.target);
        const id = clickedItem.attr('id').substring(8);
        const $url = clickedItem.data('url');
        let _token = $("input[name='_token']").val();
        let share_text = $('#taxt-share').val();
        $.ajax({
            type: 'POST',
            url: $url,
            data: {
                share_text,
                id,
                _token: _token
            },
            cache: false,
            success: function (data) {
                console.log(data);
                swal("Success", "You have successfuly share this post", "success");
                $('#Modal-Share').modal('hide');
                if (data['success']) {
                    let $photos = "";
                    let $tag = data.tagsection;
                    if (data.with_files) {
                        $photos = data.html_for_pictures_popup + data.html_for_pictures;
                    }
                    let $text = "";
                    if ($.trim($('#taxt-share').val())) {
                        $text = $('#taxt-share').val();
                    }
                    $('#AreaForPost').prepend(
                        ' <div id="AllPostDiv' + data.newpost.id + '" class="ui-block">' +
                        '<article class="hentry post video">' +
                        //s1
                        '<div class="post__author author vcard inline-items">' +
                        '<img src="' + data.user_image + '" alt="author">' +
                        //s2
                        '<div class="author-date">' +
                        '  <a class="h6 post__author-name fn" href="#">' + data.user_name + '</a>' +
                        //s3
                        '  <div class="post__date">' +
                        '  <time class="published" datetime="2004-07-24T18:18">' +
                        ' ' + data.ShareDate + ' ' +
                        ' </time>' +
                        ' </div>' +
                        //e3
                        '</div>' +
                        //e2
                        //s2
                        '<div class="more">' +
                        '  <svg class="olymp-three-dots-icon">' +
                        '  <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>' +
                        ' </svg>' +
                        '<ul class="more-dropdown">' +
                        ' <li>' +
                        ' <a href="#">Edit Share</a>' +
                        ' </li>' +
                        ' <li>' +
                        ' <a href="javascript:void(0)" class="post-delete" id="' + data.newpost.id + '" data-url="' + data.delete_url + '">Delete Share</a>' +
                        ' </li>' +
                        '<li>' +
                        ' <a href="#">Turn Off Notifications</a>' +
                        ' </li>' +
                        ' <li>' +
                        ' <a href="#">Select as Featured</a>' +
                        ' </li>' +
                        '</ul>' +
                        '</div>' +
                        //e2
                        '</div>' +
                        //e1
                        '<p style="word-wrap: break-word;">' + $text + '</p>' +
                        //post shared
                        //
                        '<article class="hentry post video" style=" border: 3px solid;' +
                        '    border-radius: 10px;' +
                        '    border-color: #9a9fbf;">' +
                        '<div class="post__author author vcard inline-items">' +
                        '<img src="' + data.Friend_image + '" alt="author">' +
                        '<div class="author-date">' +
                        '  <a class="h6 post__author-name fn" href="#">' + data.Friend_name + '</a>' +
                        '       ' + $tag + '' +
                        '  <div class="post__date">' +
                        '  <time class="published" datetime="2004-07-24T18:18">' +
                        ' ' + data.post.humansDate + ' ' +
                        ' </time>' +
                        ' </div>' +
                        '</div>' +
                        '</div>' +
                        '<p style="word-wrap: break-word;">' + data.post.text + '</p>' +
                        $photos +
                        '<div style="display: inline-block;">' +
                        '<ul>' +
                        '</ul>' +
                        '</div>' +
                        '</article>' +
                        //
                        //end post shared
                        '<div class="post-additional-info form-inline post-control-button">' +
                        '<a id="btn_react' + data.newpost.id + '" class="btn btn-control" data-url="' + data.react_url + '">' +
                        '<svg class="olymp-like-post-icon">' +
                        '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>' +
                        '</svg>' +
                        '</a>' +
                        '<a id="comment_post' + data.newpost.id + '" class="btn btn-control ">' +
                        '<svg class="olymp-comments-post-icon">' +
                        '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>' +
                        '</svg>' +
                        '</a>' +
                        //share-section-->
                        ' <div class="more">' +
                        '<a href="#" class="btn btn-control " >' +
                        '<svg class="olymp-share-icon">' +
                        '  <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>' +
                        '  </svg>' +
                        '  </a>' +
                        '  <ul class="more-dropdown">' +
                        '  <li>' +
                        '  <a href="javascript:void(0)" id="sharePost" data-id="' + data.newpost.id + '" data-share-url="' + data.share_url + '" >Share</a>' +
                        '  </li>' +
                        '  <li>' +
                        '  <a href="#">Share in group</a>' +
                        '  </li>' +
                        '  <li>' +
                        '<a href="#">share on friend diary </a> ' +
                        ' </li>' +
                        '</ul>' +
                        ' </div>' +
                        '<ul id="reactioners_photos' + data.newpost.id + '"\n' +
                        '                                        style=" position: absolute; right: 27%;"\n' +
                        '                                        class="friends-harmonic inline-items float-right">' +
                        '</ul>' +
                        '<div class="post_reacts_users" id="' + data.newpost.id + '"data-url="' + data.users_reactions + '" style="position: absolute;right: 5%;cursor: pointer;">' +
                        ' <a  class="post-add-icon inline-items"  >' +
                        ' <span id="engagement_count' + data.newpost.id + '">0</span>' +
                        '</a>' +
                        '   <span >&nbsp;Engagements</span>' +
                        '</div>' +
                        '</div>' +
                        '</article>' +
                        '<ul class="comments-list comments-list--' + data.newpost.id + '">' +
                        '</ul>' +
                        '<form class="comment-form inline-items">' +
                        '        <div class="post__author author vcard inline-items">' +
                        '        <img src="' + data.user_image + '" alt="author">' +
                        '             <div class="form-group with-icon-right is-empty">' +
                        '                <textarea id="comment_post_form' + data.newpost.id + '" class="form-control" placeholder="Your Comment Here" required=""></textarea>' +
                        '                     <div class="add-options-message">' +
                        '                         <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">' +
                        '                             <svg class="olymp-camera-icon">' +
                        '                                 <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>' +
                        '                             </svg>' +
                        '                         </a>' +
                        '                     </div>' +
                        '                <span class="material-input"></span>' +
                        '</div>' +
                        '</div>' +
                        '       <button id="btn_comment_' + data.newpost.id + '" class="btn btn-md-2 btn-primary" data-url="' + data.new_comment_url + '"\n' +
                        '                                        data-delete-url="' + data.dalete_comment_url + '">Post Comment' +
                        '       </button>' +
                        '       <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel' +
                        '       </button>' +
                        '</form>' +
                        '</div>' +
                        '</div>');
                    //
                    $('#taxt-share').val('');
                    //
                }
            },
            error: function (data) {
                swal("Error",
                    "Server error try again later",
                    "error");
            },
            complete: function () {
                $('#Modal-Share').modal('hide');
            }
        });
    });

});