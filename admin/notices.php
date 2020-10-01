<?php
/**
 * Notices
 *
 * Admin notice functions
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  QDONOW
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_admin_notices' ) ) {
	/**
	 * Show admin notices
	 *
	 * @since   1.0
	 * @version 1.0
	 */
	function kbttc_admin_notices() {

		// Get the notice type.
		$notice = get_option( '_kbttc_settings_notice', false );
		delete_option( '_kbttc_settings_notice' );

		if ( 'error' === $notice ) :
			?>
			<div class="notice notice-error is-dismissible">
				<p>
					<?php esc_html_e( 'Something went wrong.', 'kbttc-term-color' ); ?>
				</p>
			</div>
			<?php
		elseif ( 'success' === $notice ) :
			?>
			<div class="notice notice-success is-dismissible">
				<p>
					<?php esc_html_e( 'Successfully updated.', 'kbttc-term-color' ); ?>
				</p>
			</div>
			<?php
		endif;
	}
}
add_action( 'admin_notices', 'kbttc_admin_notices' );
