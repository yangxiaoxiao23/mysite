<?php global $Flavour_Vanilj;
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="entry-comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title"><?php printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'vanilj'), number_format_i18n( get_comments_number() ), get_the_title() );?></h2>
		<ul>
		<?php
			wp_list_comments( array(
				'avatar_size'=> 60,
				'short_ping' => true,
				'callback' => array($Flavour_Vanilj,'__getComments'),
				'type' => 'pings'
			) );
		?></ul><ul><?php
			wp_list_comments( array(
				'avatar_size'=> 60,
				'short_ping' => true,
				'callback' => array($Flavour_Vanilj,'__getComments'),
				'type' => 'comment'
			) );
		?></ul>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'vanilj' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'vanilj' ) ); ?></div>
	</nav>
	<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'vanilj' ); ?></p>
	<?php endif; ?>

	<?php comment_form(array(
		'comment_notes_after' => '',
		'title_reply' => __('Leave a Reply', 'vanilj'),
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' , 'vanilj'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'vanilj' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'label_submit' => __( 'Post Comment', 'vanilj' )
		)); ?>
</div>