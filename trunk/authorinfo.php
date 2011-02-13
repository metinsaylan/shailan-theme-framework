<?php 
 global $author; 
 $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
<div id="authorbox">
	<div class="author-avatar">
		<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '50' ); }?>
	</div>
	
	<div class="author-info">
	
	<strong><?php the_author_link() ?></strong> (<a href="<?php global $authordata; echo get_author_posts_url( $authordata->ID, $authordata->user_nicename ); ?>"><?php the_author_posts(); _e(' posts');?></a>) <br />
	
	<?php if(isset($curauth->description)){
		echo '<div class="author-description">';
		echo $curauth->description;
		echo '</div>';
	} ?>
	
	Follow <?php the_author() ?> on <a href="<?php the_author_meta('facebook'); ?>" rel="nofollow" target="_blank">facebook</a> or <a href="<?php the_author_meta('twitter'); ?>" rel="nofollow" target="_blank">twitter</a>.
	
	</div>

</div>
