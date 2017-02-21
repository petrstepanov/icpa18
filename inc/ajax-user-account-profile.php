<?php

function user_account_profile(){

	/**
	 * Process AJAX edit profile request.
	 */

	// Get variables
	$first_name = sanitize_text_field( $_POST['first_name'] );							// trim() strip whitespaces (or other characters) from the beginning and end of a string
	$last_name = sanitize_text_field( $_POST['last_name'] );	// https://developer.wordpress.org/reference/functions/sanitize_text_field/
	$description = sanitize_text_field( $_POST['description'] );

    // Check if user is logged in
    if ( !is_user_logged_in() ){
        $responce = array('error' => true, 'message'=> __('Please log in to your account first', 'understrap'));
		echo json_encode($responce);
		die();
    }

	// Verify the AJAX request, to prevent requests from third-party sites or systems
	// https://codex.wordpress.org/Function_Reference/check_ajax_referer
	if (!check_ajax_referer( 'ajax-profile-nonce', 'profile-security', false)){
		$responce = array('error' => true, 'message'=> __('Session token has expired, please reload the page and try again', 'understrap'));
		echo json_encode($responce);
		die();
	}

    // Validate fields
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

	// Update user meta data
    $current_user = wp_get_current_user();
    if ($current_user->id == 0){
        $responce = array('error' => true, 'message'=> __('Please log in to your account first', 'understrap'));
		echo json_encode($responce);
		die();
    }

    // Prepare array of user data
	$user_data = array(
        'ID'					=> $current_user->ID,
        'first_name'			=> $first_name,
        'last_name'				=> $last_name,
        'description'			=> $description
    );

	// Insert new user instance into database
	$user_id = wp_update_user( $user_data );

    // Check if Wordperss returned an error during the registration
	if (is_wp_error($user_id)){
		$responce = array('error' => true, 'message'=> $user_id->get_error_message());
		echo json_encode($responce);
		die();
	}

	// Successful responce
	$responce = array('error' => false, 'message'=> __('Profile information saved', 'understrap'));
	echo json_encode($responce);
	die();
}

add_action('wp_ajax_user_account_profile', 'user_account_profile');


// Enqueue login AJAX script

if ( ! function_exists( 'user_account_profile_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function user_account_profile_scripts() {
		// Get the theme data
		$the_theme = wp_get_theme();
		wp_enqueue_script( 'ajax-user-account-profile', get_template_directory_uri() . '/src/js/user-account-profile.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );

		// Declare javascript variable 'ajaxurl' with namespace 'namespace' to be used with the 'ajax-register-user' script
		wp_localize_script('ajax-user-account-profile', 'profileNamespace', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
	}
} // endif function_exists( 'register_user_scripts' ).

add_action( 'wp_enqueue_scripts', 'user_account_profile_scripts' );

?>
