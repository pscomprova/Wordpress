<?php

  /*
    @package AndyPW_sincontru

    --admin page----------------------------------------------------------
  */

  function sincontru_add_admin_page() {
    //generate s'incontru admin page
    add_menu_page("S'incontru Theme Options", "S'incontru", "manage_options",
      "AndyPW_sincontru", "sincontru_theme_create_page", "dashicons-admin-customizer", 110);

    //generate s'incontru sub pages
    add_submenu_page("AndyPW_sincontru", "S'incontru Sidebar Options", "Sidebar",
      "manage_options", "AndyPW_sincontru", "sincontru_theme_create_page");
    add_submenu_page("AndyPW_sincontru", "S'incontru Theme Options", "Theme Options",
      "manage_options", "AndyPW_sincontru_theme", "sincontru_theme_support_page");
    add_submenu_page("AndyPW_sincontru", "S'incontru Contact Form", "Contact Form",
      "manage_options", "AndyPW_sincontru_theme_contact", "sincontru_contact_form_page");

    //activate custom settings
    add_action('admin_init', 'sincontru_custom_settings');
  }
  add_action('admin_menu', 'sincontru_add_admin_page');

  function sincontru_custom_settings() {
    //sidebar options
    register_setting("sincontru-settings-group", "profile_picture");
    register_setting("sincontru-settings-group", "first_name");
    register_setting("sincontru-settings-group", "last_name");
    register_setting("sincontru-settings-group", "user_description");
    register_setting("sincontru-settings-group", "telephone_number");
    register_setting("sincontru-settings-group", "twitter_handler", 'sincontru_sanitize_twitter_handler');
    register_setting("sincontru-settings-group", "facebook_handler");
    register_setting("sincontru-settings-group", "instagram_handler");

    add_settings_section('sincontru-sidebar-options', 'Sidebar Option', 'sincontru_sidebar_options', 'AndyPW_sincontru');

    add_settings_field('sidebar-profile-picture', 'Profile Picture', 'sincontru_sidebar_profile',
      'AndyPW_sincontru', 'sincontru-sidebar-options');
    add_settings_field('sidebar-name', 'Full Name', 'sincontru_sidebar_name',
      'AndyPW_sincontru', 'sincontru-sidebar-options');
    add_settings_field('sidebar-description', 'Description', 'sincontru_sidebar_description',
      'AndyPW_sincontru', 'sincontru-sidebar-options');
    add_settings_field('sidebar-telephone', 'Telephone', 'sincontru_sidebar_telephone',
      'AndyPW_sincontru', 'sincontru-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter', 'sincontru_sidebar_twitter',
      'AndyPW_sincontru', 'sincontru-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook', 'sincontru_sidebar_facebook',
      'AndyPW_sincontru', 'sincontru-sidebar-options');
    add_settings_field('sidebar-instagram', 'Instagram', 'sincontru_sidebar_instagram',
      'AndyPW_sincontru', 'sincontru-sidebar-options');

    //theme support Options
    register_setting("sincontru-theme-support", "post_formats");
    register_setting("sincontru-theme-support", "custom_header");
    register_setting("sincontru-theme-support", "custom_background");

    add_settings_section("sincontru-theme-options", "Theme Options",
      "sincontru_theme_options", "AndyPW_sincontru_theme");

    add_settings_field("post-formats", "Post Formats", "sincontru_post_formats",
      "AndyPW_sincontru_theme", "sincontru-theme-options");
    add_settings_field("custom-header", "Custom Header", "sincontru_custom_header",
      "AndyPW_sincontru_theme", "sincontru-theme-options");
    add_settings_field("custom-background", "Custom Background", "sincontru_custom_background",
      "AndyPW_sincontru_theme", "sincontru-theme-options");

    //contact form options
    register_setting("sincontru-contact-options", "activate_contact");

    add_settings_section("sincontru-contact-section", "Contact Form", "sincontru_contact_section",
      "AndyPW_sincontru_theme_contact");

    add_settings_field("activate-form", "Activate Contact Form", "sincontru_activate_contact",
      "AndyPW_sincontru_theme_contact", "sincontru-contact-section");

  }

  function sincontru_theme_options() {
    echo 'Activate and Deactivate specific theme support options';
  }

  function sincontru_contact_section() {
    echo 'Activate and Deactivate the Built-in Contact Form';
  }

  function sincontru_activate_contact() {
    $options = get_option('activate_contact');
    $checked = (@$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
  }

  function sincontru_post_formats() {
    $options = get_option('post_formats');
    $formats = array ('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
    $output = '';
    foreach($formats as $format) {
      $checked = (@$options[$format] == 1 ? 'checked' : '');
      $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' />'.$format.'</label><br>';
    }
    echo $output;
  }

  function sincontru_custom_header() {
    $options = get_option('custom_header');
    $checked = (@$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' />Activate the Custom Header</label>';
  }

  function sincontru_custom_background() {
    $options = get_option('custom_background');
    $checked = (@$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' />Activate the Custom Background</label>';
  }

  //sidebar options function
  function sincontru_sidebar_options() {
    echo 'Customize your sidebar information';
  }

  function sincontru_sidebar_profile() {
    $picture = esc_attr (get_option('profile_picture'));
    echo '<input type="button" class="button button-secondary" value="Upload profile picture" id="upload-button" />
          <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';
  }

  function sincontru_sidebar_name() {
    $firstName = esc_attr (get_option('first_name'));
    $lastName = esc_attr (get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />
          <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
  }

  function sincontru_sidebar_description() {
    $description = esc_attr (get_option('user_description'));
    echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" />';
  }

  function sincontru_sidebar_telephone() {
    $description = esc_attr (get_option('telephone_number'));
    echo '<input type="text" name="telephone_number" value="'.$telephone.'" placeholder="Numero di telefono" />';
  }

  function sincontru_sidebar_twitter() {
    $twitter = esc_attr (get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter" />
          <p class="description">Inserisci il tuo username Twitter senza il carattere @</p>';
  }

  function sincontru_sidebar_facebook() {
    $facebook = esc_attr (get_option('facebook_handler'));
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook" />';
  }

  function sincontru_sidebar_instagram() {
    $instagram = esc_attr (get_option('instagram_handler'));
    echo '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram" />';
  }

  //sanitization settings
  function sincontru_sanitize_twitter_handler($input) {
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
  }

  //template submenu functions

  function sincontru_theme_create_page() {
    require_once(get_template_directory() . '/inc/templates/sincontru-admin.php');
  }

  function sincontru_theme_support_page() {
    require_once(get_template_directory() . '/inc/templates/sincontru-theme-support.php');
  }

  function sincontru_contact_form_page() {
    require_once(get_template_directory() . '/inc/templates/sincontru-contact-form.php');
  }

?>
