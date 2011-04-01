<?php get_header() ?>
<!-- Content Wrapper -->
<div id="content-wrapper">

	<?php get_template_part('billboard', 'archive'); // BILLBOARD ?>

	<!-- Page Layout -->
	<div id="page" class="clearfix">
	
		<div id="container">
			<!-- Content -->
			<div id="content" class="clearfix">
				<?php stf_widget_area( 'before-content' ); ?>
				
				<!-- Main -->
				<div id="content-main">
			
					<!-- Archive Headline & Description -->
					<?php stf_archive_header(); ?>
			
				</div>
				<!-- [End] Main -->
				
				<?php stf_posts(); ?>
				<?php stf_pagination(); ?>				
				<?php stf_widget_area( 'after-content' ); ?>
			</div>
			<!-- [End] Content -->
		</div>
		
		<!-- Sidebars -->
		<?php get_sidebar() ?>
		<!-- [End] Sidebars -->
		
	</div>
	<!-- [End] Page -->
		
</div>
<!-- [End] Content Wrapper -->

<?php get_footer() ?>