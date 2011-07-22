<?php
/** SHAILAN THEME FRAMEWORK 
 File 		: shailan-loader.php
 Author		: Matt Say
 Author URL	: http://shailan.com
 Version	: 1.0
 Contact	: metinsaylan (at) gmail (dot) com
*/

include_once('stf-widget-areas.php'); // GENERIC FUNCTIONS
include_once('stf-utilities.php'); // GENERIC FUNCTIONS
include_once('stf-shortcodes.php'); // SHORTCODES
include_once('stf-breadcrumbs.php'); // SHORTCODES
include_once('stf-filters.php'); // FILTERS
include_once('stf-templates.php'); // CUSTOM TEMPLATES
include_once('stf-social.php'); // SOCIAL
include_once('stf-post-formats.php'); // POST FORMATS
include_once('stf-layout.php'); // LAYOUT MANAGER
include_once('stf-colors.php'); // CUSTOM COLORS MANAGER

// WIDGETS
function stf_widget_footer(){
	echo "<div class=\"widget-control-actions\">
		<p><small>Powered by <a href=\"http://shailan.com/wordpress/themes/framework/\">Shailan</a></small></p>
		</div>";
}

include_once('widgets/stf-blog-posts.php'); // BLOG POSTS
include_once('widgets/stf-featuredposts.php'); // LOOP DA LOOP
include_once('widgets/stf-navigation.php'); // OLDER / NEWER
include_once('widgets/stf-pagenavi.php'); // PAGENAVI
include_once('widgets/include-template/include-template.php'); // INCLUDER
include_once('widgets/wp-login-widget/wp-login-widget.php'); // LOGIN FORM
include_once('widgets/stf-latest-tweet.php'); // LATEST TWEET WIDGET
include_once('widgets/stf-floating-sidebar.php'); // FLOAINGBAR WIDGET
include_once('widgets/stf-sidebar-tabs.php'); // TABS WIDGET
include_once('widgets/stf-nivo-slider.php'); // NIVO SLIDER WIDGET

// Other interfaces
include_once('stf-typography.php'); // TYPOGRAPHY
include_once('stf-toc.php'); // TABLE OF CONTENT GENERATOR





