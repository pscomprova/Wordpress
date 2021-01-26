<?php

/*
  @package AndyPW_sincontru
  aside (digressione) post format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sincontru-format-aside'); ?> >

  <div class="aside-container">
    <div class="row">
      <div class="col-xs-12 col-md-2 col-sm-3 text-center">
        <?php if (sincontru_get_attachment() ) :?>
          <div class="aside-featured" style="background-image: url(<?php echo sincontru_get_attachment(); ?>); "></div>
        <?php endif; ?>
      </div><!--colonna img------------>

      <div class="col-xs-12 col-md-10 col-sm-9">
        <header class="entry-header">
          <div class="entry-meta">
            <?php echo sincontru_posted_meta(); ?>
          </div>
        </header>

        <div class="entry-content">
          <div class="aside-excerpt entry-excerpt">
            <?php the_content(); ?>
          </div>
        </div>
      </div><!--col--------->
    </div><!--row--------------->

    <footer class="aside-footer entry-footer">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
          <?php echo sincontru_posted_footer(); ?>
        </div><!--col--------->
      </div><!--row--------------->
    </footer>
  </div>

</article>
