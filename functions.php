<?php
  require get_template_directory() . '/inc/cleanup.php';
  require get_template_directory() . '/inc/function-admin.php';
  require get_template_directory() . '/inc/enqueue.php';
  require get_template_directory() . '/inc/theme-support.php';
  require get_template_directory() . '/inc/ajax.php';
  require get_template_directory() . '/inc/widgets.php';
  require get_template_directory() . '/inc/shortcodes.php';

  /*--support dashicons-------------------------------------------------*/
  add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'dashicons' );
} );
?>
