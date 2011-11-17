<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix featured-post'); ?>>
<?php 
	if( ( is_home() || is_archive() || is_search() || is_front_page() ) 
		&& !in_array(get_post_format(), array('image', 'video', 'quote') ) ) {
		stf_entry_thumbnail( 'featured' );
	} 
?>
<div class="entry-body" class="clearfix">

	<!-- Entry Title -->
	<h3 class="featured-entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'stf' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" <?php if(false){ ?>xref="page#<?php the_ID(); ?>" class="ajax"<?php } ?>><?php the_title(); ?></a></h3>
	<!-- [End] Entry Title -->

</div></div>