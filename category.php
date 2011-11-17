<?php get_header(); ?>
<!-- PAGE START -->
<div id="page" class="clearfix">
	<div id="container">
		<div id="content" role="main">
		
		<?php stf_breadcrumbs(); ?>
		
		<?php stf_archive_header(); ?>
		<span class="sub-title"><?php 
		
		$category_description = category_description();
		if ( ! empty( $category_description ) )
			echo $category_description;
		
		?></span>
		
		<?php do_action('before_content'); ?>
		
		<?php if ( have_posts() ) : 
			$post_index = 1; 
			while ( have_posts() ) : the_post();
				$posts_displayed[] = $post->ID;
				get_template_part( 'content', get_post_format() );
				$post_index = $post_index + 1; 
			endwhile;
			stf_pagination();		
		else : ?>
			<?php get_template_part( 'content', '404' ); ?>
		<?php endif; ?>
		
		<?php do_action('after_content'); ?>		
		
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
</div>
<!--/ PAGE END -->
<?php get_footer(); ?>