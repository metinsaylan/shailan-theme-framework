<li class="post">
<span class="category-title"><?php 
	global $post;
	$categories = get_the_category( $post->ID );
	echo $categories[0]->name;
?></span> 	
<span class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></li>