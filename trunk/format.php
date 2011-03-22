<!-- Post Thumbnail -->
<?php stf_entry_thumbnail('home'); ?>
<!-- [End] Post Thumbnail -->

<div class="entry-body">

	<?php get_template_part('entry', 'header'); ?>
	
	<!-- Entry Content -->
	<div class="entry-content">
	<?php 
	
		if( is_archive() ){ 
			the_excerpt(); 
		} else {
			the_content( stf_more() ); 
		}
	
	?>
		
		<?php stf_entry_pages_navigation(); ?>
	</div>
	<!-- [End] Entry Content -->

	<!-- Entry Footer -->
	<div class="entry-footer">
		<?php stf_entry_footer_meta(); ?>
	</div>
	<!-- [End] Entry Footer -->
	
	<?php stf_comments(); ?>

</div>

<div class="clear"></div>