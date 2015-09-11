<?php

/*
  Plugin Name: CC Content Watermark Plugin
  Plugin URI: http://www.localhost.com
  Description: My Content Watermark Plugin
  Author: Son Dang
  Version: 1.0
  Author URI: http://www.localhost.com
 */

function add_watermark($content){
    if (is_feed()){
        return $content . 'Xin chao va hen gap lai' . date('Y') . 'cac ban tre!!!!'; 
        die;
    }
    
    return $content;
}

add_filter('the_content', 'add_watermark');?>