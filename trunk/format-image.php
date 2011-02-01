<div class="entry-body">
	<div class="entry-content">
		<?php the_content( sprintf( __('Continue reading "%s" &rarr;', 'stf'), the_title('', '', false) ) ); ?>
		<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:','stf') . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
</div>
<div class="clear"></div>