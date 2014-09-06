<?php get_header() ?>


<main>
	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
	<div class="listview-pagination"><?php posts_nav_link(); ?></div>
</main>

<?php get_footer() ?>