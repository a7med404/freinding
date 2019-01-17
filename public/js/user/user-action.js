$(function () {
    userAction();
    _select2('.is-select');
    $('.autocomplete').on('select2:opening', function (e) {
        $('.select2-container.select2-container--bootstrap.select2-container--open').css('z-index','1000 !important')
    });
    $('.autocomplete').on('select2:open', function (e) {
        $('.select2-container.select2-container--bootstrap.select2-container--open').css('z-index','1000 !important')
    });
});

userAction = () => {
    $('.add-friend').on('click', function () {
        let _token = $("input[name='_token']").val();
        let $this = this;
        $.ajax({
            type: 'post',
            data: {
                _token: _token
            },
            url: $(this).attr('data-url'),
            success: function (data) {
                $($this).find('span').text(data.text);
                $($this).find('img').attr('src',data.img);
                $($this).removeClass();
                $($this).addClass(data.class);
                $($this).attr('data-url', data.url);
            }
        })
    })
};

_select2 = ($cont, onSelectFunc) => {
    if (typeof($.fn.select2) != 'undefined') {
        $cont = $($cont);
        $.fn.select2.defaults.set("theme", "bootstrap");
        $cont.find(".autocomplete:not('.temp')").each(function () {
            __initAutocomplete(this, onSelectFunc, '')
        });
    }
    /*else console.log('warning: select2 is not defined');*/
}

function __initAutocomplete(obj, onSelectFunc, options) {
    var $this = $(obj);
    var data = options || {};
    if (typeof $this.attr('data-id') !== typeof undefined) {
        data=[{id:$this.attr('data-id'),name:$this.attr('data-name')}]
    }
    if ($this.find('option:selected').length === 1 && !$this.prop('multiple'))
        data = [{id: $this.find('option:selected').val(), name: $this.find('option:selected').text()}];
    else
        $this.find('option:selected').each(function (i) {
            var $this = $(this);
            data[i] = {id: $this.val(), name: $this.text()};
        });
    var $options;
    var url = $this.data('remote');
    var required = (typeof $this.data('required') !== typeof undefined) ? $this.data('required') : null;
    var placeholder = $this.data('placeholder') ? $this.data('placeholder') : '';
    var letters = (typeof $this.data('letter') !== typeof undefined) ? $this.data('letter') : 2;
    var linkWith = $this.attr('data-param') || '';
    if (linkWith.charAt(0) === '#') {
        $(linkWith).change(function () {
            $this.val('').change();
        });
    }
    if (typeof url !== typeof undefined){
        $options={
            ajax: {
                url: url,
                dataType: 'json',
                delay: 400,
                data: function (params) {
                    var param = (typeof $this.attr('data-param') !== typeof undefined) ? $this.attr('data-param') : null;
                    if (param && param.charAt(0) === '#') {
                        var name = $(param).attr('name') || $(param).attr('id');
                        param = JSON.parse('{"param":"' + $(param).val() + '"}');
                    }
                    else if (param)
                        param = JSON.parse('{"param":"' + param + '"}');
                    // param = JSON.parse('{"' + param.replaceAll("&", "\",\"").replaceAll("=", "\":\"") + '"}');
                    /*if(param && param.charAt(0) === '.') {

                     }*/
                    var $data = {q: params.term, page: params.page};
                    if (param) {
                        $data = $.extend($data, param);
                    }
                    return $data;
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            dir: 'ltr',
            minimumInputLength: letters,
            placeholder: placeholder,
            allowClear: true,
            templateResult: __Select2_formatRepo,
            templateSelection: __Select2_formatRepoSelection,
            data: data,
        };
    } else
        $options={
            escapeMarkup: function (markup) {
                return markup;
            },
            dir: 'ltr',
            minimumInputLength: letters,
            placeholder: placeholder,
            data: data,
        };
    if ($this.hasClass('select2-hidden-accessible')) $this.select2("destroy");
    $this.select2($options).on("select2:select", function (e) {
        if (onSelectFunc != null) {
            var fn = window[onSelectFunc];
            if (typeof fn === "function")
                fn(this);
        }
    }).on("select2:unselect", function (e) {
        $(this).append('<option value="null" selected>null</option>')
    });

}
//Select2 helpers
var __Select2_formatRepo = function (repo) {
    if (repo.loading)
        return repo.text;
    var markup = '<div class="clearfix">' + '<div class="col-sm-1">' + '</div>'
        + '<div clas="col-sm-10">' + '<div class="clearfix">' + repo.name
        + '</div>';
    markup += '</div></div>';
    return markup;
};

var __Select2_formatRepoSelection = function (repo) {

    var repoText = repo.text || repo.name;
    var $option = $(repo.element);
    for (var key in repo) {
        if (key.startsWith('data-')) {
            $option.attr(key, repo[key]);
            //$option.data('type')
        }
    }
    return repoText;

};
