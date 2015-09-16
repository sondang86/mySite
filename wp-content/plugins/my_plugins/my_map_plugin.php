<?php

/*
  Plugin Name: My Google Maps Plugin
  Plugin URI: http://www.localhost.comm
  Description: My Google Maps  plugin
  Author: Son Dang
  Version: 1.0
  Author URI: http://www.localhost.comm
 */

function add_map($atts, $content = NULL) {
    shortcode_atts(array('title' => 'Google Map 2015', 'height' => '300', 'width' => '400'), $atts);
    $url = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3723.927463902468!2d105.78775300643615!3d21.035588160285567!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4a7674879f%3A0x00f232354af67e0c!2zQ2jhu6MgeGFuaA!5e0!3m2!1svi!2s!4v1440053780169" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0" style="border:0" allowfullscreen></iframe>';
    return '<h2>' . $url . '</h2>'; 
}

add_shortcode('map-google', 'add_map');
