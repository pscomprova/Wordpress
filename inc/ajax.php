<?php
  /*
    @package AndyPW_sincontru
    ajax functions
  */

  add_action('wp_ajax_nopriv_sincontru_load_more', 'sincontru_load_more');
  add_action('wp_ajax_sincontru_load_more', 'sincontru_load_more');

  add_action('wp_ajax_nopriv_sincontru_save_user_contact_form', 'sincontru_save_contact');
  add_action('wp_ajax_sincontru_save_user_contact_form', 'sincontru_save_contact');

  function sincontru_load_more() {
    $paged = $_POST["page"]+1;
    $archive = $_POST["archive"];

    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'paged' => $paged,
      'public' => true,
    );

    if ($archive != '0'){
      $archVal = explode('/', $archive);
      $type = ($archVal[1] == "category" ? "category_name" : $archVal[1]);
      $args[$type] = $archVal[2];
    }

    $query = new WP_Query($args);

    if ($query->have_posts() ):
      while ($query->have_posts() ): $query->the_post();
        get_template_part('template-parts/content', get_post_format() );
      endwhile;
      else :
        echo '<div class="text-center"><h3>Take it easy!</h3><p>Non ci sono al
          momento altri articoli da caricare</p></div>';
    endif;

    wp_reset_postdata();

    die();
  }
