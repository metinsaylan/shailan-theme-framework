<?php // DISPLAY THUMBNAIL ON ARCHIVES & SEARCH ONLY
	if( is_home() || is_archive() || is_search() || is_front_page() ) { ?>
	
	<!-- Post Thumbnail -->
	<?php stf_entry_thumbnail('home'); ?>
	<!-- [End] Post Thumbnail -->
	
<?php } ?>

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
		
		<?php stf_entry_pages(); ?>
	</div>
	<!-- [End] Entry Content -->

	<?php get_template_part('entry', 'footer'); ?>	
	<?php stf_comments(); ?>

</div>

<div class="clear"></div>