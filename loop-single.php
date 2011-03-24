<?php 
	$post_index = 1; 
	while ( have_posts() ): the_post(); 
	$posts_displayed[] = $post->ID;
?>

<div class="entry-wrap">

	<!-- Post -->
	<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

		<?php get_template_part('entry', 'header'); ?>

		<!-- Entry Content -->
		<div class="entry-content">
			<?php get_template_part('ads', 'top'); ?>
		
			<?php the_content( ); ?>
			
			<?php stf_entry_pages_navigation(); ?>
		</div>
		<!-- [End] Entry Content -->

		<?php get_template_part('ads', 'bottom'); ?>
		<?php get_template_part('share', 'single'); ?>
		<?php get_template_part('author', 'single'); ?>

		<?php get_template_part('entry', 'footer'); ?>
		
	</div>
	<!-- [End] Post -->
	<?php stf_comments(); ?>

</div>

<div class="navigation clearfix">
	<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '<span class="nav-arrow-left">&larr;</span>', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
	<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '<span class="nav-arrow-left">&rarr;</span>', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
</div>

<?php endwhile; /* End The Loop */ ?>
