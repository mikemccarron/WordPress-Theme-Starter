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

function create_blogs_post(){
	register_post_type('blog', // Register Custom Post Type
		array(
		'labels' => array(
			'name' => __('Blogs', 'blog'), // Rename these to suit
			'singular_name' => __('Blogs', 'blog'),
			'add_press-release' => __('Add Blogs', 'blog'),
			'add_press-release_item' => __('Add a Blogs entry', 'blog'),
			'edit' => __('Edit Blogs', 'blog'),
			'edit_item' => __('Edit Blogs', 'blog'),
			'press-release_item' => __('Blog Blogs', 'blog'),
			'view' => __('View Blogs', 'blog'),
			'view_item' => __('View Blogs', 'blog'),
			'search_items' => __('Search Blogs', 'blog'),
			'not_found' => __('No Blogs found', 'blog'),
			'not_found_in_trash' => __('No Blogs found in Trash', 'blog')
		),
		'public' => true,
		'hierarchical' => true,
		'has_archive' => true,
		'supports' => array(
			'title','excerpt','author','editor','thumbnail'
		),
		'can_export' => true, // Allows export in Tools > Export
	));
}

add_action('init', 'create_blogs_post');


function create_resort_locations_post(){
	register_post_type('resort-locations', // Register Custom Post Type
		array(
		'labels' => array(
			'name' => __('Resort Locations', 'resort-locations'), // Rename these to suit
			'singular_name' => __('Resort Locations', 'resort-locations'),
			'add_resort-location' => __('Add Resort Locations', 'resort-locations'),
			'add_resort-location_item' => __('Add a Resort Locations entry', 'resort-locations'),
			'edit' => __('Edit Resort Locations', 'resort-locations'),
			'edit_item' => __('Edit Resort Locations', 'resort-locations'),
			'resort-location_item' => __('Resort Location Resort Locations', 'resort-locations'),
			'view' => __('View Resort Locations', 'resort-locations'),
			'view_item' => __('View Resort Locations', 'resort-locations'),
			'search_items' => __('Search Resort Locations', 'resort-locations'),
			'not_found' => __('No Resort Locations found', 'resort-locations'),
			'not_found_in_trash' => __('No Resort Locations found in Trash', 'resort-locations')
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

add_action('init', 'create_resort_locations_post');

?>
