<article class="post">
		<header>
			<h2 class="h-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php if(has_post_thumbnail()): ?>
			<div class="post-thumbnail row"><?php the_post_thumbnail(); ?></div>
		<?php endif; ?>
	</header>
	<div class="bio post-content">
		<?php the_content(); ?>
	</div>
</article>