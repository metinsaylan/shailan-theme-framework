<?php 

class stf_seperator extends WP_Widget {
    
	function stf_seperator() {
		$widget_ops = array('classname' => 'stf-seperator', 'description' => __( 'Horizontal Seperator for Columns', 'stf' ) );
		$this->WP_Widget('stf-seperator', __('# Seperator'), $widget_ops);
		$this->alt_option_name = 'stf_seperator';	
    }

    function widget($args, $instance) {		
		global $wp_query;
		?>
	<div class="seperator"></div>
		<?php 
    }

    function form($instance) {  
		if (!empty($instance['title'])) 
			$title = esc_attr($instance['title']);
		
		?>		
		<p>Seperator for Columnar layout.</p>
		<?php
		stf_widget_footer();
    }

	
} add_action('widgets_init', create_function('', 'return register_widget("stf_seperator");'));