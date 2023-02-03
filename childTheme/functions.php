
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

/* USING HOOKS */

    add_action('save_post', 'log_when_saved'); //USING ACTION HOOK WHEN POST IS SAVED

    function log_when_saved( $post_id ){ //CUSTOM FUNCTION TO HOOK TO AN ACTION
        
        if( !(wp_is_post_revision($post_id)) || wp_is_post_autosave($post_id)){ //CONDTION TO CHECK IF POST IS AUTO SAVED OR DRAFTED
            return;
        }

        

        $post_log = get_stylesheet_directory().'/post_log.txt'; //GET PATH OF POST_LOG TEXT FILE
        $msg = get_the_title( $post_id ).' was saved';

        if (file_exists($post_log)){ //CONDITION TO CHECK FILE EXISTS OR NOT
            $file = fopen($post_log, 'a');
            fwrite($file, $msg." ");
        }
        else
        {
            $file = fopen($post_log, 'w');
            fwrite($file, $msg." ");
        }

        fclose($file);
        do_action('get_time', date("F j, Y, g:i a")); //CALL TO OUR ACTION HOOKED FUNCTION AND PASS DATE AS PARAM
    }

    add_action('get_time', 'log_time');

    function log_time( $time ){
        $post_log = get_stylesheet_directory().'/post_log.txt';
        $msg = apply_filters('log_msg_using_filter', 'and filter hook executed at '.$time); //CALL TO OUR FILTER HOOKED FUNCTION

        if (file_exists($post_log)){
            $file = fopen($post_log, 'a');
            fwrite($file, $msg."\n");
        }
        else
        {
            $file = fopen($post_log, 'w');
            fwrite($file, $msg."\n");
        }
        
    }

    add_filter('log_msg_using_filter', function( $msg ){ //FILTER HOOK
        return " ".$msg." ";
    });
?>



