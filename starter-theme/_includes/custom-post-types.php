<?php

function cpt_helper($label, $slug){
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
		'not_found_in_trash' => __('No '.$label.'s found in trash.', $slug)
		// 'parent_item_colon' => ('', ''),
		// 'all_items' => ('', ''),
		// 'archives' => ('', ''),
		// 'attributes' => ('', ''),
		// 'insert_into_item' => ('', ''),
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
			'public' => true,
			'hierarchical' => true,
			'has_archive' => true,
			'supports' => array(
				'title',
			),
			'can_export' => true
		)
	);
}


function create_post_types(){
	cpt_helper('New', 'news');
}

add_action('init', 'create_post_types');

?>


<?php



?>

