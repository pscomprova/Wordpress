<?php

/*
  @package AndyPW_sincontru
  standard post format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

  <header class="entry-header text-center">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <div class="entry-meta">
      <?php echo sincontru_posted_meta(); ?>
    </div>
  </header>

  <div class="entry-content">
    <?php if (sincontru_get_attachment() ) :?>
      <div class="standard-featured" style="background-image: url(<?php echo sincontru_get_attachment(); ?>); "></div>
    <?php endif; ?>
    <div class="entry-excerpt">
      <?php the_excerpt(); ?>
    </div>
    <div class="button-container text-center">
      <a href="<?php the_permalink(); ?>" class="btn btn-sincontru"><?php _e('Read More'); ?></a>
    </div>
  </div>

  <footer class="entry-footer">
    <?php echo sincontru_posted_footer(); ?>
  </footer>

</article>
