var form = form || {};

;
(function ($, window, undefined) {
    "use strict";


    $(document).ready(function () {
        form.$container = $("#create-form");
        form.$selectedChild = form.$container.find("#selected-child");
        form.$addChild = form.$container.find("#add-child");
        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
            return arg != value;
        }, "Value must not equal arg.");
        var validForm = form.$container.validate({
            ignore: [],
            rules: {},
            errorPlacement: function (error, element) {
                var elem = $(element);
                if (elem.data('select2')) {
                    error.insertAfter(elem.parent().find('.select2-container'));
                    return;
                }
                error.insertAfter(element);
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            submitHandler: function (ev) {
                return true;
            }
        });
        form.$container.find('select').on('select2-close', function (e) {
            $(this).valid();
        });
        form.$container.find('select').on('change', function (e) {
            $(this).valid();
        });
        form.$container.find('.form-control').each(function (i, el) {
            var $this = $(el),
                $group = $this.closest('.input-group');
            $this.prev('.input-group-addon').click(function () {
                $this.focus();
            });
            $this.on({
                focus: function () {
                    $group.addClass('focused');
                },
                blur: function () {
                    $group.removeClass('focused');
                }
            });
        });
        form.$selectedChild.select2({
            ajax: {
                url: '/api/students/search',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        api_token: $("#api_token").val()
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 2,
            escapeMarkup: function (markup) {
                return markup;
            },
            templateResult: function (record) {
                if (record.loading) return record.text;

                var markup = '<div id="' + record.id + '" class="clearfix">' +
                    '<div class="col-sm-12">' + record.firstname + ' ' + record.middlename + ' ' + record.lastname + '</div></div>';
                return markup;
            },
            templateSelection: function (record) {
                return record.firstname + ' ' + record.middlename + ' ' + record.lastname || record.text;
            }
        });
        form.$addChild.click(function (e) {
            var $this = $(this);
            var selected = $this.parent().parent().find('#selected-child').select2('data');
            var children = form.$container.find('#children-box');
            var childHtml = ('<div id="child-' + selected[0].id + '" class="input-group">' +
            '<div class="checkbox checkbox-replace neon-cb-replacement checked">' +
            '<label class="cb-wrapper">' +
            '<input type="checkbox" checked="" disabled>' +
            '<input type="hidden" name="children[]" value="' + selected[0].id + '"/>' +
            '<div class="checked"></div>' +
            '</label>' +
            '<label>' + selected[0].firstname + ' ' + selected[0].middlename + ' ' + selected[0].lastname + '</label>' +
            '</div>' +
            '<span class="input-group-btn">' +
            '<button data-remove="' + selected[0].id + '" class="btn btn-link" type="button">' +
            '<i class="entypo-cancel"></i>' +
            '</button>' +
            '</span>' +
            '</div>');
            children.append(childHtml);
        });
        $(document).on("click", "[data-remove]", function () {
            var childId = $(this).data('remove');
            $('#child-' + childId).remove();
        });
        $(document).on("change", ".select2-offscreen", function () {
            if (!$.isEmptyObject(validForm.submitted)) {
                validForm.form();
            }
        });
    });


})(jQuery, window);