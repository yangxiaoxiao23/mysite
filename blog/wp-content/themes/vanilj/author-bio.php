<div class="entry-author">
	<div class="entry-author-avatar">
		<?php
			echo get_avatar( get_the_author_meta( 'user_email' ), 75 );
		?>
	</div><div class="entry-author-description">
		<h2 class="entry-author-title"><?php printf( __( 'About %s', 'vanilj' ), get_the_author() ); ?></h2>
		<p class="entry-author-bio">
			<?php the_author_meta( 'description' ); ?>
			<span class="entry-author-link"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s', 'vanilj' ), get_the_author() ); ?>
			</a></span>
		</p>
	</div>
</div>