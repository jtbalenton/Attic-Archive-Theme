<?php

if( ! class_exists('acf_field_site_title') ) :

class acf_field_site_title extends acf_field_text {
	
	
	/*
	*  initialize
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function initialize() {
		
		// vars
		$this->name = 'site_title';
		$this->label = __("Site Title",'acf');
        $this->category = 'Site';
		$this->defaults = array(
			'default_value'	=> '',
			'maxlength'		=> '',
			'placeholder'	=> '',
			'prepend'		=> '',
			'append'		=> ''
		);
        add_filter( 'acf/load_field/type=text',  [ $this, 'load_site_title_field'] );
        add_filter( 'acf/update_value/type=' . $this->name,  [ $this, 'pre_update_value'], 9, 3 );      
		
	}
    
    function load_site_title_field( $field ){
        if( ! empty( $field['custom_site_title'] ) ){
            $field['type'] = 'site_title';
        }
        return $field;
    }

    public function load_value( $value, $post_id = false, $field = false ){
        $value = get_option( 'blogname' );
        return $value;
    }

    public function pre_update_value( $value, $post_id = false, $field = false ){
        update_option( 'blogname', $value );
        return $value;
    }

    public function update_value( $value, $post_id = false, $field = false ){
        return null;
    }

    function render_field( $field ){
        $field['type'] = 'text';
        parent::render_field( $field );

    }

}

// initialize
acf_register_field_type( 'acf_field_site_title' );

endif;
	
?>