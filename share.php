<div class="share">

	<?php
		$id = get_the_ID();
		$title = get_the_title();
		$url = stf_get_shortlink();
		$tweet = stf_generate_post_tweet( $id );
	?>

	<!-- facebook share -->
	<a class="share-button like" href="http://www.facebook.com/sharer.php?u=<?php echo $url ?>&t=<?php echo urlencode( $title ); ?>" rel="nofollow" target="_blank">share</a>

	<!-- tweet -->
	<a class="share-button tweet" href="http://twitter.com/?status=<?php echo rawurlencode($tweet) ?>" rel="nofollow" target="_blank">tweet</a>

	<!-- bookmark -->
	<a href="http://www.delicious.com/save" onclick="window.open('http://www.delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;" class="share-button delicious" rel="nofollow">bkmrk</a>

	<!-- Digg Button -->
	<a href="http://digg.com/submit?url=<?php echo $url; ?>&bodytext=<?php echo urlencode( $title ); ?>" target="_blank" rel="nofollow" class="share-button digg">digg</a>

	<!-- Buzz button -->
	<a href="http://www.google.com/buzz/post?url=<?php echo $url; ?>&imageurl=<?php echo $thumb_url; ?>" target="_blank" rel="nofollow" class="share-button buzz">buzz</a>

</div>