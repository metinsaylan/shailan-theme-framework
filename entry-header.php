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

	<!-- Entry Categories on homepage -->
	<?php if( is_home() || is_archive() ){ ?>
		<div class="entry-category right"><?php 
			$category = get_the_category(); 
			$is_first = true;
			
			foreach($category as $cat){ 
				$category_link = get_category_link( $cat->cat_ID );
				if(!$is_first){ echo " <span class=\"category-seperator\">//</span> "; }
					?><a href="<?php echo $category_link; ?>" title="<?php echo $cat->cat_name; ?>" rel="category" 
						<?php /* xref="category#<?php echo $cat->cat_ID; ?>" */ ?> 
						><?php echo $cat->cat_name; ?></a><?php
					$is_first = false;
				}					
			?></div>
	<?php } ?>
	<!-- [End] Entry Categories -->

	<!-- Entry Title -->
	<<?php echo $titleblock; ?> class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'shailan' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" <?php if( 0 ): ?> xref="post#<?php the_ID(); ?>" class="ajax"<?php endif; ?>><?php the_title(); ?></a></<?php echo $titleblock; ?>>
	<!-- [End] Entry Title -->

	<?php stf_entry_header_meta(); ?>

</div>
<!-- [End] Entry Header -->