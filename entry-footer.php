<div class="entry-meta clearfix">
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
	
	<div class="entry-controls">
		<?php if( is_archive() || is_search() || in_array( stf_post_format() , array('aside', 'image', 'video', 'gallery', 'quote', 'status') )){  
			echo stf_permalink();
			echo " &middot;";
		} ?>
		<?php echo stf_views(); ?>
		<?php echo stf_reply( array( 'before' => '&middot; ' ) ); ?>
		<?php echo stf_edit( array( 'before' => '&middot; ' ) ); ?>
	</div>
	
</div><!-- #entry-meta -->