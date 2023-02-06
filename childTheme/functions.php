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
/*Custom Post type news start*/
function cw_post_type_news() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('news', 'plural'),
    'singular_name' => _x('news', 'singular'),
    'menu_name' => _x('news', 'admin menu'),
    'name_admin_bar' => _x('news', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New news'),
    'new_item' => __('New news'),
    'edit_item' => __('Edit news'),
    'view_item' => __('View news'),
    'all_items' => __('All news'),
    'search_items' => __('Search news'),
    'not_found' => __('No news found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'news'),
    'has_archive' => true,
    'hierarchical' => false,
    );
    register_post_type('news', $args); //registering post type
    }
    // Hooking up our function to theme setup
    add_action('init', 'cw_post_type_news');
    /*Custom Post type end*/

?>