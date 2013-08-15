<?php
/*
	Name: functions.php
	Description: Bare bones starter functions.php file
	Author: Mike McCarron
*/

/********************************************************
INTIAL SETUP
********************************************************/
add_action('after_setup_theme', 'mm_theme_setup');

function mm_theme_setup(){
	/*  ADD FILTERS, ACTIONS, AND THEME-SUPPORTED FEATURES.
		• Add custom actions to action hooks.
		• Add custom filters to filter hooks.
		• Register support for theme-supported features.
	*/

	global $content_width;
	if (!isset($content_width)) {
		$content_width = 960;
	}

	global $js;
	$js = get_bloginfo('template_url').'/js/';

	/* ADD THEME-SUPPORTED FEATURES. */

		/* Add theme support for automatic feed links. */
		add_theme_support('automatic-feed-links');

		/* Add theme support for post thumbnails (featured images). */
		add_theme_support('post-thumbnails');


	/* ADD CUSTOM ACTIONS. */

		/* Add your nav menus function to the 'init' action hook. */
		add_action('init', 'mm_register_menus');

		/* Add your sidebars function to the 'widgets_init' action hook. */
		add_action('widgets_init', 'mm_register_sidebars');

		/* Load JavaScript files on the 'wp_enqueue_scripts' action hook. */
		add_action('wp_enqueue_scripts', 'mm_load_scripts');


	/* ADD CUSTOM FILTERS. */

		// Update location of CSS file
		// add_filter('stylesheet_uri', 'mm_stylesheet_uri', 10, 2);
}

/********************************************************
CUSTOM ACTIONS
********************************************************/

function mm_register_menus(){
	register_nav_menus(
		array('primary-navigation' => __('Primary Nav', 'primary-nav'))
	);

	register_nav_menus(
		array('side-navigation' => __('Sidebar Navigation', 'side-nav'))
	);
}

function mm_register_sidebars(){
	register_sidebar(
		array(
			'name' => 'Sidebar',
			'id' => 'sidebar',
			'description' => 'Basic starter sidebar.',
			'class' => 'sidebar',
			'before_widget' => '<li>',
			'after_widget' => '</li>',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
		)
	);
}

function mm_load_scripts(){
}

/********************************************************
CUSTOM FILTERS
********************************************************/

function mm_stylesheet_uri($stylesheet_uri, $stylesheet_dir_uri){
	return $stylesheet_dir_uri.'/css/style.css';
}

?>