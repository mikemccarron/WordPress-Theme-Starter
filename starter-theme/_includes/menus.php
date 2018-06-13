<?php
	register_nav_menu('nav-top', __('Nav: Primary', 'wp-theme') );
	register_nav_menu('nav-bottom', __('Nav: Secondary', 'wp-theme') );

	function topNav(){
		wp_nav_menu(
			array(
				'theme_location'  => 'nav-top',
				'menu'            => '',
				'container'       => 'nav',
				'container_class' => 'menu-container',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul>%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			)
		);
	}

	function bottomNav(){
		wp_nav_menu(
			array(
				'theme_location'  => 'nav-bottom',
				'menu'            => '',
				'container'       => 'nav',
				'container_class' => 'menu-container',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul>%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			)
		);
	}
?>
