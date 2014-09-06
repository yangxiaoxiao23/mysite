<?php get_header(); ?>

<?php $coeur_opt = get_option('front_sidebar'); ?>

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

      <div class="posts">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content', get_post_format()); ?>

      <?php endwhile; else: ?>
      <article class="post">
        <div class="notfound">
          <h1><?php echo __('404', 'coeur'); ?></h1>
          <p><?php echo __('Nothing\'s here.', 'coeur'); ?></p>
          <?php get_search_form(); ?>
        </div>
      </article>
    <?php endif; ?>
  </div>

  <?php coeur_paging(); ?>

</div><!-- /.blog-main -->

<?php if($coeur_show == true){ ?>
<div class="col-sm-3 blog-sidebar">
  <?php dynamic_sidebar('sidebar-1'); ?>
</div><!-- /.blog-sidebar -->
<?php } ?>

</div><!-- /.row -->

</div><!-- /.container -->

<?php get_footer(); ?>