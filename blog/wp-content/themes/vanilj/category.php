<?php
get_header(); ?>
<aside class="aside">
	<div>
		<div class="archive-desc">
			<h1 class="archive-title nomargin"><?php single_cat_title(); ?></h1>
			<p class="nomargin"><?php echo category_description(); ?></p>
		</div>
	</div>
</aside>
<main>
	<?php if ( have_posts() ) : ?>
			<?php
					rewind_posts();
					while ( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() );
					endwhile; ?>
					<div class="listview-pagination"><?php posts_nav_link(); ?></div>

				<?php else :
					get_template_part( 'content', 'none' );

				endif;
			?>

	</main>

<?php
get_footer();
