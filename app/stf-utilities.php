<?php 
/** SHAILAN THEME FRAMEWORK 
 File 		: shailan-utilities.php
 Author		: Matt Say
 Author URL	: http://shailan.com
 Version	: 1.0
 Contact	: metinsaylan (at) gmail (dot) com
*/

/* Head codes */
function stf_head_codes(){
	echo "\n\t" . stripslashes( stf_get_setting('shailan_head_scripts') ) . "\n";
} add_action('wp_head', 'stf_head_codes');

/* Body codes */
function stf_body_codes(){
	echo "\n\t" . stripslashes( stf_get_setting('shailan_body_scripts') ) . "\n";
} add_action('wp_head', 'stf_body_codes');

add_filter('the_excerpt_rss', 'do_shortcode');

add_action('init', 'enable_page_excerpts');
function enable_page_excerpts() { add_post_type_support('page', 'excerpt'); }

/** RSS Footer Text
function shailan_postrss($content) {
	$feed_footer = stf_get_setting('stf_feed_footer');
	if(is_feed() && !empty($feed_footer)){
		$content = $content . '<br />' .  $feed_footer . '';
	}	
	return $content;
}
add_filter('the_excerpt_rss', 'shailan_postrss');
add_filter('the_content', 'shailan_postrss'); */

/** RSS Feed Thumbnails */
function shailan_rss_post_thumbnail($content) {
	global $post;
	if(is_feed()){
	if(function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID)) {
		$content = '<p align="right">' . get_the_post_thumbnail($post->ID) .
		'</p>' . $content;
	} }
	return $content;
}
add_filter('the_excerpt_rss', 'shailan_rss_post_thumbnail');
add_filter('the_content', 'shailan_rss_post_thumbnail');

/** Custom Editor Styles */
add_filter('mce_css', 'shailan_editor_style');
function shailan_editor_style($url) {
  if ( !empty($url) )
	$url .= ',';
  $url .= trailingslashit( get_template_directory_uri() ) . 'css/editor.css';
  return $url;
}

/** Custom Admin Logo */
function shailan_custom_logo() {
	echo '<style type="text/css">
		#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/custom-logo.gif) !important; }
	</style>'; }
//add_action('admin_head', 'shailan_custom_logo');

/** Custom Admin Footer */
function shailan_admin_footer($content) {
	echo $content . '| Theme Design by <a href="http://shailan.com" target="_blank">Shailan</a> (Follow: <a href="http://twitter.com/shailancom">@shailancom</a> | <a href="http://feeds.feedburner.com/shailan">RSS</a>)';
} add_filter('admin_footer_text', 'shailan_admin_footer');

/** Custom Default Avatar */
function shailan_avatar ($avatar_defaults) {
$myavatar = get_bloginfo('template_directory') . '/images/gravatar.gif';
$avatar_defaults[$myavatar] = "Custom Avatar";
return $avatar_defaults;
} //add_filter( 'avatar_defaults', 'shailan_avatar' );

/** Custom Profile Fields for authors */
function shailan_contactmethods( $contactmethods ) {
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	// Add Twitter
	$contactmethods['twitter'] = 'Twitter';
	//add Facebook
	$contactmethods['facebook'] = 'Facebook';
	return $contactmethods;
} ; add_filter('user_contactmethods','shailan_contactmethods',10,1);

/** Google Analytics Support */
function shailan_google_analytics(){	
	echo "\n\t" . stripslashes( stf_get_setting('shailan_analytics_code') ) . "\n";
}; add_action('wp_head', 'shailan_google_analytics');

/** Feed redirects */
function shailan_feed_link($output, $feed) {
	$feed_url = stf_get_setting('stf_feedburner');
	if(!empty($feed_url)){	
		$feed_array = array('rss' => $feed_url, 'rss2' => $feed_url, 'atom' => $feed_url, 'rdf' => $feed_url, 'comments_rss2' => '');
		$feed_array[$feed] = $feed_url; $output = $feed_array[$feed];
	}
	return $output;
}

function other_feed_links($link) {
	$feed_url = stf_get_setting('stf_feedburner');
	if(!empty($feed_url)){
		$link = $feed_url;
	}
	return $link;
}
add_filter('feed_link','shailan_feed_link', 1, 2);
add_filter('category_feed_link', 'other_feed_links');
add_filter('author_feed_link', 'other_feed_links');
add_filter('tag_feed_link','other_feed_links');
add_filter('search_feed_link','other_feed_links');

/** Custom Favicon Support */
function shailan_favicon() { 
	$favicon = stf_get_setting('stf_favicon');
	if(!empty($favicon)){
		echo "\n\t<link rel=\"shortcut icon\" href=\"" . $favicon . "\" />\n";
	}
} add_action('wp_head', 'shailan_favicon');

/** Excerpt Length Settings */
function shailan_excerpt_length($length) {
	$excerpt_length = stf_get_setting('shailan_excerpt_length');
	if(empty($excerpt_length)){ $excerpt_length = 25; }
	return $excerpt_length;
} add_filter('excerpt_length', 'shailan_excerpt_length');
 
/** Excerpt More text */
function stf_more( $more_fallback = '' ) {
	$more = ' <a href="'. get_permalink() . '" class="read-more">';
	$more_text = stf_get_setting('shailan_more');
	$more_text = preg_replace('#%title%#i', get_the_title(), $more_text);
	
	if( empty($more_text) ){ 
		$more .= __('Continue reading <span class="meta-nav">&rarr;</span>'); 
	} else {
		$more .= $more_text;
	}
	
	$more .= '</a>';
	
	return $more;
} add_filter( 'excerpt_more', 'stf_more' );

/** Threaded comments script adder */
function enable_threaded_comments(){
	if (!is_admin()) { 
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1) OR stf_get_setting('enable_comments_on_home')) 	
			wp_enqueue_script('comment-reply');
	}
}
add_action('get_header', 'enable_threaded_comments');

/** Remove wordpress version */
function shailan_remove_version() { return ''; } add_filter('the_generator', 'shailan_remove_version');

/** Allow shortcodes in widgets */
add_filter('widget_text', 'do_shortcode');
add_filter('the_excerpt_rss', 'do_shortcode');

/** If title is empty return a middot */
function invisible_titles( $title, $post_id = 0 ){
	if('' == $title)
		return "#" . $post_id;
	else
		return $title;
} add_filter( 'the_title', 'invisible_titles', '', 2 );

/** Feedburner subscriber count */
function shailan_feedburner_count($feedburner_id, $display = false){
	$whaturl="http://api.feedburner.com/awareness/1.0/GetFeedData?uri=" . $feedburner_id;
	//Initialize the Curl session
	$ch = curl_init();
	//Set curl to return the data instead of printing it to the browser.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//Set the URL
	curl_setopt($ch, CURLOPT_URL, $whaturl);
	//Execute the fetch
	$data = curl_exec($ch);
	//Close the connection
	curl_close($ch);
	$xml = new SimpleXMLElement($data);
	$fb = $xml->feed->entry['circulation'];
	
	if($display){ echo $fb; } else { return $fb; }
}	

/** Twitter follower count */
function shailan_twitter_followers( $twitter_id ){
	$opt_key = 'shailan_twitter_followers_' . $twitter_id;
	$twitter = maybe_unserialize(get_option( $opt_key ));
	$last_check = $twitter['lastcheck'];
	$now = time();
	$ago = $now - 3600;
	
	if($last_check < $ago){
		$xml=file_get_contents('http://twitter.com/users/show.xml?screen_name=' . $twitter_id);
		if (preg_match('/followers_count>(.*)</',$xml,$match)!=0) {
			$twitter['count'] = $match[1];
		};

		$twitter['lastcheck'] = time();
	
	$twitter = serialize($twitter);	
	update_option( $opt_key, $twitter);
	}
	return $twitter['count'];
}

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
}

function stf_get_first_image_src ( $postID , $size = 'full' ){					
	global $post;
	
	$args = array(
		'numberposts' => 1,
		'order'=> 'ASC',
		'post_mime_type' => 'image',
		'post_parent' => $post->ID,
		'post_status' => null,
		'post_type' => 'attachment'
	);
	
	$attachments = get_children( $args );
	
	if ($attachments) {
		foreach($attachments as $attachment) {
		
			$image_attributes = wp_get_attachment_image_src( $attachment->ID, $size )  ? wp_get_attachment_image_src( $attachment->ID, $size ) : wp_get_attachment_image_src( $attachment->ID, 'full' );
				
			return $image_attributes[0];
			
		}
	} else {
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches [1] [0];

		if(empty($first_img)){
			$first_img = FALSE;
		}
		return $first_img;
	}
}

define("BY_EXTENSION", 1); 
define("BY_EXPRESSION", 2); 
    
function GetFileList($HowToSearch, $Condition, $Directory, $AddPath) { 
  $hDir = opendir($Directory); 
  if (!$hDir) return false; 
  
  $result = array(); 
  $index = 0; 

  //--------------------------------- 
  // Add trailing slash to directory. 
  //--------------------------------- 
  if (!eregi('/${1}', $Directory)) $Directory .= "/"; 

  //-------------------------------------------- 
  // Loop while we still have directory entries. 
  //-------------------------------------------- 
  while ($dirEntry = readdir($hDir)) { 
	 $new_entry = ""; 
	 $add = false; 
	  
	 //-------------------------------- 
	 // Add entries based on extension. 
	 //-------------------------------- 
	 if ($HowToSearch == BY_EXTENSION) 
		if (eregi($Condition . '${1}', $dirEntry)) $add = true; 

	 //--------------------------------------------------------- 
	 // Add entries based on Perl-compatible regular-expression. 
	 //--------------------------------------------------------- 
	 if ($HowToSearch == BY_EXPRESSION) 
		if (preg_match($Condition, $dirEntry)) $add = true; 

	 //------------------------------- 
	 // Add the entry if it qualifies. 
	 //------------------------------- 
	 if ($add) {        
		if ($AddPath == true) $new_entry = $Directory; 
			
		$new_entry .= $dirEntry; 
		$result[$index++] = $new_entry; 
	 } 
  } 
  
  closedir($hDir); 
  return $result; 
} 
   //-------------------------------------------------------------------- 
   // Get a list of JPGs from the IMAGES directory. Prefix with the path. 
   //-------------------------------------------------------------------- 
   //$List1 = GetFileList(BY_EXTENSION, "jpg", "images", true); 
    
   //---------------------------------------- 
   // Get a list of files that start with sm_ 
   //---------------------------------------- 
   //$List2 = GetFileList(BY_EXPRESSION, '/^sm_/i', "images", false); 
    
   //------------------------------------------------ 
   // Search the current directory for any PHP files. 
   //------------------------------------------------ 
   //$List3 = GetFileList(BY_EXTENSION, "php", ".", false); 
   
?>