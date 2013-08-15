<?php get_header(); ?>

<section id="content">
	<?php get_template_part( 'nav', 'above' ); ?>

	<?php while ( have_posts() ) : the_post() ?>
		<?php get_template_part( 'entry' ); ?>
		<?php comments_template(); ?>
	<?php endwhile; ?>

	<?php get_template_part( 'nav', 'below' ); ?>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>