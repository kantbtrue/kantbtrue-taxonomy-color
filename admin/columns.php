<?php
/**
 * Columns
 *
 * Add color in term column
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kanttrue
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_columns' ) ) {
	/**
	 * Modify/Reorder taxonomy columns
	 *
	 * @since   1.0
	 * @version 1.0
	 *
	 * @param array $columns An array of columns.
	 */
	function kbttc_columns( $columns ) {
		$columns['color'] = __( 'Color', 'kbttc-term-color' );
		return $columns;
	}
}

if ( ! function_exists( 'kbttc_set_columns' ) ) {
	/**
	 * Set value for custom columns in taxonomy
	 *
	 * @since   1.0
	 * @version 1.0
	 *
	 * @param string $string    Blank string.
	 * @param string $column    The name of the column to display.
	 * @param int    $term_id   The ID of the current term.
	 */
	function kbttc_set_columns( $string, $column, $term_id ) {

		// Globals.
		global $kbttc_opts;

		$default_color    = $kbttc_opts['default_color'] ?? '#000000';
		$kbttc_term_color = kbttc_get_term_color( $term_id );

		if ( 'color' === $column ) {
			if ( empty( $kbttc_term_color ) ) {
				echo '<div class="kbttc-term-circle" style="border: 1px solid ' . esc_attr( $default_color ) . '"></div>';
			} else {
				echo '<div class="kbttc-term-circle" style="background-color: ' . esc_attr( $kbttc_term_color ) . '"></div>';
			}
		}
	}
}
