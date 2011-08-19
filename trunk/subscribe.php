<!-- SUBSCRIBE -->
<div id="subscribe-right">
	<ul class="subscribe-icons">
		<li class="subscribe-label"><?php _e('SUBSCRIBE :', 'stf'); ?></li>
		<li class="subscribe-icon rss">
			<a href="<?php echo stf_get_setting( 'stf_rss_url', get_bloginfo('rss2_url') ); ?>" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/subscribe/rss.png" class="tooltip" title="<?php _e('Subscribe to RSS feed!'); ?>" alt="RSS" /></a>
		</li>
		<li class="subscribe-icon twitter">
			<a href="http://twitter.com/<?php echo stf_get_setting( 'stf_twitter_username' ); ?>" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/subscribe/twitter.png"  class="tooltip" title="<?php printf( __( 'Follow %s on Twitter!', 'stf' ), get_bloginfo('name') ); ?>" alt="Twitter" /></a>
		</li>
		<li class="subscribe-icon facebook">
			<a href="<?php echo stf_get_setting( 'stf_facebook_URL' ); ?>" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/subscribe/facebook.png" class="tooltip" title="<?php printf( __( 'Like %s on Facebook!', 'stf' ), get_bloginfo('name') ); ?>" alt="Facebook"  /></a>
		</li>
		<li class="subscribe-icon email">
			<a href="<?php echo stf_get_setting( 'stf_subscribe_URL' ); ?>" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/subscribe/mail.png" class="tooltip" title="<?php _e('Subscribe using email..'); ?>" alt="e-mail"  /></a>
		</li>
	</ul>
</div>
<!-- /SUBSCRIBE -->