<?php
/**
 * Remove widget saved data from database
 *
 * @package KBTTC_Taxonomy_Color
 * @since   1.0.0
 * @version 1.0.0
 * @author  kantbtrue
 * @license GPL-2.0-or-later
 */

// If this file not called by WP, abort.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

delete_option( '_kbttc_options' );
delete_site_option( '_kbttc_options' );
delete_metadata( 'term', 0, '_kbttc_term_color', '', true );
