<?php

include dirname(__FILE__).'/class-flavour-helpers.php';
include dirname(__FILE__).'/class-flavour-initialize.php';
include dirname(__FILE__).'/class-flavour-templates.php';
include dirname(__FILE__).'/class-flavour-shortcodes.php';

class Flavour_WordPress_Framework extends Flavour_WordPress_Framework_ShortCodes {
	public 	$theme_opt,
			$customize_array,
			$setupData,
			$version,
			$debug,
			$option_defaults,
			$theme_name,
			$theme_name_lc,
			$translations;

	function __construct($opt = array(), $themeVersion, $debug) {

		$this->version = '0.2.1';
		$this->debug = $debug;

		if($debug && $this->version !== $themeVersion) {
			echo 'Versions do not match, take a look at the <a href="'.get_template_directory_uri().'/Flavour.md">changelog</a>. Current version is '.$this->version.' and the theme\'s version is '.$themeVersion.'.';
		}


		if($opt['require_image_sticky']) {
			add_action('pre_post_update', array($this, 'initialize_require_image_sticky'));
		}



		/**
		* Sets options_defaults to the class variable
		* @author Eric Wennerberg
		* @since 0.1.1
		* @version 0.1.1
		* @param array $defaults
		* @uses array $this->option_defaults
		*/
		$this->option_defaults = $opt['option_defaults'];


		$this->theme_name = $opt['theme_name'];
		$this->theme_name_lc = strtolower($opt['theme_name']);
	}

	/**
	* Called after WordPress hook `init`
	* @author Eric Wennerberg
	* @param array $args
	* @since 0.1.1
	* @version 0.2.0
	*/
	function init($args) {
		if($args['shortcodes']) {
			$this->shortcodes_init();
		}
	}

	function after_setup_theme($theme_opt) {
		$_this = $this;

		/* See if the required options were passed */
		$required_options = array('theme_name', 'post_formats', 'nav_menus');
		foreach ($required_options as $k => $v) {
			if(!array_key_exists($v, $theme_opt)) {
				print $v.' needs to be defined';
				die;
			}
		}


		/* Default options */
		$default = array(
			'post_thumbnails' => true,
			'gallery_thumbnail_size' => 'gallery_thumb',
			'featured_image_size' => 'featured_image',
			'image_sizes' => array(
					'gallery_thumb' => array(300, 300, true),
					'featured_image' => array(600, 300, true),
					'related_image_thumb' => array(200, 150, true)
				),
			'auto_pagination' => true,
			'meta_tags_before' => array( 
				'author' => 'by',
				'category' => 'categories',
				'tag' => 'tags',
				'date' => '',
				'readtime' => ''
			),
			'auto_read_more_excerpt' => false,
			'excerpt_more' => "&nbsp;...",
			'default_wp_link_pages' => false,
			'no_br_gallery' => false,
			'content_width' => 800,
			'override_stylesheet' => false
		);

		$translations = $theme_opt['translations'];
		$translationsDefaults = array(
			'comments_at' => 'at',
			'comments_moderation' => 'Your comment is awaiting moderation.',
			'comments_reply' => 'Reply',
			'continue_reading' => 'Continue reading',
			'page_title' => 'Page %s'
		);

		



		/* Print debug info if in debug_mode */
		if($this->debug) {
			$keys_not_present = array_diff_key($default, $theme_opt);
			foreach ($keys_not_present as $key => $value) {
				print($key.' is not defined, default value is '. $value."<br>");
			}
			$keys_not_present = array_diff_key($translationsDefaults, $translations);
			foreach ($keys_not_present as $key => $value) {
				print($key.' is not defined, default value is '. $value."<br>");
			}	
		}


		$translations = array_merge($translationsDefaults, $translations);
		$this->translations = $translations;



		/* Override default options */
		$theme_opt = $this->helpers_merge_array($default, $theme_opt);
		$theme_opt['theme_name_lc'] = strtolower($theme_opt['theme_name']); 
		$this->theme_opt = $theme_opt;




		remove_action('shutdown', 'wp_ob_end_flush_all', 1);


		// After setup theme
			add_theme_support('automatic-feed-links');

			add_theme_support('post-formats', $this->theme_opt['post_formats']);

			if($this->theme_opt['post_thumbnails']): add_theme_support('post-thumbnails'); endif;

			if(isset($this->theme_opt['header_image']) && is_array($this->theme_opt['header_image'])) {
				add_theme_support('custom-header', $this->theme_opt['header_image']);
			}


			// Remove <br>'s from gallery markup
			if($this->theme_opt['no_br_gallery']) {
				add_filter('the_content', array($this, 'initialize_remove_gallery_br'), 11, 1);
			}


			if(isset($this->theme_opt['overrides']) && is_array($this->theme_opt['overrides'])) {
			}


			// Add a postclass dependent on the view.
			add_filter('post_class', array($this, 'initialize_post_class_view'));



			// Load html5shiv conditionally
			add_action('wp_head', array($this, 'initialize_html5shim'));



			// Don't use the default gallery CSS
			add_filter('use_default_gallery_style', '__return_false');


			// Define the excerpt more string
			add_filter('excerpt_more', array($this, 'initialize_excerpt_more'));


			// Add read more to excerpt automatically if condition is true.
			if($this->theme_opt['auto_read_more_excerpt']) {
				add_filter('get_the_excerpt', array($this, 'initialize_excerpt_auto_readmore'));
			}


			// Filter the title
			add_filter('wp_title', array($this, 'initialize_filter_title'));



			// Change the gallery thumbnail size
			add_filter('shortcode_atts_gallery', array($this, 'initialize_change_gallery_size'), 10, 3);




			add_filter('the_content', array($this, 'initialize_dropcap_filter'), 11);




			// Auto pagination
			if($this->theme_opt['auto_pagination']) {
				add_filter('the_content', array($this, 'initialize_content_autopagination'),12);
			}


			// Enqueues scripts and styles
			add_action('wp_enqueue_scripts', array($this, 'initialize_enqueue_scripts'));



			// Set default content width
			if (!isset($content_width)) $content_width = $this->theme_opt['content_width'];




			// Fallback for old WP versions, regarding comments
			if (is_singular()) wp_enqueue_script('comment-reply');



			/**
			* Set thumbnail size, that I see as default
			* @uses array $this->theme_opt['featured_image_size']
			* @uses func $this->helpers_get_image_size
			*/
			if(function_exists('set_post_thumbnail_size')) {
				$temporary1 = $this->theme_opt['featured_image_size'];
				$temporary2 = $this->helpers_get_image_size($temporary1, $this->theme_opt['image_sizes'][$temporary1], true);
				call_user_func_array('set_post_thumbnail_size', $temporary2);

			}


			/**
			* Add image sizes
			* @uses array $this->theme_opt['image_sizes'] The declared imagesizes.
			* @uses func $this->helpers_get_image_size
			*/
			if(function_exists('add_image_size')) {
				foreach($this->theme_opt['image_sizes'] as $k => $v) {
					$iS = $this->helpers_get_image_size($k,$v);
					call_user_func_array('add_image_size', $iS);
				}
			}



			register_nav_menus($this->theme_opt['nav_menus']);
	}


	/**
	* Returns name of the theme
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.2.0
	* @param bool $lc
	* @return Name of the theme;
	*/
	function get_name($lc = false) {
		if($lc) {
			return $this->theme_opt['theme_name_lc'];
		}
		return $this->theme_opt['theme_name'];
	}




	/**
	* Get options merged with the defaults.
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.1.1
	* @param str $opt
	* @return Array with options
	*/
	function get_options($opt = false) {
		$options = array_merge($this->option_defaults, get_option($this->theme_name_lc.'_theme_options', array()));
		if($opt) {
			return $options[$opt];
		}
		return $options;
	}


}

class Flavour_WordPress_Framework_Options {


	public 	$sections,
			$options,
			$defaults,
			$theme_options,
			$_optiongrp,
			$_optionnm,
			$page_title,
			$theme_name;

	/**
	* Declares various variables when class is initiated.
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.2.0
	*/
	function __construct($theme_name) {
		$this->theme_name = $theme_name;
		$_optiongrp = $theme_name.'_options';
		$_optionnm = $theme_name.'_theme_options';

		$this->_optionnm = $_optionnm;
		$this->_optiongrp = $_optiongrp;

		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
	}

	/**
	* Enqueues scripts and styles
	* @author Eric Wennerberg
	* @since 0.2.0
	* @version 0.2.0
	*/
	function enqueue_scripts($hook) {
		if($hook == 'appearance_page_theme_options') {
			wp_register_style($this->theme_name.'_options_page_css', get_template_directory_uri().'/Flavour/admin-style.css');
			wp_register_script($this->theme_name.'_options_page_js', get_template_directory_uri().'/Flavour/admin-script.js', array('jquery'));
			wp_enqueue_script($this->theme_name.'_options_page_js');
			wp_enqueue_style($this->theme_name.'_options_page_css');
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script('wp-color-picker');
		}
	}


	/**
	* Get an option's value
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.1.1
	* @param str $id
	* @return str Value for the given id
	*/
	function get_option($id) {
		return !empty($this->theme_options[$id]) ? $this->theme_options[$id] : $this->defaults[$id];
	}

	/**
	* Get the namespaced id for the option
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.1.1
	* @param str $id
	* @uses str $this->_optionnm
	* @return str Namespaced id
	*/
	function get_id_name($id) {
		return $this->_optionnm.'['.$id.']';
	}


	/**
	* Executes after admin_menu. Sets up the menu page and defines the callback.
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.1.0
	*/
	function menu_init($title) {
		$this->page_title = $title;
		add_theme_page($title, $title, 'edit_theme_options', 'theme_options', array($this, 'render_display'));
	}


	/**
	* Executes after admin_init. Sets up variables and registers theme setting.
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.1.0
	* @param array $sections
	* @param array $options
	* @param array $defaults
	*/
	function admin_init($sections, $options, $defaults) {
		register_setting($this->_optiongrp, $this->_optionnm, array($this, 'sanitize'));

		$this->sections = $sections;
		$this->options = $options;
		$this->defaults = $defaults;

		$this->theme_options = get_option($this->_optionnm, array());
	}


	/**
	* Renders the root of the options page
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.1.0
	* @uses str $this->page_title
	* @uses array $this->sections
	* @uses array $this->options
	* @uses func $this->section
	*/
	function render_display() { ?>
		<div class="wrap">
			<h2><?php echo $this->page_title; ?></h2>
			<form method="post" action="options.php">
				<?php settings_fields($this->_optiongrp); ?>
				<?php foreach ($this->sections as $k => $section) {
					if(isset($this->options[$section['id']]) && is_array($this->options[$section['id']])) {
						$options = $this->options[$section['id']];
						$this->section($section['title'], $options);
					}
				} ?>
			</form>
		</div>
		<script type="text/javascript">
		    jQuery(document).ready(function($) {   
		        $('.flavour-color-picker').each(function() {
		        	var palette = $(this).data('palette');
		        	palette = palette.split(',');
		        	console.log(palette);
		        	$(this).wpColorPicker({ 'palettes': palette});
		        });
		    });             
		</script>
	<?php }


	/**
	* Renders the root of a section
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.1.0
	* @param str $title
	* @param array $options
	* @uses func $this->render_option
	* @uses func $this->save
	*/
	function section($title, $options) { 
		echo '<div class="flavour-options-section flavour-options-section--nojs">';
		echo '<h3 class="flavour-options-section-title">'.$title.'</h3>';
		echo '<div class="flavour-options-section-main">';
		foreach ($options as $k => $option) {
			$this->render_option($option);
		}
		$this->save();
		echo '</div>';
		echo '</div>';
	}



	/**
	* Renders the option title and description
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.1.0
	* @param array $option
	* @uses func $this->$option['type'] Different function depending on type of option
	*/
	function render_option($option) {
		echo '<div class="flavour-option">';
		echo '<h4 class="flavour-option-title">'.$option['title'].'</h4>';
		echo '<div class="flavour-option-holder">';
		$this->$option['type']($option);
		if(isset($option['description'])) {
			echo '<p class="flavour-option-description">'.$option['description'].'</p>';
		}
		echo '</div>';
		echo '</div>';
	}

	/**
	* Renders text field. Called when $option['type'] == text
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.1.1
	* @param array $option
	* @uses func $this->get_option
	* @uses func $this->get_id_name
	*/
	function text($option) {
		extract($option);

		$value = $this->get_option($id);
		$placeholder = isset($placeholder) ? $placeholder : '';
		$idName = $this->get_id_name($id);
		echo '<input id="'.$idName.'" type="text" name="'.$idName.'" value="'.esc_html($value).'" placeholder="'.$placeholder.'">';
	}



	/**
	* Renders color-picker
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.1.1
	* @param array $option
	* @uses func $this->get_option
	* @uses func $this->get_id_name
	*/
	function color($option) {
		extract($option);

		$value = $this->get_option($id);
		$idName = $this->get_id_name($id);
		if(isset($color_palette)) {
			$color_palette = implode(",", $color_palette);
			$palette = $color_palette;
		} else {
			$palette = '';
		}
	 	echo '<input name="'.$idName.'" class="flavour-color-picker" type="text" id="'.$idName.'" value="'.$value.'" data-palette="'.$palette.'">';
	}



	/**
	* Renders select input
	* @author Eric Wennerberg
	* @since 0.1.1
	* @version 0.1.1
	* @param array $option
	* @uses func $this->get_option
	* @uses func $this->get_id_name
	*/
	function select($option) {
		extract($option);
		$value = $this->get_option($id);
		$idName = $this->get_id_name($id);

		echo '<select name="'.$idName.'" id="'.$idName.'">';
			foreach($options as $template => $name) {
				echo '<option value="'.$template.'" '.selected($template, $value, false).'>'.$name.'</option>';
			}
		echo '</select>';
	}

	/**
	* Renders WordPress save button
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.1.0
	* @todo Update with "Reset Defaults" for another theme. Exists for use in later versions.
	*/
	function save() {
		submit_button();
	}

	/**
	* Sanitizes the input. For now it does nothing.
	* @author Eric Wennerberg
	* @since 0.1.0
	* @version 0.1.0
	* @todo Update sanitization in later version.
	*/
	function sanitize($input) {
		return $input;
	}
}
?>
