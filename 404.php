<?php get_header(); ?>
<!-- PAGE START -->
<div id="page" class="clearfix">
	<div id="breadcrumbs-wrapper">
		<?php stf_breadcrumbs() ?>	
	</div>
	<div id="container">
		<div id="content" role="main">
		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'stf' ); ?></h1>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'stf' ); ?></p>
				<?php get_search_form(); ?>
				
				<div class="row">
					<div class="one_half">
						<h4>Some popular posts</h4>
						
						<?php stf_most_viewed_posts( 7, 'loop-list.php' ); ?>
					</div>
					<div class="one_half last">
						<?php if(function_exists('stats_get_csv')){ 
						$top_posts = stats_get_csv( 'postviews', "days=15&limit=15" );
		
		?> <h4>Some popular posts</h4>
		<ul>
			<?php foreach ( $top_posts as $post ) : if ( !get_post( $post['post_id'] ) || $post['post_title'] == 'Home page' ) continue; ?>
				<li><a href="<?php echo get_permalink( $post['post_id'] ); ?>"><?php echo get_the_title( $post['post_id'] ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<?php } ?>
			
					
						
					</div>
				</div>
				
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
</div>
<!--/ PAGE END -->
<?php get_footer(); ?>