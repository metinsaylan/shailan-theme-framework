<div class="share-horizontal clearfix">

	<?php
		$id = get_the_ID();
		$title = get_the_title();
		$url = stf_get_shortlink();
		$tweet = stf_generate_post_tweet( $id );
		
		$context = 'post';
		if( is_page() ) $context = 'page';
		if( is_attachment() ) $context = 'file';
		if( get_post_format() == 'link' ) $context = 'link';		
		if( get_post_format() == 'gallery' ) $context = 'gallery';		
		if( get_post_format() == 'image' ) $context = 'image';		
		if( get_post_format() == 'quote' ) $context = 'quote';		
		if( get_post_format() == 'chat' ) $context = 'chat';		
		if( get_post_format() == 'video' ) $context = 'video';		
		if( get_post_format() == 'audio' ) $context = 'audio';		
		
	?>
	<div class="share-label">Like this <?php echo $context; ?>?</div>
	
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