<?php
function create_press_releases_post(){
	register_post_type('press-releases', // Register Custom Post Type
		array(
		'labels' => array(
			'name' => __('Press Releases', 'press-releases'), // Rename these to suit
			'singular_name' => __('Press Releases', 'press-releases'),
			'add_press-release' => __('Add Press Releases', 'press-releases'),
			'add_press-release_item' => __('Add a Press Releases entry', 'press-releases'),
			'edit' => __('Edit Press Releases', 'press-releases'),
			'edit_item' => __('Edit Press Releases', 'press-releases'),
			'press-release_item' => __('Press Release Press Releases', 'press-releases'),
			'view' => __('View Press Releases', 'press-releases'),
			'view_item' => __('View Press Releases', 'press-releases'),
			'search_items' => __('Search Press Releases', 'press-releases'),
			'not_found' => __('No Press Releases found', 'press-releases'),
			'not_found_in_trash' => __('No Press Releases found in Trash', 'press-releases')
		),
		'public' => true,
		'hierarchical' => true,
		'has_archive' => true,
		'supports' => array(
			'title',
		),
		'can_export' => true, // Allows export in Tools > Export
	));
}

add_action('init', 'create_press_releases_post');

?>
