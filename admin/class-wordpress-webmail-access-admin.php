<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Wordpress_Webmail_Access
 * @subpackage Wordpress_Webmail_Access/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wordpress_Webmail_Access
 * @subpackage Wordpress_Webmail_Access/admin
 * @author     Your Name <email@example.com>
 */
class Wordpress_Webmail_Access_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wordpress_webmail_access    The ID of this plugin.
	 */
	private $wordpress_webmail_access;

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
	 * @param      string    $wordpress_webmail_access       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wordpress_webmail_access, $version ) {

		$this->wordpress_webmail_access = $wordpress_webmail_access;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wordpress_Webmail_Access_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wordpress_Webmail_Access_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wordpress_webmail_access, plugin_dir_url( __FILE__ ) . 'css/wordpress-webmail-access-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wordpress_Webmail_Access_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wordpress_Webmail_Access_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wordpress_webmail_access, plugin_dir_url( __FILE__ ) . 'js/wordpress-webmail-access-admin.js', array( 'jquery' ), $this->version, false );

	}

}
