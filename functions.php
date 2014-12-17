<?php
	
function register_main_menus() {
	register_nav_menus( array( 
						'primary-menu' 		=> 'Primary Menu',
						'footer-menu' 		=> 'footer-menu',
	 ) );
}
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );


// require('_core/init.php'); 
/* include pressed sites framework (stolen from typerocket)  */
require('_ps/init.php'); 

add_theme_support( 'post-thumbnails' );

if (is_admin()) {
     require('admin/functions.php');
     
}
require('pageBuilder/init.php');
require('nav/init.php');

// set permalink
function set_permalink(){
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
}
add_action('init', 'set_permalink');

function add_googleanalytics() { 
	get_template_part('partials/analitics');
}
add_action('wp_footer', 'add_googleanalytics');	


function get_version()
{
	if ( ! empty( wp_get_theme()->parent()->Version ) )
	{
	return wp_get_theme()->parent()->Version;
	}
	else
	{
	return wp_get_theme()->Version;
	}
}


