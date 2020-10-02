<?php
 
/**
* Plugin Name:  Plugin Developer 101
* Plugin URI: http://praveen.blog
* Description:  Pipins course
* Author: Praveen  
* Version: 1.0.0
* Author URI: http://praveen.blog
**/

// Exit if Accessed directly

if (!defined('ABSPATH')) {
exit;
}

function pd101_test() {
    echo "this plugin is awesome";
    exit;
}

add_action("admin_init","pd101_test");