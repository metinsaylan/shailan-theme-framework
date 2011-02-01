<?php 

include_once('stf-framework.php'); // INCLUDE FRAMEWORK
	
if(! function_exists('theme_setup')) {
function theme_setup(){

	// ADD WIDGET AREAS (If no sidebars added STF will use default sidebar set.
	/*
		stf_add_widget_area('Sidebar Home', 'sidebar-home', '');
		stf_add_widget_area('Sidebar Inner', 'sidebar', '');
		
		stf_add_widget_area('Footer Column 1', 'footer-column-1', '');
		stf_add_widget_area('Footer Column 2', 'footer-column-2', '');
		stf_add_widget_area('Footer Column 3', 'footer-column-3', '');
		stf_add_widget_area('Footer Column 4', 'footer-column-4', '');
		
		stf_add_widget_area('Footer Credits', 'credits', '');
	*/

	// Post Thumbnails & Custom Image Sizes
	add_theme_support( 'post-thumbnails', array('post', 'page') ); // Add any other custom post types here
	add_image_size( 'home', 200, 200, true );
	add_image_size( 'featured', 940, 320, true );
	add_image_size( 'post-thumbnail', 210, 125, true );

	// Navigation Menus
	add_theme_support('nav_menus');
	register_nav_menu('header', 'Header Navigation');

	// Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );
	
	// Editor Style
	add_editor_style('/css/editor-style.css');
	
	
	
	// Queue Scripts 
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/theme.js', 'jquery' );
	

} add_action('after_setup_theme', 'theme_setup');
}