Change log
==============


0.0.1
----------
* Header Image array now needs to be declared in functions.php
* Add meta boxes with `Flavour::meta_box`
* Require Featured Image on Sticky Posts with `require_image_sticky`
* `Flavour::the_featured_image()` gets featured image
* `Flavour::adjustColor()` darkens/lightens color 
* `theme_opt["auto_options"]` to add regularly used options
* `Flavour::the_pagination` replaces `posts_nav_link()`, with enhanced capabilities


0.0.2
--------
* Override built-in css with `theme_opt["overrides"]`, currently supported are mediaplayer
* `Flavour::get_comments()` updated conditional
* Get embedded video from `Flavour::the_embedded_video()`
* Get first link with `Flavour::the_content_link()`
* Get content stripped from links with `Flavour::get_the_nolinkcontent()` or `Flavour::the_nolinkcontent()`
* Flavour class name changed to `Flavour_WordPress_Framework`


0.0.3
--------
* Updated `Flavour::the_pagination()`. Don't show `listview-pagination` if only one page
* Updated `Flavour::responsive_bg_images()`. Return false if no image exist
* Updated `Flavour::get_meta_x` to use `printf` instead of just `echo`
* Updated `Flavour::get_post_pagination()` to match `listview-pagination`
* Added conditional to `auto_pagination`
* Added `Flavour::get_comments_pagination()`
* Added conditional before iterating `theme_opt['overrides']`
* Updated mediaelement override to not change the core
* Replaced mediaelement override with css only solution
* Replaced l18n with theme_opt variable in `Flavour::__getComments()`


0.0.4
----------
* Remove br's from post_gallery with `theme_opt['no_br_gallery']`
* Filter post_gallery with `theme_opt['overrides']['post_gallery']`



0.1.0
--------
* Options, from now on called `independant_options`, that should be initiated before `after_setup_theme` will be passed to the initial class call.
* Options, from now on called `options`, that contains l18n or should be initiated after `after_setup_theme` will be passed with `[FLAVOUR]->init()`.
* `option['title_page_l18n']` decides how to output the head title. Most oftenly __('Page %s').
* `option['content_width'] must be declared in funcitons.php
* Split the content filters into two separate
* `options['meta_tag_before']` author and date must be printf compatible. %s
* `[FLAVOUR]->get_name()` gets theme
* `[FLAVOUR]->get_options()` gets theme_options
* `new Flavour_WordPress_Framework_Options` initiates class needed to render otions


0.1.1
---------
* Options class now supports color-picker via option['type'] = 'color'
* Add defaults to Flavour class on `independant_options` as option_defaults.
* Override stylesheed is passed as variable in `options` `override_stylesheet`.
* Flavour init hook added
* Add shortcodes via Flavour init hook



0.2.0
-------
* More streamlined function naming. the_xxxx prints/echoes, get_the_xxxx returns.
* `the_content_link` changed name to `get_the_content_link`.
* `the_embedded_video` changed name to `get_embedded_video`.
* `the_featured_image` changed name to `get_the_featured_image`.
* `the_separator default class is `.separator`. `accent-background-color`etc needs to be called in param $class
* `get_meta`changed name to `the_meta`.
* One big Flavour class split into several smaller classes containing similar functions, or functions in the same area. E.g all shortcode functions in same class. All classes extended with inheritance to Flavour_WordPress_Framework.
* `the_pagination changed parameters from `array,currentClass` to `array` which contains `current_class`.
* `the_comments_pagination changed parameters from `array,currentClass` to `array` which contains `current_class`.
* `get_the_comments_pagination changed parameters from `array,currentClass` to `array` which contains `current_class`.
* `get_title` changed name to `the_title`
* `responsive_bg_images` changed name to `get_responsive_image_class`
* `__calcReadTime` changed name to `helpers_calculate_read_time`
* `__getReadTime` changed name to `helpers_get_read_time`
* `__getImageSize` changed name to `helpers_get_image_size`
* `__adjustColor` changed name to `helpers_adjust_color`
* `__getComments` changed name to `the_comments`
* l18ns is put inside options['translations'] instead of directly into options.
* `array_merge` changed name to `helpers_merge_array`

0.2.1
------
* `initalize_require_sticky_image` changed to `initialize ....`