<div class="post hentry">
<div class="entry-content">

<p>Unfortunately, no posts matched your criteria. Please use the search form below to search for somethin' else:</p>


<div class="seperator"></div>

<div class="center">
	<?php get_search_form(); ?>
</div>
	
<div class="seperator"></div>

	<div class="half-width column">
	<script type="text/javascript"><!--
	google_ad_client = "ca-pub-7680110371269676";
	/* ShailanCom404 */
	google_ad_slot = "5172017067";
	google_ad_width = 300;
	google_ad_height = 250;
	//-->
	</script>
	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
	</div>

	<div class="half-width column">
	<script type="text/javascript"><!--
	google_ad_client = "ca-pub-7680110371269676";
	/* ShailanCom404 */
	google_ad_slot = "5172017067";
	google_ad_width = 300;
	google_ad_height = 250;
	//-->
	</script>
	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
	</div>

<div class="seperator"></div>

Alternatively you can browse our most popular posts below:

<?php if(function_exists('stats_get_csv')){ $top_posts = stats_get_csv( 'postviews', "days=7&limit=7" ); ?> 
<div class="most-popular half-width column">
<h3>Most popular posts</h3>

	<ul>
		<?php foreach ( $top_posts as $post ) : if ( !get_post( $post['post_id'] ) || $post['post_title'] == 'Home page' ) continue; ?>
			<li><a href="<?php echo get_permalink( $post['post_id'] ); ?>"><?php echo get_the_title( $post['post_id'] ); ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>

<?php } ?>

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