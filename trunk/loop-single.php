<?php $post_index = 1; while ( have_posts() ): the_post(); ?>

	<!-- Post -->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<!-- Entry Header -->
		<div class="entry-header">
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			
			<div class="entry-meta">
				<?php stf_entry_header(); ?>
			</div>
		</div>
		<!-- [End] Entry Header -->
	
		<!-- Entry Content -->
		<div class="entry-content">
			<?php get_template_part('ads', 'top'); ?>
		
			<?php the_content( ); ?>
			
			<?php 
			
			wp_link_pages( array(
				'before' => '<div class="entry-pages"><span>' . __('Pages:') . '</span>',
				'after' => '</div>' 
			) ); 
			
			?>
		</div>
		<!-- [End] Entry Content -->

		<?php get_template_part('ads', 'bottom'); ?>
		<?php get_template_part('share', 'single'); ?>
		<?php get_template_part('authorinfo', 'single'); ?>
	
		<div class="entry-footer">
			<?php stf_entry_footer(); ?>
		</div><!-- .entry-foot -->		
		
		<div class="clear"></div>		
	</div>
	<!-- [End] Post -->
	
	<?php comments_template( '', true ); ?>

<?php endwhile; /* End The Loop */ ?>
