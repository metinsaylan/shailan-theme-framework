<?php 
	$post_index = 1; while ( have_posts() ): the_post(); 
	$posts_displayed[] = $post->ID;
	
	if( is_single() ){ 
		$titleblock = "h1";
	} elseif( is_home() ) {
		$titleblock = "h2";
	} else { 
		$titleblock = "h2";
	}
	
?>
	<div class="entry-wrap">
		<!-- Post -->
		<div id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<!-- Post Thumbnail -->
		<?php stf_entry_thumbnail('featured-small'); ?>
		<!-- [End] Post Thumbnail -->

		<div class="entry-body">

			<div class="entry-header">
			<!-- Entry Title -->
			<<?php echo $titleblock; ?> class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'shailan' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" <?php if(false){ ?>xref="page#<?php the_ID(); ?>" class="ajax"<?php } ?>><?php the_title(); ?></a></<?php echo $titleblock; ?>>
			<!-- [End] Entry Title -->
			</div>
			
			<!-- Entry Content -->
			<div class="entry-content">
			<?php 
			 
					the_excerpt(); 
			
			?>
			</div>
			<!-- [End] Entry Content -->

			<!-- Entry Footer -->
			<div class="entry-footer">
				<?php stf_entry_footer_meta(); ?>
			</div>
			<!-- [End] Entry Footer -->

		</div>

		<div class="clear"></div>
		</div>
		<!-- [End] Post -->
	
		<?php //stf_comments(); ?>
	</div>
<?php endwhile; /* End The Loop */ ?>