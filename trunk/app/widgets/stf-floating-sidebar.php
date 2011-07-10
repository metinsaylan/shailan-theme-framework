<?php 
class stf_floating_sidebar extends WP_Widget {
    function stf_floating_sidebar() {
		$widget_ops = array('classname' => 'stf-floating-sidebar', 'description' => __( 'Displays widgets in a floating sidebar' ) );
		$this->WP_Widget('stf-floating-sidebar', __('FloatingBar'), $widget_ops);
		$this->alt_option_name = 'stf_floating_sidebar';	
		
		if ( is_active_widget(false, false, $this->id_base, true) ) {
			wp_enqueue_script('jquery');
			wp_enqueue_script('floatingBar', get_template_directory_uri() . '/app/scripts/shailan.floatingbar.js', 'jquery');
		}
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		
		?> 
		<div id="floatingbar-<?php echo $this->number; ?>" class="floatingBar">
			<?php stf_widgets( 'floatingbar' ); ?>
		</div> <?php
        
    }

    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

	function form($instance) {				
		echo "Add widgets to FloatingBar to display them on your sidebar.";
		
		stf_widget_footer();
    }

} 

// register widget
add_action('widgets_init', create_function('', 'return register_widget("stf_floating_sidebar");'));