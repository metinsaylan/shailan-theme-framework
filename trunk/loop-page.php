<?php $post_index = 1;
while ( have_posts() ): the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content( sprintf( __('READ MORE \'%s\'', 'stf'), the_title('', '', false) ) ); ?>
		</div><!-- .entry-content -->		
		
		<div class="entry-footer">
			<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:','k2_domain') . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-foot -->				
		<div class="clear"></div>		
	</div><!-- #post-ID -->

<?php endwhile; /* End The Loop */ ?>
