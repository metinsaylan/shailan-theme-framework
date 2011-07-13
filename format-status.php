<div class="entry-body">
	<!-- Entry Content -->
	<div class="entry-content">
		<div class="author-avatar">
			<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '60' ); }?>
		</div>
	
		<?php the_content( ); ?>
	</div>
	<!-- [End] Entry Content -->
	
	<div class="entry-controls">
		<?php stf_entry_short_meta(); ?>	
	</div>
</div>
<div class="clear"></div>