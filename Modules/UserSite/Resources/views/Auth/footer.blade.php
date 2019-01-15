<!-- JS site -->
<script src="{{ asset('olympus/js/jquery-3.2.1.js') }}"></script>
{{--<script src="{{ asset('olympus/js/jquery.appear.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/jquery.mousewheel.js') }}"></script>--}}
<script src="{{ asset('olympus/js/perfect-scrollbar.js') }}"></script>
{{--<script src="{{ asset('olympus/js/jquery.matchHeight.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/svgxuse.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/imagesloaded.pkgd.js') }}"></script>--}}
<script src="{{ asset('olympus/js/Headroom.js') }}"></script>
{{--<script src="{{ asset('olympus/js/velocity.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/ScrollMagic.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/jquery.waypoints.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/jquery.countTo.js') }}"></script>--}}
<script src="{{ asset('olympus/js/popper.min.js') }}"></script>
<script src="{{ asset('olympus/js/material.min.js') }}"></script>
<script src="{{ asset('olympus/js/bootstrap-select.js') }}"></script>
{{--<script src="{{ asset('olympus/js/smooth-scroll.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/selectize.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/swiper.jquery.js') }}"></script>--}}
<script src="{{ asset('olympus/js/moment.js') }}"></script>
{{--<script src="{{ asset('olympus/js/daterangepicker.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/simplecalendar.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/fullcalendar.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/isotope.pkgd.js') }}"></script>--}}
<script src="{{ asset('olympus/js/ajax-pagination.js') }}"></script>
{{--<script src="{{ asset('olympus/js/Chart.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/chartjs-plugin-deferred.js') }}"></script>--}}
<script src="{{ asset('olympus/js/circle-progress.js') }}"></script>
<script src="{{ asset('olympus/js/loader.js') }}"></script>
{{--<script src="{{ asset('olympus/js/run-chart.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/jquery.magnific-popup.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/jquery.gifplayer.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/mediaelement-and-player.js') }}"></script>--}}
{{--<script src="{{ asset('olympus/js/mediaelement-playlist-plugin.min.js') }}"></script>--}}

<script src="{{ asset('olympus/js/base-init.js') }}"></script>
<script defer src="{{ asset('olympus/fonts/fontawesome-all.js') }}"></script>

<script src="{{ asset('olympus/Bootstrap/dist/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('js/site/ajax.js') }}"></script>

<!--tag-->
<script src="{{ asset('js/select2.min.js') }}"></script>

<script src="{{ asset('js/vissense.js') }}"></script>


<script src="{{ asset('js/cropper.js') }}"></script>
<script src="{{ asset('js/jquery-cropper.js') }}"></script>


{{--<script src="{{ asset('js/progressbar.js') }}"></script>--}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>


<!-- custom posts js files-->
{{--<script src="{{ asset('js/posts/new-post.js') }}"></script>--}}
{{--<script src="{{ asset('js/posts/share-post.js') }}"></script>--}}
<script src="{{ asset('js/posts/crop-image.js') }}"></script>
{{--<script src="{{ asset('js/posts/post-operations.js') }}"></script>--}}
{{--<script src="{{ asset('js/posts/reactions-model.js') }}"></script>--}}
{{--<script src="{{ asset('js/posts/video-operation.js') }}"></script>--}}
<script src="{{ asset('js/util.js') }}"></script>

<!-- custom user js files-->
<script src="{{ asset('js/user/user-action.js') }}"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script>

    // // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('4f9af4b14cf286b0437b', {
        cluster: 'eu',
        forceTLS: true
    });

    var channel = pusher.subscribe('nots');
    channel.bind('App\\Events\\FriendShipEvent', function(data) {
        console.log(data);
        $('.notification-list').append('    <li class="un-read">\n' +
            '                                        <div class="author-thumb">\n' +
            '                                            <img width="49px" class="shadow img-thumbnail img-circle" src=""\n' +
            '                                                 alt="'+data.name+'">\n' +
            '                                        </div>\n' +
            '                                        <div class="notification-event">\n' +
            '                                            <div>'+data.message+'\n' +
            '                                            </div>\n' +
            '                                            <span class="notification-date"><time class="entry-date updated"\n' +
            '                                                                                  datetime="2004-07-24T18:18"></time></span>\n' +
            '                                        </div>\n' +
            '                                        <span class="notification-icon">\n' +
            '                                            <svg class="olymp-plus-icon"><use\n' +
            '                                                        xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>\n' +
            '                                        </span>\n' +
            '\n' +
            '                                        <div class="more">\n' +
            '                                            <svg class="olymp-three-dots-icon">\n' +
            '                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>\n' +
            '                                            </svg>\n' +
            '                                            <svg class="olymp-little-delete">\n' +
            '                                                <use xlink:href="olympus/svg-icons/sprites/icons.svg#olymp-little-delete"></use>\n' +
            '                                            </svg>\n' +
            '                                        </div>\n' +
            '                                    </li>')
    });
</script>
<script>
    // $(window).on("beforeunload", function() {
    //      $.ajax( '/profileleave' );
    // });
</script>

<ul id="messages" class="list-group">
</ul>

