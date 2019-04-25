<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://junsantilla.com/
 * @since             1.0.0
 * @package           Defer_Parsing_Javascript
 *
 * @wordpress-plugin
 * Plugin Name:       Defer Parsing Javascript
 * Plugin URI:        https://deferparsingjavascript.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Jun Santilla
 * Author URI:        https://junsantilla.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       defer-parsing-javascript
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DEFER_PARSING_JAVASCRIPT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-defer-parsing-javascript-activator.php
 */
function activate_defer_parsing_javascript() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-defer-parsing-javascript-activator.php';
	Defer_Parsing_Javascript_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-defer-parsing-javascript-deactivator.php
 */
function deactivate_defer_parsing_javascript() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-defer-parsing-javascript-deactivator.php';
	Defer_Parsing_Javascript_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_defer_parsing_javascript' );
register_deactivation_hook( __FILE__, 'deactivate_defer_parsing_javascript' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-defer-parsing-javascript.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */


// Defer Javascripts
// Defer jQuery Parsing using the HTML5 defer property
if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}


function run_defer_parsing_javascript() {

	$plugin = new Defer_Parsing_Javascript();
	$plugin->run();

}
run_defer_parsing_javascript();
