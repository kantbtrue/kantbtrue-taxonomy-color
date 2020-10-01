# Kantbtrue Taxonomy Color

## Description
Kantbtrue Taxonomy Color Plugin is a simple lightweight plugin which allows you to add color in each taxonomy. Which means you can add the feature to the catagories, tags and other tabonomies to add colors. It simply save the color on your database and also gives you color swatch to change it whenever you want without any hazzle.

## Features
- Add color to taxonomies

## Installation
1. Install the plugin
1. Go to WordPress dashboard > Plugins > Installed Plugins
1. Activate the **Kantbtrue Taxonomy Color**

## Frequently ed Questions

### How to use the plugin?
use the following code in category or taxonomy template
```PHP
<?php if ( function_exists( 'kbttc_get_term_color' ) ) echo kbttc_get_term_color(); ?>
```

### How to use the plugin to output color for custom taxonomy or in loop?
use the following code
```PHP
<?php if ( function_exists( 'kbttc_get_term_color' ) ) echo kbttc_get_term_color( $term_id ); ?>
```
`$term_id` is taxonomy id.
