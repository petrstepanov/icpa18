<?php
/**
 * Template Name: User Account Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// If User is not logged in redirect to landing
if (!is_user_logged_in()){
  wp_redirect( home_url() );
  exit;
}

// Retreive current user object https://codex.wordpress.org/Function_Reference/wp_get_current_user
$current_user = wp_get_current_user();

get_header('icpa');
?>

<div class="container-wrapper container-wrapper-primary-darker pt-4 pb-0">
  <div class="container">
    <div class="row pt-3">
      <div class="col-12">
        <h1 class="display-1 display-responsive js--display-name">
          <?php echo $current_user->display_name; ?>
        </h1>
        <p class="organization">
          <i class="js--organization"><?php echo $current_user->description; ?></i>
        </p>
        <ul class="nav nav-tabs p-0 pt-3" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#contribution" role="tab">Contribution Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#payment" role="tab">Payment Options</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="container pb-4">
  <div class="row">
    <div class="col-lg-9">
      <div class="tab-content">
        <div class="tab-pane mt-5" id="contribution" role="tabpanel">
          <form id="ajax_user_contribution_form" action="<?php echo home_url('/'); ?>" method="POST">
            <div class="form-group row">
                <label for="input-participant-type" class="col-md-3 col-form-label">Participant type</label>
                <div class="col-md-9">
                  <div class="btn-group btn-group-input" data-toggle="buttons">
                    <?php
                      $participant_types = get_participant_type_list();
                      $meta_participant_type = get_user_meta($current_user->id, 'participant_type', true);
                      foreach ($participant_types as $participant_type){
                        if ($participant_type == $meta_participant_type){
                          echo "<label class='btn btn-primary active'>"; // add 'active' for selected
                               echo   "<input type='radio' name='input-participant-type' value='" . $participant_type . "' autocomplete='off' checked>" . ucfirst($participant_type);  // add 'checked' for selected
                          echo "</label>";
                        } else {
                          echo "<label class='btn btn-primary'>";
                                        echo   "<input type='radio' name='input-participant-type' value='" . $participant_type . "' autocomplete='off'>" . ucfirst($participant_type);
                          echo "</label>";
                        }
                      }
                    ?>
                  </div>
                </div>
            </div>
            <div class="form-group row">
              <label for="input-country" class="col-md-3 col-form-label">Country</label>
              <div class="col-md-9">
                <select class="custom-select" id="input-country" name="input-country" >
                  <option disabled selected value=""></option>
                  <?php
                    $countries = get_country_list();
                    $meta_country = get_user_meta($current_user->id, 'country', true);
                    foreach ($countries as $country){
                      if ($country == $meta_country){
                        echo "<option value='" . $country . "' selected>" . $country . "</option>";
                      } else {
                        echo "<option value='" . $country . "'>" . $country . "</option>";
                      }
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-contribution" class="col-md-3 col-form-label">Contribution</label>
                <div class="col-md-9">
                  <div class="btn-group btn-group-input" data-toggle="buttons">
                    <?php
                      $contribution_types = get_contribution_type_list();
                      $meta_contribution_type = get_user_meta($current_user->id, 'contribution', true);
                      foreach ($contribution_types as $contribution_type){
                        if ($contribution_type == $meta_contribution_type){
                          echo "<label class='btn btn-primary active'>"; // add 'active' for selected
                          echo   "<input type='radio' name='input-contribution-type' value='" . $contribution_type . "' autocomplete='off' checked>" . ucfirst($contribution_type);  // add 'checked' for selected
                          echo "</label>";
                        } else {
                          echo "<label class='btn btn-primary'>";
                          echo   "<input type='radio' name='input-contribution-type' value='" . $contribution_type . "' autocomplete='off'>" . ucfirst($contribution_type);
                          echo "</label>";
                        }
                      }
                    ?>
                  </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-title" class="col-md-3 col-form-label">Title</label>
              <div class="col-md-9">
                <?php
                  $meta_title = get_user_meta($current_user->id, 'title', true);
                  echo "<input class='form-control' type='text' name='input-title' id='input-title' value='" . $meta_title . "'>";
                ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-comments" class="col-md-3 col-form-label">Comments</label>
              <div class="col-md-9">
                <textarea class="form-control" name="input-comments" placeholder="Optional" id="input-comments" rows="3"><?php $meta_comments = trim(get_user_meta($current_user->id, 'comments', true)); echo esc_textarea($meta_comments); ?></textarea>
              </div>
            </div>
            <div class="py-3 text-right">
              <input type="submit" class="btn btn-warning" value="Update Information">
            </div>
            <!-- BEGIN: Hidden Wordpress fields to correctly handle AJAX request -->
            <?php wp_nonce_field('ajax-contribution-nonce', 'contribution-security' ); // https://codex.wordpress.org/Function_Reference/wp_nonce_field ?>
            <input type="hidden" name="action" value="user_account_contribution"/>
            <!-- END: Hidden Wordpress fields to correctly handle AJAX request -->
          </form>
        </div>
        <div class="tab-pane mt-5" id="payment" role="tabpanel">
          <?php
            $paymentCalculator = new PaymentCalculator();
            $receipt = get_user_meta($current_user->id, 'receipt', true);
            $status = get_user_meta($current_user->id, 'status', true);
            if ('approved' == $status){ ?>
            <div id="ajax_user_payment_forms">
              <form id="ajax_user_payment_form">
                <h3 class="mb-4">Step 1. <span class="light">Select your Payment Options<span></h3>
                <div class="row align-items-center">
                  <div class="col-10">
                    <label class="custom-input col-form-label">
                      <input type="checkbox" name="payment-required" value="admission" checked disabled/>
                      <span class="icons">
                        <svg class="icon-unchecked svg-icon checkbox"><use xlink:href="#checkbox"></use></svg>
                        <svg class="icon-checked svg-icon checkbox-checked"><use xlink:href="#checkbox-checked"></use></svg>
                        <svg class="icon-checked-disabled svg-icon checkbox-checked-disabled"><use xlink:href="#checkbox-checked-disabled"></use></svg>
                      </span>
                      <span><?php echo ucfirst($meta_participant_type); ?> admission</span><span class="ml-3 badge badge-default">REQUIRED</span>
                    </label>
                  </div>
                  <div class="col-2">
                    $<?php echo $paymentCalculator->getAdmissionPrice($meta_participant_type); ?>
                  </div>
                </div>
                <?php
                  $meta_amenities = get_user_meta($current_user->id, 'amenities', true);
                  $amenitiesList = new AmenitiesList();
                  $amenitiesNames = $amenitiesList->getAmenitiesNames();
                  foreach($amenitiesNames as $amenityName){
                ?>
                  <?php if (strpos($meta_amenities, $amenityName) !== false){ ?>
                    <div class="row align-items-center">
                  <?php } else { ?>
                    <div class="row align-items-center strikeThrough">
                  <?php } ?>
                    <div class="col-10">
                      <label class="custom-input col-form-label">
                        <?php if (strpos($meta_amenities, $amenityName) !== false){ ?>
                          <input type="checkbox" name="amenities[]" value="<?php echo $amenityName; ?>" checked <?php echo strcmp($receipt, "true") == 0 ? "disabled" : ""; ?> />
                        <?php } else { ?>
                          <input type="checkbox" name="amenities[]" value="<?php echo $amenityName; ?>" <?php echo strcmp($receipt, "true") == 0 ? "disabled" : ""; ?> />
                        <?php } ?>
                        <span class="icons">
                          <svg class="icon-unchecked svg-icon checkbox"><use xlink:href="#checkbox"></use></svg>
                          <svg class="icon-checked svg-icon checkbox-checked"><use xlink:href="#checkbox-checked"></use></svg>
                          <!-- <svg class="icon-checked-disabled svg-icon checkbox-checked-disabled"><use xlink:href="#checkbox-checked-disabled"></use></svg> -->
                        </span>
                        <span><?php echo $amenitiesList->getAmenityDescription($amenityName); ?></span>
                      </label>
                    </div>
                    <div class="col-2">
                      $<?php echo $amenitiesList->getAmenityPrice($amenityName); ?>
                    </div>
                  </div>
                <?php } ?>
                <hr class="gray-lightest custom-input-margin mt-3 mb-2 mb-md-3" />
                <div class="row pt-1 mb-5">
                  <div class="col-10">
                    <span class="font-size-21 custom-input-margin">Total amount</span>
                  </div>
                  <div class="col-2">
                    <span class="font-size-21">$<span id="js--total-price"><?php
                        $meta_amenities = get_user_meta($current_user->id, 'amenities', true);
                        echo $paymentCalculator->getTotalPrice($meta_participant_type, $meta_amenities);
                      ?></span></span>
                  </div>
                </div>
                <h3 class="mb-4">Step 2. <span class="light">Choose the Payment Method<span></h3>
                <?php
                  $meta_payment_method = get_user_meta($current_user->id, 'payment_method', true);
                  $show_card = ( strcmp('card', $meta_payment_method) == 0 ) ? TRUE : FALSE;
                  $show_transfer = ( strcmp('transfer', $meta_payment_method) == 0 ) ? TRUE : FALSE;
                ?>
                <div class="row">
                  <div class="col-12 col-sm-7">
                    <label class="custom-input mb-2 mb-md-3">
                      <input type="radio" name="payment-method" value="card" <?php echo ($show_card) ? "checked" : ""; ?> class="js--card"  <?php echo strcmp($receipt, "true") == 0 ? "disabled" : ""; ?>/>
                      <span class="icons large">
                        <svg class="icon-unchecked svg-icon credit-card"><use xlink:href="#credit-card"></use></svg>
                        <svg class="icon-checked svg-icon credit-card-selected"><use xlink:href="#credit-card-selected"></use></svg>
                      </span>
                      <div><p class="my-0"><strong>Credit or debit card</strong><br/><small class="text-black-opaque">Online via flywire.com towards BGSU</small></p></div>
                    </label>
                  </div>
                  <div class="col-12 col-sm-5 text-right">
                    <div class="collapse fade  <?php echo ($show_card) ? "show" : ""; ?>" id="collapse-card">
                      <a href="#" rel="nofollow" class="btn btn-warning">Pay at flywire.com</a>
                    </div>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-sm">
                    <label class="custom-input mb-2 mb-md-3">
                      <input type="radio" name="payment-method" value="transfer" <?php echo ($show_transfer) ? "checked" : ""; ?> class="js--money-transfer" <?php echo strcmp($receipt, "true") == 0 ? "disabled" : ""; ?>/>
                      <span class="icons large">
                        <svg class="icon-unchecked svg-icon money-transfer"><use xlink:href="#money-transfer"></use></svg>
                        <svg class="icon-checked svg-icon money-transfer-selected"><use xlink:href="#money-transfer-selected"></use></svg>
                      </span>
                      <div><p class="my-0"><strong>Money transfer</strong><br/><small class="text-black-opaque">To PNC Bank in USA</small></p></div>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="custom-input-margin-large-sm collapse <?php echo ($show_transfer) ? "show" : ""; ?>" id="collapse-money-transfer">
                    <div class="col-12">
                      <dl class="row">
                        <dt class="col-sm-5">Beneficiary name:</dt>
                        <dd class="col-sm-7">Department of Physics and Astronomy</dd>
                        <dt class="col-sm-5">Account number:</dt>
                        <dd class="col-sm-7">4279598482</dd>
                        <dt class="col-sm-5">Routing Number:</dt>
                        <dd class="col-sm-7">041000124</dd>
                        <dt class="col-sm-5">Bank name:</dt>
                        <dd class="col-sm-7">PNC Bank</dd>
                        <dt class="col-sm-5">Bank address:</dt>
                        <dd class="col-sm-7">735 S Main St, Bowling Green, OH 43402</dd>
                      </dl>
                    </div>
                  </div>
                </div>
                <!-- BEGIN: Hidden Wordpress fields to correctly handle AJAX request -->
                <?php wp_nonce_field('ajax-payment-nonce', 'payment-security' ); // https://codex.wordpress.org/Function_Reference/wp_nonce_field ?>
                <input type="hidden" name="action" value="user_account_payment"/>
                <!-- END: Hidden Wordpress fields to correctly handle AJAX request -->
              </form>
              <h3 class="mb-4 mt-4 pt-1">Step 3. <span class="light">Upload the Receipt<span></h3>
              <div class="row">
                <div class="col-sm">
                  <?php
                    $userStorage = new UserStorage();
                    $filesList = $userStorage->getFilenamesList();
                    if(sizeof($filesList) > 0){
                      $userHasFiles = TRUE;
                    }
                  ?>
                  <form id="ajax_user_remove_form" <?php echo $userHasFiles ? "" : "style='display: none'"; ?> action="<?php echo home_url('/'); ?>" class="mb-5 fake-dropzone" method="POST">
                  <div class="media py-4 px-4 dz-preview">
                    <div class="d-flex mr-3">
                      <svg class="svg-icon file"><use xlink:href="#file"></use></svg>
                    </div>
                    <div class="media-body">
                      <p class="strong mt-2 mb-1"><span class="js--filename"><?php echo $filesList[0]["name"]; ?></span></p>
                      <p class="text-black-opaque small">
                        <span class="js--filesize"><?php echo size_format($filesList[0]["size"]); ?></span>
                        <input type="submit" class="btn-link px-0 py-0 ml-2 text-danger" value="Remove file" />
                      </p>
                    </div>
                  </div>                  <!-- BEGIN: Hidden Wordpress fields to correctly handle AJAX request -->
                  <?php wp_nonce_field('ajax-remove-nonce', 'remove-security' ); // https://codex.wordpress.org/Function_Reference/wp_nonce_field ?>
                  <input type="hidden" name="action" value="user_account_remove"/>
                  <input type="hidden" name="filename" value="<?php echo $filesList[0]["name"]; ?>"/>
                  <!-- END: Hidden Wordpress fields to correctly handle AJAX request -->
                </form>
                  <form id="ajax_user_upload_form" <?php echo $userHasFiles ? "style='display: none'" : ""; ?> action="<?php echo home_url('/'); ?>" class="mb-5 dropzone" method="POST">
                  <div class="dz-message pt-4 pb-3" data-dz-message>
                    <p class="strong text-center pt-2">Drop file here or click to upload</p>
                    <p class="text-black-opaque small text-center">Files larger than 5 MB not supported</p>
                  </div>
                  <!-- BEGIN: Hidden Wordpress fields to correctly handle AJAX request -->
                  <?php wp_nonce_field('ajax-upload-nonce', 'upload-security' ); // https://codex.wordpress.org/Function_Reference/wp_nonce_field ?>
                  <input type="hidden" name="action" value="user_account_upload"/>
                  <!-- END: Hidden Wordpress fields to correctly handle AJAX request -->
                </form>
                </div>
              </div>
            </div>
          <?php } ?>
          <div id="ajax_user_payment_form_hidden_notification" style="<?php echo strcmp($status, "approved") == 0 ? "display: none" : "" ?>">
            <p>Payment options will be avaliable when our administrator verifies and approves your account.</p>
            <p>We will inform you via email.</p>
            <div style="height: 20rem"></div>
          </div>
        </div>
        <div class="tab-pane mt-5" id="profile" role="tabpanel">
          <form id="ajax_user_profile_form" action="<?php echo home_url('/'); ?>" method="POST">
            <div class="form-group row">
                <label for="input-email" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-9">
                  <input class="form-control" type="email" id="input-email" value="stepanovps@gmail.com" disabled />
                </div>
            </div>
            <div class="form-group row">
              <label for="first_name" class="col-md-3 col-form-label">First name</label>
              <div class="col-md-9">
                <input class="form-control" type="text" value="<?php echo $current_user->first_name; ?>" name="first_name" id="first_name" />
              </div>
            </div>
            <div class="form-group row">
              <label for="last_name" class="col-md-3 col-form-label">Last name</label>
              <div class="col-md-9">
                <input class="form-control" type="text" value="<?php echo $current_user->last_name; ?>" name="last_name" id="last_name" />
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-md-3 col-form-label">Organization</label>
              <div class="col-md-9">
                <input class="form-control" type="text" name="description" value="<?php echo $current_user->description; ?>" id="description" />
              </div>
            </div>
            <div class="form-group row mt-4">
              <div class="col-md-9 offset-md-3">
                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group" role="group" aria-label="First group">
                    <button type="button" class="btn btn-link px-0" data-toggle="modal" data-target="#new-password">
                      <?php _e( 'Change password', 'understrap' ); ?>
                    </button>
                  </div>
                  <div class="btn-group" role="group" aria-label="Second group">
                    <input type="submit" class="btn btn-warning" value="<?php _e( 'Update Information', 'understrap' ); ?>">
                  </div>
                </div>
              </div>
            </div>
            <!-- BEGIN: Hidden Wordpress fields to correctly handle AJAX request -->
            <?php wp_nonce_field('ajax-profile-nonce', 'profile-security' ); // https://codex.wordpress.org/Function_Reference/wp_nonce_field ?>
            <input type="hidden" name="action" value="user_account_profile"/>
            <!-- END: Hidden Wordpress fields to correctly handle AJAX request -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  // Show warning if User not filled the Contribution Details yet (status is 'new')
  if ('new' == $status){
    $status_message = "Please submit your Contribution Details. We need to double check your information before we approve you as a participant.";
    $status_type = "warning";
  }
  elseif ('pending' == $status){
    $status_message = "Your Contribution Details are submitted and our administrators need to validate them. We will send you an email soon!";
    $status_type = "warning";
  }
  elseif ('approved' == $status){
    if ('false' == receipt){
      $status_message = "Your account is approved. Payment information is avaliable <a href=\"#payment\">here</a>.";
      $status_type = "information";
    } else {
      $status_message = "Thanks for your payment. You\'re all set!";
      $status_type = "information";
    }
  }
  // Show correspondent notification
  echo "<script>";
  echo "var onloadNotification = {message: '" . $status_message . "', type: '" . $status_type . "'}";
  echo "</script>";
?>

<?php

define('__ROOT__', get_template_directory());

require_once(__ROOT__.'/modals/modal-new-password.php');

get_footer('icpa');

?>
