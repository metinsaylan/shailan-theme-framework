<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
	if( is_home() || is_archive() || is_search() ) {
		// DISPLAY THUMBNAIL ON ARCHIVES & SEARCH ONLY
		stf_entry_thumbnail( );
	} 
?>
<div class="entry-body">

	<?php get_template_part('entry', 'header'); ?>
	
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( stf_more( ) ); ?>
				<?php stf_entry_pages(); ?>
				
			<?php if( is_single() ) { ?>
			<div id="related-posts clearfix">
				<h4 class="mt0 mb1"><?php _e('Related Posts', 'stf'); ?></h4>
				<?php 
					if(function_exists('related_posts')){ 
						related_posts();
					} else {
						stf_related_posts();
					} 
				?>
			</div>
			<?php } ?>
				
			</div><!-- .entry-content -->
		<?php endif; ?>

	<?php get_template_part('entry', 'footer'); ?>	
	
	<?php stf_comments(); ?>

</div>
</div><!-- #post-<?php the_ID(); ?> -->