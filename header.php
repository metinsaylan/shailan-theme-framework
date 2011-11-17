<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '&bull;', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ) ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<?php wp_head(); // For plugins ?>

	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'stf' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'stf' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

</head>
<body <?php body_class(); ?>>
<a name="top" id="top"></a>

<?php global $posts_displayed; $posts_displayed = array(); ?>
<?php do_action('body_top'); ?>

<!-- Header Wrapper -->
<div id="header-wrapper" class="clearfix">

	<div id="topnav-wrap">
	<div id="topnav" class="clearfix">
		<?php if( ! dynamic_sidebar('header-bottom') ) {
		
			$args = array(
				'theme_location'  => 'topnav',
				'menu_class'      => 'dropdown dropdown-horizontal', 
				'menu_id'         => 'top-navigation',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'fallback_cb'	  => 'top_nav_callback'
			);
			
			wp_nav_menu( $args ); 
		
		} ?>
	</div>
	</div>

	<!-- Header -->
	<div id="header" class="clearfix">
		<?php $logo_url = stf_get_setting('stf_logo_url'); ?>
		
		<!-- Branding -->
		<div id="branding"> <?php
	
		if(strlen($logo_url)>0){ ?>
		
		<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home <?php if(!is_front_page() || !is_home()){ echo 'nofollow';} ?>"><img id="logo" src="<?php echo $logo_url ?>" alt="<?php bloginfo('name') ?>" title="<?php bloginfo('description') ?>" /></a>
		
		
		<?php } else { ?>
	
		<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
		<<?php echo $heading_tag; ?> id="site-title">
			<span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home <?php if(!is_front_page() || !is_home()){ echo 'nofollow';} ?>"><?php bloginfo( 'name' ); ?></a></span>
		</<?php echo $heading_tag; ?>>
		
		<?php } ?>
	
		</div>
		<!-- [End] Branding -->
		
		<div id="searchform-wrapper"><?php get_search_form(); ?></div>
		<?php get_template_part('subscribe'); ?>
	</div>
	<!-- [End] Header -->
	
	<div id="header-bottom-wrap">
		<div id="header-bottom" class="clearfix">
			<?php if( ! dynamic_sidebar('header-bottom') ) {
		
		$args = array(
			'theme_location'  => 'main',
			'menu_class'      => 'dropdown dropdown-horizontal', 
			'menu_id'         => 'main-navigation',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'fallback_cb'	  => 'nav_callback'
		);
		
		wp_nav_menu( $args );		
			
			}?>
		</div>
	</div>
	
</div>
<!-- [End] Header Wrapper -->

<?php get_template_part('billboard', 'index'); // BILLBOARD ?>
