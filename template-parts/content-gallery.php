<?php

/*
  @package AndyPW_sincontru
  gallery post format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

  <header class="entry-header text-center">
    <?php if (sincontru_get_attachment() ):
      $attachments = sincontru_get_attachment(7);
    ?>
    <div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <?php
					$i = 0;
					foreach ( $attachments as $attachment ):
					$active = ( $i == 0 ? 'active' : '' );
				?>
          <div class="item <?php echo $active; ?>"
                style="background-image: url( <?php echo wp_get_attachment_url( $attachment->ID ); ?> );">
          </div>
        <?php $i++; endforeach; ?>
      </div><!--.carousel-inner ----------->
      <a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <?php endif; ?>
    </div><!--.carousel -------------->

    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <div class="entry-meta">
      <?php echo sincontru_posted_meta(); ?>
    </div>
  </header>

  <div class="entry-content">
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
