<?php

/*
  @package AndyPW_sincontru
*/

//Contact Form shortcode

function sincontru_contact_form ($atts, $content) {
  //[contact_form]

$atts = shortcode_atts (
  array(),
  $atts,
  'contact_form'
);

  ob_start();
  include 'templates/contact-form.php';
  return ob_get_clean();

}
add_shortcode('contact_form', 'sincontru_contact_form');
