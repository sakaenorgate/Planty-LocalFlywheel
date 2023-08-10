<?php
/* enqueue scripts and style from parent theme */        
function twentytwenty_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_template_directory_uri() . '/style.css', false, filemtime( get_stylesheet_directory() .'/style.css' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'twentytwenty_styles', 999);



/* Register style sheet */
add_action( 'wp_print_styles', 'google_fonts' );

function google_fonts() {
    wp_register_style( 'Syne', '//fonts.googleapis.com/css?family=Ubuntu:400,400i,700' );
    wp_enqueue_style( 'Syne' );
}


/* Register contact form7 */
add_filter( 'wpcf7_form_elements', 'delicious_wpcf7_form_elements' );
 
function delicious_wpcf7_form_elements( $form ) {
    $form = do_shortcode( $form );
    return $form;
}


/* Hook for Admin menu */
add_filter('wp_nav_menu_objects', 'ad_filter_menu', 10, 2);
function ad_filter_menu($sorted_menu_objects, $args) {
    if ($args->theme_location != 'primary')  
        return $sorted_menu_objects;

    /* replace the menu item that has a title of 'Admin' by '' */
        if (!is_user_logged_in()) {
            foreach ($sorted_menu_objects as $key => $menu_object) {
                if ($menu_object->title == 'Admin') {
                    $menu_object->title = '';
                }
            }
        }
    return $sorted_menu_objects;
}


?>
