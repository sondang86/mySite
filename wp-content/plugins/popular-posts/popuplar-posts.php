<?php

/*
  Plugin Name: My Simple Popular posts plugin
  Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
  Description: This describes my Simple Popular posts plugin in a short sentence
  Version:     1.0
  Author:      Son Dang Viet
  Author URI:  http://URI_Of_The_Plugin_Author
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html

 */

function my_popular_post_views($postID) {
    $total_key = 'views';
    //Get current view fields
    $total = get_post_meta($postID, $total_key, TRUE);
    
    //If current view field is empty, set it to zero
    if ($total == ''){
        delete_post_meta($postID, $total_key);
        add_post_meta($postID, $total_key, '0');
    } else {
        //if has value, add 1 to that value
        $total++;
        update_post_meta($postID, $total_key, $total);
    }
}

function count_my_popular_posts($post_id) {
    //Check if it is a single post and user is a visitor
    if (!is_single()) {
        return;
    }
    if (!is_user_logged_in()) {
        if (empty($post_id)) {
            global $post;
            $post_id = $post->ID;
        }

        //Run the popular post view
        my_popular_post_views($post_id);
    }
}

add_action('wp_head', 'count_my_popular_posts');
