<?php 

/** Typography setup */

function stf_get_fonts(){
	return array(
		'css' => "Use fonts defined in stylesheet",
		'georgia' => "Georgia, Palatino, 'Palatino Linotype', Times, 'Times New Roman', serif",
		'gillsans' => "GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'lucida' => "'Lucida Grande', Lucida, Helvetica, Arial, sans-serif",
		'helvetica' => "'Helvetica Neue', Arial, Helvetica, 'Nimbus Sans L', sans-serif;",
		'futura' => "Futura, Century Gothic, AppleGothic, sans-serif",
		'dejavu' => "'DejaVu Sans', 'Bitstream Vera Sans', 'Segoe UI', 'Lucida Grande', Verdana, Tahoma, Arial, sans-serif",
		'ubuntu' => "'Ubuntu', GillSans, 'Trebuchet MS', Calibri, sans-serif;"
	);
}


function stf_typography(){

	$fonts = stf_get_fonts();
	
	$title_font = stf_get_setting( 'stf_title_font' );
	$base_font = stf_get_setting( 'stf_base_font' );
	
?><!-- Start of STF Typography Styles -->
	<style type="text/css" media="all">
	
		<?php if( $base_font != "css" ){ ?>	
		body, td, textarea, input, select{
			font-family: <?php echo $fonts[ $base_font ]; ?>;
		}
		<?php } ?>
		
		<?php if( $title_font != "css" ){ ?>	
		#site-title, h1, h2, h3, h4, h5, h6, .entry-title, .widget-title, .title, h2.entry-title, h1.entry-title, .widget-title, .page-title, .widgettitle{
			font-family: <?php echo $fonts[ $title_font ]; ?>;
		}
		<?php } ?>
		
	</style>
	<!-- End of Smart Layout -->
		<?php
		
} add_action('wp_head', 'stf_typography');