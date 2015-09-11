<?php
/*
 * Plugin Name: Related Posts Widget
 * Plugin URI: http://www.localhost.com
 * Description: A Widget list related posts 
 * Author: Son Dang Viet
 * Version: 1.0
 * Author URI: http://www.localhost.com
 *  

 */

class RelatedPosts_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        // widget actual processes
        parent::__construct(
                'Related_Posts', //ID
                __('Related Posts Widget', 'localhost'), //Name
                array(
            'description' => __('A very simple related posts widget', 'localhost')
                )
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance) {
        extract($args);

        //Display this related posts widget in single post only
        if (is_single() && $instance['related'] == 'tags') {

            $this->get_posts_same_tags($args, $instance);
        } elseif (is_single() && $instance['related'] == 'categories') {
            $this->get_posts_same_categories($args, $instance);
        }
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance) {
        // outputs the options form on admin
        $title = !empty($instance['title']) ? $instance['title'] : __('New title', 'localhost');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
        <h4>Show related posts by: </h4>
        </p>
        <p>
        <div class="related-posts-options">
            <input type="radio" <?php checked($instance['related'], 'tags'); ?> id="<?php echo $this->get_field_id('related'); ?>" name="<?php echo $this->get_field_name('related_post_options'); ?>"  value="tags"> Tags 
            <input type="radio" <?php checked($instance['related'], 'categories'); ?> id="<?php echo $this->get_field_id('related'); ?>" name="<?php echo $this->get_field_name('related_post_options'); ?>"  value="categories">Categories
        </div>
        </p>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options get from input form "name"
     * @param array $old_instance The previous options
     */
    public function update($new_instance, $old_instance) {
        // processes widget options to be saved
        $instance = $old_instance;
//        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';

        $instance['title'] = $new_instance['title'];
        $instance['related'] = $new_instance['related_post_options'];

        return $instance;
    }

    /**
     * Get all related posts function
     * 
     */
    public function get_related_posts($tag_names, $postID, $category=NULL) {

        //Get the related posts by tags 
        if ($tag_names !== NULL && $category == NULL){
            $query = new WP_Query(array(
                'tag__in' => $tag_names,
                'posts_per_page' => 5,
                'post__not_in' => array($postID)
            ));
        } elseif ($tag_names == NULL && $category !== NULL) { //Get the related posts by category 
            
            $query = new WP_Query(array(
//                'category__in' => $category,
                'posts_per_page' => 5,
                'post__not_in' => array($postID)
            ));

        }       
        
        
        //Display related posts 
        if ($query->have_posts()):
            echo "<ul>";
            while ($query->have_posts()) :
                $query->the_post();
                echo '<li><a rel="' . get_permalink() . '" href="' . get_permalink() . ' " id="ajax-link">';
                the_title();
                echo '</a></li>';
            endwhile;
            echo "</ul>";
        endif;
        wp_reset_postdata();
    }

    /**
     * Get all current tags/categories that have in current post
     * 
     */
    public function get_post_tags_categories($items) {
        $items_id = array();
        foreach ($items as $item) {
            $items_id[] = $item->term_id;
        }
        return $items_id;
    }

    /**
     * Get all posts that have same tags
     * 
     */
    private function get_posts_same_tags($args, $instance) {
        global $post;
        $tags = wp_get_post_tags($post->ID);
        $tag_names = $this->get_post_tags_categories($tags);

        // outputs the content of the widget
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        //Display related posts 
        $this->get_related_posts($tag_names, $post->ID, NULL);
        echo $args['after_widget'];
    }

    /**
     * Get all posts that have same categories
     * 
     */
    private function get_posts_same_categories($args, $instance) {
            global $post;
            $category = wp_get_post_categories($post->ID);
            // outputs the content of the widget
            echo $args['before_widget'];
            if (!empty($instance['title'])) {
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
            }
            //Display related posts 
            $this->get_related_posts(NULL, $post->ID, $category);
            echo $args['after_widget'];
            
    }

}

//Register widget
function register_related_posts() {
    register_widget('RelatedPosts_Widget');
}

add_action('widgets_init', 'register_related_posts');




