/* -----------------------------
     * Bootstrap components init
     * Script file: theme-plugins.js, tether.min.js
     * Documentation about used plugin:
     * https://v4-alpha.getbootstrap.com/getting-started/introduction/
     * ---------------------------*/


CRUMINA.Bootstrap = function () {
	//  Activate the Tooltips
	$('[data-toggle="tooltip"], [rel="tooltip"]').tooltip();

	// And Popovers
	$('[data-toggle="popover"]').popover();

	/* -----------------------------
	   * Replace select tags with bootstrap dropdowns
	   * Script file: theme-plugins.js
	   * Documentation about used plugin:
	   * https://silviomoreto.github.io/bootstrap-select/
	   * ---------------------------*/
	$('.selectpicker').selectpicker();

	/* -----------------------------
	 * Date time picker input field
	 * Script file: daterangepicker.min.js, moment.min.js
	 * Documentation about used plugin:
	 * https://v4-alpha.getbootstrap.com/getting-started/introduction/
	 * ---------------------------*/
	var date_select_field = $('input[name="datetimepicker"]');
	if (date_select_field.length) {
		var start = moment().subtract(29, 'days');

		date_select_field.daterangepicker({
			startDate: start,
			autoUpdateInput: false,
			singleDatePicker: true,
			showDropdowns: true,
			locale: {
				format: 'DD/MM/YYYY'
			}
		});
		date_select_field.on('focus', function () {
			$(this).closest('.form-group').addClass('is-focused');
		});
		date_select_field.on('apply.daterangepicker', function (ev, picker) {
			$(this).val(picker.startDate.format('DD/MM/YYYY'));
			$(this).closest('.form-group').addClass('is-focused');
		});
		date_select_field.on('hide.daterangepicker', function () {
			if ('' === $(this).val()){
				$(this).closest('.form-group').removeClass('is-focused');
			}
		});

	}
};

$(document).ready(function () {
	CRUMINA.Bootstrap();
	_select2('body')
});
function _select2($cont, onSelectFunc) {
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
    var letters = (typeof $this.data('letter') !== typeof undefined) ? $this.data('letter') : 3;
    var linkWith = $this.attr('data-param') || '';
    if (linkWith.charAt(0) == '#') {
        $(linkWith).change(function () {
            $this.val('').change();
        });
    }
    if ($this.hasClass('select2-hidden-accessible')) $this.select2("destroy");
    $this.select2({
        ajax: {
            url: url,
            dataType: 'json',
            delay: 400,
            data: function (params) {
                var param = (typeof $this.attr('data-param') !== typeof undefined) ? $this.attr('data-param') : null;
                if (param && param.charAt(0) === '#') {
                    var name = $(param).attr('name') || $(param).attr('id');
                    param = JSON.parse('{"' + name + '":"' + $(param).val() + '"}');
                }
                else if (param)
                    param = JSON.parse('{"' + param.replaceAll("&", "\",\"").replaceAll("=", "\":\"") + '"}');
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
        dir: dir,
        minimumInputLength: letters,
        placeholder: placeholder,
        allowClear: true,
        templateResult: __Select2_formatRepo,
        templateSelection: __Select2_formatRepoSelection,
        dropdownParent: $this.parent(),
        data: data,
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
        // $(this).append('<option value="null" selected>null</option>')
    });

}
