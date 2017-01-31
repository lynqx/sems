var form = form || {};

;
(function ($, window, undefined) {
    "use strict";


    $(document).ready(function () {
        form.$container = $("#register-form");
        form.$selectedSubject = form.$container.find("#selected-course");
        form.$addChild = form.$container.find("#add-course");
        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
            return arg != value;
        }, "Value must not equal arg.");
        var validForm = form.$container.validate({
            ignore: [],
            rules: {
                courses: {
                    required: true,
                    minlength: 1,
                    depends: function(element) {
                        return $('[name="courses[]"]').length;
                    }
                }
            },
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
            submitHandler: function (form) {
                if($(form).has('[name="courses[]"]').length){
                    return true;
                }
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
        form.$selectedSubject.select2({
            minimumInputLength: 0,
            minimumResultsForSearch: Infinity,
            escapeMarkup: function (markup) {
                return markup;
            },
            templateResult: function (record) {
                if (record.loading) return record.text;

                var markup = '<div id="' + record.id + '" class="clearfix">' +
                    '<div class="col-sm-12">' + record.text + '</div>' +
                    '<div class="col-sm-12"><small>'+$(record.element).data("course-type")+'</small></div>'+
                    '</div>';
                return markup;
            },
            templateSelection: function (record) {
                return record.text;
            }
        });
        form.$addChild.click(function (e) {
            var $this = $(this);
            var selected = $this.parent().parent().find('#selected-course').select2('data');
            var children = form.$container.find('#course-box');
            if(children.has('#child-' + selected[0].id).length){
                return;
            }
            var childHtml = ('<div id="child-' + selected[0].id + '" class="input-group">' +
            '<div class="checkbox checkbox-replace neon-cb-replacement checked">' +
            '<label class="cb-wrapper">' +
            '<input type="checkbox" checked="" disabled>' +
            '<input type="hidden" name="courses[]" value="' + selected[0].id + '"/>' +
            '<div class="checked"></div>' +
            '</label>' +
            '<label>' + selected[0].text + ' <small>('+$(selected[0].element).data("course-type")+')</small></label>' +
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