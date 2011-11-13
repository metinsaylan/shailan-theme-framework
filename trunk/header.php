<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '&bull;', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ) ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php stf_stylesheets(); // Embed styles ?>
	<?php wp_head(); // For plugins ?>

	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'stf' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'stf' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/app/scripts/html5.js" type="text/javascript"></script>
	<![endif]-->

</head>
<body <?php body_class(); ?>>
<div id="top"></div>

<?php global $posts_displayed; $posts_displayed = array(); ?>
<?php do_action('body_top'); ?>

<!-- Header Wrapper -->
<div id="header-wrapper" class="clearfix">

	<div id="topnav-wrap">
	<div id="topnav" class="clearfix">
		<?php 
		
		$args = array(
			'theme_location'  => 'topnav',
			'menu_class'      => 'dropdown', 
			'menu_id'         => 'top-navigation',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'fallback_cb'	  => 'top_nav_callback'
		);
		
		wp_nav_menu( $args ); ?>
	</div>
	</div>

	<!-- Header -->
	<div id="header" class="clearfix">
		<?php stf_branding(); ?>
		<div id="searchform-wrapper"><?php get_search_form(); ?></div>
		<?php get_template_part('subscribe'); ?>
	</div>
	<!-- [End] Header -->
	
	<div id="header-bottom-wrap">
		<div id="header-bottom" class="">
			<?php dynamic_sidebar('header-bottom') ?>
		</div>
	</div>
	
</div>
<!-- [End] Header Wrapper -->

<?php get_template_part('billboard', 'index'); // BILLBOARD ?>
