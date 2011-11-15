
<!-- Footer Wrapper -->
<div id="footer-wrapper">

	<!-- Footer -->
	<div id="footer" class="clearfix">
		
		<div class="row clearfix">
		<!-- Footer Columns -->
		
			<div id="footer-column-1" class="one-third column">
				<?php stf_widgets('footer-column-1'); ?>
			</div>
			
			<div id="footer-column-2" class="one-third column">
				<?php stf_widgets('footer-column-2'); ?>
			</div>
			
			<div id="footer-column-3" class="one-third column last">
				<?php stf_widgets('footer-column-3'); ?>
			</div>
			
		<!-- [End] Footer Columns -->
		</div>
		
		<div id="footer-wide" class="clearfix"> 
			<?php stf_widgets('footer-wide'); ?> 
		</div>
		
	<div id="theme-footer" class="clearfix">
		<div id="footer-line">
			<div class="row clearfix">
				<div class="fl">
					<small><?php stf_theme_footer(); ?></small> <div class="fb-like" data-href="<?php bloginfo('url'); ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false" data-font="segoe ui"></div> 
					
					<?php if( stf_get_setting( 'stf_twitter_username' ) ) { ?>
						<a href="https://twitter.com/<?php echo stf_get_setting( 'stf_twitter_username' ); ?>" class="twitter-follow-button">Follow @<?php echo stf_get_setting( 'stf_twitter_username' ); ?></a>
					<?php } ?>
				</div>
			
				<div class="fr last right">
					<small><a id="scrolltotop" href="#top" class="jumper">Return to Top &uarr;</a></small>
					<?php get_template_part('subscribe', 'small'); ?>
				</div>
			</div>
		</div>
	</div>
		
	</div>
	<!-- [End] Footer -->

</div> 
<!-- [End] Footer Wrapper -->

<?php wp_footer(); // Needed for plugins. Do not remove. ?>

<!-- <?php echo $wpdb->num_queries; ?>Q @ <?php timer_stop(1); ?>s -->

<div id="powerpack">Powered by :<a href="http://wordpress.org" id="wordpress">Wordpress</a> <span class="amp">&amp;</span> <a href="http://shailan.com/wordpress/themes/framework/" id="stf">STF</a></div>

</body>
</html>