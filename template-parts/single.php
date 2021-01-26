<?php

/*
  @package AndyPW_sincontru
  single post template
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

  <header class="entry-header text-center">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <div class="entry-meta">
      <?php echo sincontru_posted_meta(); ?>
    </div>
  </header>

  <div class="single-post entry-content">
    <div class="entry-excerpt">
      <?php the_content(); ?>
    </div>
  </div>

  <footer class="entry-footer">
    <?php echo sincontru_posted_footer(); ?>
  </footer>

</article>
