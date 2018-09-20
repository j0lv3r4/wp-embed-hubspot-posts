<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://jolvera.biz
 * @since      1.0.0
 *
 * @package    Embed_Hubspot_Blog
 * @subpackage Embed_Hubspot_Blog/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Embed_Hubspot_Blog
 * @subpackage Embed_Hubspot_Blog/public
 * @author     Juan Olvera <jolvera@posteo.de>
 */
class Embed_Hubspot_Blog_Public {

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
		 * defined in Embed_Hubspot_Blog_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Embed_Hubspot_Blog_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/embed-hubspot-blog-public.css', array(), $this->version, 'all' );

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
		 * defined in Embed_Hubspot_Blog_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Embed_Hubspot_Blog_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/embed-hubspot-blog-public.js', array( 'jquery' ), $this->version, false );

	}

	public function register_shortcode( $atts ) {

		$atts = shortcode_atts( array(
			'url' => '',
			'limit' => '',
		), $atts, 'embed_hubspot_blog' );

		$output = $this->display_hubspot_posts( $atts );

		$has_url = ! empty( $atts['url'] );

		if ( $has_url ) {
			return $output;
		}

	}

	public function display_hubspot_posts( $atts ) {

		$url = $atts['url'];

		$maxitems = 0;

		// https://codex.wordpress.org/Function_Reference/fetch_feed
		$rss = fetch_feed( $url );

		$template = 'partials/class-embed-hubspot-blog-public-display.php';

		if ( ! is_wp_error( $rss ) ) {

			$maxitems = $rss->get_item_quantity( $atts['limit'] );
			$rss_items = $rss->get_items( 0, $maxitems );

			// http://simplepie.org/api/class-SimplePie_Item.html
			foreach ( $rss_items as $item ) {
				require plugin_dir_path( __FILE__ ) . $template;
			}

		}
	}

	function posted_on( $item ) {

		$time_string = '<time class="embedhb-entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( $item->get_date( DATE_W3C ) ),
			esc_html( $item->get_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'embed-hubspot-blog' ),
			'<a href="' . esc_url( $item->get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="embedhb-posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}

}
