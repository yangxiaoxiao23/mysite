<?php global $Flavour_Vanilj ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
		if(is_single()) {
			$Flavour_Vanilj->the_meta(array('types' => array('date', 'author', 'category', 'tag')));
		} else {
			$Flavour_Vanilj->the_meta(array('types' => array('date', 'author', 'readtime')));
		}
		?>
		<?php $Flavour_Vanilj->the_title() ?>
	</header>
	<div class="entry-content ">
		<?php if ( is_search() || ! is_single() ) : ?>
			<?php the_excerpt() ?>
		<?php else : ?>
			<?php the_content(); ?>
		<?php endif; ?>
	</div>
</article>
	<?php if(is_single()) {
		if(function_exists('related_posts')) : related_posts(); endif;
		$Flavour_Vanilj->get_post_author();
		$Flavour_Vanilj->get_comments();
	} ?>
