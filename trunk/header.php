<?php locate_template( array('head.php'), true ) ?>

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
		
		
		<?php if(is_active_sidebar('header-bottom')){ ?>
			<?php stf_widget_area('header-bottom'); ?>
		<?php } else { ?>
		<div id="header-bottom">
			<div id="navigation">
			<ul class="menu main-menu">
			<?php 
				$args = array(
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
					
				wp_list_pages( $args );
			?>
			</ul>
			
			<div id="sub-navigation">
				<ul class="menu sub-menu">
				<?php
				
				$subpage_args = array(
				'depth'        => 1,
				'child_of'     => $post->ID,
				'title_li'     => ''
				);
				
				wp_list_pages( $subpage_args );
			?></ul>
			
				<div class="clear"></div>
			</div>
		
			</div>
			</div>
		<?php } ?>

	</div>
	<!-- [End] Header -->
	
</div>
<!-- [End] Header Wrapper -->
