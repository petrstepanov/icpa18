<!-- Registration Modal -->
<?php if (!is_user_logged_in()){ // https://developer.wordpress.org/reference/functions/is_user_logged_in/ ?>

    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">ICPA-18 Registration Form</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if (get_option('users_can_register')){ // https://developer.wordpress.org/reference/functions/get_option/#more-information ?>
                        <form id="ajax_register_form" action="<?php echo home_url( '/' ); // https://developer.wordpress.org/reference/functions/site_url/ ?>" method="POST">
                            <div class="form-group row">
                                <label for="email" class="col-12 col-lg-3 col-form-label">Email</label>
                                <div class="col-12 col-lg-9">
                                    <input class="form-control" type="email" name="email" id="email" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="first_name" class="col-12 col-lg-3 col-form-label">First name</label>
                                <div class="col-12 col-lg-9">
                                    <input class="form-control" type="text" name="first_name" id="first_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-12 col-lg-3 col-form-label">Last name</label>
                                <div class="col-12 col-lg-9">
                                    <input class="form-control" type="text" name="last_name" id="last_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-12 col-lg-3 col-form-label">Organization</label>
                                <div class="col-12 col-lg-9">
                                    <input class="form-control" type="text" name="description" id="description" />
                                </div>
                            </div>
                            <div class="form-group row mt-4 mb-3">
                                <div class="col-12 col-lg-9 offset-lg-3 text-right">
                                    <input type="submit" class="btn btn-warning" value="<?php _e( 'Register for ICPA-18', 'understrap' ); ?>">
                                </div>
                            </div>
                            <!-- BEGIN: Hidden Wordpress fields to correctly handle AJAX request -->
                            <?php wp_nonce_field('ajax-register-nonce', 'register-security' ); // https://codex.wordpress.org/Function_Reference/wp_nonce_field ?>
                            <input type="hidden" name="action" value="register_user"/>
                            <!-- END: Hidden Wordpress fields to correctly handle AJAX request -->
                        </form>
                    <?php } else { ?>
                        <p>Registration for ICPA-18 is closed</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
