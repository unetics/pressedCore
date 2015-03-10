<?php
// remove the tabs
remove_filter('siteorigin_panels_widget_dialog_tabs', 'siteorigin_panels_add_widgets_dialog_tabs', 20);

// remove recomended widgets but add back the custom icons
function widgets_icons($widgets){
	$widgets['SiteOrigin_Panels_Widgets_Layout']['icon'] = 'dashicons dashicons-analytics';
	$widgets['button']['icon'] = 'dashicons dashicons-admin-links';
	$widgets['SiteOrigin_Widget_GoogleMap_Widget']['icon'] = 'dashicons dashicons-location-alt';
	return $widgets;
}
remove_filter('siteorigin_panels_widgets', 'siteorigin_widget_add_bundle_groups', 11);
add_filter('siteorigin_panels_widgets', 'widgets_icons');

function hide_layouts(){
	if ( current_user_can( 'manage_options' ) ) {
	    /* A user with admin privileges */
	}else{
		echo('<style>.so-prebuilt-add{display: none !important;} </style>');
	}

}
add_action( 'admin_print_scripts', 'hide_layouts' );

function parralax_row_style_fields($fields) {
  $fields['id'] = array(
      'name'        => 'Row id',
      'type'        => 'text',
      'group'       => 'attributes',
      'description' => 'A CSS Id',
      'priority'    => 5,
  );

  return $fields;
}

add_filter( 'siteorigin_panels_row_style_fields', 'parralax_row_style_fields' );

function parralax_row_style_attributes( $attributes, $args ) {
    if( !empty( $args['id'] ) ) {
        $attributes['id'] = $args['id'];
    }

    return $attributes;
}

add_filter('siteorigin_panels_row_style_attributes', 'parralax_row_style_attributes', 10, 2);