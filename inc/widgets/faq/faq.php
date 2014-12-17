<?php
/*
Plugin Name: faq Widget
Version: 1.2.2
Description: a faq
Author: Mitchell Bray
*/
class faq extends WP_Widget {
		public function __construct() {
			// Instantiate the parent object
			parent::__construct(
				'faq', // Base ID
				'faq', // Name
				array('description' => 'Create a faq'), // Args
				array('width' => 600, 'height' => 550)
			);
				// Register styles
				add_action('admin_print_styles', array( $this, 'register_admin_styles'));
				// Register scripts
				add_action('admin_enqueue_scripts', array( $this, 'register_admin_scripts'));
				add_action('wp_enqueue_scripts', array( $this, 'register_widget_scripts'));
		}

		public function widget($args, $instance) {
		$args = array( 
			'post_type' => 'faq', 
			'post_child' => 0, 
			'orderby' => 'menu_order',
			'order' => 'ASC', 
			'posts_per_page' => -1  
			);
			$the_query = new WP_Query( $args );
		
			echo $args['before_widget'];	
			include(__DIR__.'/views/widget.php');
			echo $args['after_widget'];
		}

		public function form($instance) {
			echo('no settings here, to add more go to the FAQ section');
		}

		public function update($new_instance, $old_instance) {
			$instance = $old_instance;
			return $instance;
		}
		function register_admin_styles(){}
		function register_admin_scripts(){}
		function register_widget_scripts(){	}		
	}

$faq = get_posts( array('post_type' => 'FAQ', 'posts_per_page' => -1) );
if($faq) { 
	// Only load widget if faq's exist
	add_action('widgets_init', create_function('', 'register_widget("faq");'));
};