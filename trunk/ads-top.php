<div class="teaser">
	<?php if( has_post_thumbnail() ){ ?>
	<!-- If post has a thumbnail -->
	
		<!-- Advertisement -->
		<div class="teaser-ads alignleft">
		
		<!-- Put your ad code below to show at the top of pages -->
		
				<?php echo do_shortcode('[adsense type="medium-rectangle" channel="4146640651"]'); ?>
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
		<div class="teaser-ads alignleft">
		<!-- Put your ad code below to show at the end of pages -->
			<?php echo do_shortcode('[adsense type="medium-rectangle" channel="3912711549"]'); ?>
		</div>
		<!-- [End] Advertisement -->
		
	<?php }	?>
</div>