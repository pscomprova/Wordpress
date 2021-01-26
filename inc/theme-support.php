<?php

  /*--theme support options--------------------------------------------------*/

  $options = get_option('post_formats');
  $formats = array ('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
  $output = array();
  foreach($formats as $format) {
    $output[] = (@$options[$format] == 1 ? $format : '');
  }
  if (!empty($options)) {
    add_theme_support('post-formats', $output);
  }

  $header = get_option('custom_header');
  if (@$header == 1) {
    add_theme_support('custom-header');
  }

  $background = get_option('custom_background');
  if (@$background == 1) {
    add_theme_support('custom-background');
  }

  add_theme_support('post-thumbnails');

  /*--attivazione menu nav--------------------------------------------------*/

  function sincontru_register_nav_menu(){
    register_nav_menu('primary', 'Header Navigation Menu');
  }
  add_action('after_setup_theme', 'sincontru_register_nav_menu');

  /*--sidebar functions---------------------------------------------------------------*/

  function sincontru_sidebar_init(){
    register_sidebar(
      array(
        'name' => esc_html__('Sincontru Sidebar', 'sincontrutheme'),
        'id' => 'sincontru-sidebar',
        'description' => 'Dynamic Right Sidebar',
        'before_widget' => '<section id="%1$s" class="sincontru-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="sincontru-widget-title">',
        'after_title' => '</h2>'
      )
    );
  }
  add_action('widgets_init', 'sincontru_sidebar_init');

  /*--blog loop----------------------------------------------------------*/

  function sincontru_posted_meta() {
    $posted_on = human_time_diff (get_the_time('U'), current_time('timestamp') );

    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    $i = 1;

    if (!empty($categories) ) :
      foreach ($categories as $category) :
        if ($i > 1) : $output .= $separator; endif;
        $output .= '<a href="'.esc_url(get_category_link($category->term_id) ).'" alt="'.esc_attr('View all posts in%s', $category->name).'">
                      '.esc_html($category->name).'
                    </a>';
        $i++;
      endforeach;
    endif;

    return '<span class="posted-on">Posted '.$posted_on.' ago</span> | <span class="posted-in">'.$output.'</span>';
  }

  function sincontru_posted_footer() {
    return '<div class="post-footer-container"><div class="row">
      <div class="col-xs-12 col-sm-6">'.get_the_tag_list('<div class="tags-list"><span class="dashicons dashicons-tag">
      </span>', ' ', '</div>').'</div></div></div>';
  }

  function sincontru_get_attachment ($num = 1) {
    $output = '';
      if (has_post_thumbnail() && $num == 1):
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID() ) );
      else:
        $attachments = get_posts(array(
          'post_type' => 'attachment',
          'posts_per_page' => $num,
          'post_parent' => get_the_ID()
        ) );
        if ($attachments && $num == 1) :
          foreach ($attachments as $attachment) :
            $output = wp_get_attachment_url($attachment -> ID);
          endforeach;
        elseif ($attachments && $num > 1):
          $output = $attachments;
        endif;
        wp_reset_postdata();
      endif;

    return $output;
  }

  /*--single post custom functions------------------------------------*/

  function sincontru_post_navigation() {
    $nav = '<div class="row">';

    $prev = get_previous_post_link('<div class="post-link-nav">
      <span class="dashicons nav-icon dashicons-arrow-left-alt2"></span>%link</div>', '%title');
    $nav .= '<div class="col-xs-12 col-sm-6 text-left">'.$prev.'</div>';

    $next = get_next_post_link('<div class="post-link-nav">%link<span class="dashicons nav-icon dashicons-arrow-right-alt2">
      </span></div>', '%title');
    $nav .= '<div class="col-xs-12 col-sm-6 text-right">'.$next.'</div>';

    $nav .= '</div>';
    return $nav;
  }
?>
