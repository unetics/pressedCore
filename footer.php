<?php
switch (tr_option_field("[footer]")) {
	case "rhwa":
    	get_template_part( 'footer/rhwa' );      
	break;
	case "3col":
    	get_template_part( 'footer/3col' );      
	break;
	case "none":
	// 	Do Nothing
		get_template_part( 'footer/none' );  
	break;			
    
    default:
    	get_template_part( 'footer/base' );
}   
?>    

</body>
</html>