<?php $post_index = 1; while ( have_posts() ): the_post(); ?>

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

<?php comments_template( '', true ); ?>

<?php endwhile; /* End The Loop */ ?>
