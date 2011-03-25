<?php 

/** DEFAULT FRAMEWORK OPTIONS */

$layouts = array(
	'1c' => '1 Column',
	'2cl' => '2 Columns Sidebar on Left',
	'2cr' => '2 Columns Sidebar on Right',
	'3cl' => '3 Columns Sidebars on Left',
	'3cr' => '3 Columns Sidebars on Right',
	'3cb' => '3 Columns Sidebars on Both Side'
);

$fonts = stf_get_fonts();

$options = array (

array( "name" => "Basic",
		"type" => "section"),
		
array( "type" => "open"),

	array(  "name" => "Logo url",
		"desc" => "URL of your logo image. (Eg:" . trailingslashit(get_bloginfo('template_directory')) . "images/logo.png)",
		"id" => "stf_logo_url",
		"std" => "",
		"type" => "text"),
		
	array("name" => "Show breadcrumbs",
		"desc" => "Enable breadcrumbs on home page.",
		"id" => "breadcrumbs_enabled",
		"type" => "checkbox",
		"std" => "off"),

	array(  "name" => "Entry header",
		"desc" => "Entry header meta, shows right under the post title.",
		"id" => "stf_entry_header_meta",
		"std" => "By [authorlink] on [date] [cmnts before='| '] [edit ]",
		"type" => "text"),
		
	array(  "name" => "Entry footer",
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
		"type" => "text"),
		
	array(  "name" => "Feed footer",
		"desc" => "Displays after every post in the feed.",
		"id" => "stf_feed_footer",
		"std" => '<p><strong><em>This post is originally posted on <a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>. <br />Visit <a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a> for more..</em></strong></p>',
		"type" => "htmlarea"),
		
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
		"name" => "Page layout",
		"desc" => "Select page layout.",
		"id" => "stf_layout",
		"type" => "select",
		"options" => $layouts,
		"std" => "2cl"
	),
	
	array(
		"name" => "Page width",
		"desc" => "Set full width in pixels",
		"id" => "stf_page_width",
		"type" => "text",
		"std" => "980"
	),
	
	array(
		"name" => "Sidebar width",
		"desc" => "Set sidebar width in pixels",
		"id" => "stf_sidebar_width",
		"type" => "text",
		"std" => "300"
	),
	
	array(
		"name" => "Global spacing",
		"desc" => "Set global spacing for the layout",
		"id" => "stf_padding",
		"type" => "text",
		"std" => "20"
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
		"std" => "futura"
	),
	
	array(
		"name" => "Title font size scale",
		"desc" => "Scales title size according to this scale.",
		"id" => "stf_title_font_scale",
		"type" => "text",
		"std" => "1"
	),
	
	array(
		"name" => "Regular text font",
		"desc" => "Select font for regular text.",
		"id" => "stf_base_font",
		"type" => "select",
		"options" => $fonts,
		"std" => "lucida"
	),
	
	array(
		"name" => "Regular text font size",
		"desc" => "Size of regular text (Eg. 12px or 1em).",
		"id" => "stf_base_font_size",
		"type" => "text",
		"std" => "12px"
	),
	
array( "type" => "close"),

array( "name" => "Advanced",
	"type" => "section"),
	
array( "type" => "open"),
	
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