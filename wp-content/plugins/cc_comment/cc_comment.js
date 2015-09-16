jQuery(document).ready(function (jQuery) {
    jQuery("input[name='cccom_email']").blur(function () {
        jQuery.ajax({
            type: "POST",
            data: "cccom_email=" + (jQuery(this)).attr("value") + "&action=comment_email_check",
            url: ajaxurl,
            
            /*Display the checking email text when processing*/
            beforeSend: function () {
                jQuery('#Infoemail').html('Checking email...');
            },
            
            /*Check user input whether valid email address or not*/
            success: function (data) {                
                if (jQuery.trim(data).toUpperCase() === 'VALID')
                {
                    jQuery("#Infoemail").html("Email OK");
                }
                else 
                {
                    jQuery("#Infoemail").html('Invalid Email');
                }
            }
        });
    });
});


