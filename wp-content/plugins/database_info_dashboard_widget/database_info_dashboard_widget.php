<?php

/* 
  Plugin Name: DB Dashboard Info Plugin
  Plugin URI: http://www.localhost.com
  Description: My DB Dashboard Info Plugin
  Author: Son Dang
  Version: 1.0
  Author URI: http://www.localhost.com
 */

function database_info_dashboard_widget(){
    global $wpdb;
    global $current_user;
?>
    <h2>DB Info Widget</h2>
    <p>Last Query: <?php echo $wpdb->last_query?></p>
    <p>Last Errors: <?php echo $wpdb->last_error?></p>
    <p>Number of queries: <?php echo $wpdb->num_queries?></p>
    <p>Latest post: <?php echo $wpdb->get_var('select post_title from ' . $wpdb->posts . ' where post_author = ' . $current_user->ID)?></p>
    <p>Email: <?php echo $wpdb->get_var('select user_email from ' . $wpdb->users . ' where ID = ' . $current_user->ID)?></p>
<?php }

function databaseinfo_register(){
    wp_add_dashboard_widget('dbinfo-widget', 'Database Info Widget', 'database_info_dashboard_widget');
}

add_action('wp_dashboard_setup', 'databaseinfo_register');