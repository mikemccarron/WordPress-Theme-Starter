<?php get_header(); ?>

<section id="content">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
	<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>