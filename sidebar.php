<?php
  /*
    @package AndyPW_sincontru
  */

  if (!is_active_sidebar('sincontru-sidebar') ){
    return;
  }

?>

<aside id="secondary" class="widget-area" role="complementary">
  
  <?php dynamic_sidebar('sincontru-sidebar'); ?>
</aside>
