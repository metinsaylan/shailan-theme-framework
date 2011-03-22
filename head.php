<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( '&bull;', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ) ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	
	<?php stf_layout(); ?>
	
	<!-- Framework styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/framework.css" />
	
	<!-- Stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php //bloginfo('stylesheet_url') ?>" />
	
	<?php wp_head(); // For plugins ?>

	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'widgetbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'widgetbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	
<!-- Paste HEAD scripts here -->





<!-- [End] Paste HEAD scripts here -->
</head>
<body <?php body_class(); ?>>
<?php global $posts_displayed; $posts_displayed = array(); ?>
<!-- Paste BODY scripts here -->





<!-- [End] Paste BODY scripts here -->
