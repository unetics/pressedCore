<?php

add_shortcode('row', function($atts, $content){
if( !isset($atts['class']) ) $atts['class'] = '';
		extract( shortcode_atts( array(), $atts ) );

return '<div class="row">'.do_shortcode($content).'</div>';

});


add_shortcode('col', function($atts, $content){
if( !isset($atts['class']) ) $atts['class'] = '';
		extract( shortcode_atts( array(
		'small' => '12',
		'large' => '12',
		'class' => ''
	), $atts ) );

return '<div class="column small-'.$small.' large-'.$large.' '.$class.'">'.do_shortcode($content).'</div>';

});