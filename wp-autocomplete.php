<?php

    global $wpdb;
    $posts = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_status = %s", "publish"));

    foreach ($posts as $key => $post) {
        echo "<div class='mypost-title' id='mypost-title'>" . $post->post_title . "</div>";
    }
?>