<?php
/**
 * Plugin action links
 *
 * Filters the action links displayed for plugin in the plugins list table
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kanttrue
 * @license GPL-2.0-or-later
 */

if ( ! function_exists( 'kbttc_settings_link' ) ) {
	/**
	 * Settings page link/action link in plugin list
	 *
	 * @param array $links Links array.
	 */
	function kbttc_settings_link( $links ) {
		$settings_link = '<a href="admin.php?page=kbttc_settings">Settings</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}
add_filter( 'plugin_action_links_' . KBTTC_PLUGIN_BASENAME, 'kbttc_settings_link' );
