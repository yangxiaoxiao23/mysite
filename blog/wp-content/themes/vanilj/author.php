<?php
get_header(); ?>
<aside class="aside author-bio">
	<div>
		<div class="author-bio-avatar">
			<?php
				the_post();
				echo get_avatar( get_the_author_meta( 'user_email' ), 100 );
			?>
		</div><div class="author-bio-desc">
			<h1 class="archive-title nomargin"><?php the_author() ?></h1>
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<p class="nomargin"><?php the_author_meta( 'description' ); ?></p>
			<?php endif; ?>
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
