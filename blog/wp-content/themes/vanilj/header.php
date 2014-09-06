<!DOCTYPE html>
<?php global $Flavour_Vanilj ?>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '-', true, 'right' ); ?></title>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php 
if(is_single()) :
	$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
endif;
$header_img = is_single() && has_post_thumbnail() ? $thumb[0] : get_header_image();
?>

<header class="header">
	<div class="header-image" style="background-image: url(<?php echo $header_img ?>);"></div>
	<div class="header-image-overlay"></div>
	<div class="header-search-container"><form action="<?php echo esc_url(home_url('/')); ?>" method="get"><input name="s" placeholder="<?php _e('Search Vanilj', 'vanilj') ?>" class="header-search-input" type="text"></form></div>
	<div class="header-categories-container">
		<span class="header-categories-trigger font-awesome">&#xf00d;</span>
		<div class="header-categories-section">
			<h5 class="header-categories-section-title"><?php _e('Popular Categories', 'vanilj') ?></h5>
			<ul class="list-2-columns nomargin">
				<?php wp_list_categories(
					array(
						'orderby' => 'count',
						'order' => 'desc',
						'number' => '10',
						'title_li' => ''
					)
				); ?>
			</ul>
		</div>
	</div>
	<div class="header-text">
		<h1 class="header-title"><a href="<?php echo home_url() ?>"> <?php bloginfo('name') ?></a></h1>
		<p class="header-desc"><?php bloginfo('description') ?></p>
		<nav>
			<?php
				wp_nav_menu(
					array( 
						'theme_location' => 'header-nav',
						'container' => false,
						'items_wrap' => '<ul>%3$s<li><a href="#search" class="font-awesome header-search-trigger">&#xf002;</a></li><li><a href="#categories" class="font-awesome header-categories-trigger">&#xf07b;</a></li></ul>',
						'depth' => -1
					)
				);
			?>
		</nav>
	</div>
	<?php if(is_single() && !get_post_format()) : ?>
		<?php if($Flavour_Vanilj->helpers_get_read_time(get_the_ID(), true) > 0): ?>
			<div class="header-reading-progress"><div></div></div>
		<?php endif; ?>
	<?php endif; ?>
</header>


