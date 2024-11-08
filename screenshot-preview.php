<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://screenshot-capture-api.com
 * @since             1.0.0
 * @package           Screenshot_Preview
 *
 * @wordpress-plugin
 * Plugin Name:       Auto Social-Media Screenshot Preview
 * Description:       Add a unique live social media preview to your web pages. Free for small sites.
 * Version:           1.0.4
 * Author:            screenshot-capture-api.com
 * Author URI:        https://screenshot-capture-api.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       screenshot-preview
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SCREENSHOT_PREVIEW_VERSION', '1.0.4' );

/**
 * Currently screenshot api endpoint.
 */
define( 'SCREENSHOT_API_ENDPOINT', 'https://api.webseite-herunterladen.de/v1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-screenshot-preview-activator.php
 */
function activate_screenshot_preview() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-screenshot-preview-activator.php';
	Screenshot_Preview_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-screenshot-preview-deactivator.php
 */
function deactivate_screenshot_preview() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-screenshot-preview-deactivator.php';
	Screenshot_Preview_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_screenshot_preview' );
register_deactivation_hook( __FILE__, 'deactivate_screenshot_preview' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-screenshot-preview.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_screenshot_preview() {

	$plugin = new Screenshot_Preview();
	$plugin->run();

}
run_screenshot_preview();
