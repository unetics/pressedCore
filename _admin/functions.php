<?php

function load_custom_wp_admin_style() {
		wp_enqueue_style( 'admin', get_template_directory_uri() . '/_admin/assets/css/admin.css');
        wp_enqueue_script('admin', get_template_directory_uri() . '/_admin/assets/js/admin.min.js', array('jquery'), '1.0.0' );
}			
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/* admin check */
if ( current_user_can( 'manage_options' ) ) {

/*  Register our sidebars and widgetized areas. */
function widgets_init() { register_sidebar(); }
add_action( 'widgets_init', 'widgets_init' );

} else {
    /* A user without admin privileges */
}
