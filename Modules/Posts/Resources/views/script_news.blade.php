<script>
    $(document).ready(function () {
        $('[id^=comment_post]').click(function () {
            id = $(this).attr('id');
            console.log(id);
            s = '#comment_post_form' + id.substring(12);
            $(s).focus();
        });

        $( window ).resize(function() {
            Resize();
        });


        Resize();
        function Resize(){
            $('[id^=video_post_]').each(function () {
                var cw = $(this).width();
                $(this).css({'height':cw+'px'});
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

        $('[id^=btn_react]').click(function () {
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

        $('[id^=btn_comment_]').click(function (e) {
		console.log('something');
            var _token = $("input[name='_token']").val();
            var btn = $(this);
            e.preventDefault();
            var post_id = btn.attr('id');
            post_id = post_id.substring(12);
            var comment = $('#comment_post_form' + post_id).val();
            if (comment.length > 0) {
                $.ajax({
                    type: 'POST',
                    url: '{{route('new-comment')}}',
                    data: {_token: _token, id: post_id, comment: comment},
                    cache: false,
                    success: function (data) {
                        if (data['success']) {
						var newCommentID=data['newCommentId'];
                            $('#comment_post_form' + post_id).val('');
                            $('#engagement_count' + post_id).text(data['engagement']);
                            $('#comment_count' + post_id).text(data['comment_count']);
                            $('#reactioners_name' + post_id).html(data['reactioners']);
                            $('#reactioners_photos' + post_id).html(data['reactioners_photos']);
                            $('#reactions_count' + post_id).text(data['react_count']);
                            $('.comments-list--' + post_id).html(
                                '<li  id="newestComment'+post_id+'" class="comment-item Allcommentul'+newCommentID+'">'+
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
                                '<div class="more">'+
                                        '<svg class="olymp-three-dots-icon">'+
                                                   '<use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>'+
                                               '</svg>'+
                                        '<ul class="more-dropdown">'+
                                            '<li>'+
                                                '<a href="#">Edit comment</a>'+
                                            '</li>'+
                                            '<li>'+
                                                '<a href="javascript:void(0)" class="comment-delete" id="'+newCommentID+'">Delete comment</a>'+
                                            '</li>'+
                                           
                                        '</ul>'+
                                    '</div>'+
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
                                '       <a href="#" class="reply">Reply</a>'+
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

        $('.post_reacts_users').click(function () {
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
                    var lis="";
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
            if(last_page != current_page){
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
            }else{
                processing = false;
            }
        }


        function isScrolledIntoView(elem){
            var $elem = $(elem);
            var $window = $('.modal-body');

            var docViewTop = $window.scrollTop();
            var docViewBottom = docViewTop + $window.height();

            var elemTop = $elem.offset().top;
            var elemBottom = elemTop + $elem.height();
            return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));}

        $('.modal-body').scroll(function(){
            $('.test').each(function(){
                if(isScrolledIntoView($(this))){
                    if(processing)
                    $('#wait').show();
                    else $('#wait').hide();
                }
                else{

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


        $('.post-delete').click(function (){
		var post=$(this);//not post but delete button
            var id = post.attr('id');
			var _token = $("input[name='_token']").val();
			console.log(id);
            $.ajax({
                type: 'post',
                url: '{{route('delete-post')}}',//route function take route name == url("/posts/delete-post")
                data: {_token: _token, id: id},
                success: function (data) {
                  console.log(data);
				  $('#AllPostDiv'+id).html("");
                },
            error : function(err) {
                console.log('Error!', err);
            },
        });
        });

        $('body').on('click', '.comment-delete', function () {
            console.log('good');
            var btn_comment=$(this);//not post but delete button
            var id = btn_comment.attr('id');
            var _token = $("input[name='_token']").val();
            console.log(id);
            $.ajax({
                type: 'post',
                url: '{{route('comment-delete')}}',//route function take route name == url("/posts/delete-post")
                data: {_token: _token, id: id},
                success: function (data) {
                    console.log(data);
                    $('.Allcommentul'+id).html("");
                },
                error : function(err) {
                    console.log('Error!', err);
                },
            });
        });

		 {{--$('.comment-delete').click(function (){--}}
		 {{--console.log('good');--}}
        {{--var btn_comment=$(this);//not post but delete button--}}
            {{--var id = btn_comment.attr('id');--}}
			{{--var _token = $("input[name='_token']").val();--}}
			{{--console.log(id);--}}
            {{--$.ajax({--}}
                {{--type: 'post',--}}
                {{--url: '{{route('comment-delete')}}',//route function take route name == url("/posts/delete-post")--}}
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
             for(var i = 0; i < divs.length; i++) {
                 var relFontsize = divs[i].offsetWidth*0.05;
                 divs[i].style.fontSize = relFontsize+'px';
             }
         };
        window.onload = function(event) {
            flexFont();
        };
        window.onresize = function(event) {
            flexFont();
        };


    });
</script>
