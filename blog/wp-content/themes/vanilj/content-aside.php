<?php global $Flavour_Vanilj ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(!is_single()) :?>
			<?php $Flavour_Vanilj->the_meta(array('date')) ?>
		<?php else : ?>
			<?php $Flavour_Vanilj->the_meta(array('date', 'author')) ?>
			<?php $Flavour_Vanilj->the_title() ?>
		<?php endif; ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php if(is_single()) {
		$Flavour_Vanilj->get_post_author();
		$Flavour_Vanilj->get_comments();
	} ?>
</article>
