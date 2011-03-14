<?php 
	$post_index = 1; 
	while ( have_posts() ): the_post(); 
	$posts_displayed[] = $post->ID;
?>
	<div class="entry-wrap">
		<!-- Post -->
		<div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part('format', stf_post_format() ); ?>
		</div>
		<!-- [End] Post -->
	
		<?php stf_comments(); ?>
	</div>
<?php endwhile; /* End The Loop */ ?>
