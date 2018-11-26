<script>
    $(document).ready(function () {
        $('[id^=comment_post]').click(function () {
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
                url: '{{route('react')}}',
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
                    url: '{{route('new-comment')}}',
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
                url: '{{route('users-reactions')}}',
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
        $('.modal-body').scroll(function (e) {
            if (processing)
                return false;
            if ($('.modal-body').scrollTop() >= ($('#users_reaction').height() - $('.modal-body').height()) * 0.7) {
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


        function isScrolledIntoModalBody(elem) {
            var $elem = $(elem);
            var $window = $('.modal-body');

            var docViewTop = $window.scrollTop();
            var docViewBottom = docViewTop + $window.height();

            var elemTop = $elem.offset().top;
            var elemBottom = elemTop + $elem.height();
            return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
        }

        $('.modal-body').scroll(function () {
            $('.test').each(function () {
                if (isScrolledIntoModalBody($(this))) {
                    if (processing)
                        $('#wait').show();
                    else $('#wait').hide();
                }
                else {

                }
            });
        });


        // $(document).scroll(function (e) {
        //     if (processing)
        //         return false;
        //     if ($(window).scrollTop() >= ($(document).height() - $(window).height()) * 0.7) {
        //         processing = true;
        //         users_who_react();
        //     }
        // });
        //
        // function users_who_react() {
        //     console.log('goood');
        //     processing = false;
        // }


        // function isScrolledIntoView(elem){
        //     var $elem = $(elem);
        //     var $window = $(window);
        //
        //     var docViewTop = $window.scrollTop();
        //     var docViewBottom = docViewTop + $window.height();
        //
        //     var elemTop = $elem.offset().top;
        //     var elemBottom = elemTop + $elem.height();
        //         console.log(docViewTop,docViewBottom,elemTop,elemBottom);
        //     return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));}


        $('body').on('click', '.post-delete', function () {
            var post = $(this);//not post but delete button
            var id = post.attr('id');
            var _token = $("input[name='_token']").val();
            console.log(id);

            $.ajax({
                type: 'post',
                url: '{{route('delete-post')}}',//route function take route name == url("/posts/delete-post")
                data: {_token: _token, id: id},
                success: function (data) {
                    console.log(data);
                    $('#AllPostDiv' + id).html("");
                    notify_delete_post();
                },
                error: function (err) {
                    console.log('Error!', err);
                },
            });
        });

        $('body').on('click', '.comment-delete', function () {
            console.log('good');
            var btn_comment = $(this);//not post but delete button
            var id = btn_comment.attr('id');
            var _token = $("input[name='_token']").val();
            console.log(id);
            $.ajax({
                type: 'post',
                url: '{{route('comment-delete')}}',//route function take route name == url("/posts/delete-post")
                data: {_token: _token, id: id},
                success: function (data) {
                    console.log(data);
                    $('.Allcommentul' + id).html("");
                },
                error: function (err) {
                    console.log('Error!', err);
                },
            });
        });

        {{--$('.comment-delete').click(function (){--}}

                {{--console.log('good');--}}
                {{--var btn_comment=$(this);}}
                    {{--var id = btn_comment.attr('id');--}}
                {{--var _token = $("input[name='_token']").val();--}}
                {{--console.log(id);--}}
                {{--$.ajax({--}}
                {{--type: 'post',--}}
                {{--url: '{{route('comment-delete')}}',}}
                {{--data: {_token: _token, id: id},--}}
                {{--success: function (data) {--}}
                {{--console.log(data);--}}
                {{--$('.Allcommentul'+id).html("");--}}
                {{--},--}}
                {{--error : function(err) {--}}
                {{--console.log('Error!', err);--}}
                {{--},--}}
                {{--});--}}
                {{--});--}}

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

        {{--console.log('good');--}}
        {{--var btn_comment=$(this);}}
            {{--var id = btn_comment.attr('id');--}}
        {{--var _token = $("input[name='_token']").val();--}}
        {{--console.log(id);--}}
        {{--$.ajax({--}}
        {{--type: 'post',--}}
        {{--url: '{{route('comment-delete')}}',}}
        {{--data: {_token: _token, id: id},--}}
        {{--success: function (data) {--}}
        {{--console.log(data);--}}
        {{--$('.Allcommentul'+id).html("");--}}
        {{--},--}}
        {{--error : function(err) {--}}
        {{--console.log('Error!', err);--}}
        {{--},--}}
        {{--});--}}
        {{--});--}}


        $('#myNewPost').submit(function (e) {

            $this = $(this)
            var _token = $("input[name='_token']").val();
            var data = $('#myNewPost').serialize();
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
            console.log($this);
            console.log('something');

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{route('new-post')}}',
                data: data,
                cache: false,

                success: function (data) {
                    console.log(data.newpost.humansDate);
                    if (data['success']) {
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
                            '<p>' + data.newpost.text + '</p>' +
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

                            '<ul id="reactioners_photos' + data.newpost.id + '" style=" position: absolute; right: 27%;" class="friends-harmonic inline-items float-right">' +
                            '</ul>' +
                            '<a href="#" class="post-add-icon inline-items" style="position: absolute;right: 20%;">' +
                            '<span id="engagement_count1058">0</span>' +
                            '</a>' +
                            '<span style="position: absolute;right: 5%;">Engagements</span>' +
                            '</div>' +
                            '</article>' +

                            '<div class="post_reacts_users" id="'+data.newpost.id +'" style="position: absolute;right: 5%;">'+
                                 ' <a  class="post-add-icon inline-items"  >'+
                                       ' <span id="engagement_count'+data.newpost.id +'">0</span>'+
                                   '</a>'+
                                 ' <span {{--style="position: absolute;right: 5%;"--}}>&nbsp;Engagements</span>'+
                                '</div>'+
                            '</div>' +
                            '</article>' +
                            '<ul class="comments-list comments-list--'+data.newpost.id +'">'+
                                '</ul>'+

                            '<form class="comment-form inline-items">' +
                            '        <div class="post__author author vcard inline-items">' +
                            '        <img src="olympus/img/author-page.jpg" alt="author">' +
                            '             <div class="form-group with-icon-right is-empty">' +

                            '                <textarea id="comment_post' + data.newpost.id + '" class="form-control" placeholder="Your Comment Here" required=""></textarea>' +

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

                            '       </div>' +
                            '       <button id="btn_comment' + data.newpost.id + '" class="btn btn-md-2 btn-primary">Post Comment' +

                            '</div>' +
                            '       <button id="btn_comment_' + data.newpost.id + '" class="btn btn-md-2 btn-primary">Post Comment' +

                            '       </button>' +
                            '       <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel' +
                            '       </button>' +
                            '   </form>' +
                            '</div>'
                        );
                        // data['htmlnewpost']
                        $('#textpost').val('');
                        notifyaddpost();



                    } else {
                        console.log(data);
                    }

                },
                error: function (data) {
                    console.log(data);
                },
                complete: function () {
                    //hide loader
                    $('#containerloader').html('');
                }
            });
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
            // $('.swiper-slide-active.my-video').find("video")[0].play();
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

        document.getElementById('crop').addEventListener('click', function () {
            var canvas;
            $modal.modal('hide');
            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 160,
                    height: 160,
                });
                console.log(canvas,6);
                var src = canvas.toDataURL();
                console.log(src,8);
                $('#choosephoto').append(
                    '<li style="width: 100px;height: 100px;display: inline-flex;margin: 5px;">' +
                    ' <img class="rounded"  src="'+src+'">' +
                    '</li>'
                );
                canvas.toBlob(function (blob) {
                    console.log(blob,9);
                    var _token = $("input[name='_token']").val();
                    var formData = new FormData();
                    formData.append('avatar', blob, 'avatar.jpg');
                    formData.append('_token', _token);
                    $.ajax({
                        method: 'POST',
                        url: '{{route('storePostsPhotosInTemp')}}',
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
