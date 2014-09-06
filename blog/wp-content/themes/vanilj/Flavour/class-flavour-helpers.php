<?php
class Flavour_WordPress_Framework_Helpers {

	/**
	* Returns pagination markup
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @param array $pages
	* @return str pagination markup
	*/
	function helpers_pagination($pages = array(), $currentClass) {
		$return = '<ul class="pagination">';
		foreach ($pages as $k => $v) {
			$t = $v;
			$v = preg_replace_callback('/(<a.*?>)(.*?)(<\/a>)/i', array($this, 'helpers_pagination_callback_link'), $v);
			$link = false;
			if($t !== $v) {
				$link = true;
			}
			$v = preg_replace_callback('/<span.*?dots.*?>.*?<\/span>/i', array($this, 'helpers_pagination_callback_dots'), $v);
			if(!$link && $v !== '') {
				$v = '<li class="pagination-box pagination-current '.$currentClass.'">'.$v.'</li>';
			}
			$return .= $v;
		}
		$return .= '</ul>';
		return $return;
	}
		function helpers_pagination_callback_link($matches) {
			return $matches[1].'<li class="pagination-box">'.$matches[2].'</li>'.$matches[3];
		}
		function helpers_pagination_callback_dots($matches) {
			return '';
		}



	/**
	* Returns link from anchor
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	* @param str $string
	* @return str Link
	*/
	function helpers_extract_link($string) {
		return preg_replace_callback('/<a *?href="(.*?)" *?> *?(<\/a>)*/i', array($this, 'helpers_extract_link_callback'), $string);
	}
		function helpers_extract_link_callback($matches) {
			return $matches[1];
		}



	/**
	* Updates post_meta with number of words
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param str $post_id
	* @return int $words;
	*/
	function helpers_calculate_read_time($post_id) {
		$content = apply_filters('the_content', get_post_field('post_content', $post_id, 'raw'));
		$words = str_word_count($content);

		update_post_meta($post_id, 'flavour_num_words', $words);
		return $words;
	}

	/**
	* Returns posts number of words
	* @author Eric Wennerberg
	* @since 0.0.7
	* @version 0.2.0
	* @param str $post_id
	* @return int number of minutes
	*/
	function helpers_get_read_time($post_id) {
		$post_meta = get_post_meta($post_id, 'flavour_num_words', true);
		$words = is_wp_error($post_meta) || $post_meta == '' ? $this->helpers_calculate_read_time($post_id) : $post_meta;
		$time = round(intval($words) / $this->get_options('reading_speed'));
		return $time;
	}



	/**
	* Returns array with image size parameters
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	* @param str $imageSizeName The name of the image size to return
	* @param array $imageSizeArray The image sizes. ex array(300,300,true);
	* @param bool $onlyReturnSize Whether to return only the size or the name+size
	* @return array array('name', 300, 300, true) || array(300,300,true);
	*/
	function helpers_get_image_size($imageSizeName = '', $imageSizeArray, $onlyReturnSize = false) {
			if(!isset($imageSizeArray[2])) { $imageSizeArray[2] = false; }
			if($onlyReturnSize) {
				return $imageSizeArray;
			} else {
				return array($imageSizeName, $imageSizeArray[0], $imageSizeArray[1], $imageSizeArray[2]);
			}
	}



	/**
	* Returns a color lightened/darkened
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	* @param str $color
	* @param int $value
	* @return str color
	*/
	function helpers_adjust_color($color, $value) {
		$matches = array();
		if(preg_match('/^#([a-f0-9][a-f0-9])([a-f0-9][a-f0-9])([a-f0-9][a-f0-9])$/', $color, $matches)) {
			$return = "#";
			foreach(array($matches[1],$matches[2],$matches[3]) as $hex) {
				$t = dechex(max(0, min(255,intval(hexdec($hex))+$value)));
				if(strlen($t) == 1) {
					$t = $t.$t;
				}
				$return .= $t;
			}
			return $return;
		} else {
			return $color;
		}
	}

	/**
	* Returns recursively merged array
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	* @param array $a1
	* @param array $a2
	* @return array merged array
	*/
	function helpers_merge_array($a1, $a2) {
		if(!function_exists('drill')) {
			function drill($return, $a, $b) {
				foreach($a as $k => $v) {
					if(!isset($b[$k])) {
						$return[$k] = $v;
					} else {
						if(is_array($v) && is_array($b[$k])) {
							$return[$k] = drill(array(), $v, $b[$k]);
						} elseif((is_array($v) && !is_array($b[$k])) || (!is_array($v) && is_array($b[$k]))) {
							$return[$k] = $v;
						} else {
							$return[$k] = $b[$k];
						}
					}
				}
				foreach ($b as $k => $v) {
					if(!isset($return[$k])) {
						$return[$k] = $v;
					}
				}
				return $return;
			}
		}
		$return = drill(array(), $a1, $a2);
		return $return;
	}


}

?>
