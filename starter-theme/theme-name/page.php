<?php get_header(); ?>

<section id="content">
	<?php the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><?php the_title(); ?></h1>
		<?php if (has_post_thumbnail()) the_post_thumbnail(); ?>

		<?php the_content(); ?>

		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'blankslate' ) . '&after=</div>') ?>
		<?php edit_post_link( __( 'Edit', 'blankslate' ), '<div class="edit-link">', '</div>' ) ?>
	</article>

	<?php //comments_template( '', true ); ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>