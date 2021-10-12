<?php

define( 'MY_PLUGIN_URL', WP_CONTENT_URL . '/themes/atticarchive/inc' );
define( 'MY_THEME_URL', WP_CONTENT_URL . '/themes/atticarchive' );

define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );
include_once( MY_ACF_PATH . 'acf.php' );

// Include the ACFE plugin.
define( 'ACFE_PATH', get_stylesheet_directory() . '/inc/acfe/' );
define( 'ACFE_URL', get_stylesheet_directory_uri() . '/inc/acfe/' );
include_once( ACFE_PATH . 'acfe.php' );



//ACF Frontent Form Extensisons
define( 'ACF_Extensions', get_stylesheet_directory() . '/inc/acf-extensions/' );
//include_once( ACF_Extensions . 'acf-frontend.php' );

//Ultimate Dashboard Free then Pro
define( 'ULTIMATE_DASHBOARD_PATH', get_stylesheet_directory() . '/inc/ultimate-dashboard/' );
require_once( ULTIMATE_DASHBOARD_PATH . 'dashboard.php' );
define( 'ULTIMATE_DASHBOARD_PRO_PATH', get_stylesheet_directory() . '/inc/ultimate-dashboard-pro/' );
require_once( ULTIMATE_DASHBOARD_PRO_PATH . 'dashboard-pro.php' );

//Search Filter Pro    
define( 'SFP_PATH', get_stylesheet_directory() . '/inc/Search_Filter/' );
require_once( SFP_PATH . 'sfp.php' );



function my_plugins_dir_url( $file ) {
  return trailingslashit( my_plugins_url( '', $file ) );
}

function my_plugins_url( $path = '', $plugin = '' ) {

  $path = wp_normalize_path( $path );
  $plugin = wp_normalize_path( $plugin );
  $mu_plugin_dir = wp_normalize_path( WPMU_PLUGIN_DIR );

  if ( !empty( $plugin ) && 0 === strpos( $plugin, $mu_plugin_dir ) ) {
    $url = MY_PLUGIN_URL;
  } else {
    $url = MY_PLUGIN_URL;
  }

  $url = set_url_scheme( $url );

  if ( !empty( $plugin ) && is_string( $plugin ) ) {
    $folder = dirname( plugin_basename( $plugin ) );
    if ( '.' !== $folder ) {
      $url .= '/' . ltrim( $folder, '/' );
    }
  }

  if ( $path && is_string( $path ) ) {
    $url .= '/' . ltrim( $path, '/' );
  }

  /**
   * Filters the URL to the plugins directory.
   *
   * @since 2.8.0
   *
   * @param string $url    The complete URL to the plugins directory including scheme and path.
   * @param string $path   Path relative to the URL to the plugins directory. Blank string
   *                       if no path is specified.
   * @param string $plugin The plugin file path to be relative to. Blank string if no plugin
   *                       is specified.
   */
  return apply_filters( 'my_plugins_url', $url, $path, $plugin );
}


// Customize the url setting to fix incorrect asset URLs.
add_filter( 'acf/settings/url', 'my_acf_settings_url' );
// Customize the url setting to fix incorrect asset URLs.
add_filter( 'acfe/settings/url', 'my_acfe_settings_url' );


add_shortcode( "show_wp_menu", "show_wp_menu_function" );


function my_acf_settings_url( $url ) {
  return MY_ACF_URL;
}


function my_acfe_settings_url( $url ) {
  return MY_ACFE_URL;
}

// Function that will return our Wordpress menu
function show_wp_menu_function( $atts, $content = null ) {

  extract( shortcode_atts( array(
      'menu' => 'Dashboard-menu',
      'container' => '',
      'container_class' => '',
      'container_id' => '',
      'menu_class' => 'nav flex-column',
      'menu_id' => '',
      'echo' => true,
      'fallback_cb' => 'wp_page_menu',
      'before' => '',
      'after' => '',
      'link_before' => '',
      'link_after' => '',
      'depth' => 0,
      'walker' => new bootstrap_5_wp_nav_menu_walker(),
      'theme_location' => '' ),
    $atts ) );


  return wp_nav_menu( array(
    'menu' => $menu,
    'container' => $container,
    'container_class' => $container_class,
    'container_id' => $container_id,
    'menu_class' => $menu_class,
    'menu_id' => $menu_id,
    'echo' => false,
    'fallback_cb' => $fallback_cb,
    'before' => $before,
    'after' => $after,
    'link_before' => $link_before,
    'link_after' => $link_after,
    'depth' => $depth,
    'walker' => $walker,
    'theme_location' => $theme_location ) );
}




//add_action( 'acf/save_post', 'custom_photo_date' );

function custom_photo_date( $post_id ) {
  // Get newly saved values.
  $values = get_fields( $post_id );
  // Check the new value of a specific field.
  $year = get_field( 'year_taken', $post_id );
  $month = get_field( 'month_taken', $post_id );
  $day = get_field( 'day_taken', $post_id );

  $database_date = "$month $day $year";

  if ( $database_date ) {
    update_post_meta( $post_id, 'date_taken', $database_date );
  }
}

//add_action( 'acf/save_post', 'my_acf_save_custom_date' );

function my_acf_save_custom_date( $post_id ) {
  // Get newly saved values.
  $values = get_fields( $post_id );
  // Check the new value of a specific field.

  $month = get_field( 'event_month', $post_id );
  $day = get_field( 'event_day', $post_id );
  $year = get_field( 'event_year', $post_id );

  $database_date = "$month $day $year";

  if ( $database_date ){
    update_post_meta( $post_id, 'event_date', $database_date );
  
  }
  
}

