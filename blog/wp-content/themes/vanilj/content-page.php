<?php global $Flavour_Vanilj ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php $Flavour_Vanilj->the_title() ?>
	</header>
	<div class="entry-content ">
		<?php the_content(); ?>
	</div>
	<?php if(comments_open()): $Flavour_Vanilj->get_comments(); endif;?>
</article>
