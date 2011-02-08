<div class="share-bottom">
<?php
	$the_ID = get_the_ID(); 
	$url = stf_get_shortlink( $the_ID );
	$title = get_the_title(); 
	$tweet = stf_get_tweet( $the_ID ); 
?>
	<span class='st_facebook' st_title='<?php echo $title; ?>' st_url='<?php echo $url; ?>' displayText='facebook'></span><span class='st_twitter' st_title='<?php echo $tweet; ?>' st_url='<?php echo rawurlencode($url); ?>' displayText='twitle'></span><span class='st_email' st_title='<?php echo $title; ?>' st_url='<?php echo $url; ?>' displayText='email'></span><span class='st_sharethis' st_title='<?php echo $title; ?>' st_url='<?php echo $url; ?>' displayText='paylaş'></span>
</div>