<?php 
/*
	Template Name: Subpages 
*/

get_header(); ?>
<div id="content-wrapper">
	<div id="page" class="clearfix">
		<div id="container">
			<div id="content" class="clearfix">
				<div id="content-main">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>			
			<?php get_template_part('entry', 'header'); ?>

			<div class="entry-content">
			<?php the_content( ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'stf' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			
			<?php get_template_part('entry', 'footer'); ?>
		</div><!-- #post-## -->
		
		<div id="subpages-<?php the_ID(); ?>" class="subpages-wrap">
			<?php 
				
				$args = array( 
					'post_type' => 'page',
					'posts_per_page' => '-1',
					'post_parent' => get_the_ID(),
					'v_sortby' => 'views',
					'v_orderby' => 'desc'
				);
				
				query_posts( $args );
				include( 'loop-subpages.php' );
				wp_reset_query();
			
			?>
		</div>
		
		<?php get_template_part('share', 'single'); ?>
		<?php stf_comments(); ?>
				
	<?php endwhile; // end of the loop. ?>
			
					</div>
				<!-- [End] Main -->
			</div>
			<!-- [End] Content -->
		</div>
		<?php get_sidebar() ?>
	</div>
</div>
<?php get_footer() ?>
