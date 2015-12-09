<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

    	<title><?php wp_title(' | ', true, 'right'); ?></title>

		<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

		<script src="<?php echo $GLOBALS['js']; ?>libs/modernizr-2.6.2.min.js"></script>
	</head>

<body <?php body_class(); ?>>
	<section id="hdr">
		<header>
			<h1>
				<?php
					if(is_singular()) {}
					else { echo '<h1>'; }
				?>
				<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
				<?php
					if(is_singular()) {}
					else { echo '</h1>'; }
				?>
			</h1>
		</header>
		<p id="site-description"><?php bloginfo( 'description' ) ?></p>
		<nav>
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			<div id="search"><?php get_search_form(); ?></div>
		</nav>
	</section>
