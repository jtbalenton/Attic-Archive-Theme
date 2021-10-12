<?php

if( class_exists('acf_field_select') ) :

class acf_field_product_shipping_class extends acf_field_select {
	
	
	/*
	*  __construct
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
		$this->name = 'product_shipping_class';
		$this->label = __( 'Shipping Class', 'acf-frontend-form-element' );
		$this->category = __( 'Product Shipping', 'acf-frontend-form-element' );
		$this->public = false;
		$this->defaults = array(
			'multiple' 		=> 0,
			'allow_null' 	=> 0,
			'choices'		=> array(),
			'default_value'	=> '',
			'ui'			=> 0,
			'ajax'			=> 0,
			'placeholder'	=> '',
			'return_format'	=> 'value'
		);

		add_filter( 'acf/update_value/type=' . $this->name,  [ $this, 'pre_update_value'], 9, 3 );   
	}

    function prepare_field( $field ) {
		$field_key = explode( '_', $field['key'] );
		$form_id = $field_key[0] == 'acfef' ? $field_key[1] : $field_key[0];
        $field['conditional_logic'] = array(
            array(
                array(
                    'field' => 'acfef_' . $form_id . '_product_type',
                    'operator' => '==',
                    'value' => 'simple',
                ),
				array(
                    'field' => 'acfef_' . $form_id . '_is_virtual',
                    'operator' => '==',
                    'value' => '0',
                ),
            ),
            array(
                array(
                    'field' => 'acfef_' . $form_id . '_product_type',
                    'operator' => '==',
                    'value' => 'variable',
                ),
            ),
        );

		$product = acf_frontend_get_product_object();

		if( $product ){
			$field['value'] = $product->get_shipping_class_id( 'edit' );
		}

		return $field;
	}

	function render_field( $field ){
		$args = array(
			'taxonomy'         => 'product_shipping_class',
			'hide_empty'       => 0,
			'show_option_none' => __( 'No shipping class', 'woocommerce' ),
			'name'             => $field['name'],
			'id'               => 'product_shipping_class',
			'selected'         => $field['value'],
			'class'            => 'select short',
			'orderby'          => 'name',
		);
		wp_dropdown_categories( $args );
	}
	
	function pre_update_value( $value, $post_id, $field ) {
        if( empty( $post_id ) || ! is_numeric( $post_id ) ) return null;  

		$product = wc_get_product( $post_id );

		if( $product ){
			$product->set_shipping_class_id( $value );
			$product->save(); 
		}
		return null;

	}
	function update_value( $value, $post_id, $field ) {
		return null;
	}

}

// initialize
acf_register_field_type( 'acf_field_product_shipping_class' );

endif; // class_exists check

?>