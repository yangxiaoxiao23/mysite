<?php
include 'Flavour/Flavour.php';
$theme_name = 'vanilj';

$defaults = array(
	'reading_speed' => 300
);
$options = array(
	'require_image_sticky' => false,
	'option_defaults' => $defaults,
	'theme_name' => $theme_name
);
$Flavour_Vanilj = new Flavour_WordPress_Framework($options, '0.2.1', true);





add_action('after_setup_theme', function() use ($Flavour_Vanilj, $theme_name) {

load_theme_textdomain(strtolower($theme_name), get_template_directory() . '/lang');	

$options = array(
	'theme_name' => $theme_name,
	'post_formats' => array('aside', 'status', 'gallery', 'quote', 'image'),
	'post_thumbnails' => true,
	'header_image' => array(
		'height' => 450,
		'flex-width' => true,
		'width' => 800,
		'header-text' => false,
	),
	'default_wp_link_pages' => true,
	'gallery_thumbnail_size' => 'gallery_thumb',
	'featured_image_size' => 'featured_image',
	'image_sizes' => array(
		'gallery_thumb' => array(300, 300, true),
		'featured_image' => array(600,300, true)
	),
	'auto_pagination' => true,
	'nav_menus' => array(
		'header-nav' =>	__( 'Header Navigation','vanilj')
	),
	'meta_tags_before' => array(
		'date' => '%s',
		'author' => _x('by %s','2014/01/01 [by] author', 'vanilj'),
		'category' => '<span class="font-awesome">&#xf07b;</span>',
		'tag' => '<span class="font-awesome">&#xf02c;</span>'
	),
	'require_image_sticky' => false,
	'auto_read_more_excerpt' => true,
	'excerpt_more' => '&nbsp;...',
	'no_br_gallery' => false,
	'content_width' => 1000,
	'translations' => array(
		'page_title' => __('Page %s', 'vanilj'),
		'comments_moderation' => __('Your comment is awaiting moderation.', 'vanilj'),
		'continue_reading' => __('Continue reading', 'vanilj'),
		'comments_at' => _x('at', '14 March [at] 14:00', 'vanilj'),
		'comments_reply' => __('Reply', 'vanilj')
	),
	'override_stylesheet' => false
);
$Flavour_Vanilj->after_setup_theme($options);
});


$Flavour_Vanilj_Options = new Flavour_WordPress_Framework_Options($theme_name);

add_action('admin_menu', 'vanilj_admin_menu');
function vanilj_admin_menu() {
	global $Flavour_Vanilj_Options;
	$title = __('Theme Options', 'vanilj');
	$Flavour_Vanilj_Options->menu_init($title);
}


add_action('admin_init', 'vanilj_admin_init');
function vanilj_admin_init() {
	global $Flavour_Vanilj_Options, $defaults;
	$sections = array(
		array(
			'id' => 'variables',
			'title' => __('Variables', 'vanilj')
		)
	);
	$options = array(
		'variables' => array(
			array(
				'id' => 'reading_speed',
				'title' => __('Reading Speed', 'vanilj'),
				'type' => 'text',
				'description' => __('This value is used to calculate the time it takes to read a post. If reading speed is set to 300, the time it takes to read a 300 words-text is 1 minute. The average reading speed is around 300 wpm. Depending on your content this value could be different.', 'vanilj')
			)
		)
	);
	$Flavour_Vanilj_Options->admin_init($sections, $options, $defaults);	
}
?>
