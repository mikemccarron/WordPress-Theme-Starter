<?php
	// Callback function to insert 'styleselect' into the $buttons array
	function theme_tinycme_buttons( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}
	// Register our callback to the appropriate filter
	add_filter( 'mce_buttons_2', 'theme_tinycme_buttons' );



	// Custom WYSIWYG Styles
	function theme_tinycme_styles($init_array) {
		$style_formats = array(
			array(
				'title' => 'ALLCAPS',
				'inline' => 'span',
				'classes' => 'allcaps',
				'wrapper' => false,
			)

		);

		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;
	}
	add_filter( 'tiny_mce_before_init', 'theme_tinycme_styles' );


	// Add Custom visual styles to the WYSIWYG to identify the applied styles
	function editor_styles() {

	    add_editor_style( 'tinymce-formats.css' );
	}
	add_action( 'admin_init', 'editor_styles' );
?>