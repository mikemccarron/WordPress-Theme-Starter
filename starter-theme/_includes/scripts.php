<?php
	function wptheme_scripts(){

		$dir = get_template_directory_uri();

		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', [], '3.3.1', true);
		wp_enqueue_script('jquery');

		wp_register_script('plugins', $dir.'/js/plugins/plugins.js', [], '1.0', true);
		wp_enqueue_script('plugins');

		wp_register_script('app', $dir.'/js/scripts.js', [], '1.0', true);
		wp_enqueue_script('app');
	}

	add_action('wp_enqueue_scripts', 'wptheme_scripts', 3);
?>