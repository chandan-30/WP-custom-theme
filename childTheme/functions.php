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