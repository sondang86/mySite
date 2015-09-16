<?php

/*
  Plugin Name: Simple Widget Dashboard
  Plugin URI: http://www.localhost.com
  Description: My Simple Widget Dashboard plugin
  Author: Son Dang
  Version: 1.0
  Author URI: http://www.localhost.com
 */

function simple_widget(){
?>
    <h2>Simple Dashboard Widget</h2>
    <p>Welcome to Wordpress hehehe, take your time!!!</p>
    <p><a href="#">Visit my home</a></p>

<?php }

 function simple_register_widget(){
     wp_add_dashboard_widget('simple-widget', 'Simple Dashboard Widget', 'simple_widget');
 }
 
 add_action('wp_dashboard_setup' ,'simple_register_widget');