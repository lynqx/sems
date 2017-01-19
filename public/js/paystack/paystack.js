/**
 * Created by doubleakins on 12/31/2016.
 */

(function ($, window, undefined) {
    "use strict";

    $(document).ready(function () {
        $('form#make-payment').on("submit", function (e) {
            var formData = new FormData(this);
            console.log(formData.get("email"));
            e.preventDefault();
            var handler = PaystackPop.setup({
                key: formData.get("key"),
                email: formData.get("email"),
                amount: formData.get("amount") * 100,
                metadata: {
                    custom_fields: [
                        {
                            display_name: "Term",
                            variable_name: "term",
                            value: formData.get("term")
                        }
                    ]
                },
                callback: function (response) {
                    alert('success. transaction ref is ' + response.reference);
                    $.ajax({
                        url: '',
                        type: 'POST',
                        data:{
                            reference:response.reference
                        },
                        success:function(data){

                        }
                    });
                },
                onClose: function () {
                    alert('window closed');
                }
            });
            handler.openIframe();
        });
    });

})(jQuery, window);