<!-- Entry Footer -->
<div class="entry-footer clearfix">
	<?php if( is_single() || is_page() || is_attachment() ) { ?>
		<?php get_template_part('share', 'single'); ?>
		<?php get_template_part('author', 'single'); ?>
		<div class="clear"></div>
		
		<div class="entry-info alignleft">
		<?php // if( is_single() ){ ?>
			<?php echo stf_tags( array( "before"=>"" . __("Tags") . " : " ) ); ?>
		<?php //} ?>
		</div>
	<?php } ?>
	
	<div class="entry-controls alignright">
		<?php if( is_archive() || is_search() ){  
			echo stf_permalink();
			echo " &middot;";
		} ?>
		<?php echo stf_views(); ?>
		<?php echo stf_reply( array( 'before' => '&middot; ' ) ); ?>
		<?php echo stf_edit( array( 'before' => '&middot; ' ) ); ?>
	</div>
	
</div>
<!-- [End] Entry Footer -->

<?php if( is_single() ) { ?>
	<!-- Entry Footer -->
	<div class="explore clearfix">
		<div id="related-posts">
			<h4 class="mt0 mb1"><?php _e('Related Posts', 'darkside'); ?></h4>
			<?php 
				if(function_exists('related_posts')){ 
					related_posts();
				} else {
					stf_related_posts();
				} 
			?>
		</div>
		<div id="post-bottom-ads">
			<?php echo do_shortcode('[adsense type="medium-rectangle"]'); ?>				
		</div>
	</div>
	<!-- [End] Entry Footer -->	
<?php } ?>