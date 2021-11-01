<?php
namespace Archive\TemplateLibrary;



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive plugin.
 *
 * The main plugin handler class is responsible for initializing Archive. The
 * class registers and all the components required to run the plugin.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Instance.
	 *
	 * Holds the plugin instance.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @var Plugin
	 */
	public static $instance = null;

	/**
	 * Database.
	 *
	 * Holds the plugin database.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var DB
	 */
	public $db;

	/**
	 * Ajax Manager.
	 *
	 * Holds the plugin ajax manager.
	 *
	 * @since 1.9.0
	 * @deprecated 2.3.0 Use `Plugin::$instance->common->get_component( 'ajax' )` instead
	 * @access public
	 *
	 * @var Ajax
	 */
	public $ajax;

	/**
	 * Controls manager.
	 *
	 * Holds the plugin controls manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Controls_Manager
	 */
	public $controls_manager;

	/**
	 * Documents manager.
	 *
	 * Holds the documents manager.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @var Documents_Manager
	 */
	public $documents;

	/**
	 * Schemes manager.
	 *
	 * Holds the plugin schemes manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Schemes_Manager
	 */
	public $schemes_manager;

	/**
	 * Elements manager.
	 *
	 * Holds the plugin elements manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Elements_Manager
	 */
	public $elements_manager;

	/**
	 * Widgets manager.
	 *
	 * Holds the plugin widgets manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Widgets_Manager
	 */
	public $widgets_manager;

	/**
	 * Revisions manager.
	 *
	 * Holds the plugin revisions manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Revisions_Manager
	 */
	public $revisions_manager;

	/**
	 * Images manager.
	 *
	 * Holds the plugin images manager.
	 *
	 * @since 2.9.0
	 * @access public
	 *
	 * @var Images_Manager
	 */
	public $images_manager;

	/**
	 * Maintenance mode.
	 *
	 * Holds the plugin maintenance mode.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Maintenance_Mode
	 */
	public $maintenance_mode;

	/**
	 * Page settings manager.
	 *
	 * Holds the page settings manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Page_Settings_Manager
	 */
	public $page_settings_manager;

	/**
	 * Dynamic tags manager.
	 *
	 * Holds the dynamic tags manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Dynamic_Tags_Manager
	 */
	public $dynamic_tags;

	/**
	 * Settings.
	 *
	 * Holds the plugin settings.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Settings
	 */
	public $settings;

	/**
	 * Role Manager.
	 *
	 * Holds the plugin Role Manager
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @var \Archive\Core\RoleManager\Role_Manager
	 */
	public $role_manager;

	/**
	 * Admin.
	 *
	 * Holds the plugin admin.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Admin
	 */
	public $admin;

	/**
	 * Tools.
	 *
	 * Holds the plugin tools.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Tools
	 */
	public $tools;

	/**
	 * Preview.
	 *
	 * Holds the plugin preview.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Preview
	 */
	public $preview;

	/**
	 * Editor.
	 *
	 * Holds the plugin editor.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Editor
	 */
	public $editor;

	/**
	 * Frontend.
	 *
	 * Holds the plugin frontend.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Frontend
	 */
	public $frontend;

	/**
	 * Heartbeat.
	 *
	 * Holds the plugin heartbeat.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Heartbeat
	 */
	public $heartbeat;

	/**
	 * System info.
	 *
	 * Holds the system info data.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var System_Info\Main
	 */
	public $system_info;

	/**
	 * Template library manager.
	 *
	 * Holds the template library manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var TemplateLibrary\Manager
	 */
	public $templates_manager;

	/**
	 * Skins manager.
	 *
	 * Holds the skins manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Skins_Manager
	 */
	public $skins_manager;

	/**
	 * Files Manager.
	 *
	 * Holds the files manager.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @var Files_Manager
	 */
	public $files_manager;

	/**
	 * Assets Manager.
	 *
	 * Holds the Assets manager.
	 *
	 * @since 2.6.0
	 * @access public
	 *
	 * @var Assets_Manager
	 */
	public $assets_manager;

	/**
	 * Files Manager.
	 *
	 * Holds the files manager.
	 *
	 * @since 1.0.0
	 * @access public
	 * @deprecated 2.1.0 Use `Plugin::$files_manager` instead
	 *
	 * @var Files_Manager
	 */
	private $posts_css_manager;

	/**
	 * WordPress widgets manager.
	 *
	 * Holds the WordPress widgets manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var WordPress_Widgets_Manager
	 */
	public $wordpress_widgets_manager;

	/**
	 * Modules manager.
	 *
	 * Holds the modules manager.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Modules_Manager
	 */
	public $modules_manager;

	/**
	 * Beta testers.
	 *
	 * Holds the plugin beta testers.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var Beta_Testers
	 */
	public $beta_testers;

	/**
	 * @var Inspector
	 * @deprecated 2.1.2 Use $inspector.
	 */
	public $debugger;

	/**
	 * @var Inspector
	 */
	public $inspector;

	/**
	 * @var CommonApp
	 */
	public $common;

	/**
	 * @var Log_Manager
	 */
	public $logger;

	/**
	 * @var Dev_Tools
	 */
	private $dev_tools;

	/**
	 * @var Core\Upgrade\Manager
	 */
	public $upgrade;

	/**
	 * @var Core\Kits\Manager
	 */
	public $kits_manager;

	/**
	 * @var \Core\Data\Manager
	 */
	public $data_manager;

	public $legacy_mode;

	/**
	 * @var Core\App\App
	 */
	public $app;

	/**
	 * @var Wp_Api
	 */
	public $wp;

	/**
	 * @var Experiments_Manager
	 */
	public $experiments;

	/**
	 * @var Breakpoints_Manager
	 */
	public $breakpoints;

	/**
	 * Clone.
	 *
	 * Disable class cloning and throw an error on object clone.
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object. Therefore, we don't want the object to be cloned.
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'Archive' ), '1.0.0' );
	}

	/**
	 * Wakeup.
	 *
	 * Disable unserializing of the class.
	 *
	 * @access public
	 * @since 1.0.0
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'Archive' ), '1.0.0' );
	}

	/**
	 * Instance.
	 *
	 * Ensures only one instance of the plugin class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();

			/**
			 * Archive loaded.
			 *
			 * Fires when Archive was fully loaded and instantiated.
			 *
			 * @since 1.0.0
			 */
			do_action( 'Archive/loaded' );
		}

		return self::$instance;
	}

	/**
	 * Init.
	 *
	 * Initialize Archive Plugin. Register Archive support for all the
	 * supported post types and initialize Archive components.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {
		$this->add_cpt_support();

		$this->init_components();

		/**
		 * Archive init.
		 *
		 * Fires on Archive init, after Archive has finished loading but
		 * before any headers are sent.
		 *
		 * @since 1.0.0
		 */
		do_action( 'Archive/init' );
	}

	/**
	 * Get install time.
	 *
	 * Retrieve the time when Archive was installed.
	 *
	 * @since 2.6.0
	 * @access public
	 * @static
	 *
	 * @return int Unix timestamp when Archive was installed.
	 */
	public function get_install_time() {
		$installed_time = get_option( '_Archive_installed_time' );

		if ( ! $installed_time ) {
			$installed_time = time();

			update_option( '_Archive_installed_time', $installed_time );
		}

		return $installed_time;
	}

	/**
	 * @since 2.3.0
	 * @access public
	 */
	public function on_rest_api_init() {
		// On admin/frontend sometimes the rest API is initialized after the common is initialized.
		if ( ! $this->common ) {
			$this->init_common();
		}
	}

	/**
	 * Init components.
	 *
	 * Initialize Archive components. Register actions, run setting manager,
	 * initialize all the components that run Archive, and if in admin page
	 * initialize admin components.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function init_components() {
		$this->experiments = new Experiments_Manager();
		$this->breakpoints = new Breakpoints_Manager();
		$this->inspector = new Inspector();
		$this->debugger = $this->inspector;

		Settings_Manager::run();

		$this->db = new DB();
		$this->controls_manager = new Controls_Manager();
		$this->documents = new Documents_Manager();
		$this->kits_manager = new Kits_Manager();
		$this->schemes_manager = new Schemes_Manager();
		$this->elements_manager = new Elements_Manager();
		$this->widgets_manager = new Widgets_Manager();
		$this->skins_manager = new Skins_Manager();
		$this->files_manager = new Files_Manager();
		$this->assets_manager = new Assets_Manager();
		$this->icons_manager = new Icons_Manager();
		$this->settings = new Settings();
		$this->tools = new Tools();
		$this->editor = new Editor();
		$this->preview = new Preview();
		$this->frontend = new Frontend();
		$this->maintenance_mode = new Maintenance_Mode();
		$this->dynamic_tags = new Dynamic_Tags_Manager();
		$this->modules_manager = new Modules_Manager();
		$this->templates_manager = new TemplateLibrary\Manager();
		$this->role_manager = new Core\RoleManager\Role_Manager();
		$this->system_info = new System_Info_Module();
		$this->revisions_manager = new Revisions_Manager();
		$this->images_manager = new Images_Manager();
		$this->wp = new Wp_Api();

		User::init();
		Api::init();
		Tracker::init();

		$this->upgrade = new Core\Upgrade\Manager();

		$this->app = new Core\App\App();

		if ( is_admin() ) {
			$this->heartbeat = new Heartbeat();
			$this->wordpress_widgets_manager = new WordPress_Widgets_Manager();
			$this->admin = new Admin();
			$this->beta_testers = new Beta_Testers();
			new Archive_3_Re_Migrate_Globals();
		}
	}

	/**
	 * @since 2.3.0
	 * @access public
	 */
	public function init_common() {
		$this->common = new CommonApp();

		$this->common->init_components();

		$this->ajax = $this->common->get_component( 'ajax' );
	}

	/**
	 * Get Legacy Mode
	 *
	 * @since 3.0.0
	 * @deprecated 3.1.0 Use `Plugin::$instance->experiments->is_feature_active()` instead
	 *
	 * @param string $mode_name Optional. Default is null
	 *
	 * @return bool|bool[]
	 */
	public function get_legacy_mode( $mode_name = null ) {
		self::$instance->modules_manager->get_modules( 'dev-tools' )->deprecation
			->deprecated_function( __METHOD__, '3.1.0', 'Plugin::$instance->experiments->is_feature_active()' );

		$legacy_mode = [
			'elementWrappers' => ! self::$instance->experiments->is_feature_active( 'e_dom_optimization' ),
		];

		if ( ! $mode_name ) {
			return $legacy_mode;
		}

		if ( isset( $legacy_mode[ $mode_name ] ) ) {
			return $legacy_mode[ $mode_name ];
		}

		// If there is no legacy mode with the given mode name;
		return false;
	}

	/**
	 * Add custom post type support.
	 *
	 * Register Archive support for all the supported post types defined by
	 * the user in the admin screen and saved as `Archive_cpt_support` option
	 * in WordPress `$wpdb->options` table.
	 *
	 * If no custom post type selected, usually in new installs, this method
	 * will return the two default post types: `page` and `post`.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function add_cpt_support() {
		$cpt_support = get_option( 'Archive_cpt_support', [ 'page', 'post' ] );

		foreach ( $cpt_support as $cpt_slug ) {
			add_post_type_support( $cpt_slug, 'Archive' );
		}
	}

	/**
	 * Register autoloader.
	 *
	 * Archive autoloader loads all the classes needed to run the plugin.
	 *
	 * @since 1.6.0
	 * @access private
	 */
	private function register_autoloader() {
		require_once Archive_PATH . '/includes/autoloader.php';

		Autoloader::run();
	}

	/**
	 * Plugin Magic Getter
	 *
	 * @since 3.1.0
	 * @access public
	 *
	 * @param $property
	 * @return mixed
	 * @throws \Exception
	 */
	public function __get( $property ) {
		if ( 'posts_css_manager' === $property ) {
			self::$instance->modules_manager->get_modules( 'dev-tools' )->deprecation->deprecated_argument( 'Plugin::$instance->posts_css_manager', '2.7.0', 'Plugin::$instance->files_manager' );

			return $this->files_manager;
		}

		if ( property_exists( $this, $property ) ) {
			throw new \Exception( 'Cannot access private property' );
		}

		return null;
	}

	/**
	 * Plugin constructor.
	 *
	 * Initializing Archive plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function __construct() {
		$this->register_autoloader();

		$this->logger = Log_Manager::instance();
		$this->data_manager = Data_Manager::instance();

		Maintenance::init();
		Compatibility::register_actions();

		add_action( 'init', [ $this, 'init' ], 0 );
		add_action( 'rest_api_init', [ $this, 'on_rest_api_init' ] );
	}

	final public static function get_title() {
		return __( 'Archive', 'Archive' );
	}
}

if ( ! defined( 'Archive_TESTS' ) ) {
	// In tests we run the instance manually.
	Plugin::instance();
}
