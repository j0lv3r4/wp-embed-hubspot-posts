<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://jolvera.biz
 * @since      1.0.0
 *
 * @package    Embed_Hubspot_Blog
 * @subpackage Embed_Hubspot_Blog/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Embed_Hubspot_Blog
 * @subpackage Embed_Hubspot_Blog/admin
 * @author     Juan Olvera <jolvera@posteo.de>
 */
class Embed_Hubspot_Blog_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in Embed_Hubspot_Blog_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Embed_Hubspot_Blog_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/embed-hubspot-blog-admin.css', array(), $this->version, 'all' );

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
		 * defined in Embed_Hubspot_Blog_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Embed_Hubspot_Blog_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/embed-hubspot-blog-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function create_settings_page() {

		$page_title = 'Embed HubSpot Blog Settings Page';
		$menu_title = 'Embed HubSpot Blog';
		$capability = 'manage_options';
		$slug = 'embed_hubspot_blog_fields'; // Options page slug
		$callback = array( $this, 'settings_page_content' );
		$icon = 'dashicons-admin-plugins';
		$position = 100;

		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );

	}

	public function setup_settings_sections() {

		add_settings_section( 'our_first_section', 'My First Section Title', false, 'embed_hubspot_blog_fields' );

	}

	public function setup_settings_fields() {

		$fields = array(
			array(
				'uid' => 'our_first_field',
				'label' => 'Awesome Date',
				'section' => 'our_first_section',
				'type' => 'text',
				'options' => false,
				'placeholder' => 'DD/MM/YYYY',
				'helper' => 'Does this help?',
				'supplemental' => 'I am underneath!',
				'default' => '01/01/2015',
			),
			array(
				'uid' => 'our_second_field',
				'label' => 'Awesome Date',
				'section' => 'our_first_section',
				'type' => 'textarea',
				'options' => false,
				'placeholder' => 'DD/MM/YYYY',
				'helper' => 'Does this help?',
				'supplemental' => 'I am underneath!',
				'default' => '01/01/2015',
			),
			array(
				'uid' => 'our_third_field',
				'label' => 'Awesome Select',
				'section' => 'our_first_section',
				'type' => 'select',
				'options' => array(
					'yes' => 'Yeppers',
					'no' => 'No way dude!',
					'maybe' => 'Meh, whatever.',
				),
				'placeholder' => 'Text goes here',
				'helper' => 'Does this help?',
				'supplemental' => 'I am underneath!',
				'default' => 'maybe',
			),
		);

		foreach( $fields as $field ) {

			add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'embed_hubspot_blog_fields', $field['section'], $field );

			register_setting( 'embed_hubspot_blog_fields', $field['uid'] );

		}

	}

	public function field_callback( $arguments ) {

		include( 'partials/embed-hubspot-blog-admin-field-callback-display.php' );

	}


	public function settings_page_content() {

		include_once( 'partials/embed-hubspot-blog-admin-display.php' );

	}

}
