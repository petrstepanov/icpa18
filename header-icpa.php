<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="header">
	<div class="container">
		<div class="row">
			<div class="col-12 relative">
				<a href="#" class="js--open-menu-button open-menu-button"><span class="icon-menu"></span></a>
			</div>
		</div>

		<div class="js--menu-glass-panel menu-glass-panel">
			<nav class="js--menu menu">
				<div class="scroll-panel">
					<?php if (!is_user_logged_in()){ ?>
						<div class="section-account">
							<div class="btn-toolbar mt-0 justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
								<div class="btn-group" role="group" aria-label="First group">
									<a href="#" class="btn btn-warning btn-sm js--menu-register-button">Register for ICPA-18</a>
								</div>
								<div class="btn-group" role="group" aria-label="Second group">
									<a href="#" class="btn btn-link btn-sm pr-0 js--menu-login-button">Login</a>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<?php $current_user = wp_get_current_user(); ?>
						<div class="section-account">
							<p class="username mt-0 js--display-name">
								<?php echo $current_user->display_name; ?>
							</p>
							<p class="organization js--organization">
								<i><?php echo $current_user->description; ?></i>
							</p>
							<div class="btn-toolbar mt-4 justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
								<div class="btn-group" role="group" aria-label="First group">
									<a href="<?php echo home_url('/account'); ?>" class="btn btn-warning btn-sm">Edit Account</a>
								</div>
								<div class="btn-group" role="group" aria-label="First group">
									<a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn btn-link btn-sm pr-0">Log Out</a>
								</div>
							</div>
						</div>
						<div class="section-danger">
							<p class="mb-0"><i>Account waiting for administrator approval.Payment information will be avalioable after account is confirmed.</i></p>
						</div>
						<!-- <div class="section-success">
							<p class="mb-0"><i>Your account is confirmed. Payment options are reflected in your User Account.</i></p>
						</div> -->
					<?php } ?>
					<ul class="section-navigation list-unstyled">
						<li class="my-4">
							<a href="<?php echo home_url('/'); ?>">Announcement</a>
						</li>
						<li class="my-4">
							<a href="#">News</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

	</div><!-- .wrapper-navbar end -->
