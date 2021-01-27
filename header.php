<?php
  /*
    Template for the header
    @package AndyPW_sincontru
  */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?> ">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> >

    <div class="sincontru-sidebar">
      <div class="sincontru-sidebar-container">
        <a class="js-toggleSidebar sidebar-close">
          <span class="dashicons dashicons-no-alt"></span>
        </a>
        <div class="sidebar-scroll">
          <?php get_sidebar(); ?>
        </div><!--sidebar-scroll-->
      </div><!--sidebar-container-->
    </div><!--sidebar-->

    <div class="container-fluid">
      <div class="row">
          <div class="header-container text-center" style="background-image: url(<?php header_image(); ?>);">
            <a class="js-toggleSidebar sidebar-open">
              <span class="dashicons dashicons-menu-alt3"></span>
            </a>
            <div class="header-content">
              <div class="table-cell">
                <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                <h2 class="site-description"><?php bloginfo('description'); ?></h2>
              </div><!--table-cell-->
            </div><!--.header-content-->
            <div class="nav-container">
              <nav class="navbar navbar-default navbar-sincontru">
                <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'nav navbar-nav',
                ) ); ?>
              </nav>
            </div><!--.nav-container-->
          </div><!--.header-container-->
      </div><!--.row-->
    </div><!--.container-fluid-->
