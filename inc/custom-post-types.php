<?php

/*
 * Register Post type + Taxonomies
 */
add_action('init', 'star_products_post_type_and_taxes');
function star_products_post_type_and_taxes() {
  register_post_type('products', array(
    'label' => 'Star Products',
    'description' => 'A post type, taxonomy and templates for Star Products.',
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'rest_base' => 'products',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => true,
    'rewrite' => array('slug' => 'products', 'with_front' => true),
    'query_var' => true,
    'menu_icon' => 'dashicons-star-filled',
    'supports' => array('title','editor','excerpt','thumbnail'),
    'labels' => array (
      'name' => 'Star Products',
      'singular_name' => 'product',
      'menu_name' => 'Star Products',
      'add_new' => 'Add Product',
      'add_new_item' => 'Add New product',
      'edit' => 'Edit',
      'edit_item' => 'Edit Product',
      'new_item' => 'New Product',
      'view' => 'View product',
      'view_item' => 'View Product',
      'search_items' => 'Search Products',
      'not_found' => 'No Products Found',
      'not_found_in_trash' => 'No Products Found in Trash',
      'parent' => 'Parent product',
      )
    ));

    register_taxonomy( 'product_categories',array (
      0 => 'products',
    ),
    array(
      'show_in_rest' => true,
      'rest_base' => 'product-categories',
      'rest_controller_class' => 'WP_REST_Terms_Controller',
      'hierarchical' => true,
        'label' => 'Product Categories',
        'show_ui' => true,
        'query_var' => true,
        'show_admin_column' => false,
        'labels' => array (
          'search_items' => 'Product Category',
          'popular_items' => '',
          'all_items' => 'View All',
          'parent_item' => 'Choose Parent',
          'parent_item_colon' => '',
          'edit_item' => 'Edit Product',
          'update_item' => 'Update Product',
          'add_new_item' => 'Add New',
          'new_item_name' => 'New Product Name',
          'separate_items_with_commas' => '',
          'add_or_remove_items' => 'Add or Remove',
          'choose_from_most_used' => '',
        )
    ));
}

?>
