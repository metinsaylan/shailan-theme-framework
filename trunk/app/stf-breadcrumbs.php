<?php  

function stf_wrapCurrent($link){
	return "<span class='current'>".$link."</span>";
}
function stf_breadcrumbs( $args = array() ) {
	global $wp_query, $post;
	
	$enabled = stf_get_setting( 'breadcrumbs_enabled' );
	if( 'off' == $enabled ){
		return '';
	}
	
	extract( wp_parse_args( $args, array( // Default options:
	
		'echo'		=> 1,
		'prefix'	=> '',
		'suffix'	=> '',
		'seperator' => ' <span class=\"seperator\">&raquo;</span> ',
		'hometext'	=> 'Welcome to <strong>' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</strong>'
	
	) ), EXTR_SKIP );
	
	$home_link = "<span><a href=\"" . home_url( '/' ) . "\" title=\"". esc_attr( get_bloginfo( 'name', 'display' ) ) . "\" rel=\"home ". ((!is_front_page() || !is_home()) ? 'nofollow' : '') . "\">" . __('Home') . "</a></span>";

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
	
		// Change not found phrases here
		$not_found = array(
			'404',
			'what is that?',
			'it never existed!',
			'someone call 404',
			'well, i can\'t find it'
		);
		
		$output = $home_link . $seperator . $not_found[ rand(0, count($not_found) - 1) ];
		
	} elseif ( ($on_front == "page" && is_front_page()) || ($on_front == "posts" && is_home()) ) {
	
		$output = $hometext;
		
	} elseif ( $on_front == "page" && is_home() ) {
	
		$output =  $home_link . $seperator . stf_wrapCurrent( get_the_title() );
		
	} elseif ( !is_page() ) {
	
		$output = $home_link . $seperator;
		
		/* if ( ( is_single() || is_category() || is_tag() || is_date() || is_author() ) && $opt['singleparent'] != false) {
			$output .= '<a href="' . get_permalink( $opt['singleparent']) . '">' . get_the_title($opt['singleparent']).'</a>'.$seperator;
		} */
		
		if (is_single()) {
			$cats = get_the_category();
			$cat = $cats[0];
			if ( is_object($cat) ) {
				if ($cat->parent != 0) {
					$output .= get_category_parents($cat->term_id, true, $seperator);
				} else {
					$output .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>'.$seperator; 
				}
			}
		}
		
		if ( is_category() ) {
			$cat = intval( get_query_var('cat') );
			$output .= __('Categories') . $seperator . yoast_get_category_parents($cat, false, $seperator);
		} elseif ( is_tag() ) {
			$output .= __('Tags') . $seperator . stf_wrapCurrent(single_cat_title('',false));
		} elseif ( is_date() ) { 
			$output .=  __('Date') . $seperator . stf_wrapCurrent(single_month_title('',false));
		} elseif ( is_author() ) { 
			$user = get_userdatabylogin($wp_query->query_vars['author_name']);
			$output .= __('Author') . $seperator . stf_wrapCurrent($user->display_name);
		} elseif ( is_search() ) {
			$output .= __('Search') . $seperator . stf_wrapCurrent(stripslashes(strip_tags(get_search_query())));
		} else if ( is_tax() ) {
			$taxonomy 	= get_taxonomy ( get_query_var('taxonomy') );
			$term 		= get_query_var('term');
			$output .= __('Taxonomy') . $seperator . stf_wrapCurrent($taxonomy->label .':'. $term) ;
		} else {
			$output .= stf_wrapCurrent(get_the_title());
		}
	} else {
		$post = $wp_query->get_queried_object();

		// If this is a top level Page, it's simple to output the breadcrumb
		if ( 0 == $post->post_parent ) {
			$output = $home_link . $seperator . stf_wrapCurrent( get_the_title() );
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

			$output = $home_link;
			foreach ( $links as $link ) {
				$output .= $seperator;
				if (!$link['cur']) {
					$output .= '<a href="'.$link['url'].'">'.$link['title'].'</a>';
				} else {
					$output .= stf_wrapCurrent($link['title']);
				}
			}
		}
	}

	if ( $echo ) {
		echo $prefix. "<span class='breadcrumbs'>" . $output . "</span>" . $suffix;
	} else {
		$prefix.$output.$suffix;
	}
}