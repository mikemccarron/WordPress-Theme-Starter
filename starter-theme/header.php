<!DOCTYPE html>
	<html>
    <head>
    	<meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

    	<title><?php
			wp_title('');
			if( wp_title('', false) ){ echo ' :'; }
			bloginfo('name');
		?></title>

		<link href="" rel="shortcut icon">
        <link href="" rel="apple-touch-icon">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=false">

		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>


<?php
	get_template_part( 'nav', 'social' );
	get_template_part( 'nav' );
?>