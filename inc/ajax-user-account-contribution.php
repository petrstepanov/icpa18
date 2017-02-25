<?php

function get_country_list(){
    // $countries = array("United States" => "us", "Afghanistan" => "af", "Albania" => "al", "Algeria" => "dz", "American Samoa" => "as", "Andorra" => "ad", "Angola" => "ad", "Anguilla" => "ai", "Antarctica" => "aq", "Antigua and Barbuda" => "ag", "Argentina" => "ar", "Armenia" => "am", "Aruba" => "aw", "Australia" => "au", "Austria" => "at", "Azerbaijan" => "az", "Bahamas" => "bs", "Bahrain" => "bh", "Bangladesh" => "bd", "Barbados" => "bb", "Belarus" => "by", "Belgium" => "be", "Belize" => "bz", "Benin" => "bj", "Bermuda" => "bm", "Bhutan" => "bt", "Bolivia" => "bo", "Bosnia and Herzegowina" => "ba", "Botswana" => "bw", "Bouvet Island" => "bv", "Brazil" => "br", "British Indian Ocean Territory" => "io", "Brunei Darussalam" => "bn", "Bulgaria" => "bg", "Burkina Faso" => "bf", "Burundi" => "bi", "Cambodia" => "kh", "Cameroon" => "cm", "Canada" => "ca", "Cabo Verde" => "cv", "Cayman Islands" => "ky", "Central African Republic" => "cf", "Chad" => "td", "Chile" => "cl", "China" => "cn", "Christmas Island" => "cx", "Cocos (Keeling) Islands" => "cc", "Colombia" => "co", "Comoros" => "km", "Congo" => "cg", "Congo, the Democratic Republic of the" => "cd", "Cook Islands" => "ck", "Costa Rica" => "cr", "Cote d'Ivoire" => "ci", "Croatia (Hrvatska)" => "hr", "Cuba" => "cu", "Cyprus" => "cy", "Czech Republic" => "cz", "Denmark" => "dk", "Djibouti" => "dj", "Dominica" => "dm", "Dominican Republic" => "do", "East Timor" => "tl", "Ecuador" => "ec", "Egypt" => "eg", "El Salvador" => "sv", "Equatorial Guinea" => "gq", "Eritrea" => "er", "Estonia" => "ee", "Ethiopia" => "et", "Falkland Islands (Malvinas)" => "fk", "Faroe Islands" => "fo", "Fiji" => "fj", "Finland" => "fi", "France" => "fr", "French Guiana" => "gf", "French Polynesia" => "pf", "French Southern Territories" => "tf", "Gabon" => "ga", "Gambia" => "gm", "Georgia" => "ge", "Germany" => "de", "Ghana" => "gh", "Gibraltar" => "gi", "Greece" => "gr", "Greenland" => "gl", "Grenada" => "gd", "Guadeloupe" => "gp", "Guam" => "gu", "Guatemala" => "gt", "Guinea" => "gn", "Guinea-Bissau" => "gw", "Guyana" => "gy", "Haiti" => "ht", "Heard and Mc Donald Islands" => "hm", "Holy See (Vatican City State)" => "va", "Honduras" => "hn", "Hong Kong" => "hk", "Hungary" => "hu", "Iceland" => "is", "India" => "in", "Indonesia" => "id", "Iran (Islamic Republic of)" => "ir", "Iraq" => "iq", "Ireland" => "ie", "Israel" => "il", "Italy" => "it", "Jamaica" => "jm", "Japan" => "jp", "Jordan" => "jo", "Kazakhstan" => "kz", "Kenya" => "ke", "Kiribati" => "ki", "Korea, Democratic People's Republic of" => "kp", "Korea, Republic of" => "kr", "Kuwait" => "kw", "Kyrgyzstan" => "kg", "Lao, People's Democratic Republic" => "la", "Latvia" => "lv", "Lebanon" => "lb", "Lesotho" => "ls", "Liberia" => "lr", "Libyan Arab Jamahiriya" => "ly", "Liechtenstein" => "li", "Lithuania" => "lt", "Luxembourg" => "lu", "Macao" => "mo", "Macedonia, The Former Yugoslav Republic of" => "mk", "Madagascar" => "mg", "Malawi" => "mw", "Malaysia" => "my", "Maldives" => "mv", "Mali" => "ml", "Malta" => "mt", "Marshall Islands" => "mh", "Martinique" => "mq", "Mauritania" => "mr", "Mauritius" => "mu", "Mayotte" => "yt", "Mexico" => "mx", "Micronesia, Federated States of" => "fm", "Moldova, Republic of" => "md", "Monaco" => "mc", "Mongolia" => "mn", "Montserrat" => "ms", "Morocco" => "ma", "Mozambique" => "mz", "Myanmar" => "mm", "Namibia" => "na", "Nauru" => "nr", "Nepal" => "np", "Netherlands" => "nl", "Netherlands Antilles" => "an", "New Caledonia" => "nc", "New Zealand" => "nz", "Nicaragua" => "ni", "Niger" => "ne", "Nigeria" => "ng", "Niue" => "nu", "Norfolk Island" => "nf", "Northern Mariana Islands" => "mp", "Norway" => "no", "Oman" => "om", "Pakistan" => "pk", "Palau" => "pw", "Panama" => "pa", "Papua New Guinea" => "pg", "Paraguay" => "py", "Peru" => "pe", "Philippines" => "ph", "Pitcairn" => "pn", "Poland" => "pl", "Portugal" => "pt", "Puerto Rico" => "pr", "Qatar" => "qa", "Reunion" => "re", "Romania" => "ro", "Russian Federation" => "ru", "Rwanda" => "rw", "Saint Kitts and Nevis" => "kn", "Saint Lucia" => "lc", "Saint Vincent and the Grenadines" => "vc", "Samoa" => "ws", "San Marino" => "sm", "Sao Tome and Principe" => "st", "Saudi Arabia" => "sa", "Senegal" => "sn", "Seychelles" => "sc", "Sierra Leone" => "sl", "Singapore" => "sg", "Slovakia (Slovak Republic)" => "sk", "Slovenia" => "si", "Solomon Islands" => "sb", "Somalia" => "so", "South Africa" => "za", "South Georgia and the South Sandwich Islands" => "gs", "Spain" => "es", "Sri Lanka" => "lk", "St. Helena" => "sh", "St. Pierre and Miquelon" => "pm", "Sudan" => "sd", "Suriname" => "sr", "Svalbard and Jan Mayen Islands" => "sj", "Swaziland" => "sz", "Sweden" => "se", "Switzerland" => "ch", "Syrian Arab Republic" => "sy", "Taiwan, Province of China" => "tw", "Tajikistan" => "tj", "Tanzania, United Republic of" => "tz", "Thailand" => "th", "Togo" => "tg", "Tokelau" => "tk", "Tonga" => "to", "Trinidad and Tobago" => "tt", "Tunisia" => "tn", "Turkey" => "tr", "Turkmenistan" => "tm", "Turks and Caicos Islands" => "tc", "Tuvalu" => "tv", "Uganda" => "ug", "Ukraine" => "ua", "United Arab Emirates" => "ae", "United Kingdom" => "gb", "United States" => "us", "United States Minor Outlying Islands" => "um", "Uruguay" => "uy", "Uzbekistan" => "uz", "Vanuatu" => "vu", "Venezuela" => "ve", "Vietnam" => "vn", "Virgin Islands (British)" => "vg", "Virgin Islands (U.S.)" => "vi", "Wallis and Futuna Islands" => "wf", "Western Sahara" => "eh", "Yemen" => "ye", "Serbia" => "yu", "Zambia" => "zm", "Zimbabwe" => "zw");
    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    return $countries;
}

function get_participant_type_list(){
    $participant_type = array("regular", "student", "accompany");
    return $participant_type;
}

function get_contribution_type_list(){
    $contribution_type = array("presentation", "poster", "none");
    return $contribution_type;
}

function user_account_contribution(){

	/**
	 * Process AJAX user register request.
	 */

	// Get variables
	$participant_type = sanitize_text_field( $_POST['input-participant-type'] );							// trim() strip whitespaces (or other characters) from the beginning and end of a string
	$country = sanitize_text_field( $_POST['input-country'] );	// https://developer.wordpress.org/reference/functions/sanitize_text_field/
	$contribution_type = sanitize_text_field( $_POST['input-contribution-type'] );
	$title = sanitize_text_field( $_POST['input-title'] );	// We use default Wordpress 'description' user field to store user's Organization
    $comments = sanitize_text_field( trim($_POST['input-comments']) );	// We use default Wordpress 'description' user field to store user's Organization


    // Check if user is logged in
    if ( !is_user_logged_in() ){
        $responce = array('error' => true, 'message'=> __('Please log in to your account first', 'understrap'));
		echo json_encode($responce);
		die();
    }

	// Verify the AJAX request, to prevent requests from third-party sites or systems
	// https://codex.wordpress.org/Function_Reference/check_ajax_referer
	if (!check_ajax_referer( 'ajax-contribution-nonce', 'contribution-security', false)){
		$responce = array('error' => true, 'message'=> __('Session token has expired, please reload the page and try again', 'understrap'));
		echo json_encode($responce);
		die();
	}

    // Validate fields
    if ( !in_array( $participant_type , get_participant_type_list() ) ){
        $responce = array('error' => true, 'message'=> __('Participant type <strong>' . ucfirst($participant_type) . '</strong> is incorrect', 'understrap'));
        echo json_encode($responce);
        die();
    }

    if ( !in_array( $country , get_country_list() ) ){
        $responce = array('error' => true, 'message'=> __('Please do not forget to specify the <strong>Country</strong> field', 'understrap'));
        echo json_encode($responce);
        die();
    }

    if ( !in_array( $contribution_type , get_contribution_type_list() ) ){
        $responce = array('error' => true, 'message'=> __('<strong>Contribution</strong> field cannot be empty', 'understrap'));
        echo json_encode($responce);
        die();
    }

	if (empty( $title )){
		$responce = array('error' => true, 'message'=> __('You forgot to fill out your <strong>Title</strong> field', 'understrap'));
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

  update_user_meta( $current_user->ID, 'participant_type', $participant_type );
  update_user_meta( $current_user->ID, 'country', $country );
  update_user_meta( $current_user->ID, 'contribution', $contribution_type );
  update_user_meta( $current_user->ID, 'title', $title );
  update_user_meta( $current_user->ID, 'comments', $comments );
  update_user_meta( $current_user->ID, 'status', 'pending' );

	// Successful responce
	$responce = array('error' => false, 'message'=> __('Contribution information saved! You will receive an email when we approve your account.', 'understrap'));
	echo json_encode($responce);
	die();
}

add_action('wp_ajax_user_account_contribution', 'user_account_contribution');


// Enqueue login AJAX script

if ( ! function_exists( 'user_account_contribution_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function user_account_contribution_scripts() {
		// Get the theme data
		$the_theme = wp_get_theme();
		wp_enqueue_script( 'ajax-user-account-contribution', get_template_directory_uri() . '/src/js/user-account-contribution.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );

		// Declare javascript variable 'ajaxurl' with namespace 'namespace' to be used with the 'ajax-register-user' script
		wp_localize_script('ajax-user-account-contribution', 'contributionNamespace', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
	}
} // endif function_exists( 'register_user_scripts' ).

add_action( 'wp_enqueue_scripts', 'user_account_contribution_scripts' );


// Display extra fields in Wordpress admin panel

function get_user_meta_keys(){
    return array("status", "participant_type", "country", "contribution", "title", "comments", "amenities");
}

function my_show_extra_profile_fields( $user ) {
    echo '<h3>Extra Profile Information</h3>';
    echo '<table class="form-table">';

    $meta_keys = get_user_meta_keys();
    foreach ($meta_keys as $meta_key){
        // $meta_value = get_the_author_meta( $meta_key, $user->id );
	    $meta_value = get_user_meta($user->id, $meta_key, true);
      $meta_value = esc_attr( $meta_value );
        ?>
            <tr>
                <th><label for="meta-<?php echo $meta_key; ?>"><?php echo ucfirst(str_replace('_', ' ', $meta_key)); ?></label></th>
                <td>
                    <input type="text" name="meta-<?php echo $meta_key; ?>" id="meta-<?php echo $meta_key; ?>" value="<?php echo $meta_value; ?>" class="regular-text" />
                </td>
            </tr>
        <?php
    }
    echo '</table>';
}

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );


// Saving user extra fields from admin panel

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    $meta_keys = get_user_meta_keys();
    foreach ($meta_keys as $meta_key){
        // update_usermeta( absint( $user_id ), $meta_key, wp_kses_post( $_POST['meta-' . $meta_key] ) );
        update_user_meta( absint( $user_id ), $meta_key, $_POST['meta-' . $meta_key] );
    }
}

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

?>
