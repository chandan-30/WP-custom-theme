<?php    
function twentytwentyone_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
    array( 'twenty-twenty-one-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyone_styles');
?>

<?php
// Register Sidebars
//A custom widget area added into the child's custom template
function custom_sidebars() {
  
    $args = array(
        'id'            => 'custom_sidebar',
        'name'          => __( 'Custom Widget Area', 'text_domain' ),
        'description'   => __( 'A custom widget area', 'text_domain' ),
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
    );
    register_sidebar( $args );
  
}
add_action( 'widgets_init', 'custom_sidebars' );
?>

<?php 
    /*
* Plugin Name: Topic Taxonomy
* Description: Topic Taxonomy.
* Version: 1.0
* Author: Chandan
* Author URI: ''
*/

function wporg_register_taxonomy_Topic() {
    $labels = array(
        'name'              => _x( 'Topics', 'taxonomy general name' ),
        'singular_name'     => _x( 'Topic', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Topics' ),
        'all_items'         => __( 'All Topics' ),
        ''       => __( 'Parent Topic' ),
        'parent_item_colon' => __( 'Parent Topic:' ),
        'edit_item'         => __( 'Edit Topic' ),
        'update_item'=> __( 'Update Topic' ),
        'add_new_item'      => __( 'Add New Topic' ),
        'new_item_name'     => __( 'New Topic Name' ),
        'menu_name'         => __( 'Topic' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'Topic' ],
    );
    register_taxonomy( 'Topic', [ 'news' ], $args );
}
add_action( 'init', 'wporg_register_taxonomy_Topic' );
?>
