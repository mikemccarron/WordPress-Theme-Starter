<?php get_header(); ?>

<ul>
	<li class="ico ico-Alarm-clock-128x128"></li>
	<li class="ico ico-Arrival-128x128"></li>
	<li class="ico ico-Article-128x128"></li>
	<li class="ico ico-Autofill-128x128"></li>
	<li class="ico ico-Award-128x128"></li>
</ul>

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