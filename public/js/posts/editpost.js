$(document).ready(() => {
    let idpost;
    let $url;
    var oldtext = "";
    var lenghtlistphoto = 0;
    let delete_photo_list = [];
    var photo_list = [];
    let $names = [];
    let urldeleteimage;
    $('body').on('click', '#editPost', (e) => {
        let btn = $(e.currentTarget);
        idpost = btn.data('id');
        $url = btn.data('url');
        var url2 = btn.data('get-post');
        urldeleteimage = btn.data('deleteimage');
        $('#newpostphoto').empty();
        $('#postphoto').empty();
        $.ajax({
            type: 'get',
            url: url2,//route function take route name == url("/posts/edit-comment")
            data: {id: idpost},
            success: (data) => {
                console.log(data);
                if (data.success) {
                    oldtext = data.post.text;
                    $('#postphoto').append(data.html_for_pictures);
                    lenghtlistphoto = data.arrayphoto.length;
                    photo_list = data.arrayphoto;
                    $('#update-text-Post').val(oldtext);
                    $('.modal-header').show();
                    document.getElementById("edit-post").style.zIndex = "1050";
                    $('#edit-post').modal();
                }

            },
            error: (err) => {
                console.log('Error!', err);
                swal("Not Updated!", "Your post has not been Updated try again later.", "error");
            },
        });


    });


    $('body').on('click', '#save-edit-post', (e) => {
        var inputtext = $('#update-text-Post').val();
        document.getElementById("errorinputtextpost").innerHTML = "";

        if ($.trim(inputtext) === "" && delete_photo_list.length == lenghtlistphoto && $('#newpostphoto').children().length == 0) {

            $('.post-delete').click();
            document.getElementById("errorinputtextpost").innerHTML = "You need to write something";
        } else if ($.trim(inputtext) === $.trim(oldtext) && delete_photo_list.length == 0 && $('#newpostphoto').children().length == 0) {

            document.getElementById("errorinputtextpost").innerHTML = "You need to write something different!";
        } else {

            if ($('#newpostphoto').children().length > 0) {
                let $i = 0;
                $('#choosephoto').children().each(function () {
                    $names[$i] = $(this).find('img').data('name');
                    $i++;
                });
            }
            var note;
            if (photo_list.length == 0 && $('#newpostphoto').children().length == 0) {
                note = "CTT";
            }
            document.getElementById("errorinputtextpost").innerHTML = "";
            console.log($names);
            $.ajax({
                type: 'post',
                url: $url,//route function take route name == url("/posts/edit-comment")
                data: {
                    id: idpost, newtext: inputtext, delete_photo_list: delete_photo_list,
                    names: $names, note: note, oldphoto: photo_list
                },
                success: (data) => {
                    console.log(data);
                    if (data.success) {
                        swal({
                            title: "success!",
                            type: "success",
                            text: "Nice! Your Post Edited ",
                            timer: 2000,
                            showConfirmButton: false
                        });
                        if (data.post.text) {
                            $('#text-newpost' + idpost).html(data.post.text);
                            oldtext = data.post.text;
                        }
                        let $photos;
                        $photos = data.html_for_new_pictures_popup + data.html_for_pictures;
                        let i;
                        let x = delete_photo_list.length;
                        //loop
                        for (i = 0; i < x; i++)
                        {
                            $('#swiper-slide' + delete_photo_list[i]).empty();
                        }

                        if ($names.length > 0||delete_photo_list.length==lenghtlistphoto) {

                            console.log('********************');
                            $('#text-newpost' + idpost).nextAll('div').remove('.picture-section');
                            $('#text-newpost' + idpost).after($photos);
                        }
                        $('#closeedit-post').click();
                        delete_photo_list = [];
                        photo_list = [];
                        $names=[];
                        lenghtlistphoto = photo_list.length;

                    } else {
                        swal("SORRY", "You are not the publisher of the post", "error");
                    }
                },
                error: (err) => {
                    console.log('Error!', err);
                    swal("Not Updated!", "Your post has not been Updated try again later.", "error");
                },
            });
        }
        $('#choosephoto').empty();
    });
    $('body').on('click', '#closeedit-post', (e) => {
        $('#edit-post').modal('hide');
        document.getElementById("errorinputtextpost").innerHTML = "";
        delete_photo_list = [];
        photo_list = [];
        $('#choosephoto').empty();
    });
    $('body').on('click', '[id^=deleteimage]', (e) => {
        let btn = $(e.currentTarget);
        var file_id = btn.attr('id').substring(11);
        var child = document.getElementById("li" + file_id);

        delete_photo_list.push(file_id);
        var list_postphoto = document.getElementById("postphoto");   // Get the <ul> element with id="myList"
        list_postphoto.removeChild(child);

        for (var i = 0; i < photo_list.length; i++) {
            if (photo_list[i].toString() === file_id) {
                photo_list.splice(i, 1);
                break;
            }
        }

    });


});