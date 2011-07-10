<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( '&bull;', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ) ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	
	<?php stf_layout(); ?>
	<?php stf_framework_stylesheet(); ?>
	
	<!-- Stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
	
	<?php wp_head(); // For plugins ?>

	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'widgetbox' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'widgetbox' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	
<!-- Paste HEAD scripts here -->


<!-- [End] Paste HEAD scripts here -->
</head>
<body <?php body_class(); ?>>

<?php global $posts_displayed; $posts_displayed = array(); ?>
<?php do_action('stf_body_top'); ?>

<!-- Paste BODY scripts here -->


<!-- [End] Paste BODY scripts here -->

<!-- Header Wrapper -->
<div id="header-wrapper">

	<!-- Header -->
	<div id="header" class="clearfix">
		<?php stf_widget_area('header-top'); ?>
		
		<!-- Branding -->
		<div id="branding">
			<?php stf_site_title(); ?>
		</div>
		<!-- [End] Branding -->
		
		<!-- Banner Area -->
		<div id="header-widgets">
			<?php stf_widgets('header'); ?>
		</div>
		<!-- [End] Banner Area -->
		
		<div class="clearboth"></div>
		
		<!-- Header Bottom Widgets -->
		<?php if(is_active_sidebar('header-bottom')){ ?>
			<?php stf_widget_area('header-bottom'); ?>
		<?php } else { ?>
		<div id="header-bottom">
			<div id="navigation" class="clearfix">
			<?php 
				$args = array(
					'show_home'   => true,
					'depth'        => 0,
					'show_date'    => '',
					'date_format'  => get_option('date_format'),
					'child_of'     => 0,
					'exclude'      => '',
					'include'      => '',
					'title_li'     => '',
					'echo'         => 1,
					'authors'      => '',
					'sort_column'  => 'menu_order, post_title',
					'link_before'  => '',
					'link_after'   => '',
					'walker' => '' );
					
				wp_page_menu( $args );
			?>		
			</div>
			</div>
		<?php } ?>
		<!-- [End] Header Bottom Widgets -->

	</div>
	<!-- [End] Header -->
	
</div>
<!-- [End] Header Wrapper -->
