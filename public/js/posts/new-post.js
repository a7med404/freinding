$(document).ready(() => {
    //tag friends open model
    $('body').on('click', '#TAG-YOUR-FRIENDS', (e) => {
        $('#tag-Modal').modal();
    });

    //new post ajax request
    $('#myNewPost').submit((e)=>{
        e.preventDefault();
        if ($('#choosephoto').children().length || $.trim($('#textpost').val())) {
            const clickedItem = $(e.currentTarget);
            const $url = clickedItem.data('url');
            const $dalete_post_url = clickedItem.data('delete-post-url');
            let $oldTopics = $('#knownTopics').val();
            let $newTopics = $('#newTopics').val();
            $this = $(this)
            //start loader
            let bar = new ProgressBar.Line(containerloader, {
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
            let post_has_files = 0;
            let $names = [];
            if ($('#choosephoto').children().length) {
                post_has_files = 1;
                let $i = 0;
                $('#choosephoto').children().each(function () {
                    $names[$i] = $(this).find('img').data('name');
                    $i++;
                });
            }
            let text = $('#textpost').val();
            let selecttag = $('.js-example-basic-multiple').val();
            let _token = $("input[name='_token']").val();
            $.ajax({
                type: 'POST',
                url: $url,
                data: {
                    post_has_files,
                    text,
                    selecttag,
                    files: $names,
                    _token: _token,
                    oldTopics : $oldTopics,
                    newTopics : $newTopics
                },
                cache: false,

                success: (data)=> {
                    swal("Success", "You have successfuly share new post", "success");
                    if (data['success']) {
                        // $('#tagdiv' + data.newpost.id).html(data.tagsection);
                        let $tag = data.tagsection;
                        let $photos = "";
                        if (data.with_files) {
                            $photos = data.html_for_pictures_popup + data.html_for_pictures;
                        }
                        let textOfPost = data.newpost.text ? data.newpost.text : "";
                        $('#AreaForPost').prepend(
                            '<div id="AllPostDiv' + data.newpost.id + '" class="ui-block">' +
                            '<article class="hentry post video">' +
                            '<div class="post__author author vcard inline-items">' +
                            '<img src="' + data.user_image + '" alt="author">' +
                            '<div class="author-date">' +
                                '<div class="row m-0">'+
                                     '  <a class="h6 post__author-name fn" href="#">' + data.user_name + '</a>' +
                                        '' + data.tagsection + '' +
                                '</div>'+
                            '</div>'+
                                '<div class="post__date">' +
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
                            ' <a href="javascript:void(0)" class="post-delete" id="' + data.newpost.id + '" data-url="'+$dalete_post_url+'">Delete Post</a>' +
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
                            $photos +
                            '<div class="topic-section inLineBlock">' +
                            '<ul>' +
                            $('#topicSection').children('ul').html()+
                            '</ul>' +
                            '</div>' +
                            '<div class="post-additional-info form-inline post-control-button">' +
                            '<a id="btn_react' + data.newpost.id + '" class="btn btn-control" data-url="'+data.react_url+'">' +
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
                            '  <a href="javascript:void(0)" id="sharePost" data-id="'+data.newpost.id+'" data-share-url="'+data.share_url+'">Share</a>' +
                            '  </li>' +
                            '  <li>' +
                            '  <a href="#">Share in group</a>' +
                            '  </li>' +
                            '  <li>' +
                            '<a href="#">share on friend diary</a>' +
                            ' </li>' +
                            '</ul>' +
                            ' </div>' +
                            '<ul id="reactioners_photos' + data.newpost.id + '"' +
                            'style=" position: absolute; right: 27%;"' +
                            'class="friends-harmonic inline-items float-right">' +
                            '</ul>' +
                            '<div class="post_reacts_users" id="' + data.newpost.id + '"data-url="'+data.users_reactions+'" style="position: absolute;right: 5%;cursor: pointer;">' +
                            ' <a  class="post-add-icon inline-items"  >' +
                            ' <span id="engagement_count' + data.newpost.id + '">0</span>' +
                            '</a>' +
                            ' <span {{--style="position: absolute;right: 5%;"--}}>&nbsp;Engagements</span>' +
                            '</div>' +
                            '</div>' +
                            '</article>' +
                            '<ul class="comments-list comments-list--' + data.newpost.id + '">' +
                            '</ul>' +

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
                            '       <button id="btn_comment_' + data.newpost.id + '" class="btn btn-md-2 btn-primary" data-url="'+data.new_comment+'" data-delete-url="'+data.comment_delete+'">Post Comment' +
                            '       </button>' +
                            '       <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel' +
                            '       </button>' +
                            '</form>' +
                            '</div>'
                        );
                        //clear topics sections//
                        $('#topicSection').children('ul').html('');
                        $('#knownTopics').val('');
                        $('#newTopics').val('');
                        $('.js-example-placeholder-multiple').val('');
                        $('.js-example-placeholder-multiple').text('');
                        //end clear topics sections//

                        $('#textpost').val('');
                        $(".js-example-basic-multiple").val('');
                        $(".js-example-basic-multiple").select2({
                            templateResult: formatState,
                            templateSelection: formatState,
                            width: "100%"
                        });
                        $('#choosephoto').html('');

                        $('#tagdiv').html('');
                    } else {
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
                },
                complete: function () {
                    //hide loader
                    $('#containerloader').html('');
                }
            });
        } else {
            swal("Error",
                "There is nothing to share it",
                "error");
        }
    });

    let formatState = (state)=> {
        let optimage = $(state.element).data('image');
        let opttext = $(state.element).data('text');
        if (!optimage) {
            return state.text;
        } else {
            let $opt = $(
                '<span><img style="width:30px; margin: 3px; border-radius: 50%" src="' + optimage + '" /> <span>' + opttext + '</span></span>'
            );
            return $opt;
        }
    };

    $(".js-example-basic-multiple").select2({
        placeholder: "Select a friend",
        templateResult: formatState,
        templateSelection: formatState,
        width: "100%"
    });

    $('body').on('click','#addtag',()=>{
        let sel = $('.js-example-basic-multiple').val();
        if (sel.length == 1) {
            $('#tagdiv').html('');
            let $id = sel[0];
            let $textselect = $('#tagselected' + $id).data('text');
            $('#textpost').after('<div id="tagdiv" style="text-align: center;font-weight: 700;"><span>&nbsp;With&nbsp;<a>' + $textselect + '</a></span></div>');
        }
        else if ($(".js-example-basic-multiple").select2("data").length == 2) {
            $('#tagdiv').html('');
            let $id = sel[0];
            let $textselect = $('#tagselected' + $id).data('text');
            $id = sel[1];
            let $textselect2 = $('#tagselected' + $id).data('text');
            console.log($textselect2);
            $('#textpost').after('<div id="tagdiv" style="text-align: center;font-weight: 700;">' +
                '<span>&nbsp;With&nbsp;<a>' + $textselect + '</a></span>' +
                '<span>&nbsp;And&nbsp;<a>' + $textselect2 + '</a></span></div>');
        }
        else if ($(".js-example-basic-multiple").select2("data").length > 2) {
            $('#tagdiv').html('');
            let $id = sel[0];
            let $l = $(".js-example-basic-multiple").select2("data").length - 2;
            let $textselect = $('#tagselected' + $id + '').data('text');
            $id = sel[1];
            let $textselect2 = $('#tagselected' + $id + '').data('text');
            $('#textpost').after('<div id="tagdiv" style="text-align: center;font-weight: 700;"><span>&nbsp;With&nbsp;<a>' + $textselect + '</a></span>' +
                '<span>&nbsp;And&nbsp;<a>' + $textselect2 + '</a></span>' +
                '<span>And ' + $l + ' more</span></div>');
        }
        $('#tag-Modal').modal('hide');
    });

    $('body').on('keyup','#textpost',(e)=>{
        EnaDisShareBtn();
    });

});