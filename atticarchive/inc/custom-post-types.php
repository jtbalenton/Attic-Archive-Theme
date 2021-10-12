<?php
add_action( 'wp_loaded', 'cptui_register_my_cpts' );

function cptui_register_my_cpts() {

  /**
   * Post Type: Letters.
   */

  $labels = [
    "name" => __( "Letters", "hello-elementor" ),
    "singular_name" => __( "Letter", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Letters", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "letter", "with_front" => true ],
    "query_var" => true,
    "menu_position" => 28,
    "supports" => [ "title", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "letter", $args );

  /**
   * Post Type: Photos.
   */

  $labels = [
    "name" => __( "Photos", "hello-elementor" ),
    "singular_name" => __( "Photo", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Photos", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "photo", "with_front" => true ],
    "query_var" => true,
    "menu_position" => 25,
    "supports" => [ "title", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "photo", $args );

  /**
   * Post Type: Articles.
   */

  $labels = [
    "name" => __( "Articles", "hello-elementor" ),
    "singular_name" => __( "Article", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Articles", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "article", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "article", $args );

  /**
   * Post Type: Stories.
   */

  $labels = [
    "name" => __( "Stories", "hello-elementor" ),
    "singular_name" => __( "Story", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Stories", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "story", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "excerpt", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "story", $args );

  /**
   * Post Type: Places.
   */

  $labels = [
    "name" => __( "Places", "hello-elementor" ),
    "singular_name" => __( "Place", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Places", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "place", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "thumbnail", "comments" ],
    "taxonomies" => [ "state" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "place", $args );

  /**
   * Post Type: People.
   */

  $labels = [
    "name" => __( "People", "hello-elementor" ),
    "singular_name" => __( "Person", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "People", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => [ "slug" => "person", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "thumbnail", "comments" ],
    "taxonomies" => [ "state" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "person", $args );

  /**
   * Post Type: Locations.
   */

  $labels = [
    "name" => __( "Locations", "hello-elementor" ),
    "singular_name" => __( "Location", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Locations", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "location", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "location", $args );

  /**
   * Post Type: Sources.
   */

  $labels = [
    "name" => __( "Sources", "hello-elementor" ),
    "singular_name" => __( "Source", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Sources", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "research-slug",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "source", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "source", $args );

  /**
   * Post Type: Audio Recordings.
   */

  $labels = [
    "name" => __( "Audio Recordings", "hello-elementor" ),
    "singular_name" => __( "Audio Recording", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Audio Recordings", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,

    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "audio", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "audio", $args );

  /**
   * Post Type: Videos.
   */

  $labels = [
    "name" => __( "Videos", "hello-elementor" ),
    "singular_name" => __( "Video", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Videos", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "video", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "video", $args );

  /**
   * Post Type: Photo Studios.
   */

  $labels = [
    "name" => __( "Photo Studios", "hello-elementor" ),
    "singular_name" => __( "Photo Studio", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Photo Studios", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "photo_studio", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "photo_studio", $args );

  /**
   * Post Type: Photo Albums.
   */

  $labels = [
    "name" => __( "Photo Albums", "hello-elementor" ),
    "singular_name" => __( "Photo Album", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Photo Albums", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "photo_album", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "photo_album", $args );

  /**
   * Post Type: Cities.
   */

  $labels = [
    "name" => __( "Cities", "hello-elementor" ),
    "singular_name" => __( "City", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Cities", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
   "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "city", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "city", $args );

  /**
   * Post Type: Events.
   */

  $labels = [
    "name" => __( "Events", "hello-elementor" ),
    "singular_name" => __( "Event", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Events", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "event", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "event", $args );

  /**
   * Post Type: Documents.
   */

  $labels = [
    "name" => __( "Documents", "hello-elementor" ),
    "singular_name" => __( "Document", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Documents", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "document", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "document", $args );

  /**
   * Post Type: Collections.
   */

  $labels = [
    "name" => __( "Collections", "hello-elementor" ),
    "singular_name" => __( "Collection", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Collections", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "collection", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "collection", $args );

  /**
   * Post Type: Ephemera.
   */

  $labels = [
    "name" => __( "Ephemera", "hello-elementor" ),
    "singular_name" => __( "Ephemera", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Ephemera", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "ephemera", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "ephemera", $args );

  /**
   * Post Type: Tasks.
   */

  $labels = [
    "name" => __( "Tasks", "hello-elementor" ),
    "singular_name" => __( "Task", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Tasks", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "research-slug",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "task", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "task", $args );

  /**
   * Post Type: Texts.
   */

  $labels = [
    "name" => __( "Texts", "hello-elementor" ),
    "singular_name" => __( "Text", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Texts", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "text", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "text", $args );

  /**
   * Post Type: Bookmarks.
   */

  $labels = [
    "name" => __( "Bookmarks", "hello-elementor" ),
    "singular_name" => __( "Bookmark", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Bookmarks", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "research-slug",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "bookmark", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "bookmark", $args );

  /**
   * Post Type: Objects.
   */

  $labels = [
    "name" => __( "Objects", "hello-elementor" ),
    "singular_name" => __( "Object", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Objects", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "research-slug",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "object", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "comments" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "object", $args );

  /**
   * Post Type: Containers.
   */

  $labels = [
    "name" => __( "Containers", "hello-elementor" ),
    "singular_name" => __( "Container", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Containers", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "research-slug",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "container", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "container", $args );

  /**
   * Post Type: Citations.
   */

  $labels = [
    "name" => __( "Citations", "hello-elementor" ),
    "singular_name" => __( "Citation", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Citations", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "research-slug",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "citation", "with_front" => true ],
    "query_var" => true,
    "show_in_graphql" => false,
  ];

  register_post_type( "citation", $args );

  /**
   * Post Type: Updates.
   */

  $labels = [
    "name" => __( "Updates", "hello-elementor" ),
    "singular_name" => __( "Update", "hello-elementor" ),
  ];

  $args = [
    "label" => __( "Updates", "hello-elementor" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => "edit.php",
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "update", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail" ],
    "taxonomies" => [ "topic" ],
    "show_in_graphql" => false,
  ];

  register_post_type( "update", $args );
}


function cptui_register_my_taxes() {

  /**
   * Taxonomy: Occupations.
   */

  $labels = [
    "name" => __( "Occupations", "hello-elementor" ),
    "singular_name" => __( "Occupation", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Occupations", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'occupation', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "occupation",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "occupation", [ "person" ], $args );

  /**
   * Taxonomy: Causes of Death.
   */

  $labels = [
    "name" => __( "Causes of Death", "hello-elementor" ),
    "singular_name" => __( "Cause of Death", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Causes of Death", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'cause_of_death', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "cause_of_death",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "cause_of_death", [ "person", "event" ], $args );

  /**
   * Taxonomy: Document Types.
   */

  $labels = [
    "name" => __( "Document Types", "hello-elementor" ),
    "singular_name" => __( "Document Type", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Document Types", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'document_type', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "document_type",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "document_type", [ "document" ], $args );

  /**
   * Taxonomy: Types of Ephemera.
   */

  $labels = [
    "name" => __( "Types of Ephemera", "hello-elementor" ),
    "singular_name" => __( "Type of Ephemera", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Types of Ephemera", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'ephemera_type', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "ephemera_type",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "ephemera_type", [ "ephemera" ], $args );

  /**
   * Taxonomy: Topics.
   */

  $labels = [
    "name" => __( "Topics", "hello-elementor" ),
    "singular_name" => __( "Topic", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Topics", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'topic', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "topic",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "topic", [ "post", "letter", "photo", "article", "story", "person", "audio", "video", "document", "collection", "ephemera", "task", "text", "bookmark" ], $args );

  /**
   * Taxonomy: Generations.
   */

  $labels = [
    "name" => __( "Generations", "hello-elementor" ),
    "singular_name" => __( "Generation", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Generations", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'generation', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "generation",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "generation", [ "person" ], $args );

  /**
   * Taxonomy: Lineages.
   */

  $labels = [
    "name" => __( "Lineages", "hello-elementor" ),
    "singular_name" => __( "Lineage", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Lineages", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'lineage', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "lineage",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "lineage", [ "person" ], $args );

  /**
   * Taxonomy: Genders.
   */

  $labels = [
    "name" => __( "Genders", "hello-elementor" ),
    "singular_name" => __( "Gender", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Genders", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'gender', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "gender",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "gender", [ "person" ], $args );

  /**
   * Taxonomy: Types of School.
   */

  $labels = [
    "name" => __( "Types of School", "hello-elementor" ),
    "singular_name" => __( "Type of School", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Types of School", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'school_type', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "school_type",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "school_type", [ "place" ], $args );

  /**
   * Taxonomy: Courses of Study.
   */

  $labels = [
    "name" => __( "Courses of Study", "hello-elementor" ),
    "singular_name" => __( "Course of Study", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Courses of Study", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'course_of_study', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "course_of_study",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "course_of_study", [ "event" ], $args );

  /**
   * Taxonomy: Degrees.
   */

  $labels = [
    "name" => __( "Degrees", "hello-elementor" ),
    "singular_name" => __( "Degree", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Degrees", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'degree', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "degree",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "degree", [ "event" ], $args );

  /**
   * Taxonomy: Types of Business.
   */

  $labels = [
    "name" => __( "Types of Business", "hello-elementor" ),
    "singular_name" => __( "Type of Business", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Types of Business", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'business_type', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "business_type",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "business_type", [ "place" ], $args );

  /**
   * Taxonomy: Types of Worship.
   */

  $labels = [
    "name" => __( "Types of Worship", "hello-elementor" ),
    "singular_name" => __( "Type of Worship", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Types of Worship", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'worship_type', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "worship_type",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "worship_type", [ "place" ], $args );

  /**
   * Taxonomy: Privacy Levels.
   */

  $labels = [
    "name" => __( "Privacy Levels", "hello-elementor" ),
    "singular_name" => __( "Privacy Level", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Privacy Levels", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'privacy_level', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "privacy_level",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "privacy_level", [ "letter", "photo", "article", "story", "person", "audio", "video", "photo_album", "event", "document", "collection", "ephemera", "text", "bookmark", "object" ], $args );

  /**
   * Taxonomy: Branches of Military.
   */

  $labels = [
    "name" => __( "Branches of Military", "hello-elementor" ),
    "singular_name" => __( "Branch of Military", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Branches of Military", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'military_branch', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "military_branch",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "military_branch", [ "place", "person", "event" ], $args );

  /**
   * Taxonomy: Photographers.
   */

  $labels = [
    "name" => __( "Photographers", "hello-elementor" ),
    "singular_name" => __( "Photographer", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Photographers", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'photographer', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "photographer",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "photographer", [ "photo", "photo_studio", "photo_album" ], $args );

  /**
   * Taxonomy: Text Authors.
   */

  $labels = [
    "name" => __( "Text Authors", "hello-elementor" ),
    "singular_name" => __( "Text Author", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Text Authors", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'text_author', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "text_author",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "text_author", [ "text" ], $args );

  /**
   * Taxonomy: Types of Place.
   */

  $labels = [
    "name" => __( "Types of Place", "hello-elementor" ),
    "singular_name" => __( "Type of Place", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Types of Place", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'place_type', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "place_type",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "place_type", [ "place" ], $args );

  /**
   * Taxonomy: Event Types.
   */

  $labels = [
    "name" => __( "Event Types", "hello-elementor" ),
    "singular_name" => __( "Event Type", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Event Types", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'event_type', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "event_type",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "event_type", [ "event" ], $args );

  /**
   * Taxonomy: Source Types.
   */

  $labels = [
    "name" => __( "Source Types", "hello-elementor" ),
    "singular_name" => __( "Source Type", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Source Types", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'source_type', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "source_type",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "source_type", [ "source" ], $args );

  /**
   * Taxonomy: Person Tags.
   */

  $labels = [
    "name" => __( "Person Tags", "hello-elementor" ),
    "singular_name" => __( "Person Tag", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Person Tags", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'person_tags', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "person_tags",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "person_tags", [ "person" ], $args );

  /**
   * Taxonomy: Relations.
   */

  $labels = [
    "name" => __( "Relations", "hello-elementor" ),
    "singular_name" => __( "Relation to Base Person", "hello-elementor" ),
  ];


  $args = [
    "label" => __( "Relations", "hello-elementor" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'relation', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "relation",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "relation", [ "person" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

//add_action( 'after_switch_theme', 'my_rewrite_flush' );

function my_rewrite_flush() {
  my_cpt_init();
  flush_rewrite_rules();
}