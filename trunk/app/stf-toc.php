<?php

class STF_TableOfContents {
    function add_toc($level, $tocid, $text) {
        $this->toc[] = array($this->pagenum, $level, $tocid, $text);
        $this->minlevel = min($this->minlevel, $level);
    }
    
    function get_tocid($text) {
        $text = sanitize_title_with_dashes($text);
        $text = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '', $text);
        $tocid = $text;
        $count = 0;
        while (isset($this->tocmap[$tocid]))
            $tocid = $text.strval(++ $count);
        $this->tocmap[$tocid] = true;
        return "$tocid";
    }

    function get_toc() {
        global $wp_rewrite;
        if (isset($this->toccache))
            return $this->toccache;
        if (!isset($this->toc))
            return '';

        $html = "<a name=\"contents\"></a><div class=\"toc\">\n";
        $permalink = get_permalink( $this->postid );
        for ($i = 0; $i < sizeof( $this->toc ); $i ++) {
            list($pagenum, $level, $tocid, $text) = $this->toc[$i];
            $link = $permalink;
            if ($pagenum > 1) {
                if ($wp_rewrite->using_permalinks())
                    $link = trailingslashit($link)."$pagenum/";
                else
                    $link .= "&page=$pagenum";
            }
            $link = "<a href=\"#$tocid\" class=\"jumper\">$text</a>";
            if ($i == 0) {
                $level = min($level, $this->minlevel);
                $stack = array($level);
                $html .= "<ol><li>$link";
            } else {
                $prev = $stack[sizeof($stack)-1];
                if ($level == $prev) {
                    $html .= "</li>\n<li>$link";
                } elseif ($level < $prev) {
                    while (sizeof($stack) > 1) {
                        array_pop($stack);
                        $html .= "</li></ol>";
                        $prev = $stack[sizeof($stack)-1];
                        if ($level >= $prev)
                            break;
                    }
                    $html .= "</li>\n<li>$link";
                } else {
                    $stack[] = $level;
					$html .= "\n<ol><li>$link";
                }
            }
        }
        while ( isset($stack) && sizeof($stack) > 0 ) {
            array_pop($stack);
			if( is_single() || is_page() ){ $html .= "</li><li><a href=\"#comments\" class=\"jumper\">Comments</a>"; }
            $html .= "</li></ol>";
        }
        
        $this->toccache = $html . '</div>';
        return $this->toccache;
    }
    
    function replace_heading($match) {
        if ($match[0] == '<!--nextpage-->') {
            error_log('next');
            $this->pagenum ++;
            return $match[0];
        }
        $tocid = $this->get_tocid($match[3]);
        $this->add_toc(intval($match[1]), $tocid, $match[3]);
        return "<div class=\"return_to_top\"><a href=\"#header\" class=\"jumper jump-to-top\"><span>&uarr;</span></a></div><h$match[1] id=\"$tocid\"$match[2]>$match[3]</h$match[1]>";
    }
    
    // "the_content" was originally designed to be a filter for "the_content" 
    // so it takes original content and replace with content with TOC added.
    function the_content($content) {
        $this->toc = array();
        $this->tocmap = array();
        $this->toccache = null;
        $this->minlevel = 6;
        $this->pagenum = 1;

        $regex = '#<h([1-6])(.*?)>(.*?)</h\1>|<!--nextpage-->#';
        $content = preg_replace_callback($regex, 
            array(&$this, 'replace_heading'), $content);
        return preg_replace('|(<p>)?<!--TOC-->(</p>)?|', $this->get_toc(),
            $content);
    }

    function the_posts($posts) {
        for ($i = 0; $i < sizeof($posts); $i ++) {
            $post = &$posts[$i];
            $this->postid = $post->ID;
            $post->post_content = $this->the_content($post->post_content);
            $post->post_toc = $this->get_toc();
        }
        return $posts;
    }
	
};

add_filter('the_posts', array(new STF_TableOfContents, 'the_posts'));

function stf_toc( $args ){
	global $post; 
	if(! empty( $post->post_toc ) ) {
		return $post->post_toc;
	} else {
		$toc = new STF_TableOfContents();
		$toc->postid = $post->ID;
        $toc->post_content = $toc->the_content( $post->post_content );
        $post->post_toc = $toc->get_toc();
		
		return $post->post_toc;
	}
}
add_shortcode('toc', 'stf_toc');

?>
