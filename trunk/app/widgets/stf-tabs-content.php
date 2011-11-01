<div id="sidebar-tabs" class="clearfix">
	<ul class="tabs">
		<li><a href="#featured"><img src="<?php bloginfo('template_directory'); ?>/images/icons/featured.png" class="tooltip" title="Featured posts" alt="Featured" /></a></li>
		<?php if( function_exists('stats_get_csv') ){ ?> <li><a href="#popular"><img src="<?php bloginfo('template_directory'); ?>/images/icons/popular.png"  class="tooltip" title="Popular posts" alt="Popular" /></a></li> <?php } ?>
		<li><a href="#recent-entries"><img src="<?php bloginfo('template_directory'); ?>/images/icons/recent.png"  class="tooltip" title="Recent Posts" alt="Recent" /></a></li>
		<li><a href="#recent-comments"><img src="<?php bloginfo('template_directory'); ?>/images/icons/comments.png"  class="tooltip" title="Recent Comments" alt="Comments" /></a></li>
		<li><a href="#categories"><img src="<?php bloginfo('template_directory'); ?>/images/icons/categories.png"  class="tooltip" title="Categories" alt="Categories" /></a></li>
	</ul>
	<div class="tab_container">
	
		<div id="featured" class="tab_content">
			<ul>
			<?php 
				stf_custom_posts( array('category_name' => 'featured' ), 'loop-list.php');
			?>
			</ul>
		</div>
	
		<?php if(function_exists('stats_get_csv')){ 
		
		$top_posts = stats_get_csv( 'postviews', "days=15&limit=15" );
		
		?> <div id="popular" class="tab_content">
		<ul>
			<?php foreach ( $top_posts as $post ) : if ( !get_post( $post['post_id'] ) || $post['post_title'] == 'Home page' ) continue; ?>
				<li><a href="<?php echo get_permalink( $post['post_id'] ); ?>"><?php echo get_the_title( $post['post_id'] ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		</div> <?php } ?>
		
		<div id="recent-entries" class="tab_content">
			<ul>
			<?php 
				stf_custom_posts( array('posts_per_page' => 8), 'loop-list.php');
			?>
			</ul>
		</div>
		
		<div id="recent-comments" class="tab_content">
			<ul class="blclastcommentedposts">
		   <?php
				if( function_exists('blc_latest_comments') ){
					blc_latest_comments( 6, 4, true, "<li class='alternate'>", "</li>", true, 15, "#444444", "#BBBBBB");
				} else {
					$args = array('title'=>'', 'number'=>8);
					the_widget('WP_Widget_Recent_Comments', $args); 
				} 
		   ?>
		   </ul>
		</div>
		
		<div id="categories" class="tab_content">
			<ul>
		   <?php
		   
				$args = array(
					'title_li' => '',
					'hierarchical' => 'false',
					'depth' => 1
				);
		   
				wp_list_categories( $args );
				
		   ?>
		   </ul>
		</div>
		
		
	</div>
</div>