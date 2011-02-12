<div id="authorbox">
    <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
	<div class="authortext">
	   <h4>About <?php the_author_posts_link(); ?></h4>
       <p><?php the_author_meta('description'); ?></p>
	</div>
</div>		