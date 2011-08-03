<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-body">
	<div class="gallery-wrap">
		<h2><?php the_title(); ?></h2>
		
		<div id="gallery-<?php the_ID(); ?>" class="gallery-container">
			<ul class="gallery-display clearfix">
		<?php
			$args = array( 'post_type' => 'attachment', 'numberposts' => 3, 'post_status' => null, 'post_parent' => $post->ID, 'orderby' => 'rand' ); 
			$attachments = get_posts($args);
			if ($attachments) {
				foreach ( $attachments as $attachment ) {
					echo "<li>";
						echo wp_get_attachment_link( $attachment->ID, array(150, 125), true, false);
					echo "</li>";
				}
			}
			?>
			</ul>
		</div>
		
		<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('View all &rarr;'); ?></a>
	</div>
	<?php get_template_part('entry', 'footer'); ?>
</div>
</div><!-- #post-<?php the_ID(); ?> -->