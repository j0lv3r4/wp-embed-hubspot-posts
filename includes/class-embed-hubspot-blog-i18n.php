<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://jolvera.biz
 * @since      1.0.0
 *
 * @package    Embed_Hubspot_Blog
 * @subpackage Embed_Hubspot_Blog/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Embed_Hubspot_Blog
 * @subpackage Embed_Hubspot_Blog/includes
 * @author     Juan Olvera <jolvera@posteo.de>
 */
class Embed_Hubspot_Blog_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'embed-hubspot-blog',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
