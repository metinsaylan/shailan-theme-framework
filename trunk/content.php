<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
<?php 
	if( ( is_home() || is_archive() || is_search() || is_front_page() ) 
		&& !in_array(get_post_format(), array('image', 'video', 'quote') ) ) {
		stf_entry_thumbnail( );
	} 
?>
<div class="entry-body" class="clearfix">

	<?php get_template_part('entry', 'header'); ?>
	
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content" class="clearfix">
			
				<?php the_content( stf_more( ) ); ?>
				<?php stf_entry_pages(); ?>
				
				<?php if( is_single() ) { stf_related_posts(); } ?>
				
			</div><!-- .entry-content -->
		<?php endif; ?>

	<?php get_template_part('entry', 'footer'); ?>

</div>
</div><!-- #post-<?php the_ID(); ?> -->

<?php stf_comments(); ?>