<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Ajax log in.
 */
require get_template_directory() . '/inc/ajax-login.php';

/**
 * Ajax register.
 */
require get_template_directory() . '/inc/ajax-register.php';

/**
 * Ajax user contribution fields.
 */
require get_template_directory() . '/inc/ajax-user-account-contribution.php';

/**
 * Ajax user payment form.
 */
require get_template_directory() . '/inc/ajax-user-account-payment.php';

/**
 * Ajax user receipt remove form.
 */
require get_template_directory() . '/inc/ajax-user-account-remove.php';

/**
 * Ajax user receipt upload form.
 */
require get_template_directory() . '/inc/ajax-user-account-upload.php';

/**
 * Ajax user profile fields.
 */
require get_template_directory() . '/inc/ajax-user-account-profile.php';

/**
 * Ajax new password.
 */
require get_template_directory() . '/inc/ajax-user-account-new-password.php';

/**
 * Ajax forgot password.
 */
require get_template_directory() . '/inc/ajax-forgot-password.php';

/**
 * Change email encoding.
 */
require get_template_directory() . '/inc/email.php';

/**
 * Change email encoding.
 */
require get_template_directory() . '/inc/admin-validate-user.php';

/**
 * Payment classes.
 */
require get_template_directory() . '/inc/classes/amenity.php';
require get_template_directory() . '/inc/classes/amenities-list.php';
require get_template_directory() . '/inc/classes/payment-calculator.php';
require get_template_directory() . '/inc/classes/user-storage.php';

/**
 * ChromePHP https://github.com/ccampbell/chromephp
 */
// require get_template_directory() . '/inc/chrome-php.php';
