<?php global $Flavour_Vanilj ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php $Flavour_Vanilj->the_meta(array('date', 'author')) ?>
		<?php $Flavour_Vanilj->the_title() ?>
	</header>

	<div class="entry-content">
		<?php if ( is_single() || ! get_post_gallery() ) : ?>
			<?php the_content(); ?>
		<?php else : ?>
			<?php echo get_post_gallery(); ?>
		<?php endif; ?>
	</div>
	<?php if(is_single()) {
		$Flavour_Vanilj->get_post_author();
		$Flavour_Vanilj->get_post_author();
	} ?>
</article>
