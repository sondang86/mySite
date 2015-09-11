<?php
/*
  Plugin Name: Top Posts Plugin
  Plugin URI: http://www.localhost.comm
  Description: Simple Top Posts Plugin Widget
  Author: Son Dang
  Version: 1.0
  Author URI: http://www.localhost.comm
 */

function top_post() {
    $query = new WP_Query(array(
        'posts_per_page' => 5,
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    ?>
    <h3>Posts on this page</h3>
    <ul>
        <?php
        if ($query->have_posts()):
            while ($query->have_posts()) :
                $query->the_post();
                ?>
                <div class="tpp_posts">
                    <a href="<?php echo the_permalink(); ?>"
                       id="<?php echo the_id() ?>"
                       title="<?php echo the_title(); ?>"
                       class="comment_link"><?php echo the_title(); ?></a>
                    (<?php echo comments_number(); ?>)
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </ul>
    <?php
}
function tpp_posts_comments_return()
{
	$post_id = isset($_POST['post_id'])?$_POST['post_id']:0;
	
	if ( $post_id > 0 )
	{
			$post = get_post($post_id);
		?>
		<div id='post'><?php echo $post->post_content; ?></div>
		<?php 
	}
	die();
}
add_action('wp_ajax_nopriv_tpp_comments','tpp_posts_comments_return');

function tpp_posts_get_scripts ( ) {
  wp_enqueue_script( "tpp-posts", path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/top-posts-widget.js"), array( 'jquery' ) );
}
add_action('wp_print_scripts', 'tpp_posts_get_scripts');

function top_post_init() {
    register_sidebar_widget('top_post_widget', 'top_post');
}

add_action('widgets_init', 'top_post_init');
