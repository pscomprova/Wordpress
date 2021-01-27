<?php
  /*
    Template for the footer
    @package AndyPW_sincontru
  */
?>

<footer class="sincontru-footer text-center">
  <div class="social-icons">
    <a href="https://facebook.com/<?php echo esc_attr( get_option( 'facebook_handler' ) ); ?>"
      target="_blank"><span class="dashicons dashicons-facebook-alt"></span></a>
    <a href="https://instagram.com/<?php echo esc_attr( get_option( 'instagram_handler' ) ); ?>"
      target="_blank"><span class="dashicons dashicons-instagram"></span></a>
  </div>
  <div class="sincontru-footer-info">
    <p><span class="dashicons dashicons-phone"></span> 070 284835</p>
    <p><span class="dashicons dashicons-location"></span> Viale Trieste, 74, 09123 Cagliari (CA)</p>
    <p>Made with <span class="dashicons dashicons-heart"></span> for S'incontru<p>
  </div>
</footer>
  <?php wp_footer(); ?>
  </body>
</html>
