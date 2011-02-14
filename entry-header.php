<?php $blocktag = ( ( is_single() || is_page() ) ? 'h1' : 'h2' ); // Per seo ?>

<!-- Entry Header -->
<div class="entry-header">
	<<?php echo $blocktag; ?> class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</<?php echo $blocktag; ?>>
	
	<?php stf_entry_header_meta(); ?>
</div>
<!-- [End] Entry Header -->