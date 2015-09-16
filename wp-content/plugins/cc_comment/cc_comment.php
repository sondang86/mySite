<?php
/*
  Plugin Name: CC Comment Plugin
  Plugin URI: http://www.localhost.com
  Description: My cc comment plugin
  Author: Son Dang
  Version: 1.0
  Author URI: http://www.localhost.com
 */

function cc_comment() {
    global $_REQUEST;
    $to = "dang.viet.son.hp@gmail.com";
    $subject = "new comment posted at your site " . $_REQUEST['subject'];
    $message = "message from " . $_REQUEST['name'] . " at " . $_REQUEST['subject'];

    if (wp_mail($to, $subject, $message)) {
        echo "works!!";
    } else {
        echo "fail!!";
    }
}

add_action('comment_post', 'cc_comment');

function cc_com_init() {
    register_setting('general', 'cccom_email');
}

add_action('admin_init', 'cc_com_init');

function coms_setting_fields() {
    ?>    
    <input type="text" name="cccom_email" id="cccom_email" value="<?php echo get_option('cccom_email') ?>">
    <div id="Infoemail" align="left"></div>
<?php
}

function coms_setting_section() {
    ?>
    <p>Settings for CC Comments plugin:</p>
<?php
}

function cccom_plugin_menu() {
    add_settings_section('coms', 'Comments here hehehe', 'coms_setting_section', 'general');
    add_settings_field('cc_com_email', 'CC Comments Email', 'coms_setting_fields', 'general', 'coms');
}

add_action('admin_menu', 'cccom_plugin_menu');

function comment_email_check() {
    $email = $_POST['cccom_email'] ? $_POST['cccom_email'] : NULL;
    $data = 'INVALID';

    if ($email) {
        if (is_email($email)) {
            $data = 'VALID';
        }
    }
    echo $data;
    die();
}

add_action('wp_ajax_comment_email_check', 'comment_email_check');
add_action('admin_print_scripts-options-general.php', 'coms_email_check_script');

function coms_email_check_script(){
    wp_enqueue_script('cc-comments', path_join(WP_PLUGIN_URL, basename(dirname(__FILE__)) . '/cc_comment.js'), array('jquery'));
};
