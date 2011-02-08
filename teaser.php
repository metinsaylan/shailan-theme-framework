<div class="teaser">
	<?php if( has_post_thumbnail() ){ ?>
	<!-- WITH THUMBNAIL -->
		<div class="teaser-ads alignleft">
			<?php echo do_shortcode('[adsense type="medium-rectangle"]'); ?>
		</div>
		
		<div class="teaser-thumbnail">
			<?php the_post_thumbnail('home'); ?>
		</div>	
		
		<div class="clear"></div>
	<?php } else { ?>
	<!-- NO THUMBNAIL -->
		<div class="teaser-ads alignright">
			<?php echo do_shortcode('[adsense type="medium-rectangle"]'); ?>
		</div>
	<?php }	?>
</div>