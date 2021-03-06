<?php
/**
 * Welcome panel field.
 *
 * @package Ultimate_Dashboard
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

return function () {

	$settings  = get_option( 'udb_settings' );
	$editor_id = 'udb_settings--welcome_panel_content';
	$content   = isset( $settings['welcome_panel_content'] ) ? $settings['welcome_panel_content'] : '';

	if ( empty( $content ) ) {
		do_action( 'udb_ms_switch_blog' );

		ob_start();
		do_action( 'welcome_panel' );
		$content = ob_get_clean();

		do_action( 'udb_ms_restore_blog' );
	}

	$content = trim( $content );

	/**
	 * Based on Keypress UI code.
	 *
	 * @see wp-content/plugins/keypress-ui/includes/modules/dashboard/class-kpui-widgets.php
	 */
	global $compress_css;

	$wp_styles = wp_styles();
	$dir       = $wp_styles->text_direction === 'ltr' ? '' : '-rtl';
	$ver       = $wp_styles->default_version;
	$min       = ! defined( 'SCRIPT_DEBUG' ) && $compress_css ? '.min' : '';

	$args = array(
		'textarea_name' => 'udb_settings[welcome_panel_content]',
		'media_buttons' => false,
		'editor_height' => 300,
		'tinymce'       => array(
			'body_class'    => 'wp-core-ui welcome-panel',
			'content_style' => '.welcome-panel-content .hide-if-customize {display: none;} .welcome-panel {border: none;}',
			'content_css'   => "/wp-includes/css/dashicons{$dir}{$min}.css?ver={$ver},/wp-includes/css/buttons{$dir}{$min}.css?ver={$ver},/wp-admin/css/common{$dir}{$min}.css?ver={$ver},/wp-admin/css/dashboard{$dir}{$min}.css?ver={$ver}",
		),
	);

	wp_editor( $content, $editor_id, $args );

};
