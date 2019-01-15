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
    if ($this.find('option:selected').length == 1 && !$this.prop('multiple'))
        data = [{id: $this.find('option:selected').val(), name: $this.find('option:selected').text()}];
    else

        $this.find('option:selected').each(function (i) {
            var $this = $(this);
            data[i] = {id: $this.val(), name: $this.text()};
        });
    var url = $this.data('remote');
    var required = (typeof $this.data('required') !== typeof undefined) ? $this.data('required') : null;
    var placeholder = $this.data('placeholder') ? $this.data('placeholder') : '';
    var letters = (typeof $this.data('letter') !== typeof undefined) ? $this.data('letter') : 2;
    var linkWith = $this.attr('data-param') || '';
    if (linkWith.charAt(0) == '#') {
        $(linkWith).change(function () {
            $this.val('').change();
        });
    }
    if ($this.hasClass('select2-hidden-accessible')) $this.select2("destroy");
    $this.select2({
        escapeMarkup: function (markup) {
            return markup;
        },
        dir: 'ltr',
        minimumInputLength: letters,
        placeholder: placeholder,
        // allowClear: true,
        // templateResult: __Select2_formatRepo,
        // templateSelection: __Select2_formatRepoSelection,
        data: data,
        // dropdownParent: $this.parent(),
        // dropdownCssClass: "increasedzindexclass",
        // tags:true
    }).on("select2:select", function (e) {
        $(this).parent().removeClass('has-error');
        $(this).parent().find('label.error').remove();
        if (onSelectFunc != null) {
            var fn = window[onSelectFunc];
            if (typeof fn === "function")
                fn(this);
        }
    }).on("select2:unselect", function (e) {
        if ($(this).hasClass('required')) $(this).parent().addClass('has-error');
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
