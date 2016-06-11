<?php
	function wptheme_scripts(){

		$dir = get_template_directory_uri();

		wp_register_script('modernizr', $dir.'/js/libs/modernizr-2.6.2.min.js', [], '2.6.2', false);
		wp_enqueue_script('modernizr');

		wp_register_script('jquery', $dir.'/js/libs/jquery-3.0.0.min.js', [], '3.0.0', true);
		wp_enqueue_script('jquery');

		wp_register_script('plugins', $dir.'/js/plugins/plugins.js', [], '1.0', true);
		wp_enqueue_script('plugins');

		wp_register_script('app', $dir.'/js/scripts.js', [], '1.0', true);
		wp_enqueue_script('app');
	}

	add_action('wp_enqueue_scripts', 'wptheme_scripts', 3);
?>