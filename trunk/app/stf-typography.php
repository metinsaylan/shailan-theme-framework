<?php 

/** Typography setup */
function stf_get_fonts(){
	return array(
		'css' => array( 
			"name" => "Default",
			"css" => "Use fonts defined in stylesheet",
			"src" => ""
			),
			
		'georgia' => array(
			"name" => "Georgia/Palatino",
			"css" => "Georgia, Palatino, 'Palatino Linotype', Times, 'Times New Roman', serif",
			"src" => "" ),
			
		'gillsans' => array(
			"name"	=> "Gillsans/Trebuchet MS",
			"css"	=>"GillSans, 'Trebuchet MS', Calibri, sans-serif",
			"src"	=> "" ),
			
		'lucida' => array (
			"name"	=> "Lucida Grande",
			"css"	=> "'Lucida Grande', Lucida, Helvetica, Arial, sans-serif",
			"src"	=> "" ),
			
		'helvetica' => array( 
			"name"	=> "Helvetica Neue",
			"css"	=> "'Helvetica Neue', Arial, Helvetica, 'Nimbus Sans L', sans-serif",
			"src"	=> "" ),
		
		'futura' => array (
			"name"	=> "Futura/Century Gothic",
			"css"	=> "Futura, Century Gothic, AppleGothic, sans-serif",
			"src"	=> "" ),
		
		'trebuchet' => array(
			"name"	=> "Trebuchet MS",
			"css"	=> "'Trebuchet MS',Helvetica,Jamrul,sans-serif",
			"src"	=> "" ),
			
		'dejavu' => array(
			"name" => "DejaVu Sans",
			"css" => "'DejaVu Sans', 'Bitstream Vera Sans', 'Segoe UI', 'Lucida Grande', Verdana, Tahoma, Arial, sans-serif",
			"src"	=> "" ),
			
		'ubuntu' => array(
			"name" 	=> "Ubuntu",
			"css"	=> "'Ubuntu', GillSans, 'Trebuchet MS', Calibri, sans-serif",
			"src"	=> "Ubuntu" ),
			
		'droid' => array(
			"name"	=> "Droid Serif",
			"css"	=> "'Droid Serif', Georgia, Palatino, 'Palatino Linotype', Times, 'Times New Roman', serif",
			"src"	=> "Droid+Serif" ),
			
		'droidsans' => array(
			"name"	=> "Droid Sans",
			"css"	=> "'Droid Sans', GillSans, 'Trebuchet MS', Calibri, sans-serif",
			"src"	=> "Droid+Sans" ),
			
		'rocksalt' => array(
			"name"	=> "Rock Salt",
			"css"	=> "'Rock Salt', GillSans, 'Trebuchet MS', Calibri, sans-serif",
			"src"	=> "Rock+Salt" ),
			
		'copse' => array(
			"name"	=> "Copse",
			"css"	=> "'Copse', serif",
			"src"	=> "Copse" ),
			
		"puritan" => array( "name" => "Puritan", "css" => "'Puritan', sans-serif", "src" => "Puritan" ),
		"anton" => array( "name" => "Anton", "css" => "'Anton', sans-serif", "src" => "Anton" ),
		"voltaire" => array( "name" => "Voltaire", "css" => "'Voltaire', sans-serif", "src" => "Voltaire" ),
		"gloria" => array( "name" => "Gloria Hallelujah", "css" => "'Gloria Hallelujah', sans-serif", "src" => "Gloria+Hallelujah" ),
		"bowlbysc" => array( "name" => "Bowlby One SC", "css" => "'Bowlby One SC', sans-serif", "src" => "Bowlby+One+SC" ),
		"bowlby" => array( "name" => "Bowlby One", "css" => "'Bowlby One', sans-serif", "src" => "Bowlby+One" ),
		"sixcaps" => array( "name" => "Six Caps", "css" => "'Six Caps', sans-serif", "src" => "Six+Caps" ),
		"oswald" => array( "name" => "Oswald", "css" => "'Oswald', sans-serif", "src" => "Oswald" )
		
	);
}

function stf_typography(){

	$fonts = stf_get_fonts();
	
	$title_font = stf_get_setting( 'stf_title_font' );
	$title_font_scale = stf_get_setting( 'stf_title_font_scale' );
	$base_font = stf_get_setting( 'stf_base_font' );
	$base_font_size = min( stf_get_setting( 'stf_base_font_size' ), 4);
	
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
	
	$import = "";
	
	if( $base_font != "css" ){ 
		$base_font = $fonts[$base_font];
		if( $base_font["src"] != "" ){ 
			$import = $base_font["src"];
		}
	}
	
	if( $title_font != "css" ){ 
		$title_font = $fonts[$title_font];
		if( $title_font["src"] != "" ){ 
			if( "" != $import ) $import .= "|" . $title_font["src"];
			else $import = $title_font["src"];
		}
	}
	
	
?>	
	<!-- Start of STF Typography Styles -->
	<style type="text/css" media="all">
		<?php if( $import != "" ){
			echo "@import url(http://fonts.googleapis.com/css?family=". $import .");";
		} ?>
	
		<?php if( $base_font != "css" ){ ?>	
		body, td, textarea, input, select{
			font-family: <?php echo $base_font[ "css" ]; ?>;
			font-size: <?php echo $base_font_size; ?>;
		}
		<?php } ?>
		
		<?php if( $title_font != "css" ){ ?>	
		h1, h2, h3, h4, h5, h6, #site-title, .widget-title, .title, h2.entry-title, h1.entry-title, .widget-title, .page-title, .widgettitle{
			font-family: <?php echo $title_font[ "css" ]; ?>;
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