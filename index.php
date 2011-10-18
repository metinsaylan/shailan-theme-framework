<?php get_header(); ?>

<div id="page" class="clearfix">

	<div id="container">
		<div id="content" role="main">
		
		<?php do_action('before_content'); ?>
		
		<?php stf_breadcrumbs(); ?>
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;
			stf_pagination();		
		else : ?>
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'stf' ); ?></h1>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'stf' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
		<?php endif; ?>
		
		<?php do_action('after_content'); ?>
		
		</div>
	</div>
	
	<?php get_sidebar(); ?>
	
</div>

<?php get_footer(); ?>