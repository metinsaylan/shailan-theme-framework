<?php
/* Theme name */
if(TEMPLATEPATH !== STYLESHEETPATH){ $themename = ucfirst(get_stylesheet()); } 
	else { $themename = "Shailan Theme Framework"; }

/* Init framework */
include_once('framework/stf-framework.php'); // Load Framework

// Load options (automattic options page)
if(TEMPLATEPATH !== STYLESHEETPATH && file_exists(trailingslashit(get_stylesheet_directory()) . 'options.php')){
	include_once(trailingslashit(get_stylesheet_directory()) . 'options.php');
	$stf->extend_options($options);
} elseif(file_exists(trailingslashit(get_template_directory()) . 'options.php')) {
	include_once(trailingslashit(get_template_directory()) . 'options.php');
	$stf->extend_options($options);
}

if(!function_exists('stf_add_widget_areas')){ // Pluggable
function stf_add_widget_areas($stf){
	// Add sidebars (automatically register)
	$stf->add_widget_area('Top-bar', 'topbar', '', '');
	$stf->add_widget_area('Header', 'header', '', '');
	$stf->add_widget_area('Navigation', 'navigation', '', '');
	$stf->add_widget_area('Content', 'content', '', '');
	$stf->add_widget_area('Sidebar', 'sidebar', '', '');
	$stf->add_widget_area('Sidebar2', 'sidebar2', '', '');
	$stf->add_widget_area('Footer Columns', 'footer-columns', '', '');
	$stf->add_widget_area('Footer Wide', 'footer-wide', '', '');
	$stf->add_widget_area('Entry Header', 'entry-header');
	$stf->add_widget_area('Entry Footer', 'entry-footer');
	
	return $stf;
} }

if(!function_exists('stf_setup_theme')){ // Pluggable
function stf_setup_theme($stf){
	// Define image sizes
	$image_sizes = array(
		'featured_post_thumbnail' => '125x125',
		'index_thumbnail' => '200x200',
		'post_teaser' => '250x250'
	);

	$theme_options = array(
		"name" => $themename,
		"shortname" => "stf", 
		"domain" => "stf",
		"editor_style" => true,
		"nav_menus" => true,
		"custom_background" => true,
		"post_thumbnails" => true,
		"automatic_feed_links" => true,
		"thumbnail_size" => "200x200",
		"custom_image_sizes" => $image_sizes,
		"localization_directory" => TEMPLATEPATH . '/languages'
	);

	$stf->setupTheme($theme_options);
} } 

// Ready? Run!!

stf_add_widget_areas($stf);
stf_setup_theme($stf);

function shailan_user_only_shortcode( $atts, $content = null ){
	if( null != $content && current_user_can('read') ){
		return $content;
	} else {
		return "[ MEMBERS ONLY SECTION ]";
	}
}

add_shortcode('membersonly', 'shailan_user_only_shortcode');

?>