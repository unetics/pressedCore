<?php
switch (tr_option_field("[nav]")) {
	case "fixed":
    	get_template_part( 'nav/fixed' );      
	break;
	case "none":
	// 	Do Nothing
		get_template_part( 'nav/none' );  
	break;			
    
    default:
    	get_template_part( 'nav/head' );
}       