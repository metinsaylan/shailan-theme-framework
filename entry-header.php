<?php 

	if( is_single() ){ 
		$titleblock = "h1";
	} elseif( is_home() ) {
		$titleblock = "h2";
	} else { 
		$titleblock = "h2";
	}
	
?>
<!-- Entry Header -->
<div class="entry-header">

	<!-- Entry Title -->
	<<?php echo $titleblock; ?> class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'shailan' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" post_id="<?php the_ID(); ?>" class="ajax"><?php the_title(); ?></a></<?php echo $titleblock; ?>>
	<!-- [End] Entry Title -->
	
	<?php stf_entry_header_meta(); ?>
	
</div>
<!-- [End] Entry Header -->