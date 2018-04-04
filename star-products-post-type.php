<?php
/**
  * Plugin Name: Star Plastics Products Post Type
  * Plugin URI:
  * Description: Creates Products custom post types & taxonomies.
  * Version: 1.0
  * Author: Zylo, LLC
  * Author URI: https://zylocod.es
  * License: GPL2
  */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

//* include Custom Post Types & Taxonomies
include( plugin_dir_path( __FILE__ ) . 'inc/custom-post-types.php');

/*
 * Styles & Scripts
 */
function mma_register_scripts_and_styles() {
  global $post;
  wp_register_style( 'star-products-post-type-styles', plugins_url( 'css/main.css',  __FILE__ ));
  wp_register_script( 'shuffle-js', plugin_dir_url( __FILE__ ) . 'js/shuffle.min.js', '', '', true );
  wp_register_script( 'main-js', plugin_dir_url( __FILE__ ) . 'js/main.js', '', '', true );

   // load only on this post type
   if ( is_post_type_archive ( 'products' ) || $post->post_type == "products" ) {
     wp_enqueue_style( 'star-products-post-type-styles');
     wp_enqueue_script('shuffle-js');
     wp_enqueue_script('main-js');
   }
}
add_action('wp_enqueue_scripts', 'mma_register_scripts_and_styles');



/*
 * Load the archive and single templates
 */
function load_star_products_archive_template( $archive_template ) {
  global $post;
  if ( is_post_type_archive ( 'products' ) ) {
    $archive_template = plugin_dir_path( __FILE__ ) . '/templates/archive-products.php';
  }
  return $archive_template;
}
add_filter( 'archive_template', 'load_star_products_archive_template' ) ;



function load_star_products_single_template($template) {
  global $post;
  if ($post->post_type == "products" && $template !== locate_template(array("single-product.php"))) {
    return plugin_dir_path( __FILE__ ) . "/templates/single-product.php";
  }
  return $template;
}
add_filter('single_template', 'load_star_products_single_template');

?>
