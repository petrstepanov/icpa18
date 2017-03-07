<?php

function login_user(){

	/**
	 * Process AJAX user login request.
	 */

	// Get variables
	$user_login = trim( $_POST['user_login'] );
	$user_password = trim( $_POST['user_password'] );

	// Verify the AJAX request, to prevent requests from third-party sites or systems
	// https://codex.wordpress.org/Function_Reference/check_ajax_referer
	if (!check_ajax_referer( 'ajax-login-nonce', 'login-security', false)){
		$responce = array('error' => true, 'message'=> __('Session token has expired, please reload the page and try again', 'understrap'));
		echo json_encode($responce);
		die();
	}

	// Validate POST parameter values. Actually Wordpress will do it itself in case if we don't (check that)
	if (empty($user_login)){
		$responce = array('error' => true, 'message'=> __('Please fill out the <strong>Email</strong> field', 'understrap'));
		echo json_encode($responce);
		die();
	}

	if (empty($user_password)){
		$responce = array('error' => true, 'message'=> __('Please fill out the <strong>Password</strong> field', 'understrap'));
		echo json_encode($responce);
		die();
	}

	// Try authenticate a user (with option to remember credentials)
	// https://codex.wordpress.org/Function_Reference/wp_signon
	// TODO: check , false - last parameter
	$user = wp_signon( array('user_login' => $user_login, 'user_password' => $user_password, 'remember' => true), false );

	// Check if Wordperss returned an error during the registration
	if (is_wp_error($user)){
		$responce = array('error' => true, 'message'=> $user->get_error_message());
		echo json_encode($responce);
		die();
	}

	// Successful responce
	$responce = array('error' => false, 'message'=> __('Logged in successfully', 'understrap'));
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

add_action('wp_ajax_nopriv_login_user', 'login_user');


// Enqueue login AJAX script

if ( ! function_exists( 'login_user_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function login_user_scripts() {
		// Get the theme data
		$the_theme = wp_get_theme();
		wp_enqueue_script( 'ajax-login-user', get_template_directory_uri() . '/src/js/landing-login-user.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );

		// Declare javascript variable 'ajaxurl' with namespace 'loginnamespace' to be used with the 'ajax-login-user' script
		wp_localize_script('ajax-login-user', 'loginnamespace', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'redirecturl' => home_url('/account')));
	}
} // endif function_exists( 'login_user_scripts' ).

add_action( 'wp_enqueue_scripts', 'login_user_scripts' );

?>
