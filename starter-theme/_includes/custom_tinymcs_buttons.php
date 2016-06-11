<?php
// Create customer TinyMCE buttons
function add_plugin( $plugin_array ) {
	$plugin_array['videoButton'] = get_template_directory_uri() . '/js/admin/tinymce_video_button.js';
	$plugin_array['regularButton'] = get_template_directory_uri() . '/js/admin/tinymce_button.js';

	$plugin_array['twitterButton'] = get_template_directory_uri() . '/js/admin/tinymce_button-twitter.js';
	$plugin_array['facebookButton'] = get_template_directory_uri() . '/js/admin/tinymce_button-facebook.js';
	$plugin_array['instagramButton'] = get_template_directory_uri() . '/js/admin/tinymce_button-instagram.js';

	return $plugin_array;
}

function register_tinymce_buttons( $buttons ){
	array_push($buttons, "videoButton");
	array_push($buttons, "regularButton");

	array_push($buttons, "twitterButton");
	array_push($buttons, "facebookButton");
	array_push($buttons, "instagramButton");

	return $buttons;
}

function aichotelgroup_posts_button() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		return;
	}

	if ( get_user_option('rich_editing') == 'true' ) {
		add_filter( 'mce_external_plugins', 'add_plugin' );
		add_filter( 'mce_buttons', 'register_tinymce_buttons' );
	}
}

add_action('init', 'aichotelgroup_posts_button');


// Pull Quote Shortcode
function videoButtonShortcode($atts, $content = "" ){
	$videoBtn = '<a data-videoId="'.$atts['video'].'" class="icon icon-video video-link" data-modal="video">'.$content.'</a>';
	return preg_replace("#\r|\n|\t#", "", $videoBtn);
}

function regularButtonShortcode($atts, $content = "" ){
	$color = ($atts['color']!='') ?  ' button-'.$atts['color'] : '';
	$btn = '<a href="'.$atts['url'].'" class="button'.$color.'">'.$content.'</a>';
	return preg_replace("#\r|\n|\t#", "", $btn);
}

function twitterButtonShortcode($atts, $content = "" ){
	$btn = '<a href="'.$atts['url'].'" title="Twitter" class="link-icon" target="_blank"><span>Twitter</span>
		<svg viewBox="0 0 32 32" class="icon icon-small icon-twitter">
		  <use xlink:href="#icon-twitter"></use>
		</svg>
	</a>';
	return preg_replace("#\r|\n|\t#", "", $btn);
}

function facebookButtonShortcode($atts, $content = "" ){
	$btn = '<a href="'.$atts['url'].'" title="Facebook" class="link-icon" target="_blank"><span>Facebook</span>
		<svg viewBox="0 0 32 32" class="icon icon-small icon-facebook">
		  <use xlink:href="#icon-facebook"></use>
		</svg>
	</a>';
	return preg_replace("#\r|\n|\t#", "", $btn);
}

function instagramButtonShortcode($atts, $content = "" ){
	$btn = '<a href="'.$atts['url'].'" title="Instagram" class="link-icon" target="_blank"><span>Instagram</span>
		<svg viewBox="0 0 32 32" class="icon icon-small icon-instagram">
		  <use xlink:href="#icon-instagram"></use>
		</svg></a>';
	return preg_replace("#\r|\n|\t#", "", $btn);
}


add_shortcode('videoButton', 'videoButtonShortcode');
add_shortcode('button', 'regularButtonShortcode');

add_shortcode('twitter', 'twitterButtonShortcode');
add_shortcode('facebook', 'facebookButtonShortcode');
add_shortcode('instagram', 'instagramButtonShortcode');

?>
