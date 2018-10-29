<script>
    $(document).ready(function () {

        $('[id^=comment_post]').click(function () {
            id = $(this).attr('id');
            console.log(id);
            s = '#comment_post_form' + id.substring(12);
            $(s).focus();
        });

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

              {{--id="post_{{$post->id}}"--}}
            {{--id="reaction{{$reaction->id}}"--}}

    });
</script>