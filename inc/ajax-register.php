<?php

function my_wp_new_user_notification( $password, $user_id, $deprecated = null, $notify = '' ) {
    $user = get_userdata( $user_id );

	// Notify admin
    // if ( 'user' !== $notify ) {
    //     $switched_locale = switch_to_locale( get_locale() );
    //     $message  = __( 'New user registration on ICPA-18 website:' ) . "\r\n\r\n";
	// 	$message .= sprintf( __( 'First name:    %s' ), $user->first_name ) . "\r\n\r\n";
	// 	$message .= sprintf( __( 'Last name:     %s' ), $user->last_name ) . "\r\n\r\n";
	// 	$message .= sprintf( __( 'Organization:  %s' ), $user->description ) . "\r\n\r\n";
    //     $message .= sprintf( __( 'Email: %s' ), $user->user_email ) . "\r\n";
	//
    //     @wp_mail( get_option( 'admin_email' ), __( 'New ICPA-18 User Registration' ), $message );
	//
    //     if ( $switched_locale ) {
    //         restore_previous_locale();
    //     }
    // }
	//
    // // `$deprecated was pre-4.3 `$plaintext_pass`. An empty `$plaintext_pass` didn't sent a user notification.
    // if ( 'admin' === $notify || ( empty( $deprecated ) && empty( $notify ) ) ) {
    //     return;
    // }

	// Notify user

    $switched_locale = switch_to_locale( get_user_locale( $user ) );

	$message = sprintf(__('Hi %s'), $user->first_name) . "!\r\n\r\n";
	$message .= __('Thanks for registering for the ICPA-18! Below please find your credentials:') . "\r\n\r\n";

    $message .= sprintf(__('Email: %s'), $user->user_login) . "\r\n";
    $message .= sprintf(__('Password: %s'), $password) . "\r\n\r\n";

	$message .= __('Please log in to your account ') . network_site_url("/") . __(' and submit your contribution information. Once you are done, we will approve your account and provide the payment information.') . "\r\n\r\n";

	$message .= "--\r\n\r\n" . __('Best wishes from ICPA-18 team');

    wp_mail($user->user_email, __('Your ICPA-18 credentials'), $message);

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
	$email = trim( $_POST['email'] );							// trim() strip whitespaces (or other characters) from the beginning and end of a string
	$first_name = sanitize_text_field( $_POST['first_name'] );	// https://developer.wordpress.org/reference/functions/sanitize_text_field/
	$last_name = sanitize_text_field( $_POST['last_name'] );
	$description = sanitize_text_field( $_POST['description'] );	// We use default Wordpress 'description' user field to store user's Organization

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

	// Send out custom user notification
	my_wp_new_user_notification( $password, $user_id );
	// wp_new_user_notification( $user_id );

	// Successful responce
	$responce = array('error' => false, 'message'=> __('Resistration is complete! Please check your email <strong>') . $email . __('</strong> for further instructions', 'understrap'));
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
