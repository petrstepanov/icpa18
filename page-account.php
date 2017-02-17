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

<div class="container-wrapper container-wrapper-primary-darker">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="display-1 display-responsive">
					<?php echo $current_user->display_name; ?>
				</h1>
				<p class="organization">
					<i><?php echo $current_user->description; ?></i>
				</p>
			</col>
		</div>
	</div>
</div>

<?php

define('__ROOT__', get_template_directory());

get_footer('icpa');

?>
