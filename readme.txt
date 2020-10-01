=== Kantbtrue Taxonomy Color ===
Contributors: kantbtrue
Tags: taxonomy color, category color, tag color
Requires at least: 5.0
Tested up to: 5.5.1
Requires PHP: 7.0
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A lightweight simple plugin helps you to add color in taxonomies.

== Description ==
Kantbtrue Taxonomy Color Plugin is a simple lightweight plugin which allows you to add color in each taxonomy. Which means you can add the feature to the categories, tags and other taxonomies to add colors. It simply saves the color on your database and also gives you color swatch to change it whenever you want without any hassle.

Features::
- Add color to taxonomies

== Installation ==
1. Install the plugin
1. Go to WordPress dashboard > Plugins > Installed Plugins
1. Activate the 'Kantbtrue Taxonomy Color'
1. Go to plugin settings

== Frequently Asked Questions ==
= How to use the plugin? =
use the following code in category or taxonomy template
```PHP
<?php if ( function_exists( 'kbttc_get_term_color' ) ) echo kbttc_get_term_color(); ?>
```
= How to use the plugin to output color for custom taxonomy or in loop? =
use the following code
```PHP
<?php if ( function_exists( 'kbttc_get_term_color' ) ) echo kbttc_get_term_color( $term_id ); ?>
```
`$term_id` is taxonomy id.

== Screenshots ==
1. Settings page
2. Add form
4. All taxonomy page
3. Edit form
5. Plugin in action

== Changelog ==
= 1.0 =
- Initial release