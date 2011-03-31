<?php 
/*
Plugin Name: Include Template Widget
Plugin URI: http://shailan.com/wordpress/plugins/include-template-widget
Description: Include any php file in your sidebar!
Version: 1.0
Author: Matt Say
Author URI: http://shailan.com
*/

if(! class_exists( 'shailan_IncludeWidget' ) ){

class shailan_IncludeWidget extends WP_Widget {
	/** constructor */
	function shailan_IncludeWidget() {
		$widget_ops = array('classname' => 'include_template', 'description' => __( 'Include Template' ) );
		$this->WP_Widget('include', __('Include Template Widget'), $widget_ops);
		$this->alt_option_name = 'include_template';	
		
		$path_parts = pathinfo(__FILE__);
		$dir = $path_parts['dirname'];
		$dir = str_replace('\\' ,'/', $dir);
		$dir = preg_replace('|/+|', '/', $dir);
		$content = preg_replace( '|/+|', '/', str_replace( '\\' ,'/', WP_CONTENT_DIR ) );

		$x = str_replace( $content, WP_CONTENT_URL, $dir );
		
		if(is_admin()){
			wp_enqueue_script('shailan_IncludeWidget-scripts', $x . '/admin.js', 'jQuery', '', TRUE );
			wp_enqueue_style('shailan_IncludeWidget-styles', $x . '/admin.css');
		}
		
		$this->help_url = "http://shailan.com/wordpress/plugins/include-template-widget/help";
		
		$this->widget_defaults = array(
			'filename' => '',
			'include_once' => 'on'
		);
		
		$this->reserved_files = array(
			'functions.php',
			'header.php',
			'sidebar.php',
			'archive.php',
			'single.php',
			'page.php'
		);
		
	}

	function widget($args, $instance) {	
		if(! isset($instance['include_once']) ){ $instance['include_once'] = 'off'; }
		
		extract( $args );
		$widget_options = wp_parse_args( $instance, $this->widget_defaults );
		extract( $widget_options, EXTR_SKIP );
		
		$theme_dir = get_stylesheet_directory();  
		$file = $theme_dir . $filename;
		
		if( file_exists( $file ) ){ // File exists check.
		
		echo $before_widget; 
		
			if( $include_once ){
				include_once( $file );
			} else {
				include( $file );
			}
		
		echo $after_widget; 
		
		}
		
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {	
		if(! isset($instance['include_once']) ){ $instance['include_once'] = 'off'; }
		return $new_instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		if(! isset($instance['include_once']) ){ $instance['include_once'] = 'off'; }
		$widget_options = wp_parse_args( $instance, $this->widget_defaults );
		extract( $widget_options, EXTR_SKIP );
		
		$theme_dir = get_stylesheet_directory();  
		$theme_files = stf_get_files( $theme_dir, array( "php" ) );
						
?>

		<p class="caution">Handle with care! <a href="http://shailan.com/wordpress/plugins/include-template-widget/">Read more</a></p>
		
		<p><label for="<?php echo $this->get_field_id('filename'); ?>"><?php _e('Template file:'); ?>
			<select name="<?php echo $this->get_field_name('filename'); ?>" id="<?php echo $this->get_field_id('filename'); ?>" > 		
				 <?php 
				  foreach ($theme_files as $file) {  
				  
				  
				  
					$options .= "\n" . '<option value="'.$file.'" '. ( $filename == $file ? ' selected="selected"' : '' ) .'>';
					$options .= $file;
					$options .= '</option>\n';
				  }
				  
				  echo $options;
				 ?>
				</select></label> <?php $this->help_link('template'); ?> </p>
				
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('include_once'); ?>" name="<?php echo $this->get_field_name('include_once'); ?>"<?php checked( $include_once, 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('include_once'); ?>"><?php _e( 'Include once'); ?> <?php $this->help_link('include-once'); ?></label></p>
		
	<div class="widget-control-actions">
		<p><small>Powered by <a href="http://shailan.com/wordpress/plugins/include-template-widget" title="Wordpress Tips and tricks, Freelancing, Web Design">Shailan.com</a> | <a href="http://shailan.com/wordpress/" title="Get more wordpress widgets and themes" target="_blank" >Get more..</a></small></p>
	</div>
	
			<div class="clear"></div>
			
		<?php 
		
	}
	
	function help_link($key, $text = '(?)'){
		echo '<a href="'.$this->help_url.'#' . $key. '" target="_blank" class="help-link">' . $text . '</a>';
	}
	
} // Class shailan_IncludeWidget

add_action('widgets_init', create_function('', 'return register_widget("shailan_IncludeWidget");'));

if(!function_exists('stf_get_files')){
	function stf_get_files( $directory, $filter = array( "*" ) ){
		$results = array(); // Result array
		$filter = (array) $filter; // Cast to array if string given
		$handler = opendir( $directory );
		while ( $file = readdir($handler) ) {
			if( is_dir( $file ) )
				continue;
		
			$extension = end( explode( ".", $file ) ); // Eg. "*.jpg"
			if ( $file != "." && $file != ".." && ( in_array( $extension, $filter ) || in_array( "*", $filter ) ) ) {
				$results[] = $file;
			}
		}
		closedir($handler);
		return $results;
	}
} // Function exist check

} // Class exist check