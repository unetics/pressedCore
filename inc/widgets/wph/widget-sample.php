<?php
// Require WPH_Widget Class
include_once( plugin_dir_path( __FILE__ ).'src/wph-widget-class.php' );

// Check if the custom class exists
if ( ! class_exists( 'MV_My_Recent_Posts_Widget' ) ) 
{
	// Create custom widget class extending WPH_Widget
	class MV_My_Recent_Posts_Widget extends WPH_Widget
	{
	
		function __construct()
		{
		
			// Configure widget array
			$args = array( 
				
				'label' => 'My Recent Poos', // Widget Backend label											
				'description' =>'My Recent Posts Widget Description', // Widget Backend Description		
			 );
		
			// Configure the widget fields

			// fields array
			$args['fields'] = array( 							
			
				// Title field
				array( 						
				'name' 		=> 'Title', // field name/label							
				'desc' 		=> 'Enter the widget title.', // field description
				'id' 		=> 'title', // field id							
				'type'		=>'textarea', // field type ( text, checkbox, textarea, select, select-group )					
				'class' 	=> 'widefat', // class, rows, cols					
				'std' 		=> 'Recent Posts', // default value			
				'validate' => 'alpha_dash', // See Readme for types				
				'filter' => 'strip_tags|esc_attr'	//Filter data before entering the DB
				 ), 
			
				// Amount Field
				array( 
				'name' => 'Amount', 							
				'desc' => 'Select how many posts to show.', 
				'id' => 'amount', 							
				'type'=>'select', 				
				// selectbox fields			
				'fields' => array( 								
						array( 
							'name'  => '1 Post', // option name
							'value' => '1' 	// option value						
						 ), 
						array( 
							'name'  => '2 Posts', 			
							'value' => '2' 					
						 ), 
						array( 
							'name'  => '3 Posts', 
							'value' => '3'	
						 )
				 ), 
				'validate' => 'my_custom_validation', 
				'filter' => 'strip_tags|esc_attr', 
				 ), 
				
				// Output type checkbox
				array( 
				'name' => __( 'Output as list', 'mv-my-recente-posts' ), 							
				'desc' => __( 'Wraps posts with the <li> tag.', 'mv-my-recente-posts' ), 
				'id' => 'list', 							
				'type'=>'checkbox', 				
				// checked by default: 
				'std' => 1, // 0 or 1
				'filter' => 'strip_tags|esc_attr', 
				 ), 
			
				// add more fields
			
			 ); // fields array

			// create widget
			$this->create_widget( $args );
		}
		
		// Custom validation for this widget 
		
		function my_custom_validation( $value )
		{
			if ( strlen( $value ) > 1 )
				return false;
			else
				return true;
		}
		
		// Output function

		function widget( $args, $instance )
		{
	
			// And here do whatever you want
	
			$out  = $args['before_title'];
			$out .= $instance['title'];
			$out .= $args['after_title'];
				
			// here you would get the most recent posts based on the selected amount: $instance['amount'] 
			// Then return those posts on the $out variable ready for the output
			
			$out .= '<p>Hey There! </p>';

			echo $out;
		}
	
	} // class

	// Register widget
	if ( ! function_exists( 'mv_my_register_widget' ) )
	{
		function mv_my_register_widget()
		{
			register_widget( 'MV_My_Recent_Posts_Widget' );
		}
		add_action( 'widgets_init', 'mv_my_register_widget', 1 );
	}
}