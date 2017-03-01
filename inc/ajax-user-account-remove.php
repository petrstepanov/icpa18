<?php

function user_account_remove(){

  /**
   * Process AJAX payment form request.
   */

  // Get variables
  $filename = $_POST['filename'];       // trim() strip whitespaces (or other characters) from the beginning and end of a string

  // Check if user is logged in
  if ( !is_user_logged_in() ){
    $responce = array('error' => true, 'message'=> __('Please log in to your account first', 'understrap'));
  echo json_encode($responce);
  die();
  }

  // Verify the AJAX request, to prevent requests from third-party sites or systems
  // https://codex.wordpress.org/Function_Reference/check_ajax_referer
  if (!check_ajax_referer( 'ajax-remove-nonce', 'remove-security', false)){
    $responce = array('error' => true, 'message'=> __('Session token has expired, please reload the page and try again', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Check files are not empty
  if(empty($filename)) {
    $responce = array('error' => true, 'message'=> __('Filename is empty. Please specify a file to remove', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Upload file to user's folder .../uploads/user@login.com
  $file = array("name" => $filename);
  $userStorage = new UserStorage();
  $status = $userStorage->removeFile($file);
  if (is_wp_error($status)) {
		$responce = array('error' => true, 'message'=> $status->get_error_message());
		echo json_encode($responce);
		die();
	}

  // If success remove - update 'receipt' field
  $current_user = wp_get_current_user();
  update_user_meta( $current_user->ID, 'receipt', 'true' );

  $responce = array('error' => false, 'message'=> __('Your file successfully removed. Don\'t forget to upload the correct one', 'understrap'));
  echo json_encode($responce);
  die();
}

add_action('wp_ajax_user_account_remove', 'user_account_remove');


// Enqueue AJAX script

if ( ! function_exists( 'user_account_remove_scripts' ) ) {
  /**
   * Load theme's JavaScript sources.
   */
  function user_account_remove_scripts() {
    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_script( 'ajax-user-account-remove', get_template_directory_uri() . '/src/js/user-account-remove.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );

    // Declare javascript variable 'ajaxurl' with namespace 'namespace' to be used with the 'ajax-register-user' script
    wp_localize_script('ajax-user-account-remove', 'removeNamespace', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
  }
} // endif function_exists( 'register_user_scripts' ).

add_action( 'wp_enqueue_scripts', 'user_account_remove_scripts' );

?>
