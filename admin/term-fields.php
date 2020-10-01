<?php
/**
 * Custom term fields
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kantbtrue
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_add_term_fields' ) ) {
	/**
	 * Add fields after the 'Add Term' form fields[taxonomy page]
	 */
	function kbttc_add_term_fields() {

		// Globals.
		global $kbttc_opts;

		$output = '';
		ob_start();
		wp_nonce_field( 'kbttc_term_color_verify', 'kbttc_nonce' );
		?>
		<div class="form-field">
			<label for="kbttc-term-color"><?php esc_html_e( 'Color', 'kbttc-term-color' ); ?></label>
			<input type="color" name="kbttc_term_color" id="kbttc-term-color" value="<?php echo esc_attr( $kbttc_opts['default_color'] ); ?>">
		</div>
		<?php
		$output = ob_get_clean();
		echo $output;
	}
}

if ( ! function_exists( 'kbttc_edit_term_fields' ) ) {
	/**
	 * Add fields after the 'Edit Term' form fields[taxonomy edit page]
	 *
	 * @param object $taxonomy Taxonomy object.
	 */
	function kbttc_edit_term_fields( $taxonomy ) {

		// Globals.
		global $kbttc_opts;

		$output      = '';
		$kbttc_color = kbttc_get_term_color( $taxonomy->term_id ) ?? $kbttc_opts['default_color'];
		ob_start();
		wp_nonce_field( 'kbttc_term_color_verify', 'kbttc_nonce' );
		?>
		<tr class="form-field">
			<th scope="row">
				<label for="kbttc-term-color"><?php esc_html_e( 'Color', 'kbttc-term-color' ); ?></label>
			</th>
			<th scope="row">
				<input type="color" name="kbttc_term_color" id="kbttc-term-color" value="<?php echo esc_attr( $kbttc_color ); ?>">
			</th>
		</tr>
		<?php
		$output = ob_get_clean();
		echo $output;
	}
}
