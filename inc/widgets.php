<?php
/*
  @package AndyPW_sincontru
  widgets
*/

class Sincontru_Profile_Widget extends WP_Widget {

  //setup widget name, description,...
  public function __construct() {
    $widget_ops = array(
      'classname' => 'sincontru-profile-widget',
      'description' => "Custom S'incontru Profile Widget",
    );
    parent::__construct('sincontru_profile', "S'incontru Profile", $widget_ops);
  }

  //back end display widget
  public function form($instance) {
    echo '<p><strong>Nessuna opzione per questo widget!</strong></br>
      Puoi controllarne le specifiche in <a href="./admin.php?page=AndyPW_sincontru">questa pagina</a></p>';
  }

  //front end display widget
  public function widget($args, $instance) {

    $picture = esc_attr(get_option('profile_picture'));
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    $fullName = $firstName . ' ' . $lastName;
    $description = esc_attr(get_option('user_description'));
    $telephone = esc_attr(get_option('telephone_number'));
    $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
  	$facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
  	$instagram_icon = esc_attr( get_option( 'instagram_handler' ) );

    echo $args['before_widget'];
    ?>
    <div class="text-center">
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
  				<a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank">
            <span class="dashicons dashicons-twitter"></span></a>
  			<?php endif;
  			if( !empty( $facebook_icon ) ): ?>
  				<a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank">
            <span class="dashicons dashicons-facebook-alt"></span></a>
  			<?php endif;
  			if( !empty( $instagram_icon ) ): ?>
  				<a href="https://instagram.com/<?php echo $instagram_icon; ?>" target="_blank">
            <span class="dashicons dashicons-instagram"></span></a>
  			<?php endif; ?>
      </div>
    </div>

    <?php
    echo $args['after_widget'];
  }

}
add_action('widgets_init', function() {
  register_widget('Sincontru_Profile_Widget');
});

/*--edit default wordpress widgets--*/

function sincontru_tag_cloud_font_change($args) {
  $args['smallest'] = 10;
  $args['largest'] = 10;

  return $args;
}
add_filter('widget_tag_cloud_args', 'sincontru_tag_cloud_font_change');
