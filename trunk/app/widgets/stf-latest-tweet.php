<?php 
class stf_latest_tweet_widget extends WP_Widget {
    function stf_latest_tweet_widget() {
		$widget_ops = array('classname' => 'stf-latest-tweet', 'description' => __( 'Displays your latest tweet' ) );
		$this->WP_Widget('stf-latest-tweet', __('Latest Tweet'), $widget_ops);
		$this->alt_option_name = 'stf_latest_tweet';	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		
		if(isset($instance['title'])){ $title = apply_filters('widget_title', $instance['title']); }
				
        echo $before_widget;		
		if ( isset($title) )
			echo $before_title . $title . $after_title;
				
			$twitter_username = stf_get_setting( 'stf_twitter_username' ); 
			
			if(function_exists('stf_latest_tweet')) {
				echo stf_get_latest_tweet( $twitter_username ) ;
			} 
			
			echo "<a class=\"stf-latest-tweet-follow\" href=\"http://twitter.com/".$twitter_username."\" rel=\"external nofollow\" target=\"_blank\">" . __('Follow') . ' ' . $twitter_username . "</a>";
			
			echo $after_widget; 
    }

    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    function form($instance) {				
		echo "This widget has no options.";
		
		stf_widget_footer();
    }

} 

// register widget
add_action('widgets_init', create_function('', 'return register_widget("stf_latest_tweet_widget");'));