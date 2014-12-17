<?php
/*
Plugin Name: Panel Widget
Version: 1.2.2
Description: a panel
Author: Mitchell Bray
*/
class imagePanel extends WP_Widget {

		public function __construct() {
			// Instantiate the parent object
			parent::__construct(
				'imagePanel', // Base ID
				'Image Panel', // Name
				array('description' => 'Create a Image Panel')
			);
			
		}

		public function widget($args, $instance) {
			echo $args['before_widget'];
			extract($instance);	
			include(__DIR__.'/views/widget.php');
			echo $args['after_widget'];
		}

		public function form($instance) {
			$instance = wp_parse_args((array)$instance, 
				array(
					// Heading
					'heading' => '',
					'headingType' => 'h3',
					'headingAlign' => 'center',
					// Content
					'content' => '',
					// Style
					'style' 		=> '',
					'paddingTop' 	=> '',
					'paddingBottom' => '',
					'img' => '',
				));
				extract($instance);
			include(__DIR__.'/views/admin.php');
		}

		public function update($new_instance, $old_instance) {
			$instance = $old_instance;			
			// Heading
			$instance['heading'] = $new_instance['heading'];
			$instance['headingType'] = $new_instance['headingType'];
			$instance['headingAlign'] = $new_instance['headingAlign'];
			// Content
			$instance['content'] = $new_instance['content'];
			// Style
			$instance['paddingTop'] = $new_instance['paddingTop'];
			$instance['paddingBottom'] = $new_instance['paddingBottom'];
			$instance['style'] = $new_instance['style'];
			$instance['img'] = $new_instance['img'];
			
			return $instance;
		}
		
		public function get_image_html( $instance, $size = 'thumbnail' ) {
		
				$output = wp_get_attachment_image($instance, $size);
			
				return $output;
		}
	}
add_action('widgets_init', create_function('', 'register_widget("imagePanel");'));

	/**
	 * Render the image html output.
	 *
	 * @param array $instance
	 * @param bool $include_link will only render the link if this is set to true. Otherwise link is ignored.
	 * @return string image html
