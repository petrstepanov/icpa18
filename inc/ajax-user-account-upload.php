<?php

function user_account_upload(){

  /**
   * Process AJAX payment form request.
   */

  // Get variables
  // $amenities = $_POST['file'];       // trim() strip whitespaces (or other characters) from the beginning and end of a string

  // Check if user is logged in
  if ( !is_user_logged_in() ){
    $responce = array('error' => true, 'message'=> __('Please log in to your account first', 'understrap'));
  echo json_encode($responce);
  die();
  }

  // Verify the AJAX request, to prevent requests from third-party sites or systems
  // https://codex.wordpress.org/Function_Reference/check_ajax_referer
  if (!check_ajax_referer( 'ajax-upload-nonce', 'upload-security', false)){
    $responce = array('error' => true, 'message'=> __('Session token has expired, please reload the page and try again', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Check files are not empty
  if(empty($_FILES)) {
    $responce = array('error' => true, 'message'=> __('No files sent. Please specify a file to upload', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Check file size less than 5MB
  if($_FILES['file']['size'] > 5 * 1024 * 1024) {
    $responce = array('error' => true, 'message'=> __('File size is larger than 5MB. Please specify use a different file', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Upload file to user's folder .../uploads/user@login.com
  $userStorage = new UserStorage();
  $status = $userStorage->saveFile($_FILES['file']);
  if (is_wp_error($status)) {
		$responce = array('error' => true, 'message'=> $status->get_error_message());
		echo json_encode($responce);
		die();
	}

  // If success upload - update 'receipt' field
  $current_user = wp_get_current_user();
  update_user_meta( $current_user->ID, 'receipt', 'true' );

  $responce = array('error' => false, 'message'=> __('File successfully uploaded. Thanks for your payment. You\'re all set!', 'understrap'));
  echo json_encode($responce);
  die();
}

add_action('wp_ajax_user_account_upload', 'user_account_upload');


// Enqueue AJAX script

if ( ! function_exists( 'user_account_upload_scripts' ) ) {
  /**
   * Load theme's JavaScript sources.
   */
  function user_account_upload_scripts() {
    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_script( 'ajax-user-account-upload', get_template_directory_uri() . '/src/js/user-account-upload.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );

    // Declare javascript variable 'ajaxurl' with namespace 'namespace' to be used with the 'ajax-register-user' script
    wp_localize_script('ajax-user-account-upload', 'uploadNamespace', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
  }
} // endif function_exists( 'register_user_scripts' ).

add_action( 'wp_enqueue_scripts', 'user_account_upload_scripts' );

?>
