<div class="share">

	<?php
		$id = get_the_ID();
		$title = get_the_title();
		$url = stf_get_shortlink();
		$tweet = stf_generate_post_tweet( $id );
		$thumb_id = get_post_thumbnail_id( $id );
		$thumb_url = wp_get_attachment_image_src( $thumb_id, array(250,250), false );
	?>

	<!-- facebook share -->
	<a class="share-button like tooltip" href="http://www.facebook.com/sharer.php?u=<?php echo $url ?>&t=<?php echo urlencode( $title ); ?>" rel="nofollow" target="_blank" title="Share on facebook"></a>

	<!-- tweet -->
	<a class="share-button tweet tooltip" href="http://twitter.com/?status=<?php echo rawurlencode($tweet) ?>" rel="nofollow" target="_blank" title="Tweet this post!"></a>

	<!-- bookmark -->
	<a href="http://www.delicious.com/save" onclick="window.open('http://www.delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;" class="share-button delicious tooltip" rel="nofollow" title="Bookmark this post"></a>

	<!-- Digg Button -->
	<a href="http://digg.com/submit?url=<?php echo $url; ?>&bodytext=<?php echo urlencode( $title ); ?>" target="_blank" rel="nofollow" class="share-button digg tooltip" title="Digg this post"></a>

	<!-- Buzz button -->
	<a href="http://www.google.com/buzz/post?url=<?php echo $url; ?>&imageurl=<?php echo $thumb_url; ?>" target="_blank" rel="nofollow" class="share-button buzz tooltip" title="Buzz this post"></a>

</div>