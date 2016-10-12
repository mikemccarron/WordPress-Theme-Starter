<?php
	function image_sizes(){
		add_image_size('square-thumbnail', 210, 210, array('center', 'center'));
		add_image_size('hero', 1024, 506);
	}
	add_action('after_setup_theme', 'image_sizes');
?>