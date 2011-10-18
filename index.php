<?php get_header(); ?>

<div id="page" class="clearfix">

	<div id="container">
		<div id="content" role="main">
		
		<?php do_action('before_content'); ?>
		<?php stf_content(); ?>
		<?php do_action('after_content'); ?>
		
		</div>
	</div>
	
	<?php get_sidebar(); ?>
	
</div>

<?php get_footer(); ?>