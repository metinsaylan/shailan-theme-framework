<div class="entry-footer clearfix">
	<div class="footer-meta">
		<?php 
			the_tags( '#', ', #', '' );
		 ?>
	</div>
	
	<div class="entry-controls">
		<?php echo stf_views(); ?>
		<?php echo stf_reply( array( 'before' => '&middot; ' ) ); ?>
		
		<a href="<?php the_permalink(); ?>" class="permalink tooltip" title="<?php the_title_attribute( array('before' => 'Permalink to ', 'after' => '')); ?>"><?php the_title(); ?></a>

		<?php edit_post_link( 'edit post', '<span class="edit-link tooltip" title="Edit post" >', '</span>' ); ?>
		
	</div>
</div><!-- #entry-meta -->



