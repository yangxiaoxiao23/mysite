<?php 
/**
* Single Pots
* @package Coeur
* @author Titouanc
* @since 1.0
*/

get_header(); ?>

<?php $coeur_opt = get_option('page_sidebar'); ?>
<?php if($coeur_opt == 'yes'): ?>
	<?php $coeur_show = true; ?>
	<?php $coeur_size = 9; ?>
<?php else: ?>
	<?php $coeur_show = false; ?>
	<?php $coeur_size = 12; ?>
<?php endif; ?>

<div class="container">

	<div class="row">

		<div class="col-sm-<?php echo $coeur_size; ?> blog-main">
			
			<?php while ( have_posts() ) : the_post();	?>

			<?php get_template_part('templates/content', 'page'); ?>
			
			<?php if ( comments_open() || get_comments_number() ) { ?>
			<div id="com_container" class="comment-container">
				<?php comments_template('/framework/comments.php'); ?>
			</div>
			<?php } ?>

		<?php endwhile; ?>

	</div> <!-- blog-main -->

	<?php if($coeur_show == true){ ?>
	<div class="col-sm-3 blog-sidebar">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div><!-- /.blog-sidebar -->
	<?php } ?>
</div> <!-- row -->
</div> <!-- container -->

<?php get_footer(); ?>