<?php 
	$post_index = 1; while ( have_posts() ): the_post(); 
	$posts_displayed[] = $post->ID;
?>

<div class="entry-wrap">

	<!-- Post -->
	<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

		<?php get_template_part('entry', 'header'); ?>
		
		<!-- Entry Content -->
		<div class="entry-content">
			
		<?php 

				the_content( sprintf( __('Continue reading "%s" &rarr;', 'stf'), the_title('', '', false) ) );
		
		?>
			
			<?php stf_entry_pages_navigation(); ?>
		</div>
		<!-- [End] Entry Content -->	
			
		<?php get_template_part('ads', 'bottom'); ?>
		<?php get_template_part('entry', 'footer'); ?>

	</div>

</div>

<?php endwhile; /* End The Loop */ ?>