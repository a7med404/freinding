$(document).ready(()=>{
    $(window).resize(function () {
        console.log(1);
        Resize();
    });

    Resize();

    function Resize() {
        $('.video_post').each(function () {
            var cw = $(this).width();
            $(this).css({'height': cw + 'px'});
        });
    }

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

    $('.video_choser').click(function () {
        $('.swiper-slide-active.my-video').each(function () {
            if (isScrolledIntoView($(this), window)) {
                console.log($(this).find("video")[0]);
                $(this).find("video")[0].play();
            }
        });
        $('.swiper-slide.my-video').each(function () {
            if (!$(this).hasClass("swiper-slide-active")) {
                $(this).find("video")[0].pause();
            }
        });
    });

    $('body').on('click', '.btn-prev-without', function () {
        console.log('my');
        var sliderID = $(this).closest('.swiper-container').attr('id');
        swipers['swiper-' + sliderID].slidePrev();
    });

    $('body').on('click', '.btn-next-without', function () {
        console.log('my');
        var sliderID = $(this).closest('.swiper-container').attr('id');
        swipers['swiper-' + sliderID].slideNext();
    });

});