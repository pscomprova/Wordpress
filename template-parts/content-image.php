<?php

/*
  @package AndyPW_sincontru
  image post format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sincontru-format-image'); ?> >

  <?php $featured_image = sincontru_get_attachment(); ?>

  <header class="entry-header text-center" style="background-image: url(<?php echo $featured_image; ?>);
    background-position: center center; background-size: cover; background-repeat: no-repeat;">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <div class="entry-meta">
      <?php echo sincontru_posted_meta(); ?>
    </div>
    <div class="entry-excerpt">
      <?php the_excerpt(); ?>
    </div>
  </header>

  <footer class="entry-footer">
    <?php echo sincontru_posted_footer(); ?>
  </footer>

</article>
