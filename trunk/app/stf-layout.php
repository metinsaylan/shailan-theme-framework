<?php 

/** Smart Layout (content widths & paddings) */

/** Set up content width */
if ( ! isset( $content_width ) ){
	$layout = stf_get_setting( 'stf_layout' ); 
	$stf_page_width = get_option('stf_page_width');
	$stf_sidebar_width = get_option('stf_sidebar_width');
	$stf_padding = get_option('stf_padding');
	
	if( '1c' == $layout ){ $content_width = $stf_page_width - 2 * $stf_padding; } 
	if( '2cl' == $layout || '2cr' == $layout ){ $content_width = $stf_page_width - $stf_sidebar_width - ( 3 * $stf_padding ); } 
	if( '3cl' == $layout || '3cr' == $layout ){ $content_width = $stf_page_width - ( 2 * $stf_sidebar_width) - ( 4 * $stf_padding ); } 
	
}

function stf_layout(){

		$layout = stf_get_setting( 'stf_layout' ); 

		$stf_page_width = stf_get_setting('stf_page_width');
		$stf_sidebar_width = stf_get_setting('stf_sidebar_width');
		$stf_padding = stf_get_setting('stf_padding');
		
		$stf_half_width = floor( ( $stf_page_width - 3 * $stf_padding ) / 2 );
		$stf_one_third = floor( ( $stf_page_width - 4 * $stf_padding ) / 3 );
		$stf_one_fourth = floor( ( $stf_page_width - 5 * $stf_padding ) / 4 );
		
		if( '1c' == $layout ){ $content_width = $stf_page_width - 2 * $stf_padding; } 
		if( '2cl' == $layout || '2cr' == $layout ){ $content_width = $stf_page_width - $stf_sidebar_width - ( 3 * $stf_padding ); } 
		if( '3cl' == $layout || '3cr' == $layout ){ $content_width = $stf_page_width - ( 2 * $stf_sidebar_width) - ( 4 * $stf_padding ); } 
		$post_width = $content_width;
		
		$content_margin = $stf_sidebar_width + 2*$stf_padding;
		$content_margin2 = 2 * $stf_sidebar_width + 3 * $stf_padding;
		$secondary_widget_width = ($stf_sidebar_width>250 ? round(($stf_sidebar_width - 2*$stf_padding)/2) : $stf_sidebar_width);
		
		$thumbnail_margin = -90 - $stf_padding;

?><!-- Start of Smart Layout -->
	<style type="text/css" media="all">
	
		div#header, div#billboard-wrapper, div#page, div#footer, div#theme-copyright{
			width: <?php echo $stf_page_width; ?>px; 
			margin-right: auto;
			margin-left: auto;
		}
		
		div#page{ padding-top: <?php echo $stf_padding; ?>px; padding-bottom: <?php echo $stf_padding; ?>px; }
		
		/* SIDEBARS */
		div.sidebar{ width: <?php echo $stf_sidebar_width; ?>px; }
		
		/* FOOTER */
		div#footer{ clear: both; margin-left: auto; margin-right: auto; padding-left:0; padding-right:0; }
		.column{ float:left; display:inline; margin-left: <?php echo $stf_padding; ?>px; } 
		#footer .column { width: <?php echo $stf_one_third; ?>px; }
		
		.hentry img{max-width: <?php echo $post_width; ?>px; height:auto; border:none; padding:0; } 
		.wp-caption{max-width: <?php echo $post_width - 2 * $stf_padding; ?>px; height:auto; } 
		.hentry .wp-caption img{max-width: <?php echo $post_width - 2 * $stf_padding; ?>px; height:auto; border:none; padding:0; } 
		* html .hentry img{width: <?php echo $post_width; ?>px}
		.entry-wrap{ margin-bottom:<?php echo $stf_padding; ?>px; padding-bottom:<?php echo $stf_padding; ?>px }
		.entry-thumb{ float:left; padding:0px; margin-left:<?php echo $thumbnail_margin; ?>px; }
		
		.flushleft{ margin-left: -<?php echo $stf_padding; ?>px; }
		.flushright{ margin-right: -<?php echo $stf_padding; ?>px; }
		.flush{ margin-left: -<?php echo $stf_padding; ?>px; margin-right: -<?php echo $stf_padding; ?>px; width: <?php echo $stf_page_width; ?>px; }
		
<?php if( '1c' == $layout ){ ?>

		/* 1 COLUMN */
		
		div#container {
			margin: 0;
			width:100%;
		}
		
		div#content {
			margin:0 <?php echo $stf_padding; ?>px;
		}
		
		div#primary {
			clear:both;
		}

		div.sidebar {
			float:left;
			margin-left: <?php echo $stf_padding; ?>px;
			width:<?php echo $stf_half_width; ?>px;
		}

<?php } elseif( '2cr' == $layout ){ ?>
		
		/* 2 COLUMNS RIGHT */
		
		div#container {
			float:left;
			margin: 0px -<?php echo $content_margin; ?>px 0px 0px;
			width:100%;
		}

		div#content {
			margin:0px <?php echo $content_margin; ?>px 0px <?php echo $stf_padding; ?>px;
		}

		div.sidebar {
			float:right;
			margin:0px;
			margin-bottom:<?php echo $stf_padding; ?>px; 
			margin-right:<?php echo $stf_padding; ?>px;
		}

		div#secondary {
			clear:right;
		}

<?php } elseif ( '2cl' == $layout ){ ?>

		/* 2 COLUMNS LEFT */
		
		div#container {
			float:right; 
			margin:0 0 0 -<?php echo $content_margin; ?>px;
			width:100%;
		}

		div#content {
			margin:0 <?php echo $stf_padding; ?>px 0 <?php echo $content_margin; ?>px;
		}

		div.sidebar {
			float:left;
			margin:0px;
			margin-bottom:<?php echo $stf_padding; ?>px; 
			margin-left:<?php echo $stf_padding; ?>px;
		}

		div#secondary {
			clear:left;
		}

	
<?php } elseif ( '3cr' == $layout ){ ?>

		/* 3 COLUMNS RIGHT */
		
		div#container {
			float:left;
			width:100%;
		}

		div#content {
			margin:0 <?php echo $content_margin2; ?>px 0 <?php echo $stf_padding; ?>px;
		}

		div.sidebar {
			float:left;
		}

		div#primary {
			margin:0 0 0 -<?php echo $content_margin2 - $stf_padding; ?>px;
		}

		div#secondary {
			margin:0 0 0 -<?php echo $stf_sidebar_width + $stf_padding; ?>px;
		}

<?php } elseif ( '3cl' == $layout ){ ?>

		/* 3 COLUMNS LEFT */
		
		div#container {
			float:right;
			margin:0 0 0 -<?php echo $content_margin2; ?>px;
			width:100%;
		}

		div#content {
			margin:0 <?php echo $stf_padding; ?>px 0 <?php echo $content_margin2; ?>px;
		}

		div.sidebar {
			float:right;
			margin-right: <?php echo $stf_padding; ?>px;
		}

<?php } elseif ( '3cb' == $layout ){ ?>

		/* 3 COLUMNS BOTH SIDES */
		
		div#container {
			float:left;
			width:100%;
		}

		div#content {
			margin:0 <?php echo $content_margin; ?>px;
		}

		div.sidebar {
			float:left;
		}

		div#primary {
			margin:0 0 0 -<?php echo $stf_page_width - $stf_padding; ?>px;
		}

		* html div#primary {
			left:<?php echo $stf_padding; ?>px;
			position:relative;
		}

		div#secondary {
			margin:0 0 0 -<?php echo $stf_sidebar_width + $stf_padding; ?>px; 
		}

<?php } ?>
		
	</style>
	<!-- End of Smart Layout -->
		<?php
		
}

// Hook it up.
// add_action( 'wp_head', 'stf_layout' );

// Set default layout options
$layout = stf_get_setting( 'stf_layout' ); 
if( strlen( $layout ) <= 1 ){
	// Insert default options
	stf_update_setting( 'stf_page_width', 980 );
	stf_update_setting( 'stf_sidebar_width', 300 );
	stf_update_setting( 'stf_padding', 15 );
	stf_update_setting( 'stf_layout', '2cr' );
}
