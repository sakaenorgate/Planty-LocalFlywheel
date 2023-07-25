<?php
/* enqueue scripts and style from parent theme */        
function twentytwenty_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
   wp_enqueue_style( 'child-style', get_template_directory_uri() . '/style.css', false, filemtime( get_stylesheet_directory() .'/style.css' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'twentytwenty_styles', 999);


// add_action('set_current_user', 'ed_hide_admin_bar');
// function ed_hide_admin_bar() {
//   if (!current_user_can('edit_posts')) {
//     show_admin_bar(false);
//   }




// add_shortcode ('input_number','input_number_func');

// function input_number_func()
// {
   
// }
?>
