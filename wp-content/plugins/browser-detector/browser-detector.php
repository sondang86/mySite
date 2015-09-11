<?php

/*
  Plugin Name: Browser Detector Widget
  Plugin URI: http://www.localhost.comm
  Description: Simple Browser Detector Widget
  Author: Son Dang
  Version: 1.0
  Author URI: http://www.localhost.comm
 */

function browser_detector_activator() {
    global $wpdb;
    $table_name = $wpdb->prefix . "bdetector";

    if (!$wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'")) {
        $sql = 'CREATE TABLE ' . $table_name . '(
             id INTEGER(10) UNSIGNED AUTO_INCREMENT,
             hit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
             user_agent VARCHAR(255),
             PRIMARY KEY (id))';
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
        add_option('bdetector_db_version', '1.0');
    }
}

register_activation_hook(__FILE__, 'browser_detector_activator');


function browser_detector_insert(){
    global $wpdb;
    $table_name = $wpdb->prefix . "bdetector";
    
    $wpdb->insert($table_name, array('user_agent' => $_SERVER['HTTP_USER_AGENT']), array('%s'));
    $wpdb->insert_id;
}

add_action('wp_footer', 'browser_detector_insert');