<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!-- Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/framework/js/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <div class="wrap">

      <div class="blog-header">
        <?php if ( get_theme_mod( 'coeur_logo' ) ) : ?>
        <div class='site-logo'>
          <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'coeur_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
        </div>
      <?php else : ?>
      <h1 class="blog-title"><a href="<?php echo esc_url( home_url() ) ?>"><?php bloginfo('name'); ?></a></h1>
    <?php endif; ?>
    <p class="lead blog-description"><?php echo get_bloginfo( 'description', 'raw' ); ?> </p>
  </div>


  <nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <?php if(is_single() && get_option('single_menu_header') != 'yes' ): ?>
      <div id="bs-example-navbar-collapse-2" class="collapse navbar-collapse">
        <ul id="menu-menu-1" class="nav navbar-nav">
         <li class="menu-item menu-item-type-post_type menu-item-object-page">
          <a href="<?php echo get_site_url(); ?>"><i class="fa fa-home"></i></a>
        </li>
        <?php coeur_previousPost(); ?>
        <?php coeur_nextPost(); ?>
      </ul>
      <ul id="menu-menu-1" class="nav navbar-nav pull-right">
        <?php coeur_commentCount(); ?>
        <?php coeur_authorLink(); ?>
      </ul>
    </div>
  <?php else: ?>
  <ul id="menu-menu-1" class="nav navbar-nav">
    <li class="home-link menu-item menu-item-type-post_type menu-item-object-page">
      <a id="search_toggle" href="#"><i class="fa fa-search"></i></a>
    </li>
    <div class="search-box">
      <?php get_search_form(); ?>
    </div>
  </ul>
  <?php
  wp_nav_menu( array(
    'theme_location'    => 'primary',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'collapse navbar-collapse',
    'container_id'      => 'bs-example-navbar-collapse-1',
    'menu_class'        => 'nav navbar-nav',
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'            => new wp_bootstrap_navwalker())
  );
  ?>
<?php endif; ?>
</div>
</nav>
<nav class="navbar navbar-default mobile-menu" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="mobile-search">
      <?php get_search_form(); ?>
    </div>
    <div class="mobile-toggle navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only"><?php echo __('Toggle navigation', 'coeur'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
  <?php
  wp_nav_menu( array(
    'theme_location'    => 'mobile',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'collapse navbar-collapse',
    'container_id'      => 'bs-example-navbar-collapse-2',
    'menu_class'        => 'nav navbar-nav',
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'            => new wp_bootstrap_navwalker())
  );
  ?>
</div>
</nav>