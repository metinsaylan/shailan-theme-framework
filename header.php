<?php locate_template( array('head.php'), true ) ?>

<!-- Header Wrapper -->
<div id="header-wrapper">

	<!-- Header -->
	<div id="header" class="container_12 clearfix">
		<?php stf_widget_area('header-top'); ?>
		
		<!-- Branding -->
		<div id="branding" class="grid_4">
			<?php stf_site_title(); ?>
		</div>
		<!-- [End] Branding -->
		
		<!-- Banner Area -->
		<div id="header-widgets" class="grid_8">
			
			<?php stf_widgets('header'); ?>
			
		</div>
		<!-- [End] Banner Area -->
		
		<div class="clearboth"></div>
		
		<div id="header-bottom">
			<?php stf_widget_area('header-bottom'); ?>
		</div>
	</div>
	<!-- [End] Header -->
	
</div>
<!-- [End] Header Wrapper -->
