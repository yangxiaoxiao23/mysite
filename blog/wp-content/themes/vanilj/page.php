<?php get_header() ?>
<main>
	<?php if ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'page' ); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</main>
<?php get_footer() ?>