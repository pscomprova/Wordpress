<?php

/*
  @package AndyPW_sincontru
  page template
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

  <header class="entry-header text-center">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
  </header>

  <div class="single-post entry-content">
    <div class="entry-excerpt">
      <?php the_content(); ?>
    </div>
  </div>

</article>
