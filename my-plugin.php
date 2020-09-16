<?php
/**
 * Plugin Name:       My Plugin
 * Plugin URI:        https://example.com/plugins/pdev
 * Description:       A short description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      5.6
 * Author:            John Doe
 * Author URI:        https://example.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pdev
 * Domain Path:       /public/lang
 */

// Activation/Deactivation/uninstall  Hooks - Chapter 2

register_activation_hook( __FILE__, function() {
	require_once plugin_dir_path( __FILE__ ) . 'src/Activation.php';
	Activation::activate();
} );



register_deactivation_hook( __FILE__, function() {
	require_once plugin_dir_path( __FILE__ ) . 'src/Deactivation.php';
	Deactivation::deactivate();
} );




register_uninstall_hook( __FILE__, 'pdev_uninstall' );

function pdev_uninstall() {
	$role = get_role( 'administrator' );

	if ( ! empty( $role ) ) {
		$role->remove_cap( 'pdev_manage' );
	}
}

function hello_world() {
	echo "<b>Hello World!! </b>";
}
add_action("admin_notices", "hello_world");

// 1. Top Level Menu

 add_action('admin_menu', 'pdev_create_menu');

 function pdev_create_menu() {
	 //create Top level menu
	 add_menu_page("PDEV settings page", "PDEV settings", 'manage_options', 'pdev-options', 'pdev_settings_page', 'dashicons-smiley', 99);


 }

 // 2. Sub Menu

 add_action("admin_menu", "pdev_create_submenu");
 function pdev_create_submenu() {
	 //create a submenu under settings
	 add_options_page("PDEV Plugin Settings", 'PDEV Settings', "manage_options", "pdev_plugin", "pdev_plugin_option_page");
 }

 // 3. Options API - Saving an Option

 add_option("pdev_plugin_color", 'red');

 // 4. Saving an array of options

 $options = array ("color" => "red", "fontsize" => "120%", "border" => "2px solid red");

 update_option("pdev_plugin_options", $options);

 // 5. Update existing option

 update_option("pdev_plugin_color", "blue");

 // 6. Retrieve option from database

 $pdev_plugin_color = get_option("pdev_plugin_color");

 var_dump($pdev_plugin_color);


update_option( 'pdev_bool_true', true );
update_option( 'pdev_bool_false', false );

var_dump( get_option( 'nonexistent_option' ) );// bool(false)
var_dump( get_option( 'pdev_bool_true' ) );// string(1) "1"
var_dump( get_option( 'pdev_bool_false' ) );// bool(false)

update_option("pdev_plugin_enabled", 1);

if (get_option("pdev_plugin_enabled") == false) {
	echo "Not defined yet";
} else {
	echo "OPTION exists";
}

$options_new = get_option("pdev_plugin_options");

// 7. Store individual option values in variables

$color = $options_new['color'];
$fontsize = $options_new['fontsize'];
$border = $options_new['border'];

// 8. Delete Options

delete_options("pdev_plugin_options");