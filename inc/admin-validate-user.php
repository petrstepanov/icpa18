<?php

// Email to user that he was validated
function my_wp_validated_user_notification( $user_id ) {
  $user = get_userdata( $user_id );
  $admin = get_userdata(1);
  $email_resources_uri = get_template_directory_uri() . "/emails/";

  // Notify user

  $switched_locale = switch_to_locale( get_user_locale( $user ) );

  $title = __('Yay! Your ICPA-18 account was approved.');

  $message = __('Our administrators just approved your account. Payment information is avaliable in your account. Log in to see the payment options') . "<br /><br />";
  $message .= sprintf(__('<a href=\"%s\">Log in to Your Account</a>'), network_site_url("/#login") ) . "<br /><br />";

  $variables = array(
    title         => $title,
    hidden_text   => "",
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

// Display extra fields in Wordpress admin panel

function get_user_meta_keys(){
    return array("status", "participant_type", "country", "contribution", "title", "comments", "amenities", "payment_method", "receipt");
}

function my_show_extra_profile_fields( $user ) {
    echo '<h3>Extra Profile Information</h3>';
    echo '<table class="form-table">';

    $meta_keys = get_user_meta_keys();
    foreach ($meta_keys as $meta_key){
        // $meta_value = get_the_author_meta( $meta_key, $user->id );
	    $meta_value = get_user_meta($user->id, $meta_key, true);
      $meta_value = esc_attr( $meta_value );
      // Show validate button for status field that is not 'new'
      $show_validate_btn = (strcmp("status", $meta_key)==0) && (strcmp("new", $meta_value)!=0);

      if ($show_validate_btn){ ?>
        <tr>
          <th>
            <label for="meta-<?php echo $meta_key; ?>"><?php echo ucfirst(str_replace('_', ' ', $meta_key)); ?></label>
          </th>
          <td>
            <input type="text" name="meta-<?php echo $meta_key; ?>" id="meta-<?php echo $meta_key; ?>" value="<?php echo $meta_value; ?>" class="regular-text" />
          </td>
          <td width="200">
            <button type="button" class="button js--validate-user-button"><?php
              echo strcmp("pending", $meta_value)==0 ? 'Validate' : 'Undo';
            ?></button>
          </td>
        </tr>
      <?php } else { ?>
        <tr>
          <th>
            <label for="meta-<?php echo $meta_key; ?>"><?php echo ucfirst(str_replace('_', ' ', $meta_key)); ?></label>
          </th>
          <td colspan="2">
            <input type="text" name="meta-<?php echo $meta_key; ?>" id="meta-<?php echo $meta_key; ?>" value="<?php echo $meta_value; ?>" class="regular-text" />
          </td>
        </tr>
      <?php }
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
        $meta_value = $_POST['meta-' . $meta_key];
        update_user_meta( absint( $user_id ), $meta_key, $meta_value );

        // Send user a confirmation email that he was updated
        if ((strcmp('status',$meta_key)==0) && ((strcmp('approved',$meta_value)==0))) {
          my_wp_validated_user_notification( $user_id );
        }
    }
}

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

// Admin-side javascript
// Enqueue login AJAX script

if ( ! function_exists( 'admin_validate_user_scripts' ) ) {
  /**
   * Load admin JavaScript source.
   */
  function admin_validate_user_scripts($hook) {

    // Load script only on 'user-edit.php' admin page
    if ( 'user-edit.php' != $hook ) {
        return;
    }

    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_script( 'admin_validate_user', get_template_directory_uri() . '/src/js/admin-validate-user.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
  }
} // endif function_exists( 'admin_validate_user_scripts' ).

add_action( 'admin_enqueue_scripts', 'admin_validate_user_scripts' );

?>
