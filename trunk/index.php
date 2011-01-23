<?php get_header() ?>

<!-- Content Wrapper -->
<div id="content-wrapper">

	<!-- Page -->
	<div id="page" class="container_12">

		<!-- Content -->
		<div id="content" class="grid_8 clearfix">
			<?php stf_widget_area( 'before-content' ); ?>
			
			<!-- Main -->
			<div id="content-main">
				<?php stf_widgets( 'content' , array( 'stf_navigation', 'stf_blog_posts', 'stf_navigation' ) ); ?>
			</div>
			<!-- [End] Main -->
			
			<?php stf_widget_area( 'after-content' ); ?>
		</div><!-- #content -->
		
		<!-- Sidebars -->
		<div id="sidebars" class="grid_4">
			<?php get_sidebar('1') ?>
			<?php get_sidebar('2') ?>
		</div>		
		<!-- [End] Sidebars -->
		
	</div>
	<!-- [End] Page -->
		
</div>
<!-- [End] Content Wrapper -->

<?php get_footer() ?>