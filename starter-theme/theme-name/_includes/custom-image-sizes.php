<?php
	function image_sizes(){
		add_image_size('square-thumbail-sm', 124, 124, array('center', 'center'));
		add_image_size('square-thumbail-lg', 210, 210, array('center', 'center'));
		add_image_size('hero', 1024, 506);
	}
?>