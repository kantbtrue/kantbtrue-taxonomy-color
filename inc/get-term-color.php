<?php
/**
 * Get term color
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kantbtrue
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_get_term_color' ) ) {
	/**
	 * Get term color
	 *
	 * @param int $term_id Term ID. Default NULL.
	 *
	 * @return string
	 */
	function kbttc_get_term_color( $term_id = null ) {

		// Get term id, if is a taxonomy page. 
		if ( ! $term_id && ( is_tax() || is_tag() || is_category() ) ) {
			$term = get_queried_object();
			if ( $term ) {
				$term_id = $term->term_id;
			}
		}

		$color = get_metadata( 'term', $term_id, '_kbttc_term_color', true );
		if ( isset( $color ) && ! empty( $color ) ) {
			return $color;
		}
	}
}
