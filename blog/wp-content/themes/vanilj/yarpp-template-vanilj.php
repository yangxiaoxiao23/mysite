<?php
/*
YARPP Template: Vanilj
Description: YARPP template customized for Vanilj
Author: ericwenn (Eric Wennerberg)
*/
?>

<h2><?php __('Related Posts', 'vanilj')?></h2>
<?php if (have_posts()):?>
<ul class="yarpp-list">
	<?php while (have_posts()) : the_post(); ?><li>
			<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'related-image-thumb');
			$thumb = has_post_thumbnail() ? $thumb[0] : get_template_directory_uri().'/images/related_thumb.png';?>
			<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $thumb ?>"></a>
			<h5><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h5></li><?php endwhile; ?>
</ul>
<?php else: ?>
<p><?php _e('No related posts.','vanilj') ?></p>
<?php endif; ?>