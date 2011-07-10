<?php 

	if( is_single() || is_page() ){ 
		$titleblock = "h1";
	} elseif( is_home() ) {
		$titleblock = "h2";
	} elseif( is_archive() ){
		$titleblock = "h3";
	} else { 
		$titleblock = "h2";
	}
	
?>

<!-- Entry Header -->
<div class="entry-header">

	<!-- Entry Title -->
	<<?php echo $titleblock; ?> class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'shailan' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" <?php if( 0 ): ?> xref="post#<?php the_ID(); ?>" class="ajax"<?php endif; ?>><?php the_title(); ?></a></<?php echo $titleblock; ?>>
	<!-- [End] Entry Title -->

	<?php stf_entry_header_meta(); ?>

</div>
<!-- [End] Entry Header -->