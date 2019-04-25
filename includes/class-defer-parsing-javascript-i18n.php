<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://junsantilla.com/
 * @since      1.0.0
 *
 * @package    Defer_Parsing_Javascript
 * @subpackage Defer_Parsing_Javascript/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Defer_Parsing_Javascript
 * @subpackage Defer_Parsing_Javascript/includes
 * @author     Jun Santilla <junsantilla@live.com>
 */
class Defer_Parsing_Javascript_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'defer-parsing-javascript',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
