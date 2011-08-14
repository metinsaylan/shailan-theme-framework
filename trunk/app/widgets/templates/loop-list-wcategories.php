<ul class="loop-da-loop loop-list-wcategories">
	<?php while ( have_posts() ) : the_post(); ?>				
	<li class="post">
	<span class="category-title"><?php 
		global $post;
		$categories = get_the_category( $post->ID );
		echo $categories[0]->name;
	?></span> 	
	<span class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></li>
	<?php endwhile; ?>
</ul>
<div class="clear"></div>