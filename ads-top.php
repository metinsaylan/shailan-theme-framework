<div class="teaser">
	<?php if( has_post_thumbnail() ){ ?>
	<!-- If post has a thumbnail -->
	
		<!-- Advertisement -->
		<div class="teaser-ads alignleft">
				<?php echo do_shortcode('[adsense type="medium-rectangle"]'); ?>
		</div>
		<!-- [End] Advertisement -->
		
		<!-- Post thumbnail -->
		<div class="teaser-thumbnail">
			<?php the_post_thumbnail('home'); ?>
		</div>	
		<!-- [End] Post thumbnail -->
		
		<div class="clear"></div>
	<?php } else { ?>
	<!-- No thumbnail exists -->
	
		<!-- Advertisement -->
		<div class="teaser-ads alignright">
			<?php echo do_shortcode('[adsense type="medium-rectangle"]'); ?>
		</div>
		<!-- [End] Advertisement -->
		
	<?php }	?>
</div>