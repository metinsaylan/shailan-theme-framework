<?php

	// INCLUDE FRAMEWORK
	include_once('shailan-theme-framework/stf-framework.php');
	
	// ADD WIDGET AREAS (If no sidebars added STF will use default sidebar set.
	stf_add_widget_area('Sidebar Home', 'sidebar-home', '');
	stf_add_widget_area('Sidebar Inner', 'sidebar', '');
	
	stf_add_widget_area('Footer Column 1', 'footer-column-1', '');
	stf_add_widget_area('Footer Column 2', 'footer-column-2', '');
	stf_add_widget_area('Footer Column 3', 'footer-column-3', '');
	stf_add_widget_area('Footer Column 4', 'footer-column-4', '');
	
	stf_add_widget_area('Footer Credits', 'credits', '');
	
	// ADD IMAGE SIZES
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'featured', 930, 243, true );
		add_image_size( 'post-thumbnail', 210, 125, true );
	}
	
	// ADD NAV MENUS
	add_theme_support('nav_menus');
	register_nav_menu('header', 'Header Navigation');


// CUSTOMIZATIONS	
function my_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
} // function

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );