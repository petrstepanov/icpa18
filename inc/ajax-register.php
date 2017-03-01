<?php

function my_wp_new_user_notification( $password, $user_id, $deprecated = null, $notify = '' ) {
  $user = get_userdata( $user_id );
  $admin = get_userdata(1);
  $email_resources_uri = get_template_directory_uri() . "/emails/";

  // Notify admin

  $switched_locale = switch_to_locale( get_locale() );

  $title_admin = __('New user registration on ICPA-18 website');

  $message_admin = __('Somebody just registered for the ICPA-18! Account details are following.') . "<br /><br />";
  $message_admin .= sprintf( __( 'First name: %s' ), $user->first_name ) . "<br />";
  $message_admin .= sprintf( __( 'Last name: %s' ), $user->last_name ) . "<br />";
  $message_admin .= sprintf( __( 'Organization:  %s' ), $user->description ) . "<br />";
  $message_admin .= sprintf( __( 'Email: %s' ), $user->user_email ) . "<br /><br />";

  $variables_admin = array(
    title         => $title_admin,
    hidden_text   => ($user->first_name) . ($user->last_name) . "(" . $user->description . ")",
    site_url      => network_site_url(),
    resources_url => $email_resources_uri,
    first_name    => $admin->first_name,
    body_html     => $message_admin,
    contact_email => get_option( 'admin_email' )
  );

  $template_admin = file_get_contents($email_resources_uri . "template.html");
  foreach($variables_admin as $key => $value) {
    $template_admin = str_replace('{{ ' . $key . ' }}', $value, $template_admin);
  }

  add_filter('wp_mail_content_type','set_email_content_type');
  wp_mail(get_option( 'admin_email' ), $title_admin, $template_admin);
  remove_filter('wp_mail_content_type','set_email_content_type');

  if ( $switched_locale ) {
    restore_previous_locale();
  }

  // Notify user

  $switched_locale = switch_to_locale( get_user_locale( $user ) );

  $title = __('Welcome to ICPA-18');

  $message = __('Thanks for registering for the ICPA-18! Your user account credentials are following.') . "<br /><br />";
  $message .= sprintf(__('Email: %s'), $user->user_login) . "<br />";
  $message .= sprintf(__('Password: %s'), $password) . "<br /><br />";
  $message .= __('Please log in to your account ') . network_site_url("/#login") . __(' and submit your contribution information. When you are done, we will check and approve your account. Payment information will be reflected in your account upon approval.') . "<br /><br />";

  $variables = array(
    title         => $title,
    hidden_text   => __('Thanks for registering. Your user account credentials are following.'),
    site_url      => network_site_url(),
    resources_url => $email_resources_uri,
    first_name    => $user->first_name,
    body_html     => $message,
    contact_email => get_option( 'admin_email' )
  );

  $template = file_get_contents($email_resources_uri . "template.html");
  foreach($variables as $key => $value) {
    $template = str_replace('{{ ' . $key . ' }}', $value, $template);
  }

  add_filter('wp_mail_content_type','set_email_content_type');
  wp_mail($user->user_email, $title, $template);
  remove_filter('wp_mail_content_type','set_email_content_type');

  if ( $switched_locale ) {
    restore_previous_locale();
  }
}

function register_user(){

  /**
   * Process AJAX user register request.
   */

  // Check registration is allowed in Wordpress
  if ( ! get_option( 'users_can_register' ) ) {
    $responce = array('error' => true, 'message'=> __('Registration is currently closed', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Get variables
  $email = trim( $_POST['email'] );              // trim() strip whitespaces (or other characters) from the beginning and end of a string
  $first_name = sanitize_text_field( $_POST['first_name'] );  // https://developer.wordpress.org/reference/functions/sanitize_text_field/
  $last_name = sanitize_text_field( $_POST['last_name'] );
  $description = sanitize_text_field( $_POST['description'] );  // We use default Wordpress 'description' user field to store user's Organization

  // Verify the AJAX request, to prevent requests from third-party sites or systems
  // https://codex.wordpress.org/Function_Reference/check_ajax_referer
  if (!check_ajax_referer( 'ajax-register-nonce', 'register-security', false)){
    $responce = array('error' => true, 'message'=> __('Session token has expired, please reload the page and try again', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Validate fields
    if (!is_email( $email )){
    $responce = array('error' => true, 'message'=> __('Please provide valid <strong>Email</strong> address', 'understrap'));
    echo json_encode($responce);
    die();
    }

  if (empty( $first_name )){
    $responce = array('error' => true, 'message'=> __('You forgot to fill out your <strong>First name</strong>', 'understrap'));
    echo json_encode($responce);
    die();
  }

  if (empty( $last_name )){
    $responce = array('error' => true, 'message'=> __('You forgot to fill out your <strong>Last name</strong>', 'understrap'));
    echo json_encode($responce);
    die();
  }

  if (empty( $description )){
    $responce = array('error' => true, 'message'=> __('Tell us what organization or institution do you represent', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Generate the password so that the subscriber will have to check email...
  $password = wp_generate_password( 12, false );

  // Prepare array of user data
  $user_data = array(
        'user_login'            => $email,
        'user_email'            => $email,
        'user_pass'             => $password,
        'first_name'            => $first_name,
        'last_name'             => $last_name,
        'description'           => $description,
        'show_admin_bar_front'  => 'false'
    );

  // Insert new user instance into database
  $user_id = wp_insert_user( $user_data );

  // Check if Wordperss returned an error during the registration
  if (is_wp_error($user_id)){
    $responce = array('error' => true, 'message'=> $user_id->get_error_message());
    echo json_encode($responce);
    die();
  }

  // Add user status field and set it to "new".
  // User status can be "new", "modified", "approved"
  // https://codex.wordpress.org/Function_Reference/add_user_meta
  $user_meta = add_user_meta( $user_id, "status", "new", true );

  // Check if Wordperss returned an error during the registration
  if ($user_meta == false){
      $responce = array('error' => true, 'message'=> 'Something went wrong while updating user information. Please try again.');
      echo json_encode($responce);
      die();
  }

  // Add user amenities fields and set it to "have all amenities included".
  $amenitiesList = new AmenitiesList();
  $user_meta = add_user_meta( $user_id, "amenities", implode(", ", $amenitiesList->getAmenitiesNames()), true );

  // Check if Wordperss returned an error during the registration
  if ($user_meta == false){
      $responce = array('error' => true, 'message'=> 'Something went wrong while updating user information. Please try again.');
      echo json_encode($responce);
      die();
  }

  // Add user payment_type field and set it to "card".
  $user_meta = add_user_meta( $user_id, "payment_method", "card", true );

  // Check if Wordperss returned an error during the registration
  if ($user_meta == false){
      $responce = array('error' => true, 'message'=> 'Something went wrong while updating user information. Please try again.');
      echo json_encode($responce);
      die();
  }

  // Add user receipt field
  $user_meta = add_user_meta( $user_id, "receipt", "false", true );

  // Check if Wordperss returned an error during the registration
  if ($user_meta == false){
      $responce = array('error' => true, 'message'=> 'Something went wrong while updating user information. Please try again.');
      echo json_encode($responce);
      die();
  }

  // Send out custom user notification
  my_wp_new_user_notification( $password, $user_id );
  // wp_new_user_notification( $user_id );

  // Successful responce
  $responce = array('error' => false, 'message'=> __('Registration is complete! Please check your email <strong>') . $email . __('</strong> for further instructions', 'understrap'));
  echo json_encode($responce);
  die();
}

// Action API: you can specify that one or more PHP functions that are executed by Wordpress at specific points (hooks)
// https://developer.wordpress.org/reference/functions/add_action/
// add_action('hook_tag', 'function_name');

// add_action('wp_ajax_nopriv_ ... this request will be processed by /wp-admin/admin_ajax.php only for non-registered user
// add_action('wp_ajax_nopriv_[ here goes your request's 'action' field ]

// Make sure your form has hidden element with 'action' attribute set to the above Wordpress wp_ajax_nopriv_'hook_suffix'
// <input type="hidden" name="action" value="hook_suffix"/>

add_action('wp_ajax_nopriv_register_user', 'register_user');


// Enqueue login AJAX script

if ( ! function_exists( 'register_user_scripts' ) ) {
  /**
   * Load theme's JavaScript sources.
   */
  function register_user_scripts() {
    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_script( 'ajax-register-user', get_template_directory_uri() . '/src/js/register-user.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );

    // Declare javascript variable 'ajaxurl' with namespace 'namespace' to be used with the 'ajax-register-user' script
    wp_localize_script('ajax-register-user', 'registernamespace', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
  }
} // endif function_exists( 'register_user_scripts' ).

add_action( 'wp_enqueue_scripts', 'register_user_scripts' );

?>
