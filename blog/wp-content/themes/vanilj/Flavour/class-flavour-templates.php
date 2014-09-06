<?php

class Flavour_WordPress_Framework_Templates extends Flavour_WordPress_Framework_Initialize {

	/**
	* Prints the post's first link
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @uses func $this->get_the_content_link
	*/
	function the_content_link() {
		echo $this->get_the_content_link(true);
	}
	/**
	* Returns the post's first link
	* @author Eric Wennerberg
	* @since 0.2.2
	* @version 0.2.0
	* @param bool $from_function Called from class
	* @return str The link || str Empty to `the_content_link` || bool False if no link found and called from template
	*/
	function get_the_content_link($from_function = false) {
		$content = apply_filters('the_content', get_the_content());
		$content = str_replace(']]>', ']]&gt;', $content);
		$matches = array();
		if(preg_match('/<a.*?href="(.+?)".*?<\/a>/si', $content, $matches)) {
			return $matches[1];
		} else if($from_the_content_link) {
			return '';
		} else {
			return false;
		}
	}


	/**
	* Prints the post's first embedded video
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @uses func $this->get_the_embedded_video
	*/
	function the_embedded_video() {
		echo get_the_embedded_video(true);
	}

	/**
	* Returns the post's first embedded video
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @param bool $from_function Called from class
	* @return str The embedded video || str empty || bool false if no video
	*/
	function get_the_embedded_video($from_function = false) {
		$content = apply_filters('the_content', get_the_content());
		$content = str_replace(']]>', ']]&gt;', $content);
		$matches = array();
		if(preg_match('/(<embed.*?<\/embed>|<iframe.*<\/iframe>)/si', $content, $matches)) {
			echo '<div class="entry-video featured-image-padding">'.$matches[1].'</div>';
			return true;
		} else if($from_function) {
			return '';
		} else {
			return false;
		}
	}


	/**
	* Prints the featured image markup
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param str $class
	* @param bool $inner
	* @param bool $nomargin
	* @return bool false if no image exist
	*/
	function the_featured_image($class = '', $inner = false, $nomargin = false) {
		if(!$this->get_the_featured_image($class, $inner, $nomargin)) {
			return false;
		} else {
			echo $this->get_the_featured_image($class, $inner, $nomargin);
		}
	}

	/** 
	* Returns the featured iamge markup
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @param str $class
	* @param bool $inner
	* @param bool $nomargin
	* @return str The markup || bool false if no image exist
	*/
	function get_the_featured_image($class='', $inner = false, $nomargin = false) {
		if(has_post_thumbnail()) {
			$class .= $nomargin ? ' entry-featured-image--nomargin' :'';
			$imageArray = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $this->theme_opt['featured_image_size']);
			$divinner = $inner ? '<div class="accent-background-color font-awesome"><span>&#xf061;</span></div>':'';
			$div = '<div class="entry-featured-image background-image featured-image-padding'.$class.'" style="background-image: url('.$imageArray[0].')">'.$divinner.'</div>';
			if(is_single()) {
				return $div;
			} else {
				return '<a href="'.get_permalink().'">'.$div.'</a>';
			}
		} else {
			return false;
		}
	}

	/**
	* Renders the separator
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param str $class
	*/
	function the_separator($class='') {
		echo $this->get_the_separator($class);
	}

	/**
	* Returns the separator markup
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param str $class
	*/
	function get_the_separator($class='') {
		return '<div class="separator accent-background-color '.$class.'"></div>';
	}



	/**
	* Renders the meta tags. Categories, tags etc.
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @param array $args
	* @uses func $this->get_the_meta
	*/
	function the_meta($args = array()) {
		$this->get_the_meta($args);
	}


	/**
	* Returns the meta tags. Categories, tags etc.
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @param array $args
	*/
	function get_the_meta($args = array()) {
		$default = array(
			'types' => array('author', 'date', 'category', 'tag'),
			'before' => $this->theme_opt['meta_tags_before']
		);
		$opt = array_merge($default, $args);
		$return = '<div class="entry-meta">';
		foreach($opt['types'] as $type) {
			$tmp = 'get_meta_'.$type;
			$return .= $this->$tmp($opt['before'][$type]);
		}
		$return .= '</div>';
		return $return;
	}


	/**
	* Returns author meta tags
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @return str author meta tag markup
	*/
	function get_meta_author($before = '%s') {
		return '<span class="entry-meta-author">'.sprintf($before, '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author().'</a>').'</span>';
	}


	/**
	* Returns date meta tags
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @return str date meta tag markup
	*/
	function get_meta_date($before = '%s') {
		return '<span class="entry-meta-date">'.sprintf($before, '<a href="'.get_permalink().'">'.get_the_time(get_option('date_format')).'</a></span>').'</span>';
	}



	/**
	* Returns categories meta tags
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @return str categories meta tag markup
	*/
	function get_meta_category($before = '') {
		return '<span class="entry-meta-category">'.$before.' '.get_the_category(", ").'</span>';
	}


	/**
	* Returns tags meta tags
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @return str tags meta tag markup
	*/
	function get_meta_tag($before = '') {
		return get_the_tags('<span class="entry-meta-tag">'.$before.' ',', ','</span>');
	}


	/**
	* Returns readtime meta tags
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @return str readtime meta tag markup
	*/
	function get_meta_readtime($before = '%s') { 
		$class =  'entry-meta-readtime';
		return '<span class="'.$class.'">'.sprintf($before, $this->helpers_get_read_time(get_the_ID())).'</span>';
	}




	/**
	* Renders the loop pagination
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param array $args
	* @uses func $this->get_the_pagination
	*/
	function the_pagination($args = array()) {
		echo $this->get_the_pagination($args);
	}



	/**
	* Returns the loop pagination
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @param array $args
	* @return str pagination markup
	* @uses func $this->helpers_pagination
	*/
	function get_the_pagination($args = array()) {
		global $wp_query;
		$default = array(
			'base' => str_replace( 99999, '%#%', esc_url(get_pagenum_link(99999))),
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages,
			'type' => 'array',
			'prev_text' => '<',
			'next_text' => '>',
			'end_size' => 0,
			'mid_size' => 2,
			'current_class' => ''
		);

		$opt = array_merge($default, $args);

		$return = $this->helpers_pagination(paginate_links($opt), $opt['current_class']);
		return $return;
	}






	/**
	* Renders the post pagination
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @uses $this->get_the_post_pagination
	* @param array $args
	*/
	function the_post_pagination($args = array()) {
		echo $this->get_the_post_pagination($args);
	}

	/**
	* Renders the post pagination
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @uses $this->get_the_post_pagination
	* @param array $args
	* @return str post pagination markup
	*/
	function get_the_post_pagination($args = array()) {
		global $page, $numpages, $multipage, $more, $pagenow;
		$default = array(
			'base' => str_replace( 99999, '%#%', esc_url($this->helpers_extract_link(_wp_link_page(99999)))),
			'format' => '?paged=%#%',
			'current' => $page,
			'total' => $numpages,
			'type' => 'array',
			'prev_text' => '<',
			'next_text' => '>',
			'end_size' => 0,
			'mid_size' => 2,
			'current_class' => ''
		);
		$opt = array_merge($default, $args);
		$return = $this->helpers_pagination(paginate_links($opt), $opt['current_class']);
		return $return;
	}




	/**
	* Renders comments pagination
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	* @param array $args
	* @uses func $this->get_comments_pagination
	*/
	function the_comments_pagination($args = array(), $current_class = '') {
		echo $this->get_the_comments_pagination($args);
	}


	/**
	* Returns comments pagination
	* @author Eric Wennerberg
	* @since 0.0.4
	* @version 0.1.1
	* @param array $args
	* @uses $this->helpers_pagination
	* @return str comments pagination markup
	*/
	function get_the_comments_pagination($args = array()) {
		$default = array(
			'base' => str_replace( 99999, '%#%', esc_url(get_comments_pagenum_link(99999))),
			'format' => '?paged=%#%',
			'type' => 'array',
			'prev_text' => '<',
			'next_text' => '>',
			'end_size' => 0,
			'mid_size' => 2,
			'echo' => false,
			'current_class' => ''
		);
		$opt = array_merge($default, $args);

		$return = $this->helpers_pagination(paginate_comments_links($opt), $opt['current_class']);
		return $return;
	}



	/**
	* Initializes the author template part
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	*/
	function get_post_author() {
		if(get_the_author_meta('description')) {
			get_template_part( 'author-bio' );
		}
	}
	/**
	*Initializes the comments template part
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	*/
	function get_comments() {
		if (is_singular() && (comments_open() || get_comments_number() !== 0)) {
			comments_template('/comments.php', true);
		}
	}


	/**
	* Renders comments markup
	* @author Eric Wennerberg
	* @since 0.0.1
	* @version 0.2.0
	* @param object $comment
	* @param array $args
	* @param int $depth
	*/

	function the_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		   <?php if ($comment->comment_approved == '0') : ?>
		      <em><?php echo $this->translations['comments_moderation']; ?></em>
		   <?php else: ?>
		   		<?php if($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') :  ?>
					<div class="comment-content">Pingback: <a href="<?php echo $comment->comment_author_url ?>" rel="external"><?php echo $comment->comment_author ?></a></div>


		   		<?php else : ?>

			   		<div class="comment-info">
			   			<?php echo get_avatar($comment, $args['avatar_size']) ?>
			   			<?php comment_author_link() ?>
			   			<span class="comment-meta">
			   				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_date().' '.$this->translations['comments_at'].' '.get_comment_time() ?></a>
			   				<?php edit_comment_link(__('Edit', 'vanilj')) ?>
			   				<?php comment_reply_link(array('depth' => $depth, 'reply_text' => $this->translations['comments_reply'], 'max_depth' => $args['max_depth'])) ?>
			   		</div>
			   		<div class="comment-content">
			   			<?php echo $comment->comment_content ?>
			   		</div>
		   		<?php endif; ?>
		   	<?php endif; ?>
	<?php }





	/**
	* Renders the title markup
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param str $current_class
	*/
	function the_title($current_class = null) {
		if(!is_single() && !is_page()) : ?>
			<h2 class="entry-title <?php echo $current_class ?>"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
		<?php else : ?>
			<h1 class="entry-title <?php echo $current_class ?>"><?php the_title() ?></h1>
		<?php endif; ?>
	<?php }



	/**
	* Renders the content stripped from links
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.2.0
	* @uses func $this->get_the_nolinkcontent
	*/
	function the_nolinkcontent() {
		echo $this->get_the_nolinkcontent();
	}

	/**
	* Returns the content stripped from links
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.2.0
	* @return str content stripped from links
	*/
	function get_the_nolinkcontent() {
		$content = apply_filters('the_content',get_the_content());
		$content = preg_replace_callback('/<a.*?>(.*?)<\/a>/is', array($this, 'get_the_nolinkcontent_callback'), $content);
		return $content;
	}
		function get_the_nolinkcontent_callback($matches) {
			return $m[1];
		}



	/**
	* Get image sizes from attachment id and output css attached to a class
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	* @param int $attachment_id
	* @param array $sizes
	* @return str classname || bool false
	*/
	function get_responsive_image_class($attachment_id, $sizes = array()) {
		if(empty($sizes)) {
			echo '$sizes needs to be defined when using get_responsive_image_class';
			return false;
		} elseif(!wp_get_attachment_image_src($attachment_id)) {
			return false;
		} else {
			$className = 'bg-image-'.uniqid();
			echo '<style>';
			foreach($sizes as $name => $maxwidth) {
				$t = wp_get_attachment_image_src($attachment_id, $name);
				$style = '.'.$className.' { background-image: url('.$t[0].');}';
				$style = !$maxwidth ? $style : '@media(min-width:'.$maxwidth.') {'.$style.'}';
				echo $style;
			}
			echo '</style>';
			return $className;
		}
	}


}

?>
