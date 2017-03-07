<?php

function my_wp_forgot_pass_notification( $password, $user_id ) {
  $user = get_userdata( $user_id );
  $email_resources_uri = get_template_directory_uri() . "/emails/";

  // Notify user
  $switched_locale = switch_to_locale( get_user_locale( $user ) );

  $title = __('Your new ICPA-18 password');

  $message = __('Your new password for acessing the ICPA-18 user account is following.') . "<br /><br />";
  $message .= sprintf(__('Password: %s'), $password) . "<br /><br />";
  $message .= __('You can log in to your account ') . network_site_url("/#login") . __(' now.') . "<br /><br />";

  $variables = array(
    title         => $title,
    hidden_text   => __(''),
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

  $mail_ok = wp_mail($user->user_email, $title, $template);

  if (!$mail_ok) {
    $responce = array('error' => true, 'message'=> __('There was a problem sending an email to <strong>' . $user->user_email . '</strong>. Please try again.', 'understrap'));
    echo json_encode($responce);
    die();
  }

  remove_filter('wp_mail_content_type','set_email_content_type');

  if ( $switched_locale ) {
    restore_previous_locale();
  }
}

function forgot_password_user(){

  /**
   * Process AJAX user login request.
   */

  // Get variables
  $user_login = trim( $_POST['user_login'] );

  // Verify the AJAX request, to prevent requests from third-party sites or systems
  // https://codex.wordpress.org/Function_Reference/check_ajax_referer
  if (!check_ajax_referer( 'ajax-forgot-password-nonce', 'forgot-password-security', false)){
    $responce = array('error' => true, 'message'=> __('Session token has expired, please reload the page and try again', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Validate email field
  if (!is_email( $user_login )){
    $responce = array('error' => true, 'message'=> __('Please provide valid <strong>Email</strong> address', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Get user by email
  $user = get_user_by( 'email', $user_login );  // we have both user's 'email' and 'login' fields set to his email

  if ( empty( $user ) || $user == false ) {
    $responce = array('error' => true, 'message'=> __('User with email <strong>' . $user_login . '</strong> does not exist', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Generate the password so that the subscriber will have to check email...
  $password = wp_generate_password( 12, false );

  error_log( "1: " . $password . " " . $user->ID);

  // Set new passowrd
  wp_set_password( $password, $user->ID );

  // Email new password to user
  my_wp_forgot_pass_notification( $password, $user->ID );

  // Successful responce
  $responce = array('error' => false, 'message'=> sprintf(__('New password sent! Please check your email <strong>%s</strong>', 'understrap'), $user_login));
  echo json_encode($responce);
  die();
}

add_action('wp_ajax_nopriv_forgot_password_user', 'forgot_password_user');

// Enqueue login AJAX script
if ( ! function_exists( 'forgot_password_user_scripts' ) ) {
  function forgot_password_user_scripts() {
    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_script( 'ajax-forgot-password-user', get_template_directory_uri() . '/src/js/landing-forgot-password.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
    // Declare javascript variable 'ajaxurl' with namespace 'loginnamespace' to be used with the 'ajax-forgot-password-user' script
    wp_localize_script('ajax-forgot-password-user', 'forgotpassnamespace', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'redirecturl' => home_url('/account')));
  }
} // endif function_exists( 'forgot_password_user_scripts' ).

add_action( 'wp_enqueue_scripts', 'forgot_password_user_scripts' );

?>
