<div class="share-buttons">

	<?php
		$id = get_the_ID();
		$title = get_the_title();
		$url = stf_get_shortlink();
		$tweet = stf_generate_post_tweet( $id, false );
	?>

	<div class="plusone-count"><g:plusone size="tall"></g:plusone></div>
	
	<div class="twitter-count">
		<a href="http://twitter.com/share" class="twitter-share-button" data-text="<?php echo $tweet ?>" data-count="vertical" data-via="shailancom">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	</div>

	<div class="facebook-count">
		<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $url; ?>&amp;layout=box_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=trebuchet+ms&amp;colorscheme=light&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:65px;" allowTransparency="true"></iframe>
	</div>
	
</div>