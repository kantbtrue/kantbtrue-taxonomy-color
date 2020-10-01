<?php
/**
 * @package KBTTC_Taxonomy_Color
 */

/**
 * Plugin Name: Kantbtrue Taxonomy Color
 * Plugin URI: https://wordpress.org/plugins/kantbtrue-taxonomy-color/
 * Description: A lightweight simple plugin helps you to add color in taxonomies.
 * Version: 1.0
 * Author: kantbtrue
 * Author URI: http://twitter.com/kantbtrue
 * includes at least: 5.0
 * includes PHP: 7.0
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: kbttc-term-color
 * Domain Path: /languages
 */

// If directly access the plugin then abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Constants.
if ( ! defined( 'KBTTC_PLUGIN_DIR' ) ) {
	define( 'KBTTC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'KBTTC_PLUGIN_URL' ) ) {
	define( 'KBTTC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'KBTTC_PLUGIN_FILE' ) ) {
	define( 'KBTTC_PLUGIN_FILE', __FILE__ );
}
if ( ! defined( 'KBTTC_VERSION' ) ) {
	define( 'KBTTC_VERSION', '1.0' );
}
if ( ! defined( 'KBTTC_PLUGIN_BASENAME' ) ) {
	define( 'KBTTC_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

// Global variables.
$kbttc_default_opts = array(
	'default_color' => '#000000',
	'taxonomies'    => array(
		'nav_menu',
		'link_category',
		'post_format',
	),
);
$kbttc_opts = get_option( '_kbttc_options', $kbttc_default_opts );// plugin options.

// Includes.
include KBTTC_PLUGIN_DIR . 'inc/activate.php';
include KBTTC_PLUGIN_DIR . 'inc/init.php';
include KBTTC_PLUGIN_DIR . 'inc/get-term-color.php';

if ( is_admin() ) {
	include KBTTC_PLUGIN_DIR . 'admin/enqueue.php';
	include KBTTC_PLUGIN_DIR . 'admin/notices.php';
	include KBTTC_PLUGIN_DIR . 'admin/columns.php';
	include KBTTC_PLUGIN_DIR . 'admin/term-fields.php';
	include KBTTC_PLUGIN_DIR . 'admin/init.php';
	include KBTTC_PLUGIN_DIR . 'admin/options.php';
	include KBTTC_PLUGIN_DIR . 'process/save-term-color.php';
	include KBTTC_PLUGIN_DIR . 'admin/action-links.php';
}
