<?php get_header(); ?>
<?php get_template_part('index', 'banner'); ?>

<div class="content-wrapper"><div class="body-wrapper">
    <div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9">
			<h1><?php if ( is_day() ) : ?>
				<?php  _e( "Daily Archives:", 'weblizar' ); echo (get_the_date()); ?>
				<?php elseif ( is_month() ) : ?>
				<?php  _e( "Monthly Archives:", 'weblizar' ); echo (get_the_date( 'F Y' )); ?>
				<?php elseif ( is_year() ) : ?>
				<?php  _e( "Yearly Archives:", 'weblizar' );  echo (get_the_date( 'Y' )); ?>
				<?php else : ?>
				<?php _e( "Blog Archives", 'weblizar' ); ?>
				<?php endif; ?>
			</h1>	
			<?php 	while(have_posts()):the_post();
					global $more; $more = 0; 
					get_template_part( 'content', get_post_format() );
					endwhile; ?>				
				
				<div class="pagination">
					<?php if ( get_next_posts_link() ): ?>
						<?php next_posts_link('<span class="prev">&larr;</span>'.__('Older posts', 'weblizar' ) ); ?>
						<?php endif; ?>
						<?php if ( get_previous_posts_link() ): ?>
						<?php previous_posts_link( __( 'Newer posts', 'weblizar' ). '<span class="next">&rarr;</span>' ); ?>
						<?php endif; ?>					
					
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>