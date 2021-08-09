<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.faizanhaidar.com
 * @since      1.0.0
 *
 * @package    Wp_React_App
 * @subpackage Wp_React_App/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_React_App
 * @subpackage Wp_React_App/public
 * @author     Muhammad Faizan Haidar <faizanhaider594@gmail.com>
 */
class Wp_React_App_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_React_App_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_React_App_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$ver         = ( get_file_data( __FILE__, [ "Version" => "Version" ], false ))['Version'];
		$css_to_load = WP_REACT_APP_URL. 'app/build/static/css/main.css';
		$this->version = $ver;
		if ( defined( 'ENV_DEV' ) && ENV_DEV ) {
			// DEV React dynamic loading.
			$ver         = gmdate( 'Y-m-d-h-i-s' );
			
			$css_to_load = 'http://localhost:3000/static/css/main.css';
		}
	

		wp_enqueue_style(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'css/wp-react-app-public.css',
			array(),
			$this->version,
			'all'
		);
		wp_enqueue_style(
			$this->plugin_name.'react-css',
			$css_to_load,
			array(),
			$this->version,
			'all'
		);
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_React_App_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_React_App_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$ver           = ( get_file_data( __FILE__, [ "Version" => "Version" ], false ))['Version'];
		$js_to_load    = WP_REACT_APP_URL . 'app/build/static/js/main.js';
		$this->version = $ver;
		if ( defined( 'ENV_DEV' ) && ENV_DEV ) {
			// DEV React dynamic loading.
			$ver         = gmdate( 'Y-m-d-h-i-s' );
			$js_to_load  = 'http://localhost:3000/static/js/main.js';
		}
		wp_enqueue_script(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'js/wp-react-app-public.js',
			array( 'jquery' ),
			$this->version,
			false
		);

		wp_enqueue_script(
			$this->plugin_name.'react-js',
			$js_to_load,
			array( 'wp-element' ),
			$this->version,
			true
		);

	}

}
