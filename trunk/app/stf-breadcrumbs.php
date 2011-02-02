<?php 

function stf_wrapCurrent($link){
	return "<span class='current'>".$link."</span>";
}
function stf_breadcrumbs($prefix = '', $suffix = '', $display = true) {
	global $wp_query, $post;
	
	$opt 						= array();
	$opt['home'] 				= "Home";
	$opt['blog'] 				= __("Home");
	$opt['sep'] 				= " <span class=\"seperator\">&raquo;</span> ";
	$opt['prefix']				= "";
	$opt['boldlast'] 			= true;
	$opt['singleparent'] 		= 0;

	if (!function_exists('yoast_get_category_parents')) {
		function yoast_get_category_parents($id, $link = FALSE, $separator = '/', $nicename = FALSE){
			$chain = '';
			$parent = &get_category($id);
			if ( is_wp_error( $parent ) )
			   return $parent;

			if ( $nicename )
			   $name = $parent->slug;
			else
			   $name = $parent->cat_name;

			if ( $parent->parent && ($parent->parent != $parent->term_id) )
			   $chain .= get_category_parents($parent->parent, true, $separator, $nicename);

			$chain .= stf_wrapCurrent($name);
			return $chain;
		}
	}
	
	$on_front = get_option('show_on_front');

	if (is_404()){
		$not_found = array(
			'404',
			'what is that?',
			'it never existed!',
			'someone call 404',
			'well, i can\'t find it'
		);
		
		$output = $opt['sep'].$not_found[rand(0, count($not_found) - 1)];
	} elseif ( ($on_front == "page" && is_front_page()) || ($on_front == "posts" && is_home()) ) {
		$output = "";
	} elseif ( $on_front == "page" && is_home() ) {
		$output = $opt['sep'].stf_wrapCurrent($opt['blog']);
	} elseif ( !is_page() ) {
		$output = $opt['sep'];
		if ( ( is_single() || is_category() || is_tag() || is_date() || is_author() ) && $opt['singleparent'] != false) {
			$output .= '<a href="'.get_permalink($opt['singleparent']).'">'.get_the_title($opt['singleparent']).'</a>'.$opt['sep'];
		} 
		if (is_single()) {
			$cats = get_the_category();
			$cat = $cats[0];
			if ( is_object($cat) ) {
				if ($cat->parent != 0) {
					$output .= get_category_parents($cat->term_id, true, $opt['sep']);
				} else {
					$output .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>'.$opt['sep']; 
				}
			}
		}
		if ( is_category() ) {
			$cat = intval( get_query_var('cat') );
			$output .= __('Categories') . $opt['sep'] . yoast_get_category_parents($cat, false, $opt['sep']);
		} elseif ( is_tag() ) {
			$output .= __('Tags') . $opt['sep'] . stf_wrapCurrent(single_cat_title('',false));
		} elseif ( is_date() ) { 
			$output .=  __('Date') . $opt['sep'] . stf_wrapCurrent(single_month_title('',false));
		} elseif ( is_author() ) { 
			$user = get_userdatabylogin($wp_query->query_vars['author_name']);
			$output .= __('Author') . $opt['sep'] . stf_wrapCurrent($user->display_name);
		} elseif ( is_search() ) {
			$output .= __('Search') . $opt['sep'] . stf_wrapCurrent(stripslashes(strip_tags(get_search_query())));
		} else if ( is_tax() ) {
			$taxonomy 	= get_taxonomy ( get_query_var('taxonomy') );
			$term 		= get_query_var('term');
			$output .= __('Taxonomy') . $opt['sep'] . stf_wrapCurrent($taxonomy->label .':'. $term) ;
		} else {
			$output .= stf_wrapCurrent(get_the_title());
		}
	} else {
		$post = $wp_query->get_queried_object();

		// If this is a top level Page, it's simple to output the breadcrumb
		if ( 0 == $post->post_parent ) {
			$output = $opt['sep'].get_the_title();
		} else {
			if (isset($post->ancestors)) {
				if (is_array($post->ancestors))
					$ancestors = array_values($post->ancestors);
				else 
					$ancestors = array($post->ancestors);				
			} else {
				$ancestors = array($post->post_parent);
			}

			// Reverse the order so it's oldest to newest
			$ancestors = array_reverse($ancestors);

			// Add the current Page to the ancestors list (as we need it's title too)
			$ancestors[] = $post->ID;

			$links = array();			
			foreach ( $ancestors as $ancestor ) {
				$tmp  = array();
				$tmp['title'] 	= strip_tags( get_the_title( $ancestor ) );
				$tmp['url'] 	= get_permalink($ancestor);
				$tmp['cur'] = false;
				if ($ancestor == $post->ID) {
					$tmp['cur'] = true;
				}
				$links[] = $tmp;
			}

			$output = '';
			foreach ( $links as $link ) {
				$output .= $opt['sep'];
				if (!$link['cur']) {
					$output .= '<a href="'.$link['url'].'">'.$link['title'].'</a>';
				} else {
					$output .= stf_wrapCurrent($link['title']);
				}
			}
		}
	}

	if ($display) {
		echo $prefix.$output.$suffix;
	} else {
		$prefix.$output.$suffix;
	}
}