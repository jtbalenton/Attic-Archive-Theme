<?php
namespace Archive;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Archive maintenance.
 *
 * Archive maintenance handler class is responsible for setting up Archive
 * activation and uninstallation hooks.
 *
 * @since 1.0.0
 */
class Maintenance {

	/**
	 * Activate Archive.
	 *
	 * Set Archive activation hook.
	 *
	 * Fired by `register_activation_hook` when the plugin is activated.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 */
	public static function activation( $network_wide ) {
		wp_clear_scheduled_hook( 'Archive/tracker/send_event' );

		wp_schedule_event( time(), 'daily', 'Archive/tracker/send_event' );
		flush_rewrite_rules();

		if ( is_multisite() && $network_wide ) {
			return;
		}

		set_transient( 'Archive_activation_redirect', true, MINUTE_IN_SECONDS );
	}

	/**
	 * Uninstall Archive.
	 *
	 * Set Archive uninstallation hook.
	 *
	 * Fired by `register_uninstall_hook` when the plugin is uninstalled.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 */
	public static function uninstall() {
		wp_clear_scheduled_hook( 'Archive/tracker/send_event' );
	}

	/**
	 * Init.
	 *
	 * Initialize Archive Maintenance.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 */
	public static function init() {
		register_activation_hook( Archive_PLUGIN_BASE, [ __CLASS__, 'activation' ] );
		register_uninstall_hook( Archive_PLUGIN_BASE, [ __CLASS__, 'uninstall' ] );
	}
}
