<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$fields = array(	
    array(
        'key' => 'redirect',
        'label' => __( 'Redirect After Submit', 'acf-frontend-form-element' ),
        'type' => 'select',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => array(
            'current' => __( 'Reload Current Page', 'acf-frontend-form-element' ),
            'custom_url' => __( 'Custom URL', 'acf-frontend-form-element' ),
            'referer' => __( 'Referer', 'acf-frontend-form-element' ),
            'post_url' => __( 'Post URL', 'acf-frontend-form-element' ),
        ),
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'return_format' => 'value',
        'ajax' => 0,
        'placeholder' => '',
    ),
    array(
        'key' => 'custom_url',
        'label' => __( 'Custom Url', 'acf-frontend-form-element' ),
        'type' => 'url',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'redirect',
                    'operator' => '==',
                    'value' => 'custom_url',
                ),
            ),
        ),
        'placeholder' => '',
    ),
    array(
        'key' => 'redirect_action',
        'label' => __( 'After Reload', 'acf-frontend-form-element' ),
        'type' => 'select',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => array(
            'clear' => __( 'Clear Form', 'acf-frontend-form-element' ),
            'edit' => __( 'Edit Form', 'acf-frontend-form-element' ),
        ),
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'redirect',
                    'operator' => '==',
                    'value' => 'current',
                ),
            ),
        ),
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'return_format' => 'value',
        'ajax' => 0,
        'placeholder' => '',
    ),
);

if( acff()->is__premium_only() ){
    $fields[] = array(
        'key' => 'ajax_submit',
        'label' => __( 'No Page Reload', 'acf-frontend-form-element' ),
        'type' => 'true_false',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'redirect',
                    'operator' => '==',
                    'value' => 'current',
                ),
            ),
        ),
        'message' => '',
        'ui' => 1,
        'ui_on_text' => '',
        'ui_off_text' => '',
    );
}

$fields = array_merge( $fields, array(
    array(
        'key' => 'show_update_message',
        'label' => __( 'Success Message', 'acf-frontend-form-element' ),
        'type' => 'true_false',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'message' => '',
        'ui' => 1,
        'ui_on_text' => '',
        'ui_off_text' => '',
    ),
    array(
        'key' => 'update_message',
        'label' => '',
        'field_label_hide' => true,
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'show_update_message',
                    'operator' => '==',
                    'value' => '1',
                ),
            ),
        ),
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '2',
        'new_lines' => '',
    ),
    array(
        'key' => 'error_message',
        'label' => '',
        'field_label_hide' => true,
        'type' => 'textarea',
        'instructions' => __( 'There shouldn\'t be any problems with the form submission, but if there are, this is what your users will see. If you are expeiencing issues, try and changing your cache settings and reach out to ', 'acf-frontend-form-element' ) . 'support@frontendform.com',
        'required' => 0,
        'placeholder' => __( 'There has been an error. Form has been submitted successfully, but some actions might not have been completed.', 'acf-frontend-form-element' ),
        'maxlength' => '',
        'rows' => '2',
        'new_lines' => '',
    ),
) );
    
if( acff()->is__premium_only() ){
    $remote_actions = array();
    foreach( acff()->remote_actions as $name => $action ){
        $remote_actions[$name] = $action->get_label();
    }
    $fields[] = array(
        'key' => 'more_actions',
        'label' => __( 'Submit Actions', 'acf-frontend-form-element' ),
        'type' => 'select',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => $remote_actions,
        'allow_null' => 0,
        'multiple' => 1,
        'ui' => 1,
        'return_format' => 'value',
        'ajax' => 0,
        'placeholder' => '',
    );
}

return $fields;