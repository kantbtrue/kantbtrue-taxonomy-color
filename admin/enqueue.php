<?php
/**
 * Enqueue
 *
 * Enqueue admin files
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kantbte
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_admin_scripts' ) ) {
	/**
	 * Enqueue admin scripts
	 *
	 * @since   1.0
	 * @version 1.0
	 */
	function kbttc_admin_scripts() {

		// Get the current screen object.
		$screen = get_current_screen();

		// Register style.
		wp_register_style( 'kbttc-admin', KBTTC_PLUGIN_URL . 'admin/assets/css/style.css', null, KBTTC_VERSION, 'all' );

		if ( 'term' === $screen->base || 'edit-tags' === $screen->base || 'toplevel_page_kbttc_settings' === $screen->base ) {
			wp_enqueue_style( 'kbttc-admin' );
		}
	}
}
add_action( 'admin_enqueue_scripts', 'kbttc_admin_scripts' );
