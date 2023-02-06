
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
//Enqueueing styles in childtheme

function enque_styles() { //function to enque styles
    wp_register_style('my_styles',
    'http://wpsitelocal.local/wp-content/themes/childTheme/my_styles.css'); //Registering a stylesheet
    wp_enqueue_style('my_styles'); //enqueues a stylesheet
}
add_action('wp_enqueue_scripts','enque_styles'); //action hook

?>

<?php 
//Enqueueing styles in childtheme

function enque_script() { //function to enque script
    wp_register_script('my_script',
    'http://wpsitelocal.local/wp-content/themes/childTheme/my_script.js', array(), 1.0, true); //Registering a script
    wp_enqueue_script('my_script'); //enqueues a script
}
add_action('wp_enqueue_scripts','enque_script'); //action hook

?>