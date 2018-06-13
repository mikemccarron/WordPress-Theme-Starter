<?php

function cpt_helper($label, $slug, $icon){
	if($icon=='') $icon = 'dashicons-admin-page';

	$labels = array(
		'name' => __($label.'s', $slug),
		'singular_name' => __($label, $slug),
		'add_new' => __('Add '.$label.'s', $slug),
		'add_new_item' => __('Add '.$label, $slug),
		'edit_item' => __('Edit '.$label, $slug),
		'new_item' => __('New '.$label, $slug),
		'view_item' => __('View '.$label, $slug),
		'view_items' => __('View '.$label.'s', $slug),
		'search_items' => __('Search '.$label.'s', $slug),
		'not_found' => __('No '.$label.'s found', $slug),
		'not_found_in_trash' => __('No '.$label.'s found in trash.', $slug),
		'all_items' => __('All '.$label.'s', $slug),
		'archives' => __($label.' Archives', $slug),
		'attributes' => __($label.' Attributes', $slug),
		'insert_into_item' => __($label, $slug)
		// 'uploaded_to_this_item' => ('', ''),
		// 'featured_image' => ('', ''),
		// 'set_featured_image' => ('', ''),
		// 'remove_featured_image' => ('', ''),
		// 'use_featured_image' => ('', ''),
		// 'menu_name' => ('', ''),
		// 'filter_items_list' => ('', ''),
		// 'items_list_navigation' => ('', ''),
		// 'items_list' => ('', ''),
		// 'name_admin_bar' => ('', '')
	);

	register_post_type($slug,
		array(
			'labels' => $labels,
			'description' => '',
			'public' => true,
			'exclude_from_search' => false,
			'show_in_nav_menus' => true,
			'show_in_menu' => true,
			'show_ui' => true,
			'menu_icon' => $icon,
			'menu_position' => 4, // below Posts
			'hierarchical' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'supports' => array(
				'title',
			),
			'can_export' => true
		)
	);
}

function create_post_types(){
	cpt_helper('New', 'news', 'dashicons-id');
}

// ICONS: https://developer.wordpress.org/resource/dashicons/#groups

add_action('init', 'create_post_types');

?>


<?php



?>

