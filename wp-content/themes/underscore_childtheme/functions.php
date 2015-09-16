<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Embassy_Walker_Nav_Menu class.
 * 
 * @extends Walker_Nav_Menu
 */
class Embassy_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown\">\n";
    }

}

add_filter('wp_nav_menu_objects', 'embassy_menu_parent_class');

/**
 * embassy_menu_parent_class function.
 * 
 * @access public
 * @param mixed $items
 * @return void
 */
function embassy_menu_parent_class($items) {

    $parents = array();
    foreach ($items as $item) {
        if ($item->menu_item_parent && $item->menu_item_parent > 0) {
            $parents[] = $item->menu_item_parent;
        }
    }

    foreach ($items as $item) {
        if (in_array($item->ID, $parents)) {
            $item->classes[] = 'has-dropdown not-click';
        }
    }

    return $items;
}

function register_jquery_ui_style(){
    wp_enqueue_style('JqueryUi_css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css');
    wp_enqueue_script('JqueryUi', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js');
    wp_enqueue_script('Jquery_validate', 'http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js');
    wp_enqueue_script('JqueryUi_AdditionalMethod', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js');
}

add_action('wp_enqueue_scripts', 'register_jquery_ui_style');


function underscore_styles() {
    wp_enqueue_style('foundation_styles', get_template_directory_uri() . '/css/foundation.css');
    wp_enqueue_style('custom_styles', get_stylesheet_directory_uri() .'/custom-style.css', array(), rand(111,9999) );
    wp_enqueue_style('fonts', 'http://fonts.googleapis.com/css?family=Lato|Droid+Sans|Droid+Serif|PT+Sans+Narrow');
}

add_action('wp_enqueue_scripts', 'underscore_styles');

function underscore_script() {
    wp_enqueue_script('foundation_scripts', get_template_directory_uri() . '/js/foundation.min.js');
}

add_action('wp_enqueue_scripts', 'underscore_script');

//Register footer
function underscore_footer_widgets() {
    register_sidebar(array(
        'name' => esc_html__('Footer sidebar', 'underscore'),
        'id' => 'sidebar-2',
        'description' => 'Footer widget for underscore theme',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer sidebar2', 'underscore'),
        'id' => 'sidebar-3',
        'description' => 'Footer widget 2 for underscore theme',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer sidebar3', 'underscore'),
        'id' => 'sidebar-4',
        'description' => 'Footer widget 3 for underscore theme',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'underscore_footer_widgets');

//Remove excerpt dots...
function new_excerpt_more($more) {
    return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');
//PAGINATION
function underscore_content_nav() {
    // Sets how many pages to show (leave it alone)
    $pages = '';
    // Sets how many buttons you want to show in the pagination area
    $range = 3;

    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<ul class="pagination">';
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo '<li><a href="' . get_pagenum_link(1) . '">&laquo;</a></li>';
        if ($paged > 1 && $showitems < $pages)
            echo '<li>' . previous_posts_link('&laquo; Previous Entries') . '</li>';

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? '<li class="current">' . $i . '</li>' : '<li><a href="' . get_pagenum_link($i) . '" class="inactive" >' . $i . '</a></li>';
            }
        }

        if ($paged < $pages && $showitems < $pages)
            echo '<li>' . next_posts_link('Next &raquo;', '') . '</li>';
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo '<li><a href="' . get_pagenum_link($pages) . '">&raquo;</a></li>';
        echo '</ul>';
    }
}
// END pagination
// Related Posts Function, matches posts by tags - call using joints_related_posts(); )
function underscore_time_ago() {

    global $post;

    $date = get_post_time('G', true, $post);

    /**
     * Where you see 'themeblvd' below, you'd
     * want to replace those with whatever term
     * you're using in your theme to provide
     * support for localization.
     */
    // Array of time period chunks
    $chunks = array(
        array(60 * 60 * 24 * 365, __('year', 'underscore'), __('years', 'underscore')),
        array(60 * 60 * 24 * 30, __('month', 'underscore'), __('months', 'underscore')),
        array(60 * 60 * 24 * 7, __('week', 'underscore'), __('weeks', 'underscore')),
        array(60 * 60 * 24, __('day', 'underscore'), __('days', 'underscore')),
        array(60 * 60, __('hour', 'underscore'), __('hours', 'underscore')),
        array(60, __('minute', 'underscore'), __('minutes', 'underscore')),
        array(1, __('second', 'underscore'), __('seconds', 'underscore'))
    );

    if (!is_numeric($date)) {
        $time_chunks = explode(':', str_replace(' ', ':', $date));
        $date_chunks = explode('-', str_replace(' ', '-', $date));
        $date = gmmktime((int) $time_chunks[1], (int) $time_chunks[2], (int) $time_chunks[3], (int) $date_chunks[1], (int) $date_chunks[2], (int) $date_chunks[0]);
    }

    $current_time = current_time('mysql', $gmt = 0);
    $newer_date = strtotime($current_time);

    // Difference in seconds
    $since = $newer_date - $date;

    // Something went wrong with date calculation and we ended up with a negative date.
    if (0 > $since)
        return __('sometime', 'underscore');

    /**
     * We only want to output one chunks of time here, eg:
     * x years
     * xx months
     * so there's only one bit of calculation below:
     */
    //Step one: the first chunk
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];

        // Finding the biggest chunk (if the chunk fits, break)
        if (( $count = floor($since / $seconds) ) != 0)
            break;
    }

    // Set output var
    $output = ( 1 == $count ) ? '1 ' . $chunks[$i][1] : $count . ' ' . $chunks[$i][2];


    if (!(int) trim($output)) {
        $output = '0 ' . __('seconds', 'underscore');
    }

    $output .= __(' ago', 'underscore');

    return $output;
}

// Filter our themeblvd_time_ago() function into WP's the_time() function
add_filter('the_time', 'underscore_time_ago');

//Font awesome
function underscore_font_awesome() {
    if (!is_admin()) {
        wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    }
}

add_action('wp_enqueue_scripts', 'underscore_font_awesome');

//Comments

/* Custom callback function for Trackbacks/Pings, see comments.php */
function custom_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard">
                <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Your comment is awaiting moderation.') ?></em>
                <br />
            <?php endif; ?>
            <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'), '  ', '') ?></div>
            <?php printf(__('<cite class="fn">%s</cite> <span class="says">wrote:</span>'), get_comment_author_link()) ?>
            <?php comment_text() ?>
            <div class="reply"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div><!-- .reply -->
        </div>
        <?php
    }
    function get_tagged_list() {
        if ('post' == get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html__(' ', '_s'));
            if ($tags_list) {
                printf('<span class="tags-links">' . esc_html__('Tags %1$s', '_s') . '</span>', $tags_list); // WPCS: XSS OK.
            }
        }
    }
    function entry_meta() {?>
        <span class="posted-on-by"><i class="fa fa-user"><?php echo $byline; ?></i></span>
        <a href="#" title="<?php echo $day . ', ' . $month . '/' . $date . '/' . $year ?>"><span class="posted-on-clock"><i class="fa fa-clock-o">&nbsp;</i><?php the_time(); ?></span></a>
        <span class="posted-on-folder"><i class="fa fa-folder-o">&nbsp;</i><?php echo get_the_category_list(esc_html__(', ', '_s')); ?></span>
        <span class="posted-on-comment"><i class="fa fa-comment-o">&nbsp;</i><a href="#respond"><?php comments_popup_link('Leave a comment', '1 comment', 'comments'); ?></a></span>    
        <?php edit_post_link( esc_html__( 'Edit', '_s' ), '<span class="edit-link">', '</span>' );?>
    <?php }?>
    <?php function social_share() {?>
        <div class="social-buttons">
            <span class="share-text">SHARE</span>
            <!-- Facebook Share Button -->
            <ul>
                <li><a class="btnz share facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $post_link; ?>" rel="external" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
            <!-- Googple Plus Share Button -->
            <li><a class="btnz share gplus" href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=<?php echo $post_link; ?>&amp;name=<?php the_title(); ?>" rel="external" target="_blank"><i class="fa fa-google-plus"></i> Google</a></li>
            <!-- Twitter Share Button -->
            <li><a class="btnz share twitter" href="http://twitter.com/home?status=<?php the_title(); ?> <?php echo $post_link; ?> " rel="external" target="_blank"><i class="fa fa-twitter"></i> Tweet</a></li>
            <!-- Stumbleupon Share Button -->
            <li><a class="btnz share stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo $post_link; ?>&title=<?php the_title(); ?>" rel="external" target="_blank"><i class="fa fa-stumbleupon"></i> Stumble</a></li>
            <!-- Pinterest Share Button -->
            <li><a class="btnz share pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $post_link; ?>&amp;description=<?php the_title(); ?>" rel="external" target="_blank"><i class="fa fa-pinterest"></i> Pin it</a></li>
            <!-- LinkedIn Share Button -->
            <li><a class="btnz share linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_link; ?>&title=<?php the_title(); ?>" rel="external" target="_blank"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
            </ul>
        </div>
    <?php }    
        function check_active_sidebar() {
            if (is_active_sidebar('sidebar-1')) {
                echo '<div class="medium-8 columns">';
            } else {
                echo '<div class="medium-12 columns">';
            }
        }
        
        function register_myAjax_script(){
            wp_register_script('myAjaxLoop', get_stylesheet_directory_uri(). '/js/myAjax.js', array('jquery'));        
            wp_enqueue_script('myAjaxLoop');
        }
        
        add_action('wp_enqueue_scripts', 'register_myAjax_script');
?>