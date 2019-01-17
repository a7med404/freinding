let disableShare = () => {
    if ($numOfPendingPhotos == 0) {
        $('#newShare').attr('disabled', false);
    } else {
        $('#newShare').attr('disabled', true);
    }
}

let $numOfPendingPhotos = 0;
window.addEventListener('DOMContentLoaded', () => {
    let image = document.getElementById('image');
    let input = document.getElementById('input');
    let $modal = $('#modal');
    let cropper;

    $('[data-toggle="tooltip"]').tooltip();

    input.addEventListener('change', (e) => {
        let files = e.target.files;
        let done = function (url) {
            input.value = '';
            image.src = url;
            $modal.modal('show');
        };

        let reader;
        let file;
        let url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = (e) => {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', () => {
        cropper = new Cropper(image, {
            aspectRatio: image.dataset.width / image.dataset.height,
            viewMode: 3,
        });
        initCroppper(image.dataset.callback);
    }).on('hidden.bs.modal', () => {
        cropper.destroy();
        cropper = null;
    });

    initCroppper = (callback) => {
       $('#crop').off('click').on('click', (e) => {
            const clickedItem = $(e.currentTarget);
            const $url = clickedItem.data('url');
            const $delete_url = clickedItem.data('delete-url');
            $numOfPendingPhotos = $numOfPendingPhotos + 1;
            let crop = image.dataset.crop;
            let canvasF, src, roundedCanvas;
            disableShare();
            let canvas, $ext;
            $modal.modal('hide');
            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: image.dataset.width,
                    height: image.dataset.height,
                });
                if (crop === 'circle') {
                    let croppedCanvas = cropper.getCroppedCanvas();
                    // Round
                    roundedCanvas = getRoundedCanvas(croppedCanvas);
                    $ext = roundedCanvas.toDataURL().includes('data:image/png') ? 'image/png' : 'image/jpeg';
                    src = roundedCanvas.toDataURL();
                    canvasF = roundedCanvas;
                    $('.avatar,.profileimg').attr('src', roundedCanvas.toDataURL());
                } else {
                    src = canvas.toDataURL();
                    canvasF = canvas;
                    $ext = canvas.toDataURL().includes('data:image/png') ? 'image/png' : 'image/jpeg';
                }

                nameOfphoto = guid() + '.jpg';
                $('#choosephoto').append(
                    '<li style="width: 100px;height: 100px;display: inline-flex;margin: 5px;">' +
                    '<img class="rounded" data-name="' + nameOfphoto + '" src="' + src + '">' +
                    '<button type="button" data-name="' + nameOfphoto + '"data-url="' + $delete_url + '" class="close delete-photo" aria-label="Close" style="background: red;' +
                    'margin-left: -98px;' +
                    'margin-top: 2px;' +
                    'border-radius: 50%;' +
                    'width: 15px;' +
                    'height: 15px;' +
                    'font-size:15px;' +
                    'opacity: .7;">' +
                    '<span aria-hidden="true">×</span>' +
                    '</button>' +
                    '<div class="progress myProgress' + $numOfPendingPhotos + '" style="margin-top: 100px;margin-left: -26.5px;width: 100%;">' +
                    '<div class="progress-bar myProgressBar' + $numOfPendingPhotos + ' progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>\n' +
                    '</div>' +
                    '</li>'
                );
                let $progress = $('.myProgress' + $numOfPendingPhotos);
                let $progressBar = $('.myProgressBar' + $numOfPendingPhotos);
                $progress.show();
                canvasF.toBlob((blob) => {
                        let _token = $("input[name='_token']").val();
                        let formData = new FormData();
                        formData.append('avatar', blob, 'avatar.png');
                        formData.append('_token', _token);
                        formData.append('name', nameOfphoto);
                        if (crop === 'circle'){
                            formData.append('image', roundedCanvas.toDataURL());
                            formData.append('table', image.dataset.table);
                        }
                        $progressBar.addClass('active');
                        $.ajax({
                            method: 'POST',
                            url: $url,
                            data: formData,
                            contentType: false,
                            processData: false,
                            xhr: function () {
                                let appXhr = $.ajaxSettings.xhr();
                                if (appXhr.upload) {
                                    appXhr.upload.addEventListener('progress', (e) => {
                                        updateProgress(e, $progressBar);
                                    }, false);
                                }
                                return appXhr;
                            },
                            beforeSubmit: function () {
                                $("#progressDivId").css("display", "block");
                                var percentValue = '0%';

                                $('#progressBar').width(percentValue);
                                $('#percent').html(percentValue);
                            },
                            uploadProgress: function (event, position, total, percentComplete) {

                                console.log(total, percentComplete)
                                var percentValue = percentComplete + '%';
                                $("#progressBar").animate({
                                    width: '' + percentValue + ''
                                }, {
                                    duration: 5000,
                                    easing: "linear",
                                    step: function (x) {
                                        percentText = Math.round(x * 100 / percentComplete);
                                        $("#percent").text(percentText + "%");
                                        if (percentText == "100") {
                                            $("#outputImage").show();
                                        }
                                    }
                                });
                            },
                            success: function (data) {
                                console.log('success');
                                $('.avatar,.profileimg').attr('src', data);
                                window [callback](data)

                            },
                            error: function () {
                                console.log('error');
                            },
                            complete: function () {
                                console.log('complete');
                                $progress.hide();
                                $numOfPendingPhotos = $numOfPendingPhotos - 1;
                                disableShare();
                            },
                        });

                    },
                    $ext, 2);
            }
        });
    }

    let updateProgress = (e, progressbar) => {
        if (e.lengthComputable) {
            let currentProgress = Math.round((e.loaded / e.total) * 100); // Amount uploaded in percent
            percentage = currentProgress + '%';
            progressbar.width(percentage).attr('aria-valuenow', currentProgress).text(percentage);
            if (currentProgress == 100)
                console.log('Progress : 100%');
        }
    }
});
getRoundedCanvas = (sourceCanvas) => {
    var canvas = document.createElement('canvas');
    var context = canvas.getContext('2d');
    var width = sourceCanvas.width;
    var height = sourceCanvas.height;
    canvas.width = width;
    canvas.height = height;
    context.imageSmoothingEnabled = true;
    context.drawImage(sourceCanvas, 0, 0, width, height);
    context.globalCompositeOperation = 'destination-in';
    context.beginPath();
    context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
    context.fill();
    return canvas;
}

ajaxCall = (formData) => {
    let image=formData.split('temp/')[1];
    $.ajax({
        method: 'POST',
        url: '/update-user-image',
        data: 'name='+ image+'&_token='+ $('meta[name=_token]').attr('content'),
        success: function (data) {
            $('.avatar,.profileimg').attr('src', data.image);
            $('#update-header-photo').modal('hide');
        },
        error: function () {
            console.log('error');
        }
    });
}
$(document).ready(() => {
    //delete photo from temp
    $('body').on('click', '.delete-photo', (e) => {
        const clickedItem = $(e.currentTarget);
        const $url = clickedItem.data('url');
        let name = clickedItem.data('name');
        let _token = $("input[name='_token']").val();
        $.ajax({
            type: 'POST',
            url: $url,
            data: {
                photo_name: name,
                _token: _token
            },
            success: (data) => {
                console.log(data);
                clickedItem.parent().remove();
            },
            error: (data) => {
                console.log(data);
                swal("Error",
                    "Server error try again later",
                    "error");
            }
        });
    });
});
