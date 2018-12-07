<script>
    $(document).ready(function () {
        $('body').on('click','[id^=comment_post]',function () {
            id = $(this).attr('id');
            console.log(id);
            s = '#comment_post_form' + id.substring(12);
            $(s).focus();
        });

        $(window).resize(function () {
            Resize();
        });


        Resize();

        function Resize() {
            $('.video_post').each(function () {
                var cw = $(this).width();
                $(this).css({'height': cw + 'px'});
            });
        }

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
        $('body').on('click', '[id^=btn_react]', function () {
            var _token = $("input[name='_token']").val();
            var post = $(this);
            var post_id = post.attr('id');
            post_id = post_id.substring(9);
            $.ajax({
                type: 'POST',
                url: '<?php echo e(route('react')); ?>',
                data: {_token: _token, id: post_id},
                cache: false,
                success: function (data) {
                    if (data['success']) {
                        $('#engagement_count' + post_id).text(data['engagement']);
                        $('#comment_count' + post_id).text(data['comment_count']);
                        $('#reactioners_name' + post_id).html(data['reactioners']);
                        $('#reactioners_photos' + post_id).html(data['reactioners_photos']);
                        $('#reactions_count' + post_id).text(data['react_count']);
                        if (data['like']) {
                            post.css('background-color', 'red');
                        } else {
                            post.css('background-color', '');
                        }
                    } else {
                        console.log(data);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
        $('body').on('click', '[id^=btn_comment_]', function (e) {
            console.log('something');
            var _token = $("input[name='_token']").val();
            var btn = $(this);
            e.preventDefault();
            console.log('something2');
            var post_id = btn.attr('id');
            post_id = post_id.substring(12);
            var comment = $('#comment_post_form' + post_id).val();
          //  var x = document.getElementById("myDIV");
            if (comment.length > 0) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route('new-comment')); ?>',
                    data: {_token: _token, id: post_id, comment: comment},
                    cache: false,
                    success: function (data) {
                        if (data['success']) {
                            var newCommentID = data['newCommentId'];
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
                                '<a href="javascript:void(0)" class="comment-delete" id="' + newCommentID + '">Delete comment</a>' +
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
                        }
                        ;
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
            ;
        });

        $('body').on('click', '.post_reacts_users', function () {
            var btn = $(this);
            var id = btn.attr('id');
            var lis = "<div id='wait' style=\"\n" +
                "  display:    none;\n" +
                "  position:   fixed;\n" +
                "  z-index:    1000;\n" +
                "  top:        0;\n" +
                "  left:       0;\n" +
                "  height:     100%;\n" +
                "  width:      100%;\n" +
                "  background: rgba( 255, 255, 255, .8 )\n" +
                "  url('http://i.stack.imgur.com/FhHRx.gif')\n" +
                "  50% 50%\n" +
                "  no-repeat;\"\n" +
                "  ></div>";
            $('#users_reaction').html(lis);
            $('#wait').show();
            $('#reactions').modal('show');
            var _token = $("input[name='_token']").val();
            $.ajax({
                type: 'POST',
                url: '<?php echo e(route('users-reactions')); ?>',
                data: {_token: _token, id: id},
                cache: false,
                success: function (data) {
                    current_page = data['current_page'];
                    last_page = data['last_page'];
                    nextPageUrl = data['next_page_url'];
                    post_id = id;
                    var lis = "";
                    for (item in data['data']) {
                        lis += ' <li class="inline-items">\n' +
                            '     <div class="author-thumb">\n' +
                            '         <img width="36px" height="36px" src="' + data['data'][item].user.image + '"\n' +
                            '              alt="author">\n' +
                            '     </div>\n' +
                            '     <div class="notification-event">\n' +
                            '         <a href="#"\n' +
                            '            class="h6 notification-friend">' + data['data'][item].user.display_name + '</a>\n' +
                            '         <span class="chat-message-item">8 Frinds In Common</span>\n' +
                            '     </div>\n' +
                            '     <span class="notification-icon post-control-button "\n' +
                            '           data-toggle="tooltip" data-placement="top"\n' +
                            '           data-original-title="ADD TO YOUR FREINDS">\n' +
                            '         <a class="btn btn-control" href="#">\n' +
                            '             <svg class="olymp-star-icon"><use\n' +
                            '                 xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>\n' +
                            '         </a>\n' +
                            '     </span>\n' +
                            ' </li>';
                    }
                    $('#users_reaction').append(lis);
                    $('#wait').hide();
                },
                error: function (data) {
                    $('#wait').hide();
                    console.log(data);
                }
            });
        });

        processing = false;

        $('.modal-body1').scroll(function (e) {
            console.log(processing);
            if (processing)
                return false;
            if ($('.modal-body1').scrollTop() >= ($('#users_reaction').height() - $('.modal-body1').height()) * 0.7) {
                processing = true;
                users_who_react();
            }
        });

         function users_who_react() {
            if (last_page != current_page) {
                var _token = $("input[name='_token']").val();
                $.ajax({
                    type: 'POST',
                    url: nextPageUrl,
                    data: {_token: _token, id: post_id},
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        current_page = data['current_page'];
                        last_page = data['last_page'];
                        nextPageUrl = data['next_page_url'];
                        var lis = "";
                        for (item in data['data']) {
                            lis += ' <li class="inline-items">\n' +
                                '     <div class="author-thumb">\n' +
                                '         <img width="36px" height="36px" src="' + data['data'][item].user.image + '"\n' +
                                '              alt="author">\n' +
                                '     </div>\n' +
                                '     <div class="notification-event">\n' +
                                '         <a href="#"\n' +
                                '            class="h6 notification-friend">' + data['data'][item].user.display_name + '</a>\n' +
                                '         <span class="chat-message-item">8 Frinds In Common</span>\n' +
                                '     </div>\n' +
                                '     <span class="notification-icon post-control-button "\n' +
                                '           data-toggle="tooltip" data-placement="top"\n' +
                                '           data-original-title="ADD TO YOUR FREINDS">\n' +
                                '         <a class="btn btn-control" href="#">\n' +
                                '             <svg class="olymp-star-icon"><use\n' +
                                '                 xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>\n' +
                                '         </a>\n' +
                                '     </span>\n' +
                                ' </li>';
                        }
                        $('#users_reaction').append(lis);
                        $('#wait').hide();
                        processing = false;
                    },
                    error: function (data) {
                        $('#wait').hide();
                        console.log(data);
                        processing = false;
                    }
                });
            } else {
                processing = false;
            }
        }


        $('.test').each(function () {
            var btn = $(this);
            VisSense.VisMon.Builder(VisSense(btn[0]))
                .on('fullyvisible', function () {
                    if(processing)
                    $('#wait').show();
                })
                .on('hidden', function () {
                    $('#wait').hide();
                })
                .build()
                .start();
        });

        $('body').on('click', '.post-delete', function () {
            var post = $(this);//not post but delete button
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
                function(isConfirm){
                if (isConfirm){
                    var id = post.attr('id');
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        type: 'post',
                        url: '<?php echo e(route('delete-post')); ?>',//route function take route name == url("/posts/delete-post")
                        data: {_token: _token, id: id},
                        success: function (data) {
                            if(data.success){
                                swal("Deleted!", "Your post has been deleted.", "success");
                                // $('#AllPostDiv' + id).html("");
                                $('#AllPostDiv' + id).remove();
                                notify_delete_post();
                            }else{
                                swal("Not Deleted!", "You are not the publisher of the post", "error");
                            }
                        },
                        error: function (err) {
                            console.log('Error!', err);
                            swal("Not Deleted!", "Your post has not been deleted try again later.", "error");
                        },
                    });
                } else{
                    swal("Cancelled", "Your post is safe :)", "error");
                }
                });
        });

        /*$('body').on('click', '.comment-delete', function () {
            console.log('good');
            var btn_comment = $(this);//not post but delete button
            var id = btn_comment.attr('id');
            var _token = $("input[name='_token']").val();

            $.ajax({
                type: 'post',
                url: '<?php echo e(route('comment-delete')); ?>',//route function take route name == url("/posts/delete-post")
                data: {_token: _token, id: id},
                dataType: "json",
                success: function (data) {
                    console.log(data.newestcomment.id);
                    $('.Allcommentul' + id).html("");
                    $('#comment_post_form' + data.post_id).val('');
                    $('#engagement_count' + data.post_id).text(data.engengagement);
                    $('#comment_count' + data.post_id).text(data.comment_count);
                    $('#reactioners_name' + data.post_id).html(data.reactioners);
                    $('#reactioners_photos' + data.post_id).html(data.reactioners_photos);
                    $('#reactions_count' + data.post_id).text(data.react_count);
                    $('.comments-list--' + data.post_id).html(
                        '<li  id="newestComment' + data.post_id + '" class="comment-item Allcommentul' + data.newestcomment['id']+ '">' +
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
                        '<a href="javascript:void(0)" class="comment-delete" id="' + data.newestcomment.id + '">Delete comment</a>' +
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
                        '           <span>' + data.newestcomment.commentReactions + '</span>\n' +
                        '       </a>\n' +
                        '       <a href="#" class="reply">Reply</a>' +
                        '</li>'
                    );

                },
                error: function (err) {
                    console.log('Error!', err);
                },
            });
        });*/
		
		$('body').on('click', '.comment-delete', function () {
            console.log('good');
            var btn_comment = $(this);
            var id = btn_comment.attr('id');
            var _token = $("input[name='_token']").val();

            $.ajax({
                type: 'post',
                url: '<?php echo e(route('comment-delete')); ?>',//route function take route name == url("/posts/delete-post")
                data: {_token: _token, id: id},
                success: function (data) {
                    console.log(data);


                    $('.Allcommentul' + id).html("");
                    $('#comment_post_form' + data.post.id).val('');
                    $('#engagement_count' + data.post.id).text(data.engagement);
                    $('#reactioners_name' + data.post.id).html(data.reactioners);
                    $('#reactioners_photos' + data.post.id).html(data.reactioners_photos);
                    $('#reactions_count' + data.post.id).text(data.react_count);
                    if (data.comments_count>0)
                     {
                         $('.comments-list--' + data.post.id).html(
                     '<li  id="newestComment' + data.post_id + '" class="comment-item Allcommentul' + data.newestcomment['id']+ '">' +
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
                     '<a href="javascript:void(0)" class="comment-delete" id="' + data.newestcomment.id + '">Delete comment</a>' +
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
                     '           <span>' + data.newestcomment.commentReactions + '</span>\n' +
                   '       </a>\n' +
                    '       <a href="#" class="reply">Reply</a>' +
                    '</li>'
                );}
                else {$('.comments-list--' + data.post.id).html('');}

                },
                error: function (err) {
                    console.log('Error!', err);
                },
            });
        });

            flexFont = function () {
            var divs = document.getElementsByClassName("flexFont");
            for (var i = 0; i < divs.length; i++) {
                var relFontsize = divs[i].offsetWidth * 0.05;
                divs[i].style.fontSize = relFontsize + 'px';
            }
        };

        window.onload = function (event) {
            flexFont();
        };

        window.onresize = function (event) {
            flexFont();
        };

        $('#myNewPost').submit(function (e) {
            e.preventDefault();
            if($('#choosephoto').children().length||$.trim($('#textpost').val())){
                $this = $(this)
                //start loader
                var bar = new ProgressBar.Line(containerloader, {
                    strokeWidth: 4,
                    easing: 'easeInOut',
                    duration: 1400,
                    color: '#FFEA82',
                    trailColor: '#eee',
                    trailWidth: 1,
                    svgStyle: {width: '100%', height: '100%'},
                    from: {color: '#FFEA82'},
                    to: {color: '#ED6A5A'},
                    step: (state, bar) => {
                        bar.path.setAttribute('stroke', state.color);
                    }
                });

                bar.animate(1.0);  // Number from 0.0 to 1.0
                //end loader
                var post_has_files = 0;
                $names = [];
                if($('#choosephoto').children().length){
                    post_has_files=1;
                    $i=0;
                    $('#choosephoto').children().each(function () {
                        $names[$i]=$(this).find('img').data('name');
                        $i++;
                    });
                    console.log($names);
                }
                var text = $('#textpost').val();
                var _token = $("input[name='_token']").val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route('new-post')); ?>',
                    data: {
                        post_has_files,
                        text,
                        files:$names,
                        _token:_token
                    },
                    cache: false,

                    success: function (data) {
                        swal("Success", "You have successfuly share new post", "success");
                        console.log(data.newpost.humansDate);
                        if (data['success']) {
                            var $photos = "";

                            if(data.with_files){
                                $photos= data.html_for_pictures_popup+data.html_for_pictures;
                            }
                            textOfPost = data.newpost.text?data.newpost.text:"";
                            $('#AreaForPost').prepend(
                                '<div id="AllPostDiv' + data.newpost.id + '" class="ui-block">' +
                                '<article class="hentry post video">' +
                                '<div class="post__author author vcard inline-items">' +
                                '<img src="' + data.user_image + '" alt="author">' +
                                '<div class="author-date">' +
                                '  <a class="h6 post__author-name fn" href="#">' + data.user_name + '</a>' +
                                '  <div class="post__date">' +
                                '  <time class="published" datetime="2004-07-24T18:18">' +
                                ' ' + data.newpost.humansDate + ' ' +
                                ' </time>' +
                                ' </div>' +
                                '</div>' +
                                '<div class="more">' +
                                '  <svg class="olymp-three-dots-icon">' +
                                '  <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>' +
                                ' </svg>' +
                                '<ul class="more-dropdown">' +
                                ' <li>' +
                                ' <a href="#">Edit Post</a>' +
                                ' </li>' +
                                ' <li>' +
                                ' <a href="javascript:void(0)" class="post-delete" id="' + data.newpost.id + '">Delete Post</a>' +
                                ' </li>' +
                                '<li>' +
                                ' <a href="#">Turn Off Notifications</a>' +
                                ' </li>' +
                                ' <li>' +
                                ' <a href="#">Select as Featured</a>' +
                                ' </li>' +
                                '</ul>' +
                                '</div>' +
                                '</div>' +
                                '<p style="word-wrap: break-word;">' + textOfPost + '</p>' +
                                $photos+
                                '<div style="display: inline-block;">' +
                                '<ul>' +
                                '</ul>' +
                                '</div>' +
                                '<div class="post-additional-info form-inline post-control-button">' +
                                '<a id="btn_react' + data.newpost.id + '" class="btn btn-control " style="background-color: ">' +
                                '<svg class="olymp-like-post-icon">' +
                                '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>' +
                                '</svg>' +
                                '</a>' +
                                '<a id="comment_post' + data.newpost.id + '" class="btn btn-control ">' +
                                '<svg class="olymp-comments-post-icon">' +
                                '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>' +
                                '</svg>' +
                                '</a>' +
                                '<a href="#" class="btn btn-control ">' +
                                '<svg class="olymp-share-icon">' +
                                '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-share-icon"></use>' +
                                '</svg>' +
                                '</a>' +
                                '<ul id="reactioners_photos'+data.newpost.id+'"\n' +
                                '                                        style=" position: absolute; right: 27%;"\n' +
                                '                                        class="friends-harmonic inline-items float-right">'+
                                '</ul>'+
                                '<div class="post_reacts_users" id="'+data.newpost.id +'" style="position: absolute;right: 5%;">'+
                                ' <a  class="post-add-icon inline-items"  >'+
                                ' <span id="engagement_count'+data.newpost.id +'">0</span>'+
                                '</a>'+
                                ' <span >&nbsp;Engagements</span>'+
                                '</div>'+
                                '</div>' +
                                '</article>' +
                                '<ul class="comments-list comments-list--'+data.newpost.id +'">'+
                                '</ul>'+

                                '<form class="comment-form inline-items">' +
                                '        <div class="post__author author vcard inline-items">' +
                                '        <img src="olympus/img/author-page.jpg" alt="author">' +
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
                                '       <button id="btn_comment_' + data.newpost.id + '" class="btn btn-md-2 btn-primary">Post Comment' +
                                '       </button>' +
                                '       <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel' +
                                '       </button>' +
                                '</form>' +
                                '</div>'
                            );
                            // data['htmlnewpost']
                            $('#textpost').val('');
                            $('#choosephoto').html('');
                            //forSupportAjax();
                            notifyaddpost();
                        } else {
                            swal("Error",
                                "Server error try again later",
                                "error");
                        }
                    },
                    error: function (data) {
                        swal("Error",
                            "Server error try again later",
                            "error");
                    },
                    complete: function () {
                        //hide loader
                        $('#containerloader').html('');
                    }
                });
            }else{
                swal("Error",
                    "There is nothing to share it",
                    "error");
            }
        });

        $('#uploadPhotoClick').click(function () {
            console.log("555");
            $("#file_field").click();
        });


        $('.video_post_element').each(function () {
            var vid = $(this);
            VisSense.VisMon.Builder(VisSense(vid[0]))
                .on('fullyvisible', function () {
                    if ($(vid[0]).parent().parent().parent().hasClass('swiper-slide-active')) {
                        vid[0].play();
                    }
                })
                .on('hidden', function () {
                    vid[0].pause();
                })
                .build()
                .start();
        });

        function isScrolledIntoView(elem,container) {
            var $elem = $(elem);
            var $window = $(container);

            var docViewTop = $window.scrollTop();
            var docViewBottom = docViewTop + $window.height();

            var elemTop = $elem.offset().top;
            var elemBottom = elemTop + $elem.height();

            console.log(elemBottom,docViewBottom,elemTop,docViewTop,(elemBottom <= docViewBottom),(elemTop >= docViewTop),(elemBottom <= docViewBottom) && (elemTop >= docViewTop));
            return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
        }

        $('.video_choser').click(function () {
            $('.swiper-slide-active.my-video').each(function () {
              if(isScrolledIntoView($(this),window)){
                  $(this).find("video")[0].play();
              }
            });
            $('.swiper-slide.my-video').each(function () {
                if (!$(this).hasClass("swiper-slide-active")) {
                    $(this).find("video")[0].pause();
                }
            });
        });

        function notifyaddpost() {

            if (!("Notification" in window)) {
                alert("This browser does not support desktop notification");
            }
            // Let's check whether notification permissions have already been granted
            else if (Notification.permission === "granted") {
                // If it's okay let's create a notification
                var notification = new Notification("add new post successfully");
            }
            else if (Notification.permission !== "denied") {
                Notification.requestPermission().then(function (permission) {
                    // If the user accepts, let's create a notification
                    if (permission === "granted") {
                        var notification = new Notification("add new post successfully");
                    }
                });
            }
        }

        function notify_delete_post() {

            if (!("Notification" in window)) {
                alert("This browser does not support desktop notification");
            }
            // Let's check whether notification permissions have already been granted
            else if (Notification.permission === "granted") {
                // If it's okay let's create a notification
                var notification = new Notification(" post deleted successfully");
            }
            else if (Notification.permission !== "denied") {
                Notification.requestPermission().then(function (permission) {
                    // If the user accepts, let's create a notification
                    if (permission === "granted") {
                        var notification = new Notification("post deleted successfully");
                    }
                });
            }
        }

        function sleep(milliseconds) {
            var start = new Date().getTime();
            for (var i = 0; i < 1e7; i++) {
                if ((new Date().getTime() - start) > milliseconds){
                    break;
                }
            }
        }

        $('body').on('click','.btn-prev-without',function () {
            console.log('my');
            var sliderID = $(this).closest('.swiper-container').attr('id');
            swipers['swiper-' + sliderID].slidePrev();
        });

        $('body').on('click','.btn-next-without',function () {
            console.log('my');
            var sliderID = $(this).closest('.swiper-container').attr('id');
            swipers['swiper-' + sliderID].slideNext();
        });
    });

</script>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        var image = document.getElementById('image');
        var input = document.getElementById('input');
        var $modal = $('#modal');
        var cropper;
        $('[data-toggle="tooltip"]').tooltip();
        input.addEventListener('change', function (e) {
            var files = e.target.files;
            var done = function (url) {
                input.value = '';
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    console.log(URL,3);
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    console.log(FileReader,4);
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        function guid() {
            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
            }
            return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
        }

        document.getElementById('crop').addEventListener('click', function () {
            var canvas;
            $modal.modal('hide');
            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 1080,
                    height: 1080,
                });
                var src = canvas.toDataURL();
                nameOfphoto = guid()+'.png';
                console.log(nameOfphoto);
                $('#choosephoto').append(
                    '<li style="width: 100px;height: 100px;display: inline-flex;margin: 5px;">' +
                    ' <img class="rounded" data-name='+nameOfphoto+' src="'+src+'">' +
                    '</li>'
                );
                canvas.toBlob(function (blob) {
                    var _token = $("input[name='_token']").val();
                    var formData = new FormData();
                    formData.append('avatar', blob, 'avatar.jpg');
                    formData.append('_token', _token);
                    formData.append('name', nameOfphoto);
                    $.ajax({
                        method: 'POST',
                        url: '<?php echo e(route('storePostsPhotosInTemp')); ?>',
                        data: formData,
                        processData: false,
                        contentType: false,
                        /*xhr: function () {
                            var xhr = new XMLHttpRequest();
                            xhr.upload.onprogress = function (e) {
                                var percent = '0';
                                var percentage = '0%';
                                if (e.lengthComputable) {
                                    percent = Math.round((e.loaded / e.total) * 100);
                                    percentage = percent + '%';
                                    // $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                                }
                            };
                            return xhr;
                        },*/
                        success: function () {
                            console.log('success');
                            // $alert.show().addClass('alert-success').text('Upload success');
                        },
                        error: function () {
                            console.log('error');
                            // avatar.src = initialAvatarURL;
                            // $alert.show().addClass('alert-warning').text('Upload error');
                        },
                        complete: function () {
                            console.log('complete');
                            // $progress.hide();
                        },
                    });
                });
            }
        });
    });
</script>
<script>
    var forSupportAjax =function () {
        var swipers = {};
            var initIterator = 0;
            var $breakPoints = false;
            $('.swiper-container').each(function () {

                var $t = $(this);
                var index = 'swiper-unique-id-' + initIterator;

                $t.addClass('swiper-' + index + ' initialized').attr('id', index);
                $t.find('.swiper-pagination').addClass('pagination-' + index);

                var $effect = ($t.data('effect')) ? $t.data('effect') : 'slide',
                    $crossfade = ($t.data('crossfade')) ? $t.data('crossfade') : true,
                    $loop = ($t.data('loop') == false) ? $t.data('loop') : true,
                    $showItems = ($t.data('show-items')) ? $t.data('show-items') : 1,
                    $scrollItems = ($t.data('scroll-items')) ? $t.data('scroll-items') : 1,
                    $scrollDirection = ($t.data('direction')) ? $t.data('direction') : 'horizontal',
                    $mouseScroll = ($t.data('mouse-scroll')) ? $t.data('mouse-scroll') : false,
                    $autoplay = ($t.data('autoplay')) ? parseInt($t.data('autoplay'), 10) : 0,
                    $autoheight = ($t.hasClass('auto-height')) ? true: false,
                    $slidesSpace = ($showItems > 1) ? 20 : 0;

                if ($showItems > 1) {
                    $breakPoints = {
                        480: {
                            slidesPerView: 1,
                            slidesPerGroup: 1
                        },
                        768: {
                            slidesPerView: 2,
                            slidesPerGroup: 2
                        }
                    }
                }

                swipers['swiper-' + index] = new Swiper('.swiper-' + index, {
                    pagination: '.pagination-' + index,
                    paginationClickable: true,
                    direction: $scrollDirection,
                    mousewheelControl: $mouseScroll,
                    mousewheelReleaseOnEdges: $mouseScroll,
                    slidesPerView: $showItems,
                    slidesPerGroup: $scrollItems,
                    spaceBetween: $slidesSpace,
                    keyboardControl: true,
                    setWrapperSize: true,
                    preloadImages: true,
                    updateOnImagesReady: true,
                    autoplay: $autoplay,
                    autoHeight: $autoheight,
                    loop: $loop,
                    breakpoints: $breakPoints,
                    effect: $effect,
                    fade: {
                        crossFade: $crossfade
                    },
                    parallax: true,
                    onSlideChangeStart: function (swiper) {
                        var sliderThumbs = $t.siblings('.slider-slides');
                        if (sliderThumbs.length) {
                            sliderThumbs.find('.slide-active').removeClass('slide-active');
                            var realIndex = swiper.slides.eq(swiper.activeIndex).attr('data-swiper-slide-index');
                            sliderThumbs.find('.slides-item').eq(realIndex).addClass('slide-active');
                        }
                    }
                });
                initIterator++;
            });
    };
</script>