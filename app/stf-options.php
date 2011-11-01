<?php 

/** DEFAULT FRAMEWORK OPTIONS */
global $stf;

$stf_color_schemes = array(
	'default' => get_template_directory_uri() . '/app/colorschemes/default.css',
	'freshmilk' => get_template_directory_uri() . '/app/colorschemes/freshmilk.css',
	'darkshine' => get_template_directory_uri() . '/app/colorschemes/darkshine.css'
);

$layouts = array(
	'1c' => '1 Column',
	'2cl' => '2 Columns Sidebar on Left',
	'2cr' => '2 Columns Sidebar on Right',
	'3cl' => '3 Columns Sidebars on Left',
	'3cr' => '3 Columns Sidebars on Right',
	'3cb' => '3 Columns Sidebars on Both Side'
);

$fonts = array();
$fonts_data = stf_get_fonts();
foreach($fonts_data as $key=>$values){
	$fonts[$key] = $values["name"];
}

$cschemes = array();
foreach($stf_color_schemes as $k=>$v){
	$cschemes[$v] = $k;
}

$options = array (

array( "name" => __( "Basic", 'stf' ),
		"type" => "section"),
		
array( "type" => "open"),

	array(  "name" => __("Logo url", 'stf'),
		"desc" => "URL of your logo image. (Eg:" . trailingslashit(get_bloginfo('template_directory')) . "images/logo.png)",
		"id" => "stf_logo_url",
		"std" => "",
		"type" => "text"),
		
	array(  "name" => __("Site RSS URL", 'stf'),
		"desc" => "Will be used to display your latest tweet on header",
		"id" => "stf_rss_url",
		"std" => get_bloginfo('rss2_url'),
		"type" => "text"),
		
	array(  "name" => __("Twitter username", 'stf'),
		"desc" => "Will be used to display your latest tweet on header",
		"id" => "stf_twitter_username",
		"std" => "shailancom",
		"type" => "text"),
		
	array(  "name" => "Facebook page URL",
		"desc" => "URL of your facebook fan page",
		"id" => "stf_facebook_URL",
		"std" => "",
		"type" => "text"),
		
	array(  "name" => "Subscribe using Email URL",
		"desc" => "Feedburner URL for e-mail or any other e-mail subscription site URL",
		"id" => "stf_subscribe_URL",
		"std" => "",
		"type" => "text"),
		
	array("name" => "Show breadcrumbs",
		"desc" => "Enable breadcrumbs on home page.",
		"id" => "breadcrumbs_enabled",
		"type" => "checkbox",
		"std" => "off"),	
		
	array(  "name" => __("Welcome message", 'stf'),
		"desc" => "Will be shown instead of breadcrumbs on homepage.",
		"id" => "welcome_message",
		"std" => 'Welcome to <strong>' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</strong>',
		"type" => "text"),
		
	array("name" => "Use Framework Stylesheet",
		"desc" => "Enables use of master stylesheet.",
		"id" => "use_framework_stylesheet",
		"type" => "checkbox",
		"std" => "on"),

	array(  "name" => "Entry header meta",
		"desc" => "Entry header meta, shows right under the post title.",
		"id" => "stf_entry_header_meta",
		"std" => "By [authorlink] on [date] [cmnts before='| '] [edit ]",
		"type" => "text"),
		
	array(  "name" => "Entry footer meta",
		"desc" => "Entry footer meta, shows below the post content.",
		"id" => "stf_entry_footer_meta",
		"std" => '[categories before="Filed in: "] [tags before="| Tagged: "]',
		"type" => "text"),
		
	array(  "name" => "Entry footer for short formats",
		"desc" => "Entry footer meta for short formats: link, status, aside, picture ",
		"id" => "stf_entry_short_meta",
		"std" => '[permalink] &middot; [cmnts] [edit before="&middot; "]',
		"type" => "text"),
		
	array("name" => "Show comments on home page",
		"desc" => "Enable commenting on home page.",
		"id" => "enable_comments_on_home",
		"type" => "checkbox",
		"std" => "off"),
		
	array(  "name" => "Comment count on homepage",
		"desc" => "If comments on homepage is enabled, sets how many comments to display on home.",
		"id" => "stf_homepage_comment_count",
		"std" => 3,
		"type" => "select",
		"options" => array("3" => "3", "5" => "5", "10" => "10")),
		
	/*array(  "name" => "Feed footer",
		"desc" => "Displays after every post in the feed.",
		"id" => "stf_feed_footer",
		"std" => '<p><strong><em>This post is originally posted on <a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>. <br />Visit <a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a> for more..</em></strong></p>',
		"type" => "htmlarea"),*/
		
	array(  "name" => "Site Footer Text",
		"desc" => "Displays at the bottom of site. You can use various shortcodes here.",
		"id" => "stf_theme_footer",
		"std" => "&copy; " . get_bloginfo('name'),
		"type" => "text"),

array( "type" => "close"),


array( "name" => "Layout",
	"type" => "section"),
array( "type" => "open"),

	array(
		"name" => "Enable Custom Layout",
		"desc" => "This option enables controls on this page to change your site's layout.",
		"id" => "stf_layout_enabled",
		"type" => "checkbox",
		"std" => "on"
	),
	
	array(
		"name" => "Page layout",
		"desc" => "Select page layout.",
		"id" => "stf_layout",
		"type" => "select",
		"options" => $layouts,
		"std" => "2cr"
	),
	
	array(
		"name" => "Page width",
		"desc" => "Set full width in pixels",
		"id" => "stf_page_width",
		"type" => "text",
		"std" => "980"
	),
	
	array(
		"name" => "Primary sidebar width",
		"desc" => "Set sidebar width in pixels",
		"id" => "stf_sidebar_width",
		"type" => "text",
		"std" => "300"
	),
	
	array(
		"name" => "Secondary sidebar width",
		"desc" => "Set secondary sidebar width in pixels (Used only in 3 column layouts)",
		"id" => "stf_secondary_width",
		"type" => "text",
		"std" => "160"
	),
	
	array(
		"name" => "Global spacing",
		"desc" => "Set global spacing for the layout",
		"id" => "stf_padding",
		"type" => "text",
		"std" => "20"
	),

array( "type" => "close"),

array( "name" => "Colors",
	"type" => "section"),
array( "type" => "open"),

	
	array(
		"name" => "Color scheme",
		"desc" => "Select a base color scheme.",
		"id" => "stf_colorscheme",
		"type" => "select",
		"options" => $cschemes,
		"std" => get_template_directory_uri() . "/app/colorschemes/default.css"
	),

	array(
		"name" => "Enable Custom Colors",
		"desc" => "This option enables use of custom colors.",
		"id" => "stf_colors_enabled",
		"type" => "checkbox",
		"std" => "off"
	),

	array(
		"name" => "Background color",
		"desc" => "Background color value (Eg. #ffffff)",
		"id" => "stf_background_color",
		"type" => "text",
		"std" => "#222222"
	),
	
	array(
		"name" => "Text Color",
		"desc" => "Site text color value (Eg. #444444)",
		"id" => "stf_text_color",
		"type" => "text",
		"std" => "#888888"
	),
	
	array(
		"name" => "Title Color",
		"desc" => "Site title color value (Eg. #555555)",
		"id" => "stf_title_color",
		"type" => "text",
		"std" => "#666666"
	),
	
	array(
		"name" => "Link Color",
		"desc" => "Site link color value (Eg. #2277dd)",
		"id" => "stf_link_color",
		"type" => "text",
		"std" => "#778899"
	),

array( "type" => "close"),

array( "name" => "Fonts",
	"type" => "section"),
array( "type" => "open"),

	array(
		"name" => "Title font",
		"desc" => "Select title font.",
		"id" => "stf_title_font",
		"type" => "select",
		"options" => $fonts,
		"std" => "oswald"
	),
	
	array(
		"name" => "Title font size scale",
		"desc" => "Scales title size according to this scale.",
		"id" => "stf_title_font_scale",
		"type" => "select",
		"std" => "1.3",
		"options" => array( "1" => "1x", "1.1" => "1.1x", "1.2" => "1.2x", "1.3" => "1.3x", "1.5" => "1.5x", "2" => "2x")
	),
	
	array(
		"name" => "Regular text font",
		"desc" => "Select font for regular text.",
		"id" => "stf_base_font",
		"type" => "select",
		"options" => $fonts,
		"std" => "georgia"
	),
	
	array(
		"name" => "Regular text font size",
		"desc" => "Size of regular text (Eg. 12px or 1em).",
		"id" => "stf_base_font_size",
		"type" => "select",
		"std" => "13px",
		"options" => array( "11px" => "11px", "12px" => "12px", "13px" => "13px", "14px" => "14px", "15px" => "15px", "16px" => "16px", "18px" => "18px")
	),
	
array( "type" => "close"),

array( "name" => "Advanced",
	"type" => "section"),
	
array( "type" => "open"),

	array(  "name" => "<code>&lt;head&gt;</code> codex",
		"desc" => "Codes in this area will be automatically put in <code>&lt;head&gt;</code> part of your site.",
		"id" => "shailan_head_scripts",
		"std" => "",
		"type" => "textarea"),
		
	array(  "name" => "<code>&lt;body&gt;</code> codex",
		"desc" => "Codes in this area will be automatically put in <code>&lt;body&gt;</code> part of your site.",
		"id" => "shailan_body_scripts",
		"std" => "",
		"type" => "textarea"),
	
	array(  "name" => "Google Analytics Code",
		"desc" => " Google Analytics Code. Will be automatically put in your <strong><em>header</em></strong>.",
		"id" => "shailan_analytics_code",
		"std" => "",
		"type" => "textarea"),
	
	array( "name" => "Custom Favicon",
		"desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
		"id" => "stf_favicon",
		"type" => "text",
		"std" => get_bloginfo('url') ."/favicon.ico"),	
	
	array( "name" => "Feedburner URL",
		"desc" => "Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website",
		"id" => "stf_feedburner",
		"type" => "text",
		"std" => get_bloginfo('rss2_url')),
		
	array("name" => "Excerpt length",
		"desc" => "Post excerpts word count",
		"id" => "shailan_excerpt_length",
		"type" => "text",
		"std" => "25"),
		
	array("name" => "Excerpt More Text",
		"desc" => "Displayed if a post content is trimmed",
		"id" => "shailan_more",
		"type" => "text",
		"std" => "read on &rarr;"),

	array("name" => "Use categories for post formats",
		"desc" => "Use common categories for post format display. Supports asides, gallery, and more.",
		"id" => "stf_category_formats",
		"type" => "checkbox",
		"std" => "on"),
		

array( "type" => "close")

);

?>