<?php
require_once 'css-crush/CssCrush.php';

function scripts() {
wp_enqueue_script('jquery'); 
wp_enqueue_script( 'js', get_template_directory_uri() . '/js/site.min.js');
}
add_action('wp_enqueue_scripts', 'scripts', 100);


function register_main_menus() {
	register_nav_menus( array( 
						'primary-menu' 		=> 'Primary Menu',
						'footer-menu' 		=> 'footer-menu',
	 ) );
}
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

require('_ps/init.php'); 

add_theme_support( 'post-thumbnails' );

if (is_admin()) {
     require('_admin/functions.php');    
}

require('pageBuilder/init.php');

// set permalink structure
function set_permalink(){
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
}
add_action('init', 'set_permalink');

// Add Analytics to footer
function add_googleanalytics() { 
	get_template_part('partials/analitics');
}
add_action('wp_footer', 'add_googleanalytics');	

// Activate Slabtext
function add_slabtext() { 
	echo "<script> jQuery(':header.fit').slabText(); </script>";
}
add_action('wp_footer', 'add_slabtext');	
