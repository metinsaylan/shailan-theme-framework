<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="author-avatar">
			<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '60' ); }?>
		</div>
		<?php the_content( stf_more( ) ); ?>
		<?php stf_entry_pages(); ?>
	</div><!-- .entry-content -->
	<?php get_template_part('entry', 'footer'); ?>
</div><!-- #post-<?php the_ID(); ?> -->