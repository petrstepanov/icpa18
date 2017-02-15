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
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="header">
	<div class="container">
		<div class="row">
			<div class="col-12 relative">
				<a href="#" class="js--open-menu-button open-menu-button"><span class="icomoon-menu"></span></a>
			</div>
		</div>

		<div class="js--menu-glass-panel menu-glass-panel">
			<nav class="js--menu menu">
				<div class="section-account">
					<p class="username mt-0">
						Sergey Stepanov
					</p>
					<p class="organization">
						<i>Institute for Theoretical and Experimental Physics</i>
					</p>
					<div class="btn-toolbar mt-4 justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
						<div class="btn-group" role="group" aria-label="First group">
							<a href="#" class="btn btn-warning btn-sm">Edit Account</a>
						</div>
						<div class="btn-group" role="group" aria-label="First group">
							<a href="#" class="btn btn-link btn-sm pr-0">Log Out</a>
						</div>
					</div>
				</div>
				<ul class="list-unstyled navigation">
					<li class="mb-3">
						<a href="#">Announcement</a>
					</li>
					<li class="mb-3">
						<a href="#">News</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

	</div><!-- .wrapper-navbar end -->