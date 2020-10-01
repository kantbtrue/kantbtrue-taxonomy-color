<?php
/**
 * Initialization
 *
 * Fires after WordPress has finished loading but before any headers are sent
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kantbtrue
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_init' ) ) {
	/**
	 * Initial settings and setup
	 *
	 * @since   1.0
	 * @version 1.0
	 */
	function kbttc_init() {

		// 'kbttc_init' action to add functions in 'init'.
		do_action( 'kbttc_init' );
	}
}
add_action( 'init', 'kbttc_init' );
