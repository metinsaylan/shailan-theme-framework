<?php $post_index = 1;
while ( have_posts() ): the_post(); ?>
	<div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part('format', stf_post_format() ); ?>
	</div><!-- #entry-ID -->
<?php endwhile; /* End The Loop */ ?>
