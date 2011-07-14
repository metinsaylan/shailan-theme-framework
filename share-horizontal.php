<div class="share-horizontal clearfix">

	<?php
		$id = get_the_ID();
		$title = get_the_title();
		$url = stf_get_shortlink();
		$tweet = stf_generate_post_tweet( $id );
	?>
	<div class="share-label">Like this post?</div>
	
	<div class="share-button tweet-button">
		<!-- tweet -->
		<a href="http://twitter.com/share" class="twitter-share-button tooltip" data-text="<?php echo $tweet ?>" data-count="horizontal" data-via="shailancom" title="Tweet this post!" >Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	</div>

	<div class="share-button plusone-button">
		<!-- plusone -->
		<g:plusone size="medium"></g:plusone>
	</div>

	<div class="share-button facebook-button">
		<!-- facebook share -->
		<fb:like href="<?php echo $url ?>" send="true" layout="button_count" width="120" show_faces="false" ></fb:like>
	</div>

</div>