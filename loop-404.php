<div class="post hentry">
<div class="entry-content">

<p>Unfortunately, no posts matched your criteria. Please use the search form below to search for somethin' else:</p>


<div class="seperator"></div>

<div class="center">
	<?php get_search_form(); ?>
</div>
	
<div class="seperator"></div>
	<div class="half-width column">

	</div>

	<div class="half-width column">

	</div>
<div class="seperator"></div>

Alternatively you can browse our most popular posts below:


<div class="most-popular half-width column">
<h3>Most popular posts</h3>
	<ul>

	<?php if(function_exists('stats_get_csv')){ $top_posts = stats_get_csv( 'postviews', "days=7&limit=7" ); ?> 
		<?php foreach ( $top_posts as $post ) : if ( !get_post( $post['post_id'] ) || $post['post_title'] == 'Home page' ) continue; ?>
			<li><a href="<?php echo get_permalink( $post['post_id'] ); ?>"><?php echo get_the_title( $post['post_id'] ); ?></a></li>
		<?php endforeach; ?>
	<?php } else { 	
		stf_most_commented_posts( 7, 'loop-list.php' );
	} ?>

	</ul>
</div>



<div class="most-viewed half-width column">
<h3>Recent posts</h3>
	<ul>
	<?php 
		stf_custom_posts( array('posts_per_page' => 7), 'loop-list.php');
	?>
	</ul>
</div>

<div class="seperator"></div>

</div>
</div>