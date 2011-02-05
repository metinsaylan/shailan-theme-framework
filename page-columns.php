<?php 

/* Template Name: Columns */

get_header() ?>

<!-- Content Wrapper -->
<div id="content-wrapper">

	<!-- Page -->
	<div id="page" class="container_12 clearfix">
	
		<!-- Breadcrumbs -->
		<div id="breadcrumbs" class="clearfix">
			<?php if( !is_home() || !is_front_page() ){ ?><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home <?php if(!is_front_page() || !is_home()){ echo 'nofollow';} ?>"><?php _e('Home'); ?></a></span><span class="breadcrumbs"><?php stf_breadcrumbs(); ?></span><?php } ?>
		
			<div class="clear"></div>
			<div id="billboard">
				<?php stf_widget_area( 'billboard' ); ?>
			</div>
		</div>
		<!-- [End] Breadcrumbs -->

		<!-- Content -->
		<div id="columns">
			<?php stf_widgets( 'columns' ); ?>
		</div><!-- #content -->
		
	</div>
	<!-- [End] Page -->
		
</div>
<!-- [End] Content Wrapper -->

<?php get_footer() ?>