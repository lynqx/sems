/**
 * Created by doubleakins on 12/31/2016.
 */

(function ($, window, undefined) {
    "use strict";

    $(document).ready(function () {
        $('[data-delete]').on("click",function(e){
            e.preventDefault();
            if(confirm('Are you sure you want to delete this category?')){
                var thisButton = $(this);
                var deleteForm = "#delete-form-"+thisButton.data("delete");
                $(deleteForm).submit();
            }
        });
    });

})(jQuery, window);