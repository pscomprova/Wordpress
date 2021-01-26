<?php

/*
  @package AndyPW_sincontru
  Quote post format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sincontru-format-quote'); ?> >

  <header class="entry-header text-center">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <span class="quote dashicons dashicons-format-quote"></span>
        <h1 class="quote-content"><?php the_content(); ?></h1>
        <?php the_title('<h2 class="quote-author">', '</h2>'); ?>
      </div>
    </div>
  </header>

  <footer class="entry-footer">
    <?php echo sincontru_posted_footer(); ?>
  </footer>

</article>
