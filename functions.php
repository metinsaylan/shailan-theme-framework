<?php 

define( 'STF_DEBUG', false );
include_once('app/stf-framework.php'); // INCLUDE FRAMEWORK 
  
if(! function_exists('theme_setup')) {
function theme_setup(){

	// Post Thumbnails & Custom Image Sizes
	add_theme_support( 'post-thumbnails', array('post', 'page') ); // Add any other custom post types here
	set_post_thumbnail_size( '200', '200', true );

	// Navigation Menus
	add_theme_support('nav_menus');
	register_nav_menu( 'topnav', 'Top Navigation' );
	register_nav_menu( 'primary', 'Header Navigation' );
	register_nav_menu( 'footer', 'Footer Navigation' );

	// Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );
	
	// Editor Style
	add_editor_style( '/app/css/editor.css' );
	
	// Enable custom background
	add_custom_background();
	
	// Languages
	load_theme_textdomain( 'stf', TEMPLATEPATH . '/lang' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	
	add_action('init', 'template_enqueue_scripts');

} add_action('after_setup_theme', 'theme_setup');
}

// Enqueue template scripts
function template_enqueue_scripts(){
	if( !is_admin() ){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'shailan.jumper', get_template_directory_uri() . '/app/scripts/shailan.jumper.js', 'jquery' );
		wp_enqueue_script( 'shailan.tooltips', get_template_directory_uri() . '/app/scripts/shailan.tooltips.js', 'jquery' );
		wp_enqueue_script( 'shailan.tooltips', get_template_directory_uri() . '/app/scripts/shailan.dropdown.js', 'jquery' );
	}
}

function top_nav_callback(){
	$args = array(
	'sort_column' => 'menu_order, post_title',
	'menu_class'  => 'ddmenu',
	'include'     => '',
	'exclude'     => '',
	'link_before' => '',
	'depth'		  => 4,
	'link_after'  => '' );
	
	wp_page_menu( $args );
}

function nav_callback(){
	$args = array(
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'list',
    'show_count'         => 0,
    'hide_empty'         => 1,
    'use_desc_for_title' => 0,
    'exclude'            => '',
    'exclude_tree'       => '',
    'include'            => '',
    'hierarchical'       => true,
    'title_li'           => '',
    'echo'               => 1,
    'depth'              => 4,
    'current_category'   => 1,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'number'             => 12
	);
	echo "<ul class=\"ddmenu\">";
		wp_list_categories( $args );
	echo "</ul>";
}