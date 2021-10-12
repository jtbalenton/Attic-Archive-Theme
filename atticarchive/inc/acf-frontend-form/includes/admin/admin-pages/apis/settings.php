<?php
namespace ACFFrontend;

use Elementor\Core\Base\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class ACFF_Google_API_Settings{
		/**
	* Redirect non-admin users to home page
	*
	* This function is attached to the ‘admin_init’ action hook.
	*/


	public function get_settings_fields( $field_keys ){
		$local_fields = array(
            'acff_google_maps_api' => array(
                'label' => __( 'Google Maps API Key', 'acf-frontend-form-element' ),
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array(
                    'width' => '50.1',
                    'class' => '',
                    'id' => '',
                ),
            ),
        );

        if ( acff()->is__premium_only() ) {
            $local_fields = array_merge( $local_fields, array(
                'google_recaptcha_message' => array(
                    'label' => '',
                    'type' => 'message',
                    'message' => sprintf( __( '<a href="%s" target="_blank">reCAPTCHA V3</a> is a free service by Google that protects your website from spam and abuse. It does this while letting your valid users pass through with ease.', 'elementor-pro' ), 'https://www.google.com/recaptcha/intro/v3.html' ),
                    'instructions' => '',
                    'required' => 0,
                    'wrapper' => array(
                        'width' => '50.1',
                        'class' => '',
                        'id' => '',
                    ),
                ),
                'acff_google_recaptcha_site' => array(
                    'label' => __( 'Google reCaptcha Site Key', 'acf-frontend-form-element' ),
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'wrapper' => array(
                        'width' => '50.1',
                        'class' => '',
                        'id' => '',
                    ),
                ),
                'acff_google_recaptcha_secret' => array(
                    'label' => __( 'Google reCaptcha Secret Key', 'acf-frontend-form-element' ),
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'wrapper' => array(
                        'width' => '50.1',
                        'class' => '',
                        'id' => '',
                    ),
                ),
            ) );
        }
        
		return $local_fields;
	} 
	public function acff_update_maps_api() {	
        acf_update_setting( 'google_api_key', get_option( 'acff_google_maps_api' ) );
    }

	public function __construct() {
        add_filter( 'acff/apis_fields', [ $this, 'get_settings_fields'] );
        
        add_action( 'acf/init', [ $this, 'acff_update_maps_api'] );
	}
	
}

new ACFF_Google_API_Settings( $this );