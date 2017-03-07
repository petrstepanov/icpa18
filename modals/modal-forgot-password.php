<!-- Forgot Password Modal -->
<div class="modal fade" id="forgot-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Forgot Your Password?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form id="ajax_forgot_password_form" action="<?php echo home_url( '/' ); // https://developer.wordpress.org/reference/functions/site_url/ ?>" method="POST">
        <div class="form-group row">
          <label for="input-email" class="col-12 col-lg-3 col-form-label">Email</label>
          <div class="col-12 col-lg-9">
            <input class="form-control" type="email" name="user_login" id="user_login">
          </div>
        </div>
        <div class="form-group row mt-4 mb-3">
          <div class="col-12 col-lg-9 offset-lg-3 text-right">
            <input type="submit" class="btn btn-warning" value="<?php _e( 'Get new password', 'understrap' ); ?>">
          </div>
        </div>
        <!-- BEGIN: Hidden Wordpress fields to correctly handle AJAX request -->
        <?php wp_nonce_field('ajax-forgot-password-nonce', 'forgot-password-security' ); // https://codex.wordpress.org/Function_Reference/wp_nonce_field ?>
        <input type="hidden" name="action" value="forgot_password_user"/>
        <!-- END: Hidden Wordpress fields to correctly handle AJAX request -->
      </form>
    </div>
    </div>
  </div>
</div>
