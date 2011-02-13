<?php

// Custom post formats

if(! function_exists('get_post_format') ){
	function get_post_format(){
		return 'standard';
	}
}

function stf_post_format(){
	global $post;
	
	$stf_category_formats = stf_get_setting('stf_category_formats');
	if('on' == $stf_category_formats){
	
		$format = get_post_format();
		
		if ( false === $format ){
		
			if( in_category( array('aside', 'asides') ) ){
				return 'aside';
			} elseif ( in_category( array('chat', 'chats') ) ){
				return 'chat';
			} elseif ( in_category( 'gallery', 'photos' ) ){
				return 'gallery';
			} elseif ( in_category( array('image', 'picture') ) ){
				return 'image';
			} elseif ( in_category( array('link', 'bookmarks') ) ){
				return 'link';
			} elseif ( in_category( array('quotes', 'quote') ) ){
				return 'quote';
			} elseif ( in_category( 'status' ) ){
				return 'status';
			} elseif ( in_category( array('video', 'videos') ) ){
				return 'video';
			} elseif ( in_category( array( 'audio', 'mp3s', 'mp3', 'podcast' ) ) ){
				return 'audio';
			}		
			
		} else {
			return $format;
		}
		
	} else {
		return get_post_format();
	}
}