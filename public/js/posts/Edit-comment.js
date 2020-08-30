$(document).ready(() => {
    let comment_id;
    let $url;
    var oldtext;

  //edit comment
    $('body').on('click', '[id^=edit_comment]', (e)=> {
        let btn = $(e.currentTarget);
        comment_id = btn.attr('id').substring(12);
         $url = btn.data('url');
        oldtext= document.getElementById("text-comment" +comment_id).innerHTML ;
        console.log(comment_id);
        console.log($url);
        console.log(oldtext);
        $('#update-text-comment').val(oldtext);
        console.log('222');
        $('#edit-comment').modal();
        console.log('888');
        // swal({
        //     text: '<br /><form method="post" id="taxcode-update" name="taxcodeUpdate">'
        // + '<input id="admin-tax-code" autofocus minlength="3" class="form-control wedding-input-text wizard-input-pad" type="text" name="taxCode" placeholder="Codice fiscale">'
        // + '</form>',
        //     allowOutsideClick: false,
        //     title: "Edit Your Comment",
        //     type: "input",
        //     showCancelButton: true,
        //     confirmButtonText: "Save",
        //     closeOnConfirm: false,
        //
        //     animation: "slide-from-top",
        //     customClass: "swal-title "
        // }, function (inputValue) {
        //     console.log(inputValue);
        //     console.log(oldtext);
        //     while($.trim(inputValue) === "") {
        //         console.log("111");
        //         swal({
        //                 title: "Are you sure?",
        //                 text: "Are You Sure You Wont To Delete This Comment ",
        //                 type: "warning",
        //                 showCancelButton: true,
        //                 confirmButtonClass: "btn-danger",
        //                 confirmButtonText: "Yes, delete it!",
        //                 closeOnConfirm: true
        //             },function(isConfirm) {
        //             if (isConfirm) {
        //                 console.log("yes");
        //                document.getElementById(comment_id).click();
        //             }
        //         });
        //         return false;
        //     }
        //    if($.trim(inputValue)==$.trim(oldtext))
        //     {
        //         console.log("nk;");
        //         swal.showInputError("You need to write something!");
        //         return false;
        //     }
        //     if (inputValue!=false ){
        //         $.ajax({
        //             type: 'post',
        //             url: $url,//route function take route name == url("/posts/edit-comment")
        //             data: {id: comment_id, newtext: inputValue},
        //             success: (data) => {
        //                 if (data.success) {
        //                     document.getElementById("text-comment" + comment_id).innerHTML = data.comment.text;
        //                     //
        //                     oldtext = data.comment.text;
        //                     swal({
        //                         title: "success!",
        //                         type: "success",
        //                         text: "Nice! You Comment is: " + inputValue,
        //                         timer: 2000,
        //                         showConfirmButton: false
        //                     });
        //                 } else {
        //                     swal("SORRY", "You are not the publisher of the comment", "error");
        //                 }
        //
        //             },
        //             error: (err) => {
        //                 console.log('Error!', err);
        //                 swal("Not Deleted!", "Your post has not been deleted try again later.", "error");
        //             },
        //         });
        //     }
        // });



    });
    $('body').on('click', '#save-edit-comment', (e)=> {
       var inputtext= $('#update-text-comment').val();
        document.getElementById("errorinputtextcomment" ).innerHTML = "";
            if($.trim(inputtext) === "") {
                console.log("111");
                document.getElementById("errorinputtextcomment" ).innerHTML = "You need to write something";
                swal({
                        title: "Are you sure?",
                         text: "Are You Sure You Wont To Delete This Comment ",
                         type: "warning",
                         showCancelButton: true,
                         confirmButtonClass: "btn-danger",
                         confirmButtonText: "Yes, delete it!",
                         closeOnConfirm: true
                     },function(isConfirm) {
                     if (isConfirm) {
                         console.log("yes");
                        document.getElementById(comment_id).click();
                         $('#close-edit-comment').click();
                     }
                 });
            }
          else  if(inputtext===oldtext)
            {
                 console.log("nk;");
                document.getElementById("errorinputtextcomment" ).innerHTML = "You need to write something different!";


            }

         else {
                document.getElementById("errorinputtextcomment" ).innerHTML = "";
                 $.ajax({
                   type: 'post',
                    url: $url,//route function take route name == url("/posts/edit-comment")
                    data: {id: comment_id, newtext: inputtext},
                     success: (data) => {
                         if (data.success) {
                             swal({
                                 title: "success!",
                                 type: "success",
                                 text: "Nice! Your Comment is: " + data.comment.text,
                                 timer: 2000,
                                 showConfirmButton: false
                             });
                             document.getElementById("text-comment" + comment_id).innerHTML = data.comment.text;
                            $('#close-edit-comment').click();
                         } else {
                             swal("SORRY", "You are not the publisher of the comment", "error");
                         }

                     },
                     error: (err) => {
                         console.log('Error!', err);
                         swal("Not Deleted!", "Your post has not been deleted try again later.", "error");
                     },
                 });
             }

         });
    $('body').on('click', '#close-edit-comment', (e)=> {
        document.getElementById("errorinputtextcomment" ).innerHTML = "";
    });



});