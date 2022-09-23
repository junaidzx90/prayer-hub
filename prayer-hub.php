<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.fiverr.com/
 * @since             1.0.0
 * @package           Prayer_Hub
 *
 * @wordpress-plugin
 * Plugin Name:       Prayer Hub
 * Plugin URI:        https://www.fiverr.com/
 * Description:       A simple prayer form for people to submit prayer requests.
 * Version:           1.0.4
 * Author:            Developer Junayed
 * Author URI:        https://www.fiverr.com/junaidzx90
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       prayer-hub
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
header("Cache-Control: no-cache");
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PRAYER_HUB_VERSION', '1.0.4' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-prayer-hub-activator.php
 */
function activate_prayer_hub() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-prayer-hub-activator.php';
	Prayer_Hub_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-prayer-hub-deactivator.php
 */
function deactivate_prayer_hub() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-prayer-hub-deactivator.php';
	Prayer_Hub_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_prayer_hub' );
register_deactivation_hook( __FILE__, 'deactivate_prayer_hub' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-prayer-hub.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_prayer_hub() {

	$plugin = new Prayer_Hub();
	$plugin->run();

}
run_prayer_hub();
