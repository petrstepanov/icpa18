<!-- Log In Modal -->
<?php // if (!is_user_logged_in()){ // https://developer.wordpress.org/reference/functions/is_user_logged_in/ ?>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><?php _e( 'Log In to Your Account', 'understrap' ); ?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if (get_option('users_can_register')){ // https://developer.wordpress.org/reference/functions/get_option/#more-information ?>
                        <form id="ajax_login_form" action="<?php echo home_url( '/' ); // https://developer.wordpress.org/reference/functions/site_url/ ?>" method="POST">
                            <div class="form-group row">
                                <label for="input-email" class="col-12 col-lg-3 col-form-label"><?php _e( 'Username or email', 'understrap' ); ?></label>
                                <div class="col-12 col-lg-9">
                                    <input class="form-control" type="text" name="user_login" id="user_login">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-password" class="col-12 col-lg-3 col-form-label"><?php _e( 'Password', 'understrap' ); ?></label>
                                <div class="col-12 col-lg-9">
                                    <input class="form-control" type="password" name="user_password" id="user_password">
                                </div>
                            </div>
                            <div class="form-group row mt-4 mb-3">
                                <div class="col-12 col-lg-9 offset-lg-3">
                                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <a href="#" class="btn btn-link pl-0 js--forgot-password-button"><?php _e( 'Forgot password?', 'understrap' ); ?></a>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <input type="submit" class="btn btn-warning" value="<?php _e( 'Log in', 'understrap' ); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- BEGIN: Hidden Wordpress fields to correctly handle AJAX request -->
                            <?php wp_nonce_field('ajax-login-nonce', 'login-security' ); // https://codex.wordpress.org/Function_Reference/wp_nonce_field?>
                            <input type="hidden" name="action" value="login_user"/>
                            <!-- END: Hidden Wordpress fields to correctly handle AJAX request -->
                        </form>
                    <?php } else { ?>
                        <p>Registration for ICPA-18 is closed</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php // } ?>
