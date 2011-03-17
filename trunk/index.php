<?php get_header() ?>

<!-- Content Wrapper -->
<div id="content-wrapper">

	<!-- Page -->
	<div id="page" class="clearfix">
	
		<!-- Billboard -->
		<div id="billboard-wrapper" class="clearfix">
			<?php stf_breadcrumbs() ?>			
			<?php stf_widget_area( 'billboard' ) ?>
		</div>
		<!-- [End] Billboard -->

		<!-- Content -->
		<div id="content" class="clearfix">
			<?php stf_widget_area( 'before-content' ); ?>
			
			<!-- Main -->
			<div id="content-main">
				<?php stf_widgets( 'content' , array( 'stf_blog_posts', 'stf_navigation' ) ); ?>
			</div>
			<!-- [End] Main -->
			
			<?php stf_widget_area( 'after-content' ); ?>
		</div>
		<!-- [End] Content -->
		
		<!-- Sidebars -->
		<div id="sidebars" class="clearfix">
			<?php get_sidebar() ?>
		</div>		
		<!-- [End] Sidebars -->
		
	</div>
	<!-- [End] Page -->
		
</div>
<!-- [End] Content Wrapper -->

<?php get_footer() ?>