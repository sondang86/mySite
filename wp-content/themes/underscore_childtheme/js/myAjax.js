jQuery(document).ready(function (jQuery) {    
    jQuery('a#ajax-link').live('click', function () {
        
        //Hide old content
        jQuery('#main').fadeOut('fast');

        //Pre-load image
        jQuery(document).ajaxStart(function(){
            jQuery('#ajaxloader').css('display', 'block').animate({opacity: 1});
        });        
        jQuery(document).ajaxStop(function(){
            jQuery('#ajaxloader').css('display', 'none');
        });
        
        //Load new content
        jQuery('#tabs').load(jQuery(this).attr('href')+ ' #main');
        // Prevent browsers default behavior to follow the link when clicked
        return false;
    });
}); 
