<?php 
	if( is_home() || is_archive() || is_search() || is_front_page() ) {
		// DISPLAY THUMBNAIL ON ARCHIVES & SEARCH ONLY
		stf_entry_thumbnail( array(80,80) );
	} 
?>

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