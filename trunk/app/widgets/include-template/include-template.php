<?php 
/*
Plugin Name: Include Template Widget
Plugin URI: http://shailan.com/wordpress/plugins/include-template
Description: Include any php file in your sidebar!
Version: 1.0
Author: Matt Say
Author URI: http://shailan.com
*/

class shailan_IncludeWidget extends WP_Widget {
	/** constructor */
	function shailan_IncludeWidget() {
		$widget_ops = array('classname' => 'include_template', 'description' => __( 'Include Template' ) );
		$this->WP_Widget('include', __('Include Template Widget'), $widget_ops);
		$this->alt_option_name = 'include_template';	
		
		if(is_admin()){
			wp_enqueue_script('image-banner-scripts', WP_PLUGIN_URL . '/image-banner-widget/admin.js', 'jQuery', '', TRUE );
			wp_enqueue_style('image-banner-styles', WP_PLUGIN_URL . '/image-banner-widget/admin.css');
		}
		
		$this->help_url = "http://shailan.com/wordpress/plugins/include-template/help";
		
		$this->widget_defaults = array(
			'filename' => '',
			'require_once' => 'on'
		);
		
	}

	function widget($args, $instance) {	
		if(! isset($instance['require_once']) ){ $instance['require_once'] = 'off'; }
		
		extract( $args );
		$widget_options = wp_parse_args( $instance, $this->widget_defaults );
		extract( $widget_options, EXTR_SKIP );
		
		echo $before_widget; ?>

		<?php echo $after_widget; 
		
		}
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {	
		if(! isset($instance['require_once']) ){ $instance['require_once'] = 'off'; }
		return $new_instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		if(! isset($instance['require_once']) ){ $instance['require_once'] = 'off'; }
		$widget_options = wp_parse_args( $instance, $this->widget_defaults );
		extract( $widget_options, EXTR_SKIP );
						
?>
		
		<p><label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Display for:'); ?>
			<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>" > 	
				<option value="shailan-show-all-categories" <?php if('shailan-show-all-categories' == $category){ echo "selected=\"selected\""; } ?> >All categories</option>		
				<option value="shailan-home-only" <?php if('shailan-home-only' == $category){ echo "selected=\"selected\""; } ?> >Homepage only</option>		
				 <?php 
				   $options = "";
				  $categories = get_categories(''); 
				  foreach ($categories as $cat) {  
					$options .= "\n" . '<option value="'.$cat->category_nicename .'" '. ( $cat->category_nicename == $category ? ' selected="selected"' : '' ) .'>';
					$options .= $cat->cat_name;
					$options .= '</option>\n';
					//echo $option;
				  }
				  
					$r = array(
						'depth' => 0, 'child_of' => 0,
						'selected' => 0, 'echo' => 1,
						'name' => 'page_id', 'id' => '',
						'show_option_none' => '', 'show_option_no_change' => '',
						'option_none_value' => ''
					);
					$pages = get_pages($r);  
				  $options .= walk_page_dropdown_tree($pages, 0, $r);
				  
				  echo $options;
				 ?>
				</select></label> <?php $this->help_link('file'); ?> </p>
		
	<div class="widget-control-actions">
		<p><small>Powered by <a href="http://shailan.com/wordpress/plugins/include-template" title="Wordpress Tips and tricks, Freelancing, Web Design">Shailan.com</a> | <a href="http://shailan.com/wordpress/" title="Get more wordpress widgets and themes" target="_blank" >Get more..</a></small></p>
	</div>
	
			<div class="clear"></div>
			
		<?php 
		
	}
	
	function help_link($key, $text = '(?)'){
		echo '<a href="'.$this->help_url.'#' . $key. '" target="_blank" class="help-link">' . $text . '</a>';
	}
	
} // class shailan_IncludeWidget
add_action('widgets_init', create_function('', 'return register_widget("shailan_IncludeWidget");'));