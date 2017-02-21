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
				<ul class="nav nav-tabs p-0 pt-3" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#contribution" role="tab">Contribution Details</a>
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
<?php
	// Show warning if User not filled the Contribution Details yet (status is 'new')
	$status = get_user_meta($current_user->id, 'status', true);
	if ('new' == $status){
		$status_message = "Please submit your Contribution Details. <br />We need to double check your information before we approve you as a participant.";
		$status_classname = "text-danger";
	}
	elseif ('pending' == $status){
		$status_message = "Your Contribution Details are submitted and our administrators will check if it looks good. <br />We will send you an email soon!";
		$status_classname = "text-muted";
	}
	elseif ('approved' == $status){
		$status_message = "Congratulations! Your account is approved.<br />Payment information is avaliable.";
		$status_classname = "text-primary";
	}
?>

<div class="container-wrapper container-wrapper-gray-lighter py-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="media <?php echo $status_classname; ?>" id="user-feedback-container">
					<span class="icon-info d-flex align-self-center mr-2"></span>
					<div class="media-body ml-1">
						<p class="mb-0">
							<small>
								<strong>
									<?php echo $status_message; ?>
								</strong>
							</small>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container pb-4">
	<div class="row">
		<div class="col-lg-9">
			<div class="tab-content">
				<div class="tab-pane fade show active mt-5" id="contribution" role="tabpanel">
					<form id="ajax_user_contribution_form" action="<?php echo home_url('/'); ?>" method="POST">
						<!-- <div class="form-group row">
		                    <label for="input-title" class="col-md-3 col-form-label">Title</label>
		                    <div class="col-md-9">
		                        <div class="btn-group btn-group-input" data-toggle="buttons">
		                            <label class="btn btn-primary active">
		                                <input type="radio" name="input-title" value="prof" id="input-title-prof" autocomplete="off" checked> Prof.
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-title" value="dr" id="input-title-dr" autocomplete="off"> Dr.
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-title" value="mr" id="input-title-mr" autocomplete="off"> Mr.
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-title" value="ms" id="input-title-ms" autocomplete="off"> Ms.
		                            </label>
		                        </div>
		                    </div>
		                </div> -->
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
					                            echo 	"<input type='radio' name='input-participant-type' value='" . $participant_type . "' autocomplete='off' checked>" . ucfirst($participant_type);  // add 'checked' for selected
												echo "</label>";
											} else {
												echo "<label class='btn btn-primary'>";
					                            echo 	"<input type='radio' name='input-participant-type' value='" . $participant_type . "' autocomplete='off'>" . ucfirst($participant_type);
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
												echo 	"<input type='radio' name='input-contribution-type' value='" . $contribution_type . "' autocomplete='off' checked>" . ucfirst($contribution_type);  // add 'checked' for selected
												echo "</label>";
											} else {
												echo "<label class='btn btn-primary'>";
												echo 	"<input type='radio' name='input-contribution-type' value='" . $contribution_type . "' autocomplete='off'>" . ucfirst($contribution_type);
												echo "</label>";
											}
										}
									?>
		                            <!-- <label class="btn btn-primary active">
		                                <input type="radio" name="input-contribution" value="presentation" autocomplete="off" checked> Presentation
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-contribution" value="poster" autocomplete="off"> Poster
		                            </label>
		                            <label class="btn btn-primary">
		                                <input type="radio" name="input-contribution" value="none" autocomplete="off"> None
		                            </label> -->
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
								<textarea class="form-control" name="input-comments" id="input-comments" rows="3"><?php
									$meta_comments = trim(get_user_meta($current_user->id, 'comments', true));
		                        	echo esc_textarea($meta_comments);
								?></textarea>
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
				<div class="tab-pane fade mt-5" id="payment" role="tabpanel">
					<p>Payment options will be avaliable when our administrator verifies and approves your account.</p>
					<p>We will inform you via email.</p>
					<div style="height: 20rem"></div>
				</div>
				<div class="tab-pane fade mt-5" id="profile" role="tabpanel">
					<form id="ajax_user_profile_form" action="<?php echo home_url('/'); ?>" method="POST">
		                <div class="form-group row">
		                    <label for="input-email" class="col-md-3 col-form-label">Email</label>
		                    <div class="col-md-9">
		                        <input class="form-control" type="email" id="input-email" value="stepanovps@gmail.com" disabled />
		                    </div>
		                </div>
						<div class="form-group row">
							<label for="first_name" class="col-md-3">First name</label>
							<div class="col-md-9">
								<input class="form-control" type="text" value="<?php echo $current_user->first_name; ?>" name="first_name" id="first_name" />
							</div>
						</div>
						<div class="form-group row">
							<label for="last_name" class="col-md-3">Last name</label>
							<div class="col-md-9">
								<input class="form-control" type="text" value="<?php echo $current_user->last_name; ?>" name="last_name" id="last_name" />
							</div>
						</div>
						<div class="form-group row">
							<label for="description" class="col-md-3">Organization</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="description" value="<?php echo $current_user->description; ?>" id="description" />
							</div>
						</div>
						<div class="form-group row mt-4">
                            <div class="col-md-9 offset-md-3">
                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <a href="#" class="btn btn-link pl-0 js--reset-password-button"><?php _e( 'Reset password', 'understrap' ); ?></a>
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

define('__ROOT__', get_template_directory());

get_footer('icpa');

?>
