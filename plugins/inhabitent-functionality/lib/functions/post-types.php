<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Add your custom post types here...
// Register Custom Post Type
function inhabitent_cpt_product() {
  
    $labels = array(
      'name'                  => 'Products',
      'singular_name'         => 'Product',
      'menu_name'             => 'Products',
      'name_admin_bar'        => 'Product',
      'archives'              => 'Product Archives',
      'attributes'            => 'Product Attributes',
      'parent_item_colon'     => 'Parent Product:',
      'all_items'             => 'All Products',
      'add_new_item'          => 'Add New Products',
      'add_new'               => 'Add New',
      'new_item'              => 'New Product',
      'edit_item'             => 'Edit Product',
      'update_item'           => 'Update Product',
      'view_item'             => 'View Product',
      'view_items'            => 'View Products',
      'search_items'          => 'Search Product',
      'not_found'             => 'Not found',
      'not_found_in_trash'    => 'Not found in Trash',
      'featured_image'        => 'Featured Image',
      'set_featured_image'    => 'Set featured image',
      'remove_featured_image' => 'Remove featured image',
      'use_featured_image'    => 'Use as featured image',
      'insert_into_item'      => 'Insert into Product',
      'uploaded_to_this_item' => 'Uploaded to this product',
      'items_list'            => 'Products list',
      'items_list_navigation' => 'Products list navigation',
      'filter_items_list'     => 'Filter products list',
    );
    $args = array(
      'label'                 => 'Product',
      'description'           => 'Custom Product Post Type',
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
      'hierarchical'          => true,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-carrot',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,		
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'post',
      'show_in_rest'          => true,
    );
    register_post_type( 'product', $args );

    // Clear Permalinks
    flush_rewrite_rules();
  
  }
  add_action( 'init', 'inhabitent_cpt_product', 0 );