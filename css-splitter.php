<?php
/**
 * Template Name: CSS Splitter
 */

get_header(); ?>
<div class="row">
	<div id="container" class="sidebarless full column">
		<div id="before-content">
			<?php dynamic_sidebar('single-widgets-top'); ?>
		</div>
		<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
		<?php get_template_part('entry', 'header'); ?>

		<div class="entry-content">

			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
		
<?php

include_once("css-parser.php");
$cssp = new cssparser;
$cssl = new cssparser;
$css3 = array();

global $layout_keys, $colorscheme_keys;

$layout_keys = array(
	'float',
	'width', 
	'height', 
	'display', 
	'clear',
	'margin', 
	'margin-top', 
	'margin-right', 
	'margin-left', 
	'margin-bottom',
	'padding', 
	'padding-top', 
	'padding-right', 
	'padding-left', 
	'padding-bottom',
	'border-width', 
	'border-radius', 
	'border-collapse',
	'border-spacing',
	'-ms-border-radius', 
	'-moz-border-radius', 
	'-webkit-border-radius', 
	'-khtml-border-radius',
	'-moz-border-radius-bottomleft', 
	'-moz-border-radius-bottomright', 
	'-moz-border-radius-topleft', 
	'-moz-border-radius-topright',
	'-webkit-border-bottom-left-radius', 
	'-webkit-border-bottom-right-radius', 
	'-webkit-border-top-left-radius', 
	'-webkit-border-top-right-radius',
	'border-bottom-left-radius', 
	'border-bottom-right-radius', 
	'border-top-left-radius', 
	'border-top-right-radius',
	'list-style', 
	'list-style-type',
	'position', 
	'top', 
	'right', 
	'bottom', 
	'left', 
	'z-index', 
	'zoom',
	'text-align',
	'white-space',
	'visibility',
	'vertical-align',
	'overflow',
	'overflow-x',
	'overflow-y',
	'min-width', 
	'min-height', 
	'max-width', 
	'max-height',
	'text-indent', 
	'line-height',
	'opacity',
	'content'
); sort($layout_keys);

$colorscheme_keys = array(
	'color',
	'background',
	'background-image',
	'background-position',
	'background-attachment',
	'background-repeat',
	'border', 
	'border-color', 
	'border-width', 
	'border-style', 
	'border-top', 
	'border-top-color', 
	'border-top-width', 
	'border-top-style', 
	'border-right', 
	'border-right-color', 
	'border-right-width', 
	'border-right-style', 
	'border-left', 
	'border-left-color', 
	'border-left-width', 
	'border-left-style', 
	'border-bottom', 
	'border-bottom-color', 
	'border-bottom-width', 
	'border-bottom-style', 
	'border-style',
	'text-shadow',
	'background-color',
	'box-shadow', 
	'-webkit-box-shadow', 
	'moz-box-shadow', 
	'-moz-box-shadow',
	'-o-box-shadow',
	'transition',
	'transition-property',
	'-webkit-transform',
	'-webkit-transition',
	'-webkit-transition-property',
	'-moz-transition',
	'-moz-transition-property',
	'-o-transition',
	'cursor',
	'border-color',
	'filter',
	'opacity'
); sort($colorscheme_keys);

$typography_keys = array(
	'font', 
	'font-family', 
	'font-size', 
	'font-variant', 
	'font-style', 
	'font-weight', 
	'letter-spacing', 
	'white-space', 
	'text-transform', 
	'text-decoration'
); sort($typography_keys);

function layout_filter($css_key){
	global $layout_keys;
    return in_array($css_key, $layout_keys);
}

function theme_filter($css_key){
	global $colorscheme_keys;
    return in_array($css_key, $colorscheme_keys);
}

function remove_colors(&$item1, $key){
	global $layout_keys;
    if(!in_array($key, $layout_keys)){
		$item1 = null;
	}
}

function filter_using(&$item1, $key, $arr){
    if(!in_array($key, $arr)){
		$item1 = null;
	}
}

function remove_null($item){
	if( $item == null ){ return false; }
	return true;
}

function shailan_get_css_code($css_array, $multiline){
	if($multiline){ $nl = "\n"; } else { $nl = " "; }
	$result = "";
	foreach($css_array as $key => $values) {
	  $key = trim($key);
	  $result .= $key." {" .$nl ;
	  foreach($values as $key => $value) {
		$value = stripslashes($value);
		$result .= "$key: $value;" . $nl;
	  }
	  $result .= "}\n";
	}
	return $result;
}

function shailan_filter_css($css, $css_filter){
	$lcss = array();
	foreach($css as $key=>$element){
		array_walk($element, 'filter_using', $css_filter);	
		ksort($element);
		$lcss[$key] = array_filter($element, "remove_null");
	}
	$lcss = array_filter($lcss, "remove_null");	
	/*echo "<pre>";
	print_r($lcss);
	echo "</pre>";*/
	ksort($lcss, SORT_STRING);
	return $lcss;
}

if(isset($_POST['action']) && $_POST['action'] == "Submit"){
/* READ CSS from POST */
$splt_single_line = (bool)!$_POST['splt_single_line'];
$css = $_POST['css'];

$cssp -> ParseStr($css); // Parse css to array

$css_keys = array();
foreach($cssp->css as $key=>$element){
	if(is_array($element)){
		foreach($element as $part=>$value){
			$css_keys[] = $part;
		}
	}
}
$css_keys = array_unique($css_keys);
//sort($css_keys);
echo "<pre style=\"background:#ddd; border:1px solid #ccc;padding:10px; width:540px; height:300px; overflow-y: scroll; \">";
foreach($css_keys as $key) echo $key . "\n";
echo "</pre>";

$layout_css = shailan_filter_css($cssp->css, $layout_keys);

echo "<h3>Layout css</h3>";
echo "<pre style=\"background:#ddd; border:1px solid #ccc;padding:10px; width:540px; height:300px; overflow-y: scroll; \">";
echo shailan_get_css_code($layout_css, $splt_single_line);
//print_r($css2);
echo "</pre>";

$typography_css = shailan_filter_css($cssp->css, $typography_keys);

echo "<h3>Typography</h3>";
echo "<pre style=\"background:#ddd; border:1px solid #ccc;padding:10px; width:540px; height:300px; overflow-y: scroll; \">";
echo shailan_get_css_code($typography_css, $splt_single_line);
//print_r($css2);
echo "</pre>";

$colorscheme_css = shailan_filter_css($cssp->css, $colorscheme_keys);

echo "<h3>Color Scheme</h3>";
echo "<pre style=\"background:#ddd; border:1px solid #ccc;padding:10px; width:540px; height:300px; overflow-y: scroll; \">";
echo shailan_get_css_code($colorscheme_css, $splt_single_line);
//print_r($css2);
echo "</pre>";
} 
?>

<form method="post">
<!-- <input type="text" name="pattern" value="<?php if(isset($pattern)){ echo $pattern; } else { echo "/\{ *(.*?)\}/i"; }; ?>" /> -->
<textarea name="css" cols="100" rows="15"><?php if(isset($css)){ echo stripslashes($css); }; ?></textarea><br />
<input type="checkbox" name="splt_single_line" <?php if(isset($splt_single_line) && $splt_single_line == false){ echo " checked=\"true\""; }; ?> /> Output rules to single line <br />
<input type="submit" name="action" value="Submit" /> 
</form>

			</div><!-- .entry-content -->

			<?php get_template_part('entry', 'footer'); ?>
			</div><!-- #post-## -->

			<?php 
				get_template_part('share', 'single'); 
			?>
			
			<div id="after-content">
				<?php dynamic_sidebar('single-widgets-bottom'); ?>
			</div>

			<?php comments_template( '', true ); ?>
			
<?php endwhile; // end of the loop. ?>
			
			</div><!-- #content -->
		</div><!-- #container -->
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>




