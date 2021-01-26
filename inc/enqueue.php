<?php
  /*
    @package AndyPW_sincontru
    --admin enqueue functions------------------------------------------
  */

function sincontru_load_admin_scripts($hook) {
  if('toplevel_page_AndyPW_sincontru' != $hook) {
    return;
  }
    wp_register_style('sincontru_admin', get_template_directory_uri() . '/css/sincontru.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('dustismo', 'http://fonts.cdnfonts.com/css/dustismo-roman');
    wp_enqueue_style('sincontru_admin');

    wp_enqueue_media();

    wp_register_script('sincontru-admin-script' , get_template_directory_uri() . '/js/sincontru.admin.js', array('jquery'), '', true);
    wp_enqueue_script('sincontru-admin-script');
}
add_action('admin_enqueue_scripts', 'sincontru_load_admin_scripts');

/*--front-end enqueue functions----------------------------------------*/

function sincontru_load_scripts() {
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '3.4.1', 'all');
  wp_enqueue_style('sincontru', get_template_directory_uri() . '/css/sincontru.css', false, '', 'all');

  wp_enqueue_style('dustismo', 'http://fonts.cdnfonts.com/css/dustismo-roman');

  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true);
  wp_enqueue_script('jquery');

  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.4.1', true);

  wp_enqueue_script('sincontru', get_template_directory_uri() . '/js/sincontru.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'sincontru_load_scripts');

?>
