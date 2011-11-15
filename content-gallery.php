<div id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
<div class="entry-body" class="clearfix">

	<?php get_template_part('entry', 'header'); ?>

	<div class="entry-content" class="clearfix">
	<div class="gallery-wrap">
		
		<div id="gallery-<?php the_ID(); ?>" class="gallery-container">
			<ul class="gallery-display clearfix">
		<?php
			if(is_single()){
				$num = -1;
			} else {
				$num = 3;
			}
		
			$args = array( 'post_type' => 'attachment', 'numberposts' => $num, 'post_status' => null, 'post_parent' => $post->ID, 'orderby' => 'rand' ); 
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
		
		<?php if(!is_single()){ ?> 
			<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('View all &rarr;'); ?></a>
		<?php } ?>
	</div>
	</div>
	
	<?php get_template_part('entry', 'footer'); ?>
	
</div>
</div><!-- #post-<?php the_ID(); ?> -->

<?php stf_comments(); ?>