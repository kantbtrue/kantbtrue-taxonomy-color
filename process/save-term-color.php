<?php
/**
 * Save term color
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kantbtrue
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_save_term_color' ) ) {
	/**
	 * Save fields value on term update[taxonomy edit page]
	 *
	 * @param int $term_id Term ID.
	 */
	function kbttc_save_term_color( $term_id ) {

		// Check for security.
		if ( ! isset( $_POST['kbttc_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['kbttc_nonce'] ), 'kbttc_term_color_verify' ) ) {
			return $term_id;
		}

		$color = isset( $_POST['kbttc_term_color'] ) ? sanitize_text_field( wp_unslash( $_POST['kbttc_term_color'] ) ) : '#000000';
		update_metadata( 'term', $term_id, '_kbttc_term_color', $color );
	}
}
add_action( 'edit_term', 'kbttc_save_term_color' );
add_action( 'create_term', 'kbttc_save_term_color' );
