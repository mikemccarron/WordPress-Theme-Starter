<!DOCTYPE html>
	<html>
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

    	<title><?php wp_title(''); ?></title>

		<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
	</head>

<body <?php body_class(); ?>>

<?php get_template_part( 'nav', 'social' ); ?>
<?php get_template_part( 'nav' ); ?>