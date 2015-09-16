<?php

    function foundation_menus(){
        register_nav_menus(array(
            'canvas-off' => 'Off Canvas'
        ));
    }
    
    add_action('init', 'foundation_menus');


    function foundation_scripts(){
        //Load jQuery 2.0
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://code.jquery.com/jquery-2.1.4.min.js', FALSE, NULL);
        wp_enqueue_script('jquery');
        
        //Load Foundation JS
        wp_enqueue_script('foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), FALSE,TRUE);
        wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery' ,'foundation_js'), FALSE,TRUE);
    }
    //Add script to the front end pages only
    if (!is_admin()){
        add_action('wp_enqueue_scripts', 'foundation_scripts');
    }
    // load css into the website's front-end
    function foundation_styles() {
        wp_enqueue_style('foundation', get_template_directory_uri() . '/css/foundation.css');
        wp_enqueue_style('foundation-icons', get_template_directory_uri() . '/css/foundation-icons.css');
        wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    }

    add_action( 'wp_enqueue_scripts', 'foundation_styles' );
    
    function new_excerpt_more( $more ) {
	return '';
}
    add_filter('excerpt_more', 'new_excerpt_more');
?>