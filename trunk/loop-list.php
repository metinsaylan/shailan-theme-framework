<?php $post_index = 1; while ( have_posts() ): the_post(); ?>

	<li id="entry-<?php the_ID(); ?>">
	
		<a href="<?php the_permalink(); ?>" rel="bookmark" class="permalink"><?php the_title(); ?></a>
		
	</li>
	
<?php endwhile; ?>
