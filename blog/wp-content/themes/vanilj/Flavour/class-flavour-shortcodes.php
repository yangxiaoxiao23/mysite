<?php

class Flavour_WordPress_Framework_ShortCodes extends Flavour_WordPress_Framework_Templates {

	/**
	* Shortcodes are enabled.
	*/
	function shortcodes_init() {

		// Enqueue scripts
		add_action('wp_enqueue_scripts', array($this, 'shortcodes_enqueue'));


		//Add shortcodes button only if user will see tinyMCE editor
		if(current_user_can('edit_posts') && current_user_can('edit_pages') && get_user_option('rich_editing') == true) {
			add_filter('mce_external_plugins', array($this, 'shortcodes_tinymce_plugins'));
			add_filter('mce_buttons', array($this, 'shortcodes_tinymce_buttons'));
		}


		add_shortcode('flavour_tabparent', array($this, 'shortcodes_tab_parent'));
		add_shortcode('flavour_tab', array($this, 'shortcodes_tab_child'));

		add_shortcode('flavour_accordion', array($this, 'shortcodes_accordion_parent'));
		add_shortcode('flavour_accordion_section', array($this, 'shortcodes_accordion_child'));
	}

	/**
	* Enqueues scripts and styles
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	*/
	function shortcodes_enqueue() {
		wp_enqueue_script('flavour_shortcodes', get_template_directory_uri().'/Flavour/shortcodes.js');
		wp_enqueue_style('flavour_shortcodes', get_template_directory_uri().'/Flavour/shortcodes.css');
	}

	/**
	* Add TinyMCE plugin
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	*/
	function shortcodes_tinymce_plugins($plugins) {
		$plugins['flavour_shortcodes'] = get_template_directory_uri().'/Flavour/admin-script.js';
		return $plugins;
	}

	/**
	* Add TinyMCE button
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	*/
	function shortcodes_tinymce_buttons($buttons) {
		$buttons[] = 'flavour_shortcodes';
		return $buttons;
	}



	/** 
	* Renders a tabelements parent
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	* @return str Tab markup
	*/
	function shortcodes_tab_parent($atts, $content = null) {
		extract(shortcode_atts(array(), $atts));
		$output = '';
		preg_match_all('/flavour_tab *?title="([^\"]+)"/i', $content, $matches);
		if(sizeof($matches[1])) {
			$output .= '<div class="flavour-tabgroup">';
			$output .= '<ul class="flavour-tabgroup-tabs" role="tablist">';
			foreach ($matches[1] as $tab) {
				$output .= '<li role="presentation" class="flavour-tabgroup-tab"><span role="tab" aria-selected="false">'.$tab.'</span></li>';
			}
			$output .= '</ul>';
			$output .= '<ul class="flavour-tabs">';
			$output .= do_shortcode($content);
			$output .= '</ul>';
			$output .= '</div>';
		}
		return $output;
	}

	/** 
	* Renders a tabelements children
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	* @return str Tab markup
	*/
	function shortcodes_tab_child($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => ''
		), $atts));

		$output = '<li class="flavour-tabs-tab" role="tabpanel">';
		$output .= '<h3 class="flavour-tabs-tab-title">'.$title.'</h3>';
		$output .= do_shortcode($content);
		$output .= '</li>';
		return $output;
	}



	/**
	* Renders an accordionelements parent
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	* @param array $atts
	* @param str $content
	* @return str Accordion parent markup
	*/
	function shortcodes_accordion_parent($atts, $content = null) {
		$output = '<div class="flavour-accordion">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		$output = preg_replace('/<div class="flavour-accordion"> *?<br *?\/*?>/', '<div class="flavour-accordion">', $output);
		return $output;
	}


	/**
	* Renders an accordionelements children
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.2
	* @param array $atts
	* @param str $content
	* @return str Accordion child markup
	*/
	function flavour_accordion_section($atts, $content = null) {
		$output = '<div class="flavour-accordion-section">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		$output = $this->shortcode_sanitize($output, 'flavour-accordion-section', 'div');
		return $output;
	}


	/**
	* Remove unneccesary linebreaks from input
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.1.1
	* @param str $input
	* @param str $class
	* @param str $element
	* @return str Sanitized content
	*/
	function shortcode_sanitize($input = '', $class = '', $element = 'div') {
		return preg_replace('/(<'.$element.'.*?class="'.$class.'".*?>) *?<br *?\/*?>', "$1", $input);
	}
}
?>
