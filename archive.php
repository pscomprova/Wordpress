<?php

/*
  @package AndyPW_sincontru
*/

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div id="sincontru-posts-container" class="container">

        <header class="archive-header text-center">
          <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
        </header>

        <?php
          if (have_posts() ):
          while (have_posts() ): the_post();
            get_template_part('template-parts/content', get_post_format() );
          endwhile;
        endif;
        ?>

      </div><!--.container----------------->

      <div class="container text-center">
        <a id="sincontru-load-more" class="btn btn-default bt-lg btn-block" data-page="1"
          data-url="<?php echo admin_url('admin-ajax.php'); ?>">
          <span class="dashicons dashicons-update"></span>
          <span class="text">Load more...</span>
        </a>
      </div>
    </main>
  </div>

<?php get_footer(); ?>
