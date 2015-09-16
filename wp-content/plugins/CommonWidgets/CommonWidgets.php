<?php
/*
  Plugin Name: My Common Widgets Tabs
  Plugin URI: http://mydomain.com
  Description: My Common Widgets Tabs
  Author: Da Fuck
  Version: 1.0
  Author URI: http://mydomain.com
 */

class CommonWidgetsTabs extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'common_Widgets_Tabs', // Base ID
                __('Common Widgets tabs', 'localhost'), // Name
                array('description' => __('A Common Widgets tabs', 'localhost'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        new RelatedPosts_Widget();
        extract($args);
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('common_widget', $instance['title']) . $args['after_title'];
        }
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery("#jQueryUitabs").tabs();
            });
        </script>
        <div id="jQueryUitabs">
            <ul>
                <li><a href="#Recent">Recent</a></li>
                <li><a href="#Popular">Popular</a></li>
                <li><a href="#Tags">Tags</a></li>
                <li><a href="#Comments">Comments</a></li>
            </ul>

            <!--RECENT POSTS-->
            <div id="Recent">
                <?php $this->get_RecentPosts();?>
            </div>
            <!--//RECENT POSTS-->

            <!--POPULAR POSTS-->
            <div id="Popular">
                <?php
                    $popularpost  = new WP_Query( array( 'posts_per_page' => 10, 'post_type' => 'post', 'post_status' => 'publish', 'orderby' => 'meta_value_num' , 'order' => 'DESC'  ) );
                    // The Loop
                    if ( $popularpost->have_posts() ) {
                            echo '<ul>';
                            while ( $popularpost->have_posts() ) {
                                    $popularpost->the_post();
                                    echo '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';
                            }
                            echo '</ul>';
                            wp_reset_postdata();
                    } else {
                            // no posts found
                        echo "no posts found";
                    }
                ?>
            </div>
            <!--//POPULAR POSTS-->
            
            <!--TAGS-->
            <div id="Tags">
                <?php wp_tag_cloud() ?>
            </div>            
            <!--//TAGS-->

            <!--RECENT COMMENTS-->
            <div id="Comments">
                <?php $this->get_RecentComments(); ?>
            </div>
            <!--//RECENT COMMENTS-->
        </div>

        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('My common Widgets Tabs', 'localhost');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

    public function get_RecentComments($number = 5, $post_status = "publish", $orderby = 'date') {
        $posts = get_comments(array(
            'posts_per_page' => $number,
            'post_status' => $post_status,
            'orderby' => $orderby,
            'order' => 'DESC',
        ));

        echo "<ul>";
        foreach ($posts as $post) {
            echo "<li>" . $post->comment_author . ' on <a href="' . get_comments_link($post->comment_post_ID) . '">' . $post->post_title . '</a></li>';
        }
        echo "<ul>";
    }

    public function get_RecentPosts($number = 5, $category=0, $orderby="post_date", $post_status="publish") {
        //List Recent posts
        $args = array(
            'numberposts' => $number,
            'offset' => 0,
            'category' => $category,
            'orderby' => $orderby,
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => $post_status,
        );

        $recent_posts = wp_get_recent_posts($args);
        echo "<ul>";
        foreach ($recent_posts as $recent_post) {
            echo '<li><a href="' . site_url('/') . $recent_post['post_name'] . '">' . $recent_post['post_title'] . '</a></li>';
        }
        echo "</ul>";
    }

}

// register widget

add_action('widgets_init', function() {
    register_widget('CommonWidgetsTabs');
});
