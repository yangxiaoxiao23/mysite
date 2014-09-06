<?php get_header() ?>
<main>
	<?php if ( have_posts() ) :?>
		<h5><?php printf( __( 'Search Results for: %s', 'vanilj' ), '<span>' . get_search_query() . '</span>' ); ?></h5>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
	<?php else : ?>
		<article class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'vanilj' ); ?></h1>
			</header>

			<div class="entry-content">
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'vanilj' ); ?></p>
			</div>
		</article>
	<?php endif; ?>
</main>
<?php get_footer() ?>