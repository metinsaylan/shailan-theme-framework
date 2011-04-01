<?php 
/*
Plugin Name: WP Login Widget
Plugin URI: http://shailan.com/wordpress/plugins/login-widget
Description: Login form
Version: 1.0
Author: Matt Say
Author URI: http://shailan.com
*/

if(! class_exists( 'shailan_LoginWidget' ) ){

class shailan_LoginWidget extends WP_Widget {
	/** constructor */
	function shailan_LoginWidget() {
		
		$widget_ops = array(
			'classname' => 'stf_login', 
			'description' => __( 'Login Form for your blog' ) 
		);
		
		$this->WP_Widget( 'stf_login', __('Login form'), $widget_ops );
		$this->alt_option_name = 'stf_login';	
		
		$path_parts = pathinfo(__FILE__);
		$dir = $path_parts['dirname'];
		$dir = str_replace('\\' ,'/', $dir);
		$dir = preg_replace('|/+|', '/', $dir);
		$content = preg_replace( '|/+|', '/', str_replace( '\\' ,'/', WP_CONTENT_DIR ) );
		$x = str_replace( $content, WP_CONTENT_URL, $dir );
		
		/*if( is_admin() ){*/
			wp_enqueue_script('shailan_LoginWidget-scripts', $x . '/admin.js', 'jQuery', '', TRUE );
			wp_enqueue_style('shailan_LoginWidget-styles', $x . '/admin.css');
		/*}*/
		
		$this->help_url = "http://shailan.com/wordpress/plugins/login-widget/help";
		
		$this->widget_defaults = array(
			'title' => ''
		);
		
	}

	function widget( $args, $instance ) {	
		
		extract( $args );
		$widget_options = wp_parse_args( $instance, $this->widget_defaults );
		extract( $widget_options, EXTR_SKIP );
			
		echo $before_widget; 
			if ( $title )
				echo $before_title . $title . $after_title;
			stf_loginform();
		echo $after_widget; 
		
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
		
		if (!empty($instance['title'])) 
			$title = esc_attr($instance['title']);
			?>
			
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <?php $this->help_link('include-once'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		
			<div class="widget-control-actions">
				<p><small>Powered by <a href="http://shailan.com/wordpress/plugins/include-template-widget" title="Wordpress Tips and tricks, Freelancing, Web Design">Shailan.com</a> | <a href="http://shailan.com/wordpress/" title="Get more wordpress widgets and themes" target="_blank" >Get more..</a></small></p>
			</div>
	
			<div class="clear"></div>
			
		<?php 
		
	}
	
	function help_link($key, $text = '(?)'){
		echo '<a href="'.$this->help_url.'#' . $key. '" target="_blank" class="help-link">' . $text . '</a>';
	}
	
} // Class shailan_LoginWidget

if( !function_exists('stf_loginform') ){
	function stf_loginform(){
		
		$user_login = ( isset($_POST['log']) ) ? esc_attr( stripslashes( $_POST['log'] ) ) : '';
		
		echo '<div class="login-form-container">';
		if (!(current_user_can('level_0'))){ ?>
			<form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
				<div class="login-field"><input type="text" name="log" id="log" value="<?php echo $user_login; ?>" size="20" /></div>
				<div class="login-field"><input type="password" name="pwd" id="pwd" size="20" /></div>
				<div class="login-field"><input type="submit" name="submit" value="<?php _e('Send'); ?>" class="button" /></div>
			
				<div class="login-field"><label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /><?php _e('Remember me'); ?></label></div>
				
				<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
			</form>
			<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" class="login-recover-link"><?php _e('Recover password'); ?></a>
		<?php } else { ?>
			<a href="<?php echo wp_logout_url(urlencode($_SERVER['REQUEST_URI'])); ?>"><?php _e('Logout'); ?></a> | <a href="<?php echo get_option('home'); ?>/wp-admin/"><?php _e('Admin'); ?></a>
		<?php } 
		echo '</div>';
	}
}

add_action('widgets_init', create_function('', 'return register_widget("shailan_LoginWidget");'));

} // Class exist check