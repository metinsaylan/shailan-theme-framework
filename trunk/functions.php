<?php 

define( 'STF_DEBUG', false );
include_once('app/stf-framework.php'); // INCLUDE FRAMEWORK 
  
if(! function_exists('theme_setup')) {
function theme_setup(){

	// ADD WIDGET AREAS (If no sidebars added STF will use default sidebar set.
	// I am sure you know that; if you add custom sidebars here, you need to edit templates too.
	/*
		stf_add_widget_area('Sidebar Home', 'sidebar-home', '');
	*/

	// Post Thumbnails & Custom Image Sizes
	add_theme_support( 'post-thumbnails', array('post', 'page') ); // Add any other custom post types here
	set_post_thumbnail_size( '200', '200', true );
	add_image_size( 'featured', 940, 320, true );
	add_image_size( 'video-thumbnail', 120, 90, true );
	add_image_size( 'medium-rectangle', 300, 250, true );

	// Navigation Menus
	add_theme_support('nav_menus');
	register_nav_menu('header', 'Header Navigation');

	// Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );
	
	// Editor Style
	add_editor_style( '/css/editor-style.css' );
	
	// Enable custom background
	add_custom_background();
	
	// Languages
	load_theme_textdomain( 'darkside', TEMPLATEPATH . '/lang' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	
	if(!is_admin()){
		// Queue Scripts 
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/theme.js', 'jquery' );
		wp_enqueue_script( 'jumper', get_template_directory_uri() . '/js/shailan.jumper.js', 'jquery' );
		wp_enqueue_script( 'cycle', 'http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js', array( 'jquery') );
	}

} add_action('after_setup_theme', 'theme_setup');
}