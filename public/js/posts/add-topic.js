$(document).ready(() => {

    let $topics_url = '';
    let $knownTopics = [];
    let $newTopics = [];

    $('body').on('click', '#add_topics', (e) => {
        const clickedItem = $(e.currentTarget);
        $topics_url = clickedItem.data('topics-url');
        $knownTopics = [];
        $newTopics = [];
        $('#topics-modal').modal();
    });

    let get_topics_url = () => {
        return $topics_url;
    };

    $(".js-example-placeholder-multiple").select2({
        placeholder: "Add Tags .... ",
        minimumInputLength: 3, // only start searching when the user has input 3 or more characters
        tags: true,
        tokenSeparators: [',',' '],
        width: "100%",
        ajax: {
            url: () => {
                return get_topics_url();
            },
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term),
                    page: params.page || 1
                };
            },
            processResults: function (data, params) {
                console.log(data,params);
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: data.has_more
                    }
                };
            },
            multiple: true,
            cache: true
        },
        createTag: function (params) {
            let term = $.trim(params.term);
            if (term === '') {
                return null;
            }
            return {
                id: -1,
                text: term,
                newTag: true // add additional parameters
            }
        },
    });

    $('body').on('click', '#addTopics', (e) => {

        const clickedItem = $(e.currentTarget);
        let $htmlTopics = '';
        $(".js-example-placeholder-multiple").select2('data').forEach((e) => {
            $htmlTopics = $htmlTopics + `<li class="liForTopic"><a class="aForTopic">`+e.text+`</a></li>`;
            if (e.id > 0) {
                $knownTopics.push(e.id);
            } else {
                $newTopics.push(e.text)
            }
        });

        $('#topicSection').children('ul').html($htmlTopics);
        $('#knownTopics').val($knownTopics);
        $('#newTopics').val($newTopics);
        $('#topics-modal').modal('hide');
    });


});