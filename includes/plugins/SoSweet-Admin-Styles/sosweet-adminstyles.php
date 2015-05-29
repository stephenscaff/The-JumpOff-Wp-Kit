<?php

/*
Plugin Name: SoSweet Admin Styles
Plugin URI: http://sosweetcreative.com
Description: A little style help to WP's UI.
Author: Stephen Scaff
Version: 1.0
Author URI: http://sosweetcreative.com
*/
function my_admin_theme_style() {
    wp_enqueue_style('sosweet-admin-styles', plugins_url('sosweet-admin-styles.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');

?>