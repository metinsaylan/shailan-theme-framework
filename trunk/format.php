<!-- Post Thumbnail -->
<?php stf_entry_thumbnail('home'); ?>
<!-- [End] Post Thumbnail -->

<div class="entry-body">

	<div class="entry-header">
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php /*k2_permalink_title(); */ ?>" class="permalink"><?php the_title(); ?></a>
		</h2>
		
		<div class="entry-meta">
			<?php stf_entry_header() ?>
		</div>
	</div><!-- .entry-header -->
	
	<div class="entry-content">
		<?php 
		
		if( is_archive() ){ 
			the_excerpt(); 
		} else {
			the_content( sprintf( __('Continue reading "%s" &rarr;', 'stf'), the_title('', '', false) ) ); 
		}
		
		?>
		<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:','stf') . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	<?php if(is_single()){ get_template_part('authorinfo', 'single'); } ?>

	<div class="entry-footer">
		<?php stf_entry_footer() ?>
	</div><!-- .entry-footer -->

</div>

<div class="clear"></div>