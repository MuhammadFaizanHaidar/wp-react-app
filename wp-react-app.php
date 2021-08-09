<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.faizanhaidar.com
 * @since             1.0.0
 * @package           Wp_React_App
 *
 * @wordpress-plugin
 * Plugin Name:       WP React APP
 * Plugin URI:        https://github.com/MuhammadFaizanHaidar/wp-react-app
 * Description:       Integrates react into WordPress admin pages.
 * Version:           1.0.0
 * Author:            Muhammad Faizan Haidar
 * Author URI:        www.faizanhaidar.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-react-app
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
define( 'WP_REACT_APP_VERSION', '1.0.0' );
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('WP_REACT_APP_DIR', plugin_dir_path(__FILE__));
define('WP_REACT_APP_URL', plugins_url('/', __FILE__));
define('WP_REACT_APP_STORE_URL', 'https://waashero.com');
define('WP_REACT_APP_FILE', __FILE__);

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-react-app-activator.php
 */
function activate_wp_react_app() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-react-app-activator.php';
	Wp_React_App_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-react-app-deactivator.php
 */
function deactivate_wp_react_app() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-react-app-deactivator.php';
	Wp_React_App_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_react_app' );
register_deactivation_hook( __FILE__, 'deactivate_wp_react_app' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-react-app.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_react_app() {

	$plugin = new Wp_React_App();
	$plugin->run();

}

add_action( 'init', 'run_wp_react_app' );
