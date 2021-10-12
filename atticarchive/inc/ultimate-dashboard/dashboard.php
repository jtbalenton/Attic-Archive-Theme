<?php
/**
 * Plugin Name: Ultimate Dashboard
 * Plugin URI: https://ultimatedashboard.io/
 * Description: Create a custom Dashboard and give the WordPress admin area a more meaningful use.
 * Version: 3.5
 * Author: David Vongries
 * Author URI: https://mapsteps.com/
 * Text Domain: ultimate-dashboard
 *
 * @package Ultimate_Dashboard
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

// Plugin constants.
define( 'ULTIMATE_DASHBOARD_PLUGIN_DIR', rtrim( plugin_dir_path(__FILE__), '/' ) );
define( 'ULTIMATE_DASHBOARD_PLUGIN_URL', rtrim( my_plugins_dir_url( "ultimate-dashboard/index.php" ), '/' ) );
define( 'ULTIMATE_DASHBOARD_PLUGIN_VERSION', '3.5' );
define( 'ULTIMATE_DASHBOARD_PLUGIN_FILE', plugin_basename("ultimate-dashboard/dashboard.php") );

/**
 * Hack to fix broken plugin updater in Ultimate Dashboard PRO 3.0.
 * This will be removed with a future update.
 */


// Helper classes.
require __DIR__ . '/helpers/class-screen-helper.php';
require __DIR__ . '/helpers/class-color-helper.php';
require __DIR__ . '/helpers/class-widget-helper.php';
require __DIR__ . '/helpers/class-content-helper.php';
require __DIR__ . '/helpers/class-user-helper.php';
require __DIR__ . '/helpers/class-array-helper.php';

// Base module.
require __DIR__ . '/modules/base/class-base-module.php';
require __DIR__ . '/modules/base/class-base-output.php';

// Core classes.
require __DIR__ . '/class-backwards-compatibility.php';
require __DIR__ . '/class-vars.php';
require __DIR__ . '/class-setup.php';

/**
 * Check whether or not Ultimate Dashboard Pro is active.
 * This function can be called anywhere after "plugins_loaded" hook.
 *
 * @return bool
 */
function udb_is_pro_active() {
	return ( defined( 'ULTIMATE_DASHBOARD_PRO_PLUGIN_VERSION' ) ? true : false );
}

Udb\Backwards_Compatibility::init();
Udb\Setup::init();
