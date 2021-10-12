<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

if (!class_exists('ACF_FRONTEND_FIELDS')):
class ACF_FRONTEND_FIELDS{
    


// vars
	var $settings;
	
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	void
	*/
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> my_plugins_dir_url(  'acf-frontend-form/acf-frontend.php' ),
			'path'		=> plugin_dir_path( 'acf-frontend-form/acf-frontend.php' )
		);
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_fields')); // v5
		add_action('acf/register_fields', 		array($this, 'include_fields')); // v4
	}
	
	
	/*
	*  include_field
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	void
	*/
	
	function include_fields( $version = 5 ) {
		
		// support empty $version
		if( !$version ) $version = 4;
		
		
		// load textdomain
		//load_plugin_textdomain( 'TEXTDOMAIN', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		
		// include
		require_once('fields/post/post-title.php');
        require_once('fields/post/post-content.php');
		//require_once('fields/general/child-post-field.php');
        require_once('fields/general/upload-file.php');
        require_once('fields/post/featured-image.php');
        
	}
	

}
// initialize
new ACF_FRONTEND_FIELDS();


// class_exists check
endif;