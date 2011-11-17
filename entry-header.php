<?php 

	if( is_single() || is_page() ){ 
		$titleblock = "h1";
	} else { 
		$titleblock = "h2";
	}
	
?>

<div class="entry-header">

	<div class="categories"><?php 
		global $post;
		$categories = get_the_category( $post->ID );
		if( $categories ){
			$cntr = 0;		
			foreach( $categories as $category ){
				if( $cntr == 0) {
					echo '<span class="category-title main-category"><a href="'. get_category_link( $category->cat_ID ) .'" rel="nofollow">' . $category->name . '</a></span>'; 
				} else { 
					echo '<span class="category-title sub-categories"><a href="'. get_category_link( $category->cat_ID ) .'" rel="nofollow">' . $category->name . '</a></span>'; 
				}
				$cntr++;
				if( $cntr > 4 ) break;
			}
		}
	?></div> 	

	<!-- Entry Title -->
	<<?php echo $titleblock; ?> class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'stf' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" <?php if( 0 ): ?> xref="post#<?php the_ID(); ?>" class="ajax"<?php endif; ?>><?php the_title(); ?></a></<?php echo $titleblock; ?>>
	<!-- [End] Entry Title -->
	
	<?php if( is_single() ) { stf_entry_header_meta(); } ?>
	<?php if( ( is_single() || is_page() || is_attachment() ) && 'on' == stf_get_setting('sharing_enabled') ) get_template_part( 'share' ); ?>
	
</div><!-- .entry-header -->
