<div class="share-horizontal">

	<?php
		$id = get_the_ID();
		$title = get_the_title();
		$url = stf_get_shortlink();
		$tweet = stf_generate_post_tweet( $id );
	?>

	Like this post?
	
	<!-- tweet -->
	<a href="http://twitter.com/share" class="twitter-share-button tooltip" data-text="<?php echo $tweet ?>" data-count="horizontal" data-via="shailancom" title="Tweet this post!" >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

	<!-- plusone -->
	<g:plusone size="medium"></g:plusone>
	
	<!-- facebook share -->
	<fb:like href="<?php echo $url ?>" send="true" layout="button_count" width="120" show_faces="false" ></fb:like>

</div>