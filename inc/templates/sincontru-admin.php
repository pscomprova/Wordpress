<h1>S'incontru Sidebar Options</h1>
<?php settings_errors(); ?>
<?php
  $picture = esc_attr(get_option('profile_picture'));
  $firstName = esc_attr(get_option('first_name'));
  $lastName = esc_attr(get_option('last_name'));
  $fullName = $firstName . ' ' . $lastName;
  $description = esc_attr(get_option('user_description'));
  $telephone = esc_attr(get_option('telephone_number'));
  $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
	$facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
	$instagram_icon = esc_attr( get_option( 'instagram_handler' ) );
?>

<div class='sincontru-sidebar-preview'>
  <div class='sincontru-sidebar'>
    <div class='image-container'>
      <div class='profile_picture'>
        <img class='picture' src="<?php print $picture; ?>" />
      </div>
    </div>
    <h1 class='sincontru-username'><?php print $fullName; ?></h1>
    <h2 class='sincontru-description'><?php print $description?></h2>
    <h2 class='sincontru-telephone'>Per info: <?php print $telephone?><h2>
    <div class='icons-wrapper'>
      <?php if( !empty( $twitter_icon ) ): ?>
				<span class="dashicons dashicons-twitter"></span>
			<?php endif;
			if( !empty( $facebook_icon ) ): ?>
				<span class="dashicons dashicons-facebook-alt"></span>
			<?php endif;
			if( !empty( $instagram_icon ) ): ?>
				<span class="dashicons dashicons-instagram"></span>
			<?php endif; ?>
    </div>
  </div>
</div>

<form class='sincontru-general-form' method="post" action="options.php">
  <?php settings_fields('sincontru-settings-group'); ?>
  <?php do_settings_sections('AndyPW_sincontru'); ?>
  <?php submit_button(); ?>
</form>
