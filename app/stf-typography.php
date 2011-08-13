<?php 

/** Typography setup */

function stf_get_fonts(){
	return array(
		'css' => "Use fonts defined in stylesheet",
		'georgia' => "Georgia, Palatino, 'Palatino Linotype', Times, 'Times New Roman', serif",
		'delicious' => "Delicious, 'Trebuchet MS', Calibri, sans-serif",
		'gillsans' => "GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'lucida' => "'Lucida Grande', Lucida, Helvetica, Arial, sans-serif",
		'helvetica' => "'Helvetica Neue', Arial, Helvetica, 'Nimbus Sans L', sans-serif",
		'futura' => "Futura, Century Gothic, AppleGothic, sans-serif",
		'trebuchet' => "'Trebuchet MS',Helvetica,Jamrul,sans-serif",
		'dejavu' => "'DejaVu Sans', 'Bitstream Vera Sans', 'Segoe UI', 'Lucida Grande', Verdana, Tahoma, Arial, sans-serif",
		'ubuntu' => "'Ubuntu', GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'bebas' => "'BebasNeueRegular', GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'cartogothic' => "'CartoGothicStdBook', Futura, Century Gothic, AppleGothic, sans-serif",
		'miso' => "'MisoRegular', Futura, Century Gothic, AppleGothic, sans-serif",
		'misobold' => "'MisoBold', Futura, Century Gothic, AppleGothic, sans-serif",
		'quicksand' => "'QuicksandBook', GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'quicksanddash' => "'QuicksandDash', GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'junction' => "'junctionregularRegular', GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'league' => "'LeagueGothicRegular', GillSans, 'Trebuchet MS', Calibri, sans-serif;",
		'puritan' => "'Puritan20Normal', GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'droid' => "'Droid Serif', Georgia, Palatino, 'Palatino Linotype', Times, 'Times New Roman', serif",
		'droidsans' => "'Droid Sans', GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'rocksalt' => "'Rock Salt', GillSans, 'Trebuchet MS', Calibri, sans-serif",
		'goudy' => "'Goudy Bookletter 1911', serif",
		'copse' => "'Copse', serif",
		'molengo' => "'Molengo', serif"
	);
}

function stf_get_font_names(){
	return array(
		'css' => "Default in Stylesheet",
		'georgia' => "Georgia - Serif",
		'delicious' => "Delicious - Sans",
		'gillsans' => "GillSans - Sans",
		'lucida' => "Lucida Grande - Sans",
		'helvetica' => "Helvetica Neue - Sans",
		'futura' => "Futura - Sans",
		'trebuchet' => "Trebuchet MS - Sans",
		'dejavu' => "DejaVu Sans - Sans",
		'ubuntu' => "Ubuntu - Sans",
		'bebas' => "BebasNeueRegular - Gothic",
		'cartogothic' => "CartoGothicStdBook - Gothic",
		'miso' => "Miso - Gothic",
		'misobold' => "MisoBold - Gothic",
		'quicksand' => "Quicksand - Gothic",
		'quicksanddash' => "Quicksand Dashed - Gothic",
		'junction' => "Junction - Sans",
		'league' => "LeagueGothicRegular - Gothic",
		'puritan' => "Puritan - Sans",
		'droid' => "Droid - Serif",
		'droidsans' => "DroidSans - Sans",
		'rocksalt' => "Rock Salt - Comic",
		'goudy' => "Goudy Bookletter 1911 - Serif",
		'copse' => "Copse - Serif",
		'molengo' => "Molengo - Sans"
	);
}

function stf_typography(){

	$fonts = stf_get_fonts();
	
	$title_font = stf_get_setting( 'stf_title_font' );
	$title_font_scale = stf_get_setting( 'stf_title_font_scale' );
	$base_font = stf_get_setting( 'stf_base_font' );
	$base_font_size = stf_get_setting( 'stf_base_font_size' );
	
	// Include font file if exists
	$title_font_css = locate_template( "app/fonts/" . $title_font . ".css" );
	$title_font_css = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, $title_font_css );
	if( FALSE != $title_font_css ){
		echo "\n\t<link rel=\"stylesheet\" href=\"".$title_font_css."\" type=\"text/css\" charset=\"utf-8\" />";
	}
	
	$base_font_css = locate_template( "app/fonts/" . $base_font . ".css" );
	$base_font_css = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, $base_font_css );
	if( FALSE != $base_font_css ){
		echo "\n\t<link rel=\"stylesheet\" href=\"".$base_font_css."\" type=\"text/css\" charset=\"utf-8\" />";
	}
	
?>	
	<!-- Start of STF Typography Styles -->
	<style type="text/css" media="all">
	
		<?php if( $base_font != "css" ){ ?>	
		body, td, textarea, input, select{
			font-family: <?php echo $fonts[ $base_font ]; ?>;
			font-size: <?php echo $base_font_size; ?>;
		}
		<?php } ?>
		
		<?php if( $title_font != "css" ){ ?>	
		h1, h2, h3, h4, h5, h6, #site-title, .widget-title, .title, h2.entry-title, h1.entry-title, .widget-title, .page-title, .widgettitle{
			font-family: <?php echo $fonts[ $title_font ]; ?>;
			line-height: 1em;
		}
		<?php } ?>
		
		<?php if( is_numeric( $title_font_scale ) ){ ?>
			h1{ font-size: <?php echo (2 * $title_font_scale ); ?>em; }
			h2, h2.entry-title, h1.entry-title, h3.entry-title, .widget-title, .page-title, .widgettitle, .title { font-size: <?php echo (1.6 * $title_font_scale ); ?>em; }
			h3{ font-size: <?php echo (1.3 * $title_font_scale ); ?>em; }
			h4{ font-size: <?php echo (1.17 * $title_font_scale ); ?>em; }
			h5{ font-size: <?php echo (1.1 * $title_font_scale ); ?>em; }
			h6{ font-size: <?php echo (1.1 * $title_font_scale ); ?>em; }
		<?php } ?>
		
	</style>
	<!-- End of STF Typography Styles -->
		<?php
		
} add_action('wp_head', 'stf_typography');