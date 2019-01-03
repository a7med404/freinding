$(document).ready(()=>{

    $('body').on('click', '.post_reacts_users',(e)=> {
        let btn = $(e.currentTarget);
        let $url = btn.data('url');
        let id = btn.attr('id');
        let lis = "<div id='wait' style=\"\n" +
            "  display:    none;\n" +
            "  position:   fixed;\n" +
            "  z-index:    1000;\n" +
            "  top:        0;\n" +
            "  left:       0;\n" +
            "  height:     100%;\n" +
            "  width:      100%;\n" +
            "  background: rgba( 255, 255, 255, .8 )\n" +
            " url('images/FhHRx.gif')\n" +
            "  50% 50%\n" +
            "  no-repeat;\"\n" +
            "  ></div>";
        $('#users_reaction').html(lis);
        $('#wait').show();
        $('#reactions').modal('show');
        let _token = $("input[name='_token']").val();
        $.ajax({
            type: 'POST',
            url: $url,
            data: {_token: _token, id: id},
            cache: false,
            success:  (data)=> {
                current_page = data['current_page'];
                last_page = data['last_page'];
                nextPageUrl = data['next_page_url'];
                post_id = id;
                let lis = "";
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
                swal("Error",
                    "Server error try again later",
                    "error");
            }
        });
    });

    let processing = false;

    $('.modal-body1').scroll((e)=> {
        if (processing)
            return false;
        if ($('.modal-body1').scrollTop() >= ($('#users_reaction').height() - $('.modal-body1').height()) * 0.7) {
            processing = true;
            users_who_react();
        }
    });

    let users_who_react = ()=> {
        if (last_page != current_page) {
            let _token = $("input[name='_token']").val();
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
                    let lis = "";
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
                    swal("Error",
                        "Server error try again later",
                        "error");
                }
            });
        } else {
            processing = false;
        }
    }

    $('.test').each(function () {
        var btn = $(this);
        VisSense.VisMon.Builder(VisSense(btn[0]))
            .on('fullyvisible',  ()=> {
                if (processing)
                    $('#wait').show();
            })
            .on('hidden',  ()=> {
                $('#wait').hide();
            })
            .build()
            .start();
    });

});