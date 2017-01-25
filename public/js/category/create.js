
var form = form || {};

;
(function ($, window, undefined) {
    "use strict";

    $(document).ready(function () {
        form.$container = $("#create-form");
        $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg != value;
        }, "Value must not equal arg.");
        var validForm = form.$container.validate({
            ignore: [],
            rules: {
                teacher: {
                    required: true,
                    valueNotEquals: ""
                },
                category: {
                    required: true,
                }
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
        form.$container.find('select').on('change', function(e) {
            $(this).valid();
        });

        // Focus Class
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
        $(document).on("change", ".select2-offscreen", function () {
            if (!$.isEmptyObject(validForm.submitted)) {
                validForm.form();
            }
        });
        $(document).on("select2-opening", function (arg) {
            var elem = $(arg.target);
        });
        $(document).on("select2-close", function (arg) {
            var elem = $(arg.target);
            console.log(elem);
            console.log(elem.valid());
        });

    });


})(jQuery, window);