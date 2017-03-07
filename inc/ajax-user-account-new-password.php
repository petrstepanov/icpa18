<?php

function my_wp_new_pass_notification( $password, $user_id ) {
  $user = get_userdata( $user_id );
  $email_resources_uri = get_template_directory_uri() . "/emails/";

  // Notify user
  $switched_locale = switch_to_locale( get_user_locale( $user ) );

  $title = __('Your new ICPA-18 password');

  $message = __('Your new password for acessing the ICPA-18 user account is following.') . "<br /><br />";
  $message .= sprintf(__('Password: %s'), $password) . "<br /><br />";

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

function new_password_user(){

  // Get variables
  $old_password = trim( $_POST['old-password'] );
  $password = trim( $_POST['password'] );
  $password2 = trim( $_POST['password2'] );

  // Check if user is logged in
  if ( !is_user_logged_in() ){
    $responce = array('error' => true, 'message'=> __('Please log in to your account first', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Verify the AJAX request, to prevent requests from third-party sites or systems
  // https://codex.wordpress.org/Function_Reference/check_ajax_referer
  if (!check_ajax_referer( 'ajax-new-password-nonce', 'new-password-security', false)){
    $responce = array('error' => true, 'message'=> __('Session token has expired, please reload the page and try again', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Validate password fields
  if (is_empty( $old_password ) || is_empty( $password ) || is_empty( $password2 )){
    $responce = array('error' => true, 'message'=> __('Password cannot be empty', 'understrap'));
    echo json_encode($responce);
    die();
  }

  if (strlen($password) < 8){
    $responce = array('error' => true, 'message'=> __('Password should be at least 8 characters long', 'understrap'));
    echo json_encode($responce);
    die();
  }

  if (strcmp($password, $password2) != 0){
    $responce = array('error' => true, 'message'=> __('Passwords do not match', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Get current user
  $user = wp_get_current_user();
  if ($user->id == 0){
    $responce = array('error' => true, 'message'=> __('Please log in to your account first', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Set new passowrd
  wp_set_password( $password, $user->ID );

  // Email new password to user
  my_wp_new_pass_notification( $password, $user->ID );

  // Successful responce
  $responce = array('error' => false, 'message'=> __('Password successfully updated', 'understrap'));
  echo json_encode($responce);
  die();
}

add_action('wp_ajax_nopriv_new_password_user', 'new_password_user');

// Enqueue login AJAX script
if ( ! function_exists( 'new_password_user_scripts' ) ) {
  function new_password_user_scripts() {
    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_script( 'ajax-new-password-user', get_template_directory_uri() . '/src/js/user-account-new-password.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
    // Declare javascript variable 'ajaxurl' with namespace 'loginnamespace' to be used with the 'ajax-new-password-user' script
    wp_localize_script('ajax-new-password-user', 'newpassnamespace', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'redirecturl' => home_url('/account')));
  }
} // endif function_exists( 'new_password_user_scripts' ).

add_action( 'wp_enqueue_scripts', 'new_password_user_scripts' );

?>
