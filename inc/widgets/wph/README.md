#  WordPress Widgets Helper Class

## Summary

A class that extends the built-in WP_Widget class to provide an easier/faster way to create Widgets for WordPress.

### Features

Automatic fields creation  
Validation methods  
Filter methods  
Before/After form output methods  
Custom form fields creation   

Check the inline comments and Widget sample for more information.

### Roadmap / Wishlist

More Custom fields 
[Widget Logic](http://wordpress.org/extend/plugins/widget-logic/ "Widget Logic") alike functionality  

### Version

1.6

### License

GPLv2  

### Credits

by @sksmatt  
www.mattvarone.com

Contributors:

Joachim Kudish ( @jkudish )  
Joaquin http://bit.ly/p18bOk  
markyoungdev http://bit.ly/GK6PwU


Set the field validation type/s
///////////////////////////////

'alpha_dash'			
Returns FALSE if the value contains anything other than alpha-numeric characters, underscores or dashes.

'alpha'				
Returns FALSE if the value contains anything other than alphabetical characters.

'alpha_numeric'		
Returns FALSE if the value contains anything other than alpha-numeric characters.

'numeric'				
Returns FALSE if the value contains anything other than numeric characters.

'boolean'				
Returns FALSE if the value contains anything other than a boolean value ( true or false ).

----------

You can define custom validation methods. Make sure to return a boolean ( TRUE/FALSE ).
Example:

'validate' => 'my_custom_validation', 

Will call for: $this->my_custom_validation( $value_to_validate );	

				
				/*
				
					Filter data before entering the DB
					//////////////////////////////////
					
					strip_tags ( default )
					wp_strip_all_tags
					esc_attr
					esc_url
					esc_textarea
					
				*/