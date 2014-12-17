<?php
	
function panels_row_styles($styles) {
}
add_filter('siteorigin_panels_row_styles', 'panels_row_styles');

function panels_row_style_fields($fields) {
	$fields['top_border'] = array(
		'name' => 'Top Border Color',
		'type' => 'color',
	);
	$fields['bottom_border'] = array(
		'name' => 'Bottom Border Color',
		'type' => 'color',
	);
	$fields['background'] = array(
		'name' => 'Background Color',
		'type' => 'color',
	);
	$fields['background_img'] = array(
		'name' => 'Background Image',
		'type' => 'url',
	);
	$fields['no_margin'] = array(
		'name' => 'Remove Bottom Margin',
		'type' => 'checkbox',
	);
	
	$fields['equal_height'] = array(
		'name' => 'Equal Height Blocks (only works 1 block per row)',
		'type' => 'checkbox',
	);
	$fields['full_width'] = array(
		'name' => 'Full Width Row',
		'type' => 'checkbox',
	);	return $fields;
}
add_filter('siteorigin_panels_row_style_fields', 'panels_row_style_fields');

function row_style_attributes($attr, $style) {
	$attr['style'] = '';

/* 	if(empty($attr['style'])) unset($attr['style']); */
	return $attr;
}
add_filter('siteorigin_panels_row_style_attributes', 'row_style_attributes', 10, 2);

function row_attributes($attr, $row) {
	if(!empty($row['style']['no_margin'])) {
		if(empty($attr['style'])) $attr['style'] = '';
		$attr['style'] .= 'margin-bottom: 0px;';
	}
	
	if(!empty($row['style']['top_border'])) {
		$attr['style'] .= 'border-top: 1px solid '.$row['style']['top_border'].'; ';
	} 	
	if(!empty($row['style']['bottom_border'])) {
		$attr['style'] .= 'border-bottom: 1px solid '.$row['style']['bottom_border'].'; ';
	} 	
	
	if(!empty($row['style']['background'])) {
		$attr['style'] .= 'background-color: '.$row['style']['background'].'; ';
	} 

	if(!empty($row['style']['background_img'])) {
		$attr['style'] .= 'background-image: url('.$row['style']['background_img'].');background-size: cover;';
	} 
		
	if(!empty($row['style']['equal_height'])) {
		if(empty($attr['style'])) $attr['style'] = '';
		$attr['class'] .= ' even';
	}
	if(!empty($row['style']['full_width'])) {
		if(empty($attr['style'])) $attr['style'] = '';
		$attr['class'] .= ' full';
	}
	
	return $attr;
}
add_filter('siteorigin_panels_row_attributes', 'row_attributes', 10, 2);

// remove the tabs
remove_filter('siteorigin_panels_widget_dialog_tabs', 'siteorigin_panels_add_widgets_dialog_tabs', 20);

// remove recomended widgets but add back the custom icons
function widgets_icons($widgets){
	$widgets['SiteOrigin_Panels_Widgets_Layout']['icon'] = 'dashicons dashicons-analytics';
	$widgets['button']['icon'] = 'dashicons dashicons-admin-links';
	$widgets['SiteOrigin_Widget_GoogleMap_Widget']['icon'] = 'dashicons dashicons-location-alt';
	return $widgets;
}
remove_filter('siteorigin_panels_widgets', 'siteorigin_panels_add_recommended_widgets');
remove_filter('siteorigin_panels_widgets', 'siteorigin_widget_add_bundle_groups', 11);
add_filter('siteorigin_panels_widgets', 'widgets_icons');

