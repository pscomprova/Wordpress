<h1>S'incontru Theme Support</h1>
<?php settings_errors(); ?>

<form class='sincontru-general-form' method="post" action="options.php">
  <?php settings_fields('sincontru-theme-support'); ?>
  <?php do_settings_sections('AndyPW_sincontru_theme'); ?>
  <?php submit_button(); ?>
</form>
