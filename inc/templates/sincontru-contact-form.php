<h1>S'incontru Contact Form</h1>
<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate the Contact Form</p>
<code>[contact_form]</code>

<form class='sincontru-general-form' method="post" action="options.php">
  <?php settings_fields('sincontru-contact-options'); ?>
  <?php do_settings_sections('AndyPW_sincontru_theme_contact'); ?>
  <?php submit_button(); ?>
</form>
