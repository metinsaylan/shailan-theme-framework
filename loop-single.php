<?php $post_index = 1;
while ( have_posts() ): the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="entry-header">
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			
			<div class="entry-meta">
				<?php stf_entry_header(); ?>
			</div>
		</div><!-- .entry-header -->
	
		<div class="entry-content">
			<?php the_content( sprintf( __('READ MORE \'%s\'', 'stf'), the_title('', '', false) ) ); ?>
			<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:','k2_domain') . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->		
		
		<div class="entry-footer">
			<?php stf_entry_footer(); ?>
		</div><!-- .entry-foot -->		
		
		<div class="clear"></div>		
	</div><!-- #post-ID -->
	
	<div class="entry-widgets">
		<?php stf_widgets('entry-footer'); ?>
	</div>
	
	<?php comments_template( '', true ); ?>

<?php endwhile; /* End The Loop */ ?>
