<?php
include_once 'widget_html.php';
function load_custom_wp_admin_style() {
		wp_enqueue_style( 'admin', get_template_directory_uri() . '/_admin/assets/css/admin.css');
        wp_enqueue_script('admin', get_template_directory_uri() . '/_admin/assets/js/admin.min.js', array('jquery'), '1.0.0' );
}			
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/* admin check */
if ( current_user_can( 'manage_options' ) ) {
add_action( 'widgets_init', 'widgets_init' );
} else {
    /* A user without admin privileges */
}

function get_widget_field(){
	$html = tr_html::input('password');
	$html .= widget_html::input('password');
    $html .= '<div class="button-group">';
    $html .= tr_html::element('input', array(
      'type' => 'button',
      'class' => 'gallery-picker-button button',
      'value' => 'button'
    ));
    $html .= tr_html::element('input', array(
      'type' => 'button',
      'class' => 'gallery-picker-clear button',
      'value' => 'Clear'
    ));
    $html .= '</div>';
    return $html;
}