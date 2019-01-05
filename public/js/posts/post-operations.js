$(document).ready(()=>{

    // focus on comment textarea 
    $('body').on('click', '[id^=comment_post]',(e)=> {
        const clickedItem = $(e.currentTarget);
        const id = clickedItem.attr('id');
        const s = '#comment_post_form' + id.substring(12);
        $(s).focus();
    });

    // react with post
    $('body').on('click', '[id^=btn_react]',(e)=>{
        let _token = $("input[name='_token']").val();
        const clickedItem = $(e.currentTarget);
        const post_id = clickedItem.attr('id').substring(9);
        const $url = clickedItem.data('url');
        $.ajax({
            type: 'POST',
            url: $url,
            data: {_token: _token, id: post_id},
            cache: false,
            success: (data)=>{
                if (data['success']) {
                    $('#engagement_count' + post_id).text(data['engagement']);
                    $('#comment_count' + post_id).text(data['comment_count']);
                    $('#reactioners_name' + post_id).html(data['reactioners']);
                    $('#reactioners_photos' + post_id).html(data['reactioners_photos']);
                    $('#reactions_count' + post_id).text(data['react_count']);
                    if (data['like']) {
                        clickedItem.css('background-color', 'red');
                    } else {
                        clickedItem.css('background-color', '');
                    }
                } else {
                    console.log(data);
                    swal("Error",
                        "Server error try again later",
                        "error");
                }
            },
            error: function (data) {
                console.log(data);
                swal("Error",
                    "Server error try again later",
                    "error");
            }
        });
    });

    // add new comment
    $('body').on('click', '[id^=btn_comment_]',  (e)=> {
        let _token = $("input[name='_token']").val();
        let btn = $(e.currentTarget);
        e.preventDefault();
        let post_id = btn.attr('id').substring(12);
        let $url = btn.data('url');
        let $delete_url = btn.data('delete-url');
        let comment = $('#comment_post_form' + post_id).val();
        if (comment.length > 0) {
            $.ajax({
                type: 'POST',
                url: $url,
                data: {_token: _token, id: post_id, comment: comment},
                cache: false,
                success: function (data) {
                    if (data['success']) {
                        let newCommentID = data['newCommentId'];
                        $('#comment_post_form' + post_id).val('');
                        $('#engagement_count' + post_id).text(data['engagement']);
                        $('#comment_count' + post_id).text(data['comment_count']);
                        $('#reactioners_name' + post_id).html(data['reactioners']);
                        $('#reactioners_photos' + post_id).html(data['reactioners_photos']);
                        $('#reactions_count' + post_id).text(data['react_count']);
                        $('.comments-list--' + post_id).html(
                            '<li  id="newestComment' + post_id + '" class="comment-item Allcommentul' + newCommentID + '">' +
                            '<div class="post__author author vcard inline-items">\n' +
                            '           <img src="' + data['newestComment'].user.image + '" alt="author">\n' +
                            '\n' +
                            '           <div class="author-date">\n' +
                            '               <a class="h6 post__author-name fn" href="#">' + data['newestComment'].user.display_name + '</a>\n' +
                            '               <div class="post__date">\n' +
                            '                   <time class="published" datetime="2004-07-24T18:18">\n' +
                            '                     ' + data['newestComment'].humansDate + '\n' +
                            '                   </time>\n' +
                            '               </div>\n' +
                            '           </div>\n' +
                            '\n' +

                            '<div class="more">' +
                            '<svg class="olymp-three-dots-icon">' +
                            '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>' +
                            '</svg>' +
                            '<ul class="more-dropdown">' +
                            '<li>' +
                            '<a href="#">Edit comment</a>' +
                            '</li>' +
                            '<li>' +
                            '<a href="javascript:void(0)" class="comment-delete" id="' + newCommentID + '" data-url="'+$delete_url+'">Delete comment</a>' +
                            '</li>' +

                            '</ul>' +
                            '</div>' +
                            '\n' +
                            '       </div>\n' +
                            '\n' +
                            '       <p>' + data['newestComment'].text + '\n' +
                            '       </p>\n' +
                            '\n' +
                            '       <a href="#" class="post-add-icon inline-items">\n' +
                            '           <svg class="olymp-heart-icon">\n' +
                            '           <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>\n' +
                            '           </svg>\n' +
                            '           <span>' + data['newestComment'].commentReactions + '</span>\n' +
                            '       </a>\n' +
                            '       <a href="#" class="reply">Reply</a>' +
                            '</li>'
                        );

                    } else {
                        console.log(data);
                        swal("Error",
                            "Server error try again later",
                            "error");
                    }
                    ;
                },
                error: function (data) {
                    console.log(data);
                    swal("Error",
                        "Server error try again later",
                        "error");
                }
            });
        }
        ;
    });

    // delete post
    $('body').on('click', '.post-delete', (e)=> {
        let post = $(e.currentTarget);//not post but delete button
        swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this post!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    let id = post.attr('id');
                    let _token = $("input[name='_token']").val();
                    const $url = post.data('url');
                    $.ajax({
                        type: 'post',
                        url: $url,//route function take route name == url("/posts/delete-post")
                        data: {_token: _token, id: id},
                        success:  (data) =>{
                            if (data.success) {
                                swal("Deleted!", "Your post has been deleted.", "success");
                                $('#AllPostDiv' + id).remove();
                                data.arrayshare.forEach((e)=>{
                                    $('#AllPostDiv' + e).remove();
                                });
                            } else {
                                swal("Not Deleted!", "You are not the publisher of the post", "error");
                            }
                        },
                        error:  (err)=> {
                            console.log('Error!', err);
                            swal("Not Deleted!", "Your post has not been deleted try again later.", "error");
                        },
                    });
                } else {
                    swal("Cancelled", "Your post is safe :)", "error");
                }
            });
    });

    //delete comment
    $('body').on('click', '.comment-delete', (e)=> {
        let btn_comment = $(e.currentTarget);
        console.log(btn_comment,e);
        let id = btn_comment.attr('id');
        let _token = $("input[name='_token']").val();
        const $url = btn_comment.data('url');

        $.ajax({
            type: 'post',
            url: $url,//route function take route name == url("/posts/delete-post")
            data: {_token: _token, id: id},
            success:  (data)=> {
                $('.Allcommentul' + id).html("");
                $('#comment_post_form' + data.post.id).val('');
                $('#engagement_count' + data.post.id).text(data.engagement);
                $('#reactioners_name' + data.post.id).html(data.reactioners);
                $('#reactioners_photos' + data.post.id).html(data.reactioners_photos);
                $('#reactions_count' + data.post.id).text(data.react_count);
                if (data.comments_count > 0) {
                    $reactions = data.newestcomment.commentReactions ? data.newestcomment.commentReactions : 0;
                    $('.comments-list--' + data.post.id).html(
                        '<li  id="newestComment' + data.post_id + '" class="comment-item Allcommentul' + data.newestcomment['id'] + '">' +
                        '<div class="post__author author vcard inline-items">\n' +
                        '           <img src="' + data.newestcomment.user.image + '" alt="author">\n' +
                        '\n' +
                        '           <div class="author-date">\n' +
                        '               <a class="h6 post__author-name fn" href="#">' + data.newestcomment.user.display_name + '</a>\n' +
                        '               <div class="post__date">\n' +
                        '                   <time class="published" datetime="2004-07-24T18:18">\n' +
                        '                     ' + data.newestcomment['humansDate'] + '\n' +
                        '                   </time>\n' +
                        '               </div>\n' +
                        '           </div>\n' +
                        '\n' +
                        '<div class="more">' +
                        '<svg class="olymp-three-dots-icon">' +
                        '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>' +
                        '</svg>' +
                        '<ul class="more-dropdown">' +
                        '<li>' +
                        '<a href="#">Edit comment</a>' +
                        '</li>' +
                        '<li>' +
                        '<a href="javascript:void(0)" class="comment-delete" id="' + data.newestcomment.id + '" data-url="'+$url+'">Delete comment</a>' +
                        '</li>' +
                        '</ul>' +
                        '</div>' +
                        '\n' +
                        '       </div>\n' +
                        '\n' +
                        '       <p>' + data.newestcomment.text + '\n' +
                        '       </p>\n' +
                        '\n' +
                        '       <a href="#" class="post-add-icon inline-items">\n' +
                        '           <svg class="olymp-heart-icon">\n' +
                        '           <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>\n' +
                        '           </svg>\n' +
                        '           <span>' + $reactions + '</span>\n' +
                        '       </a>\n' +
                        '       <a href="#" class="reply">Reply</a>' +
                        '</li>'
                    );
                }
                else {
                    $('.comments-list--' + data.post.id).html('');
                }

            },
            error:  (err)=> {
                console.log('Error!', err);
                swal("Not Deleted!", "Your comment has not been deleted try again later.", "error");
            },
        });
    });

    //for reactions

    // $('[id^=react]').hover(function () {
    //     post_id1=$(this).attr('id');
    //     post_id1=post_id1.substring(5);
    //     s = '#post_'+post_id1;
    //     $(s).attr('hidden',false);
    // },function () {
    //     post_id1=$(this).attr('id');
    //     post_id1=post_id1.substring(5);
    //     s = '#post_'+post_id1;
    //     $(s).attr('hidden',true);
    // });

    // $('[id^=post_]').hover(function () {
    //     post_id=$(this);
    //     post_id=post_id.attr('id');
    //     post_id=post_id.substring(5);
    //     s = '#post_'+post_id;
    //     $(s).attr('hidden',false);
    // },function () {
    //     post_id=$(this);
    //     post_id=post_id.attr('id');
    //     post_id=post_id.substring(5);
    //     s = '#post_'+post_id;
    //     $(s).attr('hidden',true);
    // });

    // $('[id^=reaction]').hover(function () {
    //     reaction=$(this);
    //     console.log(reaction);
    //     reaction.children().children().attr('width',40);
    //     reaction_id=reaction.attr('id');
    //     reaction_id=reaction_id.substring(8);
    //     console.log(reaction_id);
    // },function () {
    //     reaction=$(this);
    //     console.log(reaction);
    //     reaction.children().children().attr('width',32);
    //     reaction_id=reaction.attr('id');
    //     reaction_id=reaction_id.substring(8);
    //     console.log(reaction_id,4);
    // });
    
});