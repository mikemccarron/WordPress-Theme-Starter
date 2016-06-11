<?php
	register_nav_menu('nav-top', __('Navigation: Primary / Top', 'wp-theme') );
	register_nav_menu('nav-bottom', __('Navigation: Secondary / Bottom', 'wp-theme') );

	function topNav(){
		wp_nav_menu(
			array(
				'theme_location'  => 'nav-top',
				'menu'            => '',
				'container'       => 'div',
				'container_class' => 'menu-{menu slug}-container',
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
				'container'       => 'div',
				'container_class' => 'menu-{menu slug}-container',
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
