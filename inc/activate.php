<?php
/**
 * Activate
 *
 * Run at the time of plugin activation
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  QDONOW
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_activate' ) ) {
	/**
	 * Run on plugin activation
	 *
	 * @since   1.0
	 * @version 1.0
	 */
	function kbttc_activate() {

		// Check required WordPress version.
		if ( version_compare( get_bloginfo( 'version' ), '5.0', '<' ) ) {
			deactivate_plugins( basename( KBTTC_PLUGIN_FILE ) );
			wp_die( esc_html__( 'Update WordPress version to use this plugin.', 'kbttc-term-color' ) );
		}
	}
}
register_activation_hook( KBTTC_PLUGIN_FILE, 'kbttc_activate' );
