<?php

function user_account_payment(){

  /**
   * Process AJAX payment form request.
   */

  // Get variables
  $amenities = $_POST['amenities'];       // trim() strip whitespaces (or other characters) from the beginning and end of a string
  $payment_method = sanitize_text_field( $_POST['payment-method'] );  // https://developer.wordpress.org/reference/functions/sanitize_text_field/

  // Check if user is logged in
  if ( !is_user_logged_in() ){
    $responce = array('error' => true, 'message'=> __('Please log in to your account first', 'understrap'));
  echo json_encode($responce);
  die();
  }

  // Verify the AJAX request, to prevent requests from third-party sites or systems
  // https://codex.wordpress.org/Function_Reference/check_ajax_referer
  if (!check_ajax_referer( 'ajax-payment-nonce', 'payment-security', false)){
    $responce = array('error' => true, 'message'=> __('Session token has expired, please reload the page and try again', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Validate fields
  $amenitiesList = new AmenitiesList();
  foreach ($amenities as $amenity){
    if (!in_array($amenity, $amenitiesList->getAmenitiesNames())){
      $responce = array('error' => true, 'message'=> __('Amenity name <strong>' . $amenity . '</strong> is incorrect', 'understrap'));
      echo json_encode($responce);
      die();
    }
  }

  $paymentMethods = array("card", "transfer");
  if (!in_array($payment_method, $paymentMethods)){
    $responce = array('error' => true, 'message'=> __('Payment method <strong>' . $payment_method . '</strong> is incorrect', 'understrap'));
    echo json_encode($responce);
    die();
  }

  // Update user meta data
  $current_user = wp_get_current_user();
  if ($current_user->ID == 0){
      $responce = array('error' => true, 'message'=> __('Please log in to your account first', 'understrap'));
	echo json_encode($responce);
	die();
  }

  if (sizeof($amenities)>0){
    update_user_meta( $current_user->ID, 'amenities', implode(", ", $amenities) );
  } else {
    update_user_meta( $current_user->ID, 'amenities', "" );
  }
  update_user_meta( $current_user->ID, 'payment_method', $payment_method );

  // Successful responce - send back total price
  $meta_participant_type = get_user_meta($current_user->ID, 'participant_type', true);
  $paymentCalculator = new PaymentCalculator();
  $totalPrice = $paymentCalculator->getTotalPrice($meta_participant_type, implode(", ", $amenities));
  $responce = array('error' => false, 'totalPrice'=> $totalPrice);
  echo json_encode($responce);
  die();
}

add_action('wp_ajax_user_account_payment', 'user_account_payment');


// Enqueue AJAX script

if ( ! function_exists( 'user_account_payment_scripts' ) ) {
  /**
   * Load theme's JavaScript sources.
   */
  function user_account_payment_scripts() {
    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_script( 'ajax-user-account-payment', get_template_directory_uri() . '/src/js/user-account-payment.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );

    // Declare javascript variable 'ajaxurl' with namespace 'namespace' to be used with the 'ajax-register-user' script
    wp_localize_script('ajax-user-account-payment', 'paymentNamespace', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
  }
} // endif function_exists( 'register_user_scripts' ).

add_action( 'wp_enqueue_scripts', 'user_account_payment_scripts' );

?>
