<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
<div class="entry-body" class="clearfix">

	<?php if ( ! empty( $post->post_parent ) ) : $parent = $post->post_parent; ?>
		<p class="parent-title"><a href="<?php echo get_permalink( $post->post_parent ); ?>" title="<?php esc_attr( printf( __( 'Return to %s', 'stf' ), get_the_title( $post->post_parent ) ) ); ?>" rel="gallery"><?php
			/* translators: %s - title of parent post */
			printf( __( '<span class="meta-nav">&larr;</span> %s', 'stf' ), get_the_title( $post->post_parent ) );
		?></a></p>
	<?php endif; ?>

	<?php get_template_part('entry', 'header'); ?>
	
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content" class="clearfix">
			
			<div class="entry-attachment">
<?php if ( wp_attachment_is_image() ) :
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	
	$counter = 0;
	$prev_attachments = array();
	$next_attachments = array();
	$current_id = 0;
	
	foreach ( $attachments as $k => $attachment ) {
		$counter++;
		if ( $attachment->ID == $post->ID )
			break;
	}
	
	$current_id = $k + 1;
	$k++;
	
	// If there is more than 1 image attachment in a gallery
	if ( count( $attachments ) > 1 ) {
	
			// Back links first
			for ($i = 10; $i >= 1; $i--) {
				if( isset($attachments[ ($k - $i - 1) ]) ){
					$link = array(
						'id' => ($k - $i),
						'URL' => get_attachment_link( $attachments[ ($k - $i - 1) ]->ID )
					);
					$prev_attachments[] = $link;
				}
			}
			
			// Back links first
			for ($i = 1; $i <= 10; $i++) {
				if( isset($attachments[ ($k + $i - 1) ]) ){
					$link = array(
						'id' => ($k + $i),
						'URL' => get_attachment_link( $attachments[ ($k + $i - 1) ]->ID )
					);
					$next_attachments[] = $link;
				}
			}
	
	
		if ( isset( $attachments[ $k ] ) ){
		
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
			
		} else {
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
		}
		
	} else {
		// or, if there's only 1 image attachment, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>

						<div class="attachment-navi">
							<?php	if ( count( $attachments ) > 1 ) {
								foreach($prev_attachments as $key=>$link){
									echo " <a href=\"".$link['URL']."\">" . $link['id'] . "</a> ";
								}
							}	?> <strong><?php echo $current_id; ?></strong> 
							<?php	if ( count( $attachments ) > 1 ) {
								foreach($next_attachments as $key=>$link){
									echo " <a href=\"".$link['URL']."\">" . $link['id'] . "</a> ";
								}
							}	?>
						</div>

						<p class="attachment"><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
							$attachment_width  = apply_filters( 'twentyten_attachment_size', 900 );
							$attachment_height = apply_filters( 'twentyten_attachment_height', 900 );
							echo wp_get_attachment_image( $post->ID, array( $attachment_width, $attachment_height ) ); // filterable image width with, essentially, no limit for image height.
						?></a></p>

						<div id="nav-below" class="navigation clearfix">
							<div class="nav-previous"><?php previous_image_link( false ); ?></div>
							<div class="nav-next"><?php next_image_link( false ); ?></div>
						</div><!-- #nav-below -->
						
						<?php echo $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = '$parent' AND post_type = 'attachment'" ); ?> pictures // <?php echo stf_views(); ?>
						
						<div class="attachment-navi">
							<?php	if ( count( $attachments ) > 1 ) {
								foreach($prev_attachments as $key=>$link){
									echo " <a href=\"".$link['URL']."\">" . $link['id'] . "</a> ";
								}
							}	?> <strong><?php echo $current_id; ?></strong> 
							<?php	if ( count( $attachments ) > 1 ) {
								foreach($next_attachments as $key=>$link){
									echo " <a href=\"".$link['URL']."\">" . $link['id'] . "</a> ";
								}
							}	?>
						</div>
<?php else : ?>
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
<?php endif; ?>
						</div><!-- .entry-attachment -->
			
				<?php the_content( stf_more( ) ); ?>
				<?php stf_entry_pages(); ?>
				
				<?php if( is_single() ) { stf_related_posts(); } ?>
				
			</div><!-- .entry-content -->
		<?php endif; ?>

	<?php get_template_part('entry', 'footer'); ?>

</div>
</div><!-- #post-<?php the_ID(); ?> -->

<?php stf_comments(); ?>
