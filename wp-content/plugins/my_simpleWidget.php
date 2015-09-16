<?php
/*
  Plugin Name: List Pages Widget
  Plugin URI: http://www.localhost.comm
  Description: Just My Simple Widget
  Author: Son Dang
  Version: 1.0
  Author URI: http://www.localhost.comm
 */

class ListPageWidget extends WP_Widget {

    function ListPageWidget() {
        parent::WP_Widget(false, __('My Page Widget', 'ListPageWidget'));
    }

    function form($instance) {
        if ($instance) {
            $title = esc_attr($instance['title']);
            $text = esc_attr($instance['text']);
            $textarea = esc_textarea($instance['textarea']);
            $checkbox = esc_textarea($instance['checkbox']);
            $select = esc_textarea($instance['select']);
        } else {
            $title = '';
            $text = '';
            $textarea = '';
            $checkbox = '';
            $select = '';
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'wp_widget_plugin'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
        </p>

        <p>
            <input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked('1', $checkbox); ?> />
            <label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Checkbox', 'wp_widget_plugin'); ?></label>
        </p>

        <?php
    }

    // update widget
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        // Fields
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = strip_tags($new_instance['text']);
        $instance['textarea'] = strip_tags($new_instance['textarea']);
        $instance['checkbox'] = strip_tags($new_instance['checkbox']);
        return $instance;
    }

    // display widget
    function widget($args, $instance) {
        extract($args);
        // these are the widget options
        $title = apply_filters('widget_title', $instance['title']);
        $text = $instance['text'];
        $textarea = $instance['textarea'];
        echo $before_widget;
        // Display the widget
        echo '<div class="widget-text wp_widget_plugin_box">';

        // Check if title is set
        if ($title) {
            echo $before_title . $title . $after_title;
        }

        // Check if text is set
        if ($text) {
            echo '<p class="wp_widget_plugin_text">' . $text . '</p>';
        }
        // Check if textarea is set
        if ($textarea) {
            echo '<p class="wp_widget_plugin_textarea">' . $textarea . '</p>';
        }

        // Check if checkbox is set
        if ($checkbox) {
            echo '<p class="wp_widget_plugin_checkbox">' . $checkbox . '</p>';
        }
        echo '</div>';
        echo $after_widget;
    }

}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("ListPageWidget");'));
