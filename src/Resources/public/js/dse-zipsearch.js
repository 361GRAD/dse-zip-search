jQuery(function(){
    var form = jQuery('form[id^=ajax-zip-]');

    jQuery(form).submit(function(e) {
        e.preventDefault();
        var formId = jQuery(this).attr("id");
        var formData = jQuery(this).serialize();
        var formUrl = jQuery(this).attr('action');
        jQuery.ajax({
            type: 'POST',
            url: formUrl,
            data: formData,
            dataType: 'html',
            success:function(data){
                if(jQuery(data).find('.ce_dse_zipsearch').length > 0) {
                    callRedirect(formUrl+"?"+formData);
                } else {
                    jQuery('#' + formId).addClass('error').find("div").addClass('error');
                }
            }
        });
        return false;
    });
    function callRedirect(formUrl) {
        jQuery.redirect(formUrl);
    }
});