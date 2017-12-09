<?php
/*
Plugin Name: My WordPress Concepts
Plugin URI: http://praveen.blog
Description:
Author: Praveen Selvasekaran
Version: 1.0.0
Author URI: http://praveen.blog
*/


/**
 * Action Hook Example
 */

function myplugin_action_hook_example() {

    wp_mail('email@email.com', 'Subject', 'Message...blabla');
}

add_action('init', 'myplugin_action_hook_example' );

/**
 * Filter Hook Example
 */


function myplugin_filter_hook_example() {

    $content = $content. '<p> By Steve Baldwin  </p>';
    return $content;
}

add_filter('the_content','myplugin_filter_hook_example');

/*
 * Register Activation Hook example
 */

function my_plugin_on_activation() {

    if (!current_user_can('activate_plugins')) return;
    add_option ('myplugin_post_per_page', 10);
    add_option ('myplugin_show_welcome_page', 'true');
}

register_activation_hook ( __FILE__,'my_plugin_on_activation');

/*
 * Register Deactivation Hook example
 */

function my_plugin_on_deactivation() {

    //wp_die("HODL Bitches!!");

    if (!current_user_can('activate_plugins')) return;
    flush_rewrite_rules();
}


register_deactivation_hook(__FILE__,'my_plugin_on_deactivation');


/*
 * Register Uninstall Hook example
 */

function my_plugin_on_uninstall() {

    if (! current_user_can('activate_plugins')) return;
    delete_option('myplugin_post_per_page', 10);
    delete_option('myplugin_show_welcome_page', true);

}


register_uninstall_hook( __FILE__,'my_plugin_on_uninstall');