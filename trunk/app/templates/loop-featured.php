<?php 
	$post_index = 1; while ( have_posts() ): the_post(); 
	$posts_displayed[] = $post->ID;
?>
	<div class="entry-wrap">
		<!-- Post -->
		<div id="featured-<?php the_ID(); ?>" <?php post_class('clearfix featured-post'); ?>>
		
			<!-- Post Thumbnail -->
			<?php stf_entry_thumbnail( array( 156, 156 ) ); ?>
			<!-- [End] Post Thumbnail -->

			<div class="featured-entry-body">
				<div class="featured-entry-header">
					<!-- Entry Title -->
					<h3 class="featured-entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'stf' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" <?php if(false){ ?>xref="page#<?php the_ID(); ?>" class="ajax"<?php } ?>><?php the_title(); ?></a></h3>
					<!-- [End] Entry Title -->
				</div>
			</div>
		</div>
		<!-- [End] Post -->
	</div>
<?php endwhile; /* End The Loop */ ?>