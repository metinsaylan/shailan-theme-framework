<?php 
/*
	SHAILAN THEME FRAMEWORK 
	THEME COLORS MANAGER
	___________________________________________________________________________
	                                         Author : Matt Say ( @metinsaylan )
*/

function stf_colors(){

	if( 'off' == stf_get_setting('stf_colors_enabled') )
		return FALSE;

	$stf_text_color = stf_get_setting( 'stf_text_color' ); 
	$stf_title_color = stf_get_setting( 'stf_title_color' ); 
	$stf_link_color = stf_get_setting( 'stf_link_color' ); 

?><!-- STF Custom colors -->
	<style type="text/css" media="all">
	
		body, textarea, input, select{ 
			background-color: <?php echo $background; ?>; }
			
		input[type="image"]{ background-color:transparent; }
			
		body, td, textarea, input, select {
			color: <?php echo $stf_text_color; ?>;
		}
		
		#site-title a, h2.entry-title, h1.entry-title, .entry-title, .entry-title a, .widget-title, .page-title, .widgettitle, .title {
			color: <?php echo $stf_title_color; ?>;
		}
		
		a{ color: <?php echo $stf_link_color; ?>; }
		
	</style>
	<!-- End of STF Custom colors -->
		<?php
		
}

