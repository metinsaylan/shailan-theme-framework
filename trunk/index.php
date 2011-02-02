<?php get_header() ?>

<!-- Content Wrapper -->
<div id="content-wrapper">

	<!-- Page -->
	<div id="page" class="container_12 clearfix">
	
		<!-- Breadcrumbs -->
		<div id="breadcrumbs" class="clearfix">
			<?php if( !is_home() || !is_front_page() ){ ?><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home <?php if(!is_front_page() || !is_home()){ echo 'nofollow';} ?>">Home</a></span><span class="breadcrumbs"><?php stf_breadcrumbs(); ?></span><?php } ?>
		
			<div class="clear"></div>
			<div id="billboard">
				<?php stf_widget_area( 'billboard' ); ?>
			</div>
		</div>
		</div>
		<!-- [End] Breadcrumbs -->

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