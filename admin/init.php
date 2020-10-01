<?php
/**
 * Admin Initialization
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kantbtrue
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_admin_init' ) ) {
	/**
	 * Initial admin settings and setup
	 *
	 * @since   1.0
	 * @version 1.0
	 */
	function kbttc_admin_init() {

		// Globals.
		global $kbttc_opts;

		// List of taxonomies.
		$temp_terms  = array_merge( get_taxonomies( array( '_builtin' => true ) ), get_taxonomies( array( '_builtin' => false ) ) );
		$kbttc_terms = array_diff( $temp_terms, $kbttc_opts['taxonomies'] );

		foreach ( $kbttc_terms as $kbttc_term ) {
			add_action( $kbttc_term . '_add_form_fields', 'kbttc_add_term_fields' );
			add_action( $kbttc_term . '_edit_form_fields', 'kbttc_edit_term_fields' );
			add_filter( 'manage_edit-' . $kbttc_term . '_columns', 'kbttc_columns' );
			add_filter( 'manage_' . $kbttc_term . '_custom_column', 'kbttc_set_columns', 10, 3 );
		}
	}
}
add_action( 'kbttc_init', 'kbttc_admin_init' );
