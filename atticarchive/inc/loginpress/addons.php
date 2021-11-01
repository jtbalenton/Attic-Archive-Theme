<?php


define( 'LOGINPRESS_REDIRECT_ROOT_PATH', get_template_directory() . '/inc/loginpress' );
define( 'LOGINPRESS_REDIRECT_PLUGIN_BASENAME', plugin_basename( LOGINPRESS_ROOT_FILE ) );
define( 'LOGINPRESS_REDIRECT_DIR_PATH', get_template_directory() . '/inc/loginpress/' );
define( 'LOGINPRESS_REDIRECT_DIR_URL', get_template_directory() . '/inc/loginpress/' );
define( 'LOGINPRESS_REDIRECT_ROOT_FILE', LOGINPRESS_ROOT_FILE );
define( 'LOGINPRESS_REDIRECT_PLUGIN_ROOT', get_template_directory() . '/inc/loginpress/' );
define( 'LOGINPRESS_REDIRECT_STORE_URL', 'https://WPBrigade.com' );
define( 'LOGINPRESS_REDIRECT_VERSION', '1.1.4' );

add_action( 'wp_loaded', 'loginpress_redirect_login_instance');
//add_action( 'wp_loaded', 'ACF_Frontend_Form_instance');

function loginpress_redirect_login_instance() {
  include_once LOGINPRESS_REDIRECT_ROOT_PATH . '/classes/class-loginpress-login-redirects.php';
  return LoginPress_Login_Redirect_Main::instance();

}


function ACF_Frontend_Form_instance () {
    include_once LOGINPRESS_REDIRECT_ROOT_PATH . '/classes/class-acf-frontend-form.php';
  return ACF_Frontend_Form_Main::load();

}
