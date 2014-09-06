<?php global $Flavour_Vanilj ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php $Flavour_Vanilj->the_meta(array('date', 'author')) ?>
	</header>
	<div class="entry-content">
		<?php the_content() ?>
	</div>
	<?php if(is_single()) {
		$Flavour_Vanilj->get_post_author();
		$Flavour_Vanilj->get_comments();
	} ?>
</article>
