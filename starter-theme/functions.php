<?php
/*
	Name: functions.php
	Description: WP-Start-Theme
	Author: Mike McCarron
*/

/********************************************************
INTIAL SETUP
********************************************************/
function wptheme_initialize(){
	// Initial Reset and clean up Admin
	include('_includes/reset.php');
	include('_includes/admin.php');
}

function wptheme_theme_setup(){
	// Register Menus
	include('_includes/menus.php');

	// Register JavaScript
	include('_includes/scripts.php');

	// Custom Image Sizes
	include('_includes/custom-image-sizes.php');

	// Custom Fields
	//include('_includes/acf-custom-fields.php');

}

add_action('init', 'wptheme_initialize');
add_action('after_setup_theme', 'wptheme_theme_setup');

?>