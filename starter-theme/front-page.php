<?php get_header(); ?>

<section id="content">
	<?php the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</article>
</section>

<?php get_footer(); ?>