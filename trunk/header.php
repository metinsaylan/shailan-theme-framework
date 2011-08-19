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
	
<!-- Paste HEAD scripts here -->


<!-- [End] Paste HEAD scripts here -->
</head>
<body <?php body_class(); ?>>
<div id="top"></div>

<?php global $posts_displayed; $posts_displayed = array(); ?>

<?php do_action('stf_body_top'); ?>

<!-- Paste BODY scripts here -->


<!-- [End] Paste BODY scripts here -->

<!-- Header Wrapper -->
<div id="header-wrapper">
	<!-- Header -->
	<div id="header" class="clearfix">
		<?php stf_widget_area('header-top'); ?>
		<?php stf_branding(); ?>
		<div id="searchform-wrapper"><?php get_search_form(); ?></div>
		<?php get_template_part('subscribe'); ?>
		<?php stf_widget_area('header-bottom'); ?>
	</div>
	<!-- [End] Header -->
</div>
<!-- [End] Header Wrapper -->

<?php get_template_part('billboard', 'index'); // BILLBOARD ?>
