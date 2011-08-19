<?php get_header(); ?>
<!-- PAGE START -->
<div id="page" class="clearfix">
	<div id="breadcrumbs-wrapper">
		<?php stf_breadcrumbs() ?>	
	</div>
	<div id="container">
		<div id="content" role="main">
		<?php stf_archive_header(); ?>
		<?php stf_content(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
</div>
<!--/ PAGE END -->
<?php get_footer(); ?>