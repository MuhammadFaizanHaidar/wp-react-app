<?php

/**
 * Fired to add short codes
 *
 * @link       www.faizanhaidar.com
 * @since      1.0.0
 *
 * @package    Wp_React_App
 * @subpackage Wp_React_App/includes
 */

/**
 * Fired to add short codes.
 *
 * This class defines all code necessary to run during the short codes rendering.
 *
 * @since      1.0.0
 * @package    Wp_React_App
 * @subpackage Wp_React_App/includes
 * @author     Muhammad Faizan Haidar <faizanhaider594@gmail.com>
 */
class Wp_React_App_Short_Codes {
    /**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;
    /**
     * Class constructor.
     */
    public function __construct( $version, $name ) {

        $this->version     = $version;
        $this->plugin_name = $name;
        add_shortcode(
            'wp-react-app',
            [ $this, 'wp_react_app_shortcode' ]
        );

    }

    /**
     * Shortcode which renders Root element for your React App.
     *
     * @return string
     */
    public function wp_react_app_shortcode() {

        /**
         * You can pass in here some data which if you need to have some settings\localization etc for your App,
         * so you'll be able for example generate initial state of your app for Redux, based on some settings provided by WordPress.
         */
        ob_start();
        $settings = array(
            'l18n'       => array(
                'main_title' => 'Hi this is your React app running in WordPress',
            ),
            'some_items' => array( 'lorem ipsum', 'dolor sit amet' ),
        );
        ?>
        <div id="wp-react-app" data-default-settings="<?php esc_attr_e( wp_json_encode( $settings ) ); ?>">ecgosdhds</div>
        <?php
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }


}
