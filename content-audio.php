<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
			<?php the_content( stf_more( ) ); ?>
	</div><!-- .entry-content -->
	<?php get_template_part('entry', 'footer'); ?>
</div><!-- #post-<?php the_ID(); ?> -->

<?php stf_comments(); ?>