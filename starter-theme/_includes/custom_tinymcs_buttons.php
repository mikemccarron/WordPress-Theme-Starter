<?php
// Create customer TinyMCE buttons
function add_plugin( $plugin_array ) {
	$plugin_array['regularButton'] = get_template_directory_uri() . '/js/admin/tinymce_button.js';

	return $plugin_array;
}

function register_tinymce_buttons( $buttons ){
	array_push($buttons, "regularButton");
	return $buttons;
}

function wp_posts_button() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		return;
	}

	if ( get_user_option('rich_editing') == 'true' ) {
		add_filter( 'mce_external_plugins', 'add_plugin' );
		add_filter( 'mce_buttons', 'register_tinymce_buttons' );
	}
}

add_action('init', 'wp_posts_button');


// Pull Quote Shortcode
function regularButtonShortcode($atts, $content = "" ){
	$color = ($atts['color']!='') ?  ' button-'.$atts['color'] : '';
	$btn = '<a href="'.$atts['url'].'" class="button'.$color.'">'.$content.'</a>';
	return preg_replace("#\r|\n|\t#", "", $btn);
}

add_shortcode('button', 'regularButtonShortcode');

?>
