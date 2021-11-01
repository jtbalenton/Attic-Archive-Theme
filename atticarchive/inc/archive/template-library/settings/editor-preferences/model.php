<?php

namespace Archive\Core\Settings\EditorPreferences;

use Archive\Controls_Manager;
use Archive\Core\Settings\Base\Model as BaseModel;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Model extends BaseModel {

	/**
	 * Get element name.
	 *
	 * Retrieve the element name.
	 *
	 * @return string The name.
	 * @since 2.8.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'editor-preferences';
	}

	/**
	 * Get panel page settings.
	 *
	 * Retrieve the page setting for the current panel.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function get_panel_page_settings() {
		return [
			'title' => __( 'User Preferences', 'Archive' ),
		];
	}

	/**
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section( 'preferences', [
			'tab' => Controls_Manager::TAB_SETTINGS,
			'label' => __( 'Preferences', 'Archive' ),
		] );

		$this->add_control(
			'ui_theme',
			[
				'label' => __( 'UI Theme', 'Archive' ),
				'type' => Controls_Manager::SELECT,
				'description' => __( 'Set light or dark mode, or use Auto Detect to sync it with your OS setting.', 'Archive' ),
				'default' => 'auto',
				'options' => [
					'auto' => __( 'Auto Detect', 'Archive' ),
					'light' => __( 'Light', 'Archive' ),
					'dark' => __( 'Dark', 'Archive' ),
				],
			]
		);

		$this->add_control(
			'panel_width',
			[
				'label' => __( 'Panel Width', 'Archive' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 680,
					],
				],
				'default' => [
					'size' => 300,
				],
			]
		);

		$this->add_control(
			'edit_buttons',
			[
				'label' => __( 'Editing Handles', 'Archive' ),
				'type' => Controls_Manager::SWITCHER,
				'description' => __( 'Show editing handles when hovering over the element edit button.', 'Archive' ),
			]
		);

		$this->add_control(
			'lightbox_in_editor',
			[
				'label' => __( 'Enable Lightbox In Editor', 'Archive' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
	}
}
