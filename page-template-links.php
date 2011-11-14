<?php 

/* Template Name: Links Page */

get_header(); ?>

<div id="page" class="clearfix">

	<div id="container">
		<div id="content" role="main">
		
		<?php do_action('before_content'); ?>
		<?php stf_breadcrumbs(); ?>
		
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
<div class="entry-wrap">
					<!-- Post -->
					<div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-body">
						<?php get_template_part('entry', 'header'); ?>
						
						<!-- Entry Content -->
						<div class="entry-content">
							<?php the_content(); ?>
							<?php stf_entry_pages(); ?>
						
						<!-- Links -->
						<?php $args = array(
							'orderby'          => 'name',
							'order'            => 'ASC',
							'limit'            => -1,
							'category'         => '',
							'exclude_category' => '',
							'category_name'    => '',
							'hide_invisible'   => 1,
							'show_updated'     => 0,
							'echo'             => 1,
							'categorize'       => 1,
							'title_li'         => '' ,
							'title_before'     => '<h3>',
							'title_after'      => '</h3>',
							'category_orderby' => 'name',
							'category_order'   => 'ASC',
							'class'            => 'linkcat',
							'category_before'  => '<div id=%id class="%class link-category">',
							'category_after'   => '</div>' ); 
							
							wp_list_bookmarks( $args );
							
						?> 
							
						</div>
						<!-- [End] Entry Content -->

						<?php get_template_part('entry', 'footer'); ?>
					</div>

					<div class="clear"></div>
					</div>
					<!-- [End] Post -->
				</div>
				
		<?php stf_comments(); ?>
		<?php endwhile; // end of the loop. ?>
		
		<?php do_action('after_content'); ?>
		
		</div>
	</div>
	
	<?php get_sidebar(); ?>
	
</div>

<?php get_footer(); ?>