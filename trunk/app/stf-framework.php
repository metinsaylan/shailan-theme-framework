<?php
/** SHAILAN THEME FRAMEWORK 
 Author		: Matt Say
 Author URL	: http://shailan.com
 Version	: 1.0
 Contact	: metinsaylan (at) gmail (dot) com
*/

global $stf;
global $theme_data;
global $stf_widget_areas; 

define('STF_DIRECTORY', dirname(__FILE__) . '/');

$url = get_template_directory_uri();

$dir = str_replace('\\' ,'/', STF_DIRECTORY); 
$dir = preg_replace('|/+|', '/', $dir);
$dir = basename($dir);

if ( 0 === strpos($url, 'http') && is_ssl() ){
	$url = str_replace( 'http://', 'https://', $url );} 

define('STF_URL', $url . '/app/');
define('STF_APP', STF_DIRECTORY );

// Framework class
class Shailan_Framework{

	function __construct(){
		global $stf_widget_areas;
		
		$stf_widget_areas = array();
		
		// Framework version
		$this->version = "1.0";
		
		// Get theme data
		$this->stylesheet = get_stylesheet();
		$theme_data = get_theme_data( get_stylesheet_directory() . '/style.css' );		
		$this->theme = $theme_data;
		$this->name = $this->theme['Name'];
		
		$this->is_child = false; // Am I a child?
		if(TEMPLATEPATH !== STYLESHEETPATH)
			$this->is_child = true; 
		
		// Load shortcodes, widgets, template tags
		require_once( "stf-loader.php" );
		
		// Load default options
		//locate_template( array('stf-options.php'), true, true );
		require_once( "stf-options.php" );
		
		$this->default_options = $options;
		$this->settings = $this->get_settings();		
		
		add_action( 'admin_init', array(&$this, 'theme_admin_init') );
		add_action( 'admin_menu', array(&$this, 'theme_admin_header') );
		add_action( 'wp_footer', array(&$this, 'framework_copyright') );
		
	}
	
	function Shailan_Framework(){ // PHP 4 Constructor
		$this->__construct();
	}
	
	function get_settings(){
		// Get settings
		$settings = get_option('stf_settings');		
		
		if(FALSE === $settings){ // Options doesn't exist, install standard settings
			// Create settings array
			$settings = array();
			// Set default values
			foreach($this->default_options as $option){
				$settings[ $option['id'] ] = $option['std'];
			}
			$settings['stf_version'] = $this->version;
			// Save the settings
			update_option('stf_settings', $settings);
		} else { // Options exist, update if necessary
			$ver = $settings['stf_version'];
			
			if($ver != $this->version){ // Update needed
				// TODO : add updates here.
				
				return $settings;				
			} else { // Everythings gonna be alright. Return.
				return $settings;
			} 
		}		
	}
	
	/* Setup theme 
	function setupTheme($args){
		$defaults = array(
			"shortname" => "stf",
			"domain" => "",
			"editor_style" => false,
			"nav_menus" => false,
			"custom_background" => true,
			"post_thumbnails" => true,
			"automatic_feed_links" => true,
			"thumbnail_size" => "200x200",
			"custom_image_sizes" => "",
			"localization_directory" => TEMPLATEPATH
		);
		
		$setup_options = wp_parse_args( $args, $defaults );
		extract( $setup_options, EXTR_SKIP );
		
		$this->name = $this->theme['Name'];
		$this->shortname = $shortname;
		
		if ( function_exists( 'add_editor_style' ) && $editor_style ) { add_editor_style(); }
		if ( function_exists( 'add_theme_support' )) {	
			if($post_thumbnails){
				add_theme_support( 'post-thumbnails' );
				$size = explode("x", $thumbnail_size);
				set_post_thumbnail_size( $size[0], $size[1], true ); 
				
				if(is_array($custom_image_sizes)){
					foreach($custom_image_sizes as $tag=>$size){
						$size = explode( "x" , $size );
						add_image_size( $tag, $size[0], $size[1], true );
					}
				}
			}
			if( $nav_menus ){ add_theme_support( 'nav-menus' ); }
			if( $automatic_feed_links ){ add_theme_support( 'automatic-feed-links' ); }
		}
		
		load_theme_textdomain( $domain, $localization_directory );
		$locale = get_locale();
		$locale_file = $localization_directory . "/$locale.php";
		if ( is_readable( $locale_file ) )
			require_once( $locale_file );

		if ( function_exists( 'add_custom_background' ) && $custom_background ) { add_custom_background(); }
	
	} */
	
	function register_theme_options($options){
		$this->default_options = $options;
	}
	
	function extend_options($options){
		$this->default_options = array_merge((array)$options, (array)$this->default_options);
	}
	
	function theme_admin_init(){
		$file_dir = get_bloginfo('template_directory');
		 
		wp_enqueue_style("stf-options-page", STF_URL . "css/options.css", false, "1.0", "all");
		wp_enqueue_style("stf-widgets-mod", STF_URL . "css/widgets.css", false, "1.0", "all");
		wp_enqueue_style("stf-options-tabs", STF_URL . "css/options-tabs.css", false, "1.0", "all");
		
		/*wp_enqueue_script("jquery");
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script("jquery-ui-tabs");*/
	}
	
	function theme_admin_header(){
	
		if ( @$_GET['page'] == "stf-options" ) {
		
			if ( @$_REQUEST['action'] && 'save' == $_REQUEST['action'] ) {
				// Save settings
				// Get settings array
				$settings = get_option('stf_settings'); 
				
				if(FALSE === $settings){ $settings = array(); }
				
				// Set updated values
				foreach($this->default_options as $option){
					$settings[ $option['id'] ] = $_REQUEST[ $option['id'] ]; }
				
				// Save the settings
				update_option('stf_settings', $settings);
				
				// Update instance settings array
				$this->settings = $settings;
									
				header("Location: admin.php?page=stf-options&saved=true");
				die;
			} else if( @$_REQUEST['action'] && 'reset' == $_REQUEST['action'] ) {
				
				// Start a new settings array
				$settings = array();
				
				// Set standart values
				foreach($this->default_options as $option){
					$settings[$option['id']] = $option['std']; }
				
				// Save the settings
				update_option('stf_settings', $settings);
				
				// Update instance settings array
				$this->settings = $settings;
				
				header("Location: admin.php?page=theme-options&reset=true");
				die;
			}
		}

		add_submenu_page('themes.php', $this->name . " Options", "Theme Options", "administrator", "stf-options", array(&$this, 'theme_admin_page'));	
		
	}
	
	function theme_admin_page(){
		$options = $this->default_options;
		$current = $this->get_settings();
		$title = $this->name . ' Theme Settings';		
		
		$navigation = "";
		$footer_text = "<a href=\"" . $this->theme['URI'] . "\">". $this->name . "</a> is powered by <a href=\"http://shailan.com/wordpress/themes/framework\" title=\"Shailan Theme Framework\">Shailan Theme Framework</a>";
		
		// Render theme options page
		include_once( STF_APP . "stf-page-options.php" );
	}
	
	function framework_copyright(){ ?>
		<div id="theme-copyright"><small>Powered by <a href="http://wordpress.org" rel="external" target="_blank">Wordpress</a> <span class="amp">&</span> <a href="http://shailan.com/wordpress/themes/framework" title="Wordpress themes, plugins, widgets and more" rel="external" target="_blank">Framework Theme</a></small></div>
	<?php }
	
};

$stf = new Shailan_Framework();

function stf_get_setting( $key, $default = FALSE ){
	$settings = get_option('stf_settings');
	
	if(isset($settings[$key])){
		$value = $settings[$key];
		return $value;
	} else {
		return $default;
	}
}

function stf_update_setting( $key, $value ){
	$settings = get_option('stf_settings');
	$settings[$key] = $value;
	update_option('stf_settings', $settings);
}




