<?php 
class stf_sidebar_tabs extends WP_Widget {
    function stf_sidebar_tabs() {
		$widget_ops = array('classname' => 'stf-sidebar-tabs', 'description' => __( 'Content tabs for your site' ) );
		$this->WP_Widget('stf-sidebar-tabs', __('Sidebar Tabs'), $widget_ops);
		$this->alt_option_name = 'stf_sidebar_tabs';	
		
		if ( is_active_widget(false, false, $this->id_base, true) && !is_admin() ) {
			wp_enqueue_script('jquery');
			wp_enqueue_script('shailan.tooltips', get_template_directory_uri() . '/app/scripts/shailan.tooltips.js', 'jquery');
			wp_enqueue_script('shailan.tabs', get_template_directory_uri() . '/app/scripts/shailan.tabs.js', 'jquery');
			wp_enqueue_style( 'shailan.tabs', get_template_directory_uri() . '/app/css/shailan.tabs.css' );
		}
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		
		// Include the widget content
		include('stf-tabs-content.php');
        
    }

    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

	function form($instance) {				
		echo "This widget has no settings yet.";
		
		stf_widget_footer();
    }

} 

add_action('widgets_init', create_function('', 'return register_widget("stf_sidebar_tabs");'));