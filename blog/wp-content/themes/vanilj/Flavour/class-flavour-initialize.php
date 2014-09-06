<?php
class Flavour_WordPress_Framework_Initialize extends Flavour_WordPress_Framework_Helpers {


	/**
	* Requires sticky when posting/updating a featured post
	* require_image_sticky
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @param str $post_id
	*/
	function initialize_require_sticky($post_id) {
		if(isset($_POST['sticky']) && $_POST['sticky'] == 'sticky' && !has_post_thumbnail()) {
			wp_die('You need to set a featured image for sticky posts!', 'Error updating post', array('back_link' => true));
		}
	}


	/**
	* Remove <br>'s from gallery content
	* no_br_gallery
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @param str $output
	*/
	function initialize_remove_gallery_br($output) {
		return preg_replace('/<br style=(.*?)>/mi','',$output);
	}


	/**
	* Adds a class to each post with information about the view
	* @author Eric Wennerberg
	* @since 0.0.1
	* @version 0.2.0
	* @param array $classes
	* @return array all classes
	*/
	function initialize_post_class_view($classes) {
		$class = is_single() ? 'single-view' : 'list-view';
		$classes[] = $class;
		return $classes;
	}

	/**
	* Adds html5shim if lt IE 9
	* @author Eric Wennerberg
	* @since 0.0.4
	* @version 0.2.0
	*/
	function initialize_html5shim() {
		echo '<!--[if lt IE 9]><script src="'.get_template_directory_uri().'/js/html5.js"></script><![endif]-->';
	}

	/**
	* Filter excerpt more text
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @return str excerpt more text
	*/
	function initialize_excerpt_more() {
		return $this->theme_opt['excerpt_more']; 
	}



	/**
	* Add read more link to excerpt
	* @param str $output The current excerpt.
	* @return str $output The excerpt with read more link.
	* @uses str $this->theme_opt['continue_reading'] The defined link text.
	*/
	function initialize_excerpt_auto_readmore($output) {
		global $post;
		return $output .'<p class="meta"><a href="'. get_permalink($post->ID) . '">'.$this->translations['continue_reading'].'</a></p>';
	}


	/**
	* Filters the title
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param str $title
	* @param str $sep
	* @uses str $this->translations['page_title']
	* @return str filtered title
	*/
	function initialize_filter_title($title,$sep = '|') {
		global $page, $paged;
		if(is_feed()) :	return $title; endif;
		$site_description = get_bloginfo( 'description' );
		$filtered_title = $title . get_bloginfo( 'name' );
		$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' '.$sep.' ' . $site_description: '';
		$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' '.$sep.' ' . sprintf($this->translations['page_title'], max( $paged, $page ) ) : '';
		return $filtered_title;
	}


	/**
	* Change the gallery thumbnail size
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param array $out
	* @param $pairs
	* @param array $atts The called attributes
	* @uses str $this->theme_opt['gallery_thumbnail_size'] The defined gallery thumbnail size.
	* @return array Filtered attributes.
	*/
	function initialize_set_gallery_size($out,$pairs,$atts) {
		$atts = shortcode_atts( 
			array(
				'size' => $_this->theme_opt['gallery_thumbnail_size'],
			),
			$atts
		);
		$out['size'] = $atts['size'];
		return $out;
	}



	/**
	* Add class to paragraphs longer than $minlen, so they can be targeted via CSS.
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param str $content The content after being filtered by functions ith priority less than 11. Containing all markup.
	* @uses int $minlen The minimum lenght needed to add class
	* @return Filtered content.
	*/

	function initialize_dropcap_filter($content) {
		if(is_single()) {
			$reg = '/<p>(.*?)<\\/p>/si';
			$content = preg_replace_callback($reg, array($this, 'initialize_dropcap_filter_callback'), $content);
		}
		return $content;
	}
		function initialize_dropcap_filter_callback($matches) {
			$minlen = 200;
			if(strlen(strip_tags($matches[1])) > $minlen) {
				return '<p class="entry-firstparagraph-dropcap">'.$matches[1].'</p>';
			} else {
				return $matches[0];
			}
		}




	/**
	* Return content followed by pagination
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param str $content The content after being filtered by functions with priority less than 12. Containing all markup.
	* @uses bool $this->theme_opt['auto_pagination'] Whether to filter auto pagination or not
	* @uses bool $this->theme_opt['default_wp_link_pages'] Whether to use core pagination or "fancy" pagination.
	* @uses func $this->get_post_pagination() "Fancy" pagination. 
	* @return str Filtered content.
	*/
	function initialize_content_autopagination($content) {
		$content .= $this->theme_opt['default_wp_link_pages'] ? wp_link_pages(array('echo' => 0)) : $this->get_the_post_pagination(array('current_class' => 'accent-border-color accent-background-color'));
		return $content;
	}





	/**
	* Enqueues the styles and scripts for theme
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	*/
	function initialize_enqueue_scripts() {
		wp_enqueue_style($this->theme_opt['theme_name_lc'], get_template_directory_uri().'/style.css');
		wp_enqueue_script($this->theme_opt['theme_name_lc'], get_template_directory_uri() .'/js/'.$this->theme_opt['theme_name_lc'].'.js', array('jquery'));
		if(!!$this->theme_opt['override_stylesheet']) {
			wp_add_inline_style($this->theme_opt['theme_name_lc'], $this->theme_opt['override_stylesheet']);
		}
	}

}

?>
