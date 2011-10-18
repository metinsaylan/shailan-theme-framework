<?php get_header(); ?>

<div id="page" class="clearfix">

	<div id="breadcrumbs-wrapper">
		<?php stf_breadcrumbs() ?>	
	</div>
	
	<div id="container">
		<div id="content" role="main">
		<?php stf_content(); ?>
		</div>
	</div>
	
	<?php get_sidebar(); ?>
	
</div>

<?php get_footer(); ?>