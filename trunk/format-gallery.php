<div class="entry-body">
	<div class="gallery-wrap">
		<div id="gallery-<?php the_ID(); ?>" class="gallery-container">
		<?php
			$args = array( 'post_type' => 'attachment', 'numberposts' => 8, 'post_status' => null, 'post_parent' => $post->ID, 'orderby' => 'rand' ); 
			$attachments = get_posts($args);
			if ($attachments) {
				foreach ( $attachments as $attachment ) {
					// echo "<li>";
					echo wp_get_attachment_link( $attachment->ID, 'medium-rectangle', true, false);
					// echo "</li>";
				}
			}
			?>
		</div>
	</div>
	<div class="gallery-footer">
		<h2 class="inline"><?php the_title(); ?></h2> - <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('View all'); ?></a>
	</div>
</div>
<div class="clear"></div>
<script type="text/javascript"> 
/* <![CDATA[ */
jQuery(document).ready(function() {
    jQuery('#gallery-<?php the_ID(); ?>').cycle({
		fx: 'fade'
	});
});
/* ]]> */
</script> 