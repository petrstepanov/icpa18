<!-- New Password Modal -->
<div class="modal fade" id="new-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><?php _e( 'Set New Password', 'understrap' ); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form id="ajax_new_password_form" action="<?php echo home_url( '/' ); // https://developer.wordpress.org/reference/functions/site_url/ ?>" method="POST">
        <div class="form-group row">
          <label for="old-password" class="col-12 col-md-4 col-form-label"><?php _e( 'Current password', 'understrap' ); ?></label>
          <div class="col-12 col-lg-8">
            <input class="form-control" type="password" name="old-password" id="old-password">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-12 col-md-4 col-form-label"><?php _e( 'New password', 'understrap' ); ?></label>
          <div class="col-12 col-lg-8">
            <input class="form-control" type="password" name="password" id="password">
            <p class="form-text text-muted">
              Your password must be at least 8 characters long.
            </p>
          </div>
        </div>
        <div class="form-group row">
          <label for="password2" class="col-12 col-md-4 col-form-label"><?php _e( 'Repeat new password', 'understrap' ); ?></label>
          <div class="col-12 col-lg-8">
            <input class="form-control" type="password" name="password2" id="password2">
          </div>
        </div>
        <div class="form-group row mt-4 mb-3">
          <div class="col-12 col-md-8 offset-md-4 text-right">
            <input type="submit" class="btn btn-warning" value="<?php _e( 'Set new password', 'understrap' ); ?>">
          </div>
        </div>
        <!-- BEGIN: Hidden Wordpress fields to correctly handle AJAX request -->
        <?php wp_nonce_field('ajax-new-password-nonce', 'new-password-security' ); // https://codex.wordpress.org/Function_Reference/wp_nonce_field ?>
        <input type="hidden" name="action" value="new_password_user"/>
        <!-- END: Hidden Wordpress fields to correctly handle AJAX request -->
      </form>
    </div>
    </div>
  </div>
</div>
