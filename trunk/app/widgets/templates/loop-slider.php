<?php

	// Get page width for images
	$stf_page_width = stf_get_setting('stf_page_width');
	$w = $stf_page_width;
	$h = floor( $w * 320 / 940 );

 while ( have_posts() ) : the_post(); ?>				
	<a href="<?php the_permalink(); ?>" rel="bookmark" >
		<?php /* the current post has a thumbnail */
			if( has_post_thumbnail() ){
				$thumbnail_size = array( $w, $h );
				$thumbnail_align = 'center';
				$thumb_id = get_post_thumbnail_id();
				$alt = the_title('','',false);
				/* $src = wp_get_attachment_url($thumb_id);	*/
				echo get_image_tag($thumb_id, $alt, $alt, $thumbnail_align, $thumbnail_size);
			} else {
				echo '<img src="'.get_bloginfo('template_directory').'/images/default-'.$thumbnail_size.'.png" title="'.the_title('','',false).'" width="'.$w.'" height="'.$h.'" class="align'.$thumbnail_align.' size-'.$thumbnail_size.'" />';
			} ?>
	</a>
<?php endwhile; ?>