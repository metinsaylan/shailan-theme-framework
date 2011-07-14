<?php 
	$post_index = 1; while ( have_posts() ): the_post(); 
	$posts_displayed[] = $post->ID;
?>
	<div class="entry-wrap">
		<!-- Post -->
		<div id="featured-<?php the_ID(); ?>" <?php post_class('clearfix featured-post'); ?>>
		
			<!-- Post Thumbnail -->
			<?php stf_entry_thumbnail( array( 80, 80 ) ); ?>
			<!-- [End] Post Thumbnail -->

			<div class="entry-body">
				<div class="entry-header">
					<!-- Entry Title -->
					<div class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'shailan' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" <?php if(false){ ?>xref="page#<?php the_ID(); ?>" class="ajax"<?php } ?>><?php the_title(); ?></a></div>
					<!-- [End] Entry Title -->

					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'shailan' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="read-more block small">READ MORE</a>
				</div>
			</div>
		</div>
		<!-- [End] Post -->
	</div>
<?php endwhile; /* End The Loop */ ?>