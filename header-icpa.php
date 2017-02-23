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

<svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="checkbox-checked-disabled" viewBox="0 0 32 32">
<title>checkbox-checked-disabled</title>
<path fill="#778da9" style="fill: var(--color1, #778da9)" d="M16 0c-8.832 0-16 7.168-16 16s7.168 16 16 16 16-7.168 16-16-7.168-16-16-16z"></path>
<path fill="#fff" style="fill: var(--color2, #fff)" d="M23.552 12.672l-8.448 8.576c-0.384 0.384-0.768 0.512-1.152 0.512s-0.896-0.128-1.152-0.512l-4.224-4.352c-0.64-0.64-0.64-1.792 0-2.432s1.664-0.64 2.432 0l3.072 3.072 7.040-7.296c0.64-0.64 1.664-0.64 2.432 0 0.64 0.64 0.64 1.664 0 2.432z"></path>
</symbol>
<symbol id="money-transfer" viewBox="0 0 32 32">
<title>money-transfer</title>
<path fill="#eff0ee" style="fill: var(--color3, #eff0ee)" d="M32 16c0 8.837-7.163 16-16 16s-16-7.163-16-16c0-8.837 7.163-16 16-16s16 7.163 16 16z"></path>
<path fill="#fff" style="fill: var(--color2, #fff)" d="M23.543 12.709h-2.56l3.52-3.52c0.183-0.183 0.274-0.411 0.274-0.686s-0.091-0.503-0.274-0.686l-0.366-0.366c-0.366-0.366-0.96-0.366-1.326 0l-5.257 5.257h-9.143c-0.64 0-1.143 0.503-1.143 1.143v6.994c0 0.64 0.503 1.143 1.143 1.143h15.131c0.64 0 1.143-0.503 1.143-1.143v-6.994c0-0.64-0.503-1.143-1.143-1.143z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M23.543 12.709h-2.56l3.52-3.52c0.183-0.183 0.274-0.411 0.274-0.686s-0.091-0.503-0.274-0.686l-0.366-0.366c-0.366-0.366-0.96-0.366-1.326 0l-5.257 5.257h-9.143c-0.64 0-1.143 0.503-1.143 1.143v6.994c0 0.64 0.503 1.143 1.143 1.143h15.131c0.64 0 1.143-0.503 1.143-1.143v-6.994c0-0.64-0.503-1.143-1.143-1.143zM23.269 8c0.091-0.091 0.274-0.091 0.366 0l0.366 0.366c0.046 0.046 0.091 0.091 0.091 0.183s-0.046 0.137-0.091 0.183l-0.869 0.869-0.731-0.731 0.869-0.869zM21.897 9.371l0.731 0.731-6.949 6.949-1.097 0.366 0.366-1.097 6.949-6.949zM23.954 20.8c0 0.229-0.183 0.411-0.411 0.411h-15.086c-0.229 0-0.411-0.183-0.411-0.411v-6.949c0-0.229 0.183-0.411 0.411-0.411h8.411l-2.469 2.469c-0.046 0.046-0.046 0.091-0.091 0.137l-0.594 1.829c-0.046 0.137 0 0.274 0.091 0.366 0.046 0.046 0.137 0.091 0.229 0.091 0.046 0 0.091 0 0.091 0l1.829-0.594c0.046 0 0.091-0.046 0.137-0.091l4.206-4.206h3.246c0.229 0 0.411 0.183 0.411 0.411v6.949z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M22.629 19.794h-0.229c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h0.229c0.183 0 0.366-0.137 0.366-0.366-0.046-0.229-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M21.029 19.794h-7.863c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h7.863c0.183 0 0.366-0.137 0.366-0.366s-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M22.629 17.783h-5.166c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h5.166c0.183 0 0.366-0.137 0.366-0.366-0.046-0.229-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M10.971 16.686v-1.28c0.457 0.046 0.594 0.229 0.777 0.229s0.274-0.229 0.274-0.366c0-0.32-0.594-0.457-1.051-0.457v-0.183c0-0.091-0.091-0.137-0.183-0.137s-0.183 0.091-0.183 0.137v0.183c-0.594 0.046-1.189 0.366-1.189 1.189s0.64 1.051 1.189 1.234v1.463c-0.64-0.046-0.823-0.503-1.006-0.503-0.137 0-0.274 0.229-0.274 0.366 0 0.32 0.549 0.731 1.326 0.731v0.183c0 0.091 0.091 0.137 0.183 0.137s0.183-0.091 0.183-0.137v-0.229c0.686-0.091 1.143-0.503 1.143-1.28-0.046-0.823-0.64-1.097-1.189-1.28zM10.651 16.549c-0.32-0.137-0.594-0.274-0.594-0.64 0-0.32 0.274-0.503 0.594-0.549 0 0.046 0 1.189 0 1.189zM10.926 18.697v-1.326c0.32 0.137 0.549 0.32 0.549 0.686s-0.229 0.594-0.549 0.64z"></path>
</symbol>
<symbol id="money-transfer-selected" viewBox="0 0 32 32">
<title>money-transfer-selected</title>
<path fill="#67ead0" style="fill: var(--color5, #67ead0)" d="M32 16c0 8.837-7.163 16-16 16s-16-7.163-16-16c0-8.837 7.163-16 16-16s16 7.163 16 16z"></path>
<path fill="#fff" style="fill: var(--color2, #fff)" d="M23.543 12.709h-2.56l3.52-3.52c0.183-0.183 0.274-0.411 0.274-0.686s-0.091-0.503-0.274-0.686l-0.366-0.366c-0.366-0.366-0.96-0.366-1.326 0l-5.257 5.257h-9.143c-0.64 0-1.143 0.503-1.143 1.143v6.994c0 0.64 0.503 1.143 1.143 1.143h15.131c0.64 0 1.143-0.503 1.143-1.143v-6.994c0-0.64-0.503-1.143-1.143-1.143z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M23.543 12.709h-2.56l3.52-3.52c0.183-0.183 0.274-0.411 0.274-0.686s-0.091-0.503-0.274-0.686l-0.366-0.366c-0.366-0.366-0.96-0.366-1.326 0l-5.257 5.257h-9.143c-0.64 0-1.143 0.503-1.143 1.143v6.994c0 0.64 0.503 1.143 1.143 1.143h15.131c0.64 0 1.143-0.503 1.143-1.143v-6.994c0-0.64-0.503-1.143-1.143-1.143zM23.269 8c0.091-0.091 0.274-0.091 0.366 0l0.366 0.366c0.046 0.046 0.091 0.091 0.091 0.183s-0.046 0.137-0.091 0.183l-0.869 0.869-0.731-0.731 0.869-0.869zM21.897 9.371l0.731 0.731-6.949 6.949-1.097 0.366 0.366-1.097 6.949-6.949zM23.954 20.8c0 0.229-0.183 0.411-0.411 0.411h-15.086c-0.229 0-0.411-0.183-0.411-0.411v-6.949c0-0.229 0.183-0.411 0.411-0.411h8.411l-2.469 2.469c-0.046 0.046-0.046 0.091-0.091 0.137l-0.594 1.829c-0.046 0.137 0 0.274 0.091 0.366 0.046 0.046 0.137 0.091 0.229 0.091 0.046 0 0.091 0 0.091 0l1.829-0.594c0.046 0 0.091-0.046 0.137-0.091l4.206-4.206h3.246c0.229 0 0.411 0.183 0.411 0.411v6.949z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M22.629 19.794h-0.229c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h0.229c0.183 0 0.366-0.137 0.366-0.366-0.046-0.229-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M21.029 19.794h-7.863c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h7.863c0.183 0 0.366-0.137 0.366-0.366s-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M22.629 17.783h-5.166c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h5.166c0.183 0 0.366-0.137 0.366-0.366-0.046-0.229-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M10.971 16.686v-1.28c0.457 0.046 0.594 0.229 0.777 0.229s0.274-0.229 0.274-0.366c0-0.32-0.594-0.457-1.051-0.457v-0.183c0-0.091-0.091-0.137-0.183-0.137s-0.183 0.091-0.183 0.137v0.183c-0.594 0.046-1.189 0.366-1.189 1.189s0.64 1.051 1.189 1.234v1.463c-0.64-0.046-0.823-0.503-1.006-0.503-0.137 0-0.274 0.229-0.274 0.366 0 0.32 0.549 0.731 1.326 0.731v0.183c0 0.091 0.091 0.137 0.183 0.137s0.183-0.091 0.183-0.137v-0.229c0.686-0.091 1.143-0.503 1.143-1.28-0.046-0.823-0.64-1.097-1.189-1.28zM10.651 16.549c-0.32-0.137-0.594-0.274-0.594-0.64 0-0.32 0.274-0.503 0.594-0.549 0 0.046 0 1.189 0 1.189zM10.926 18.697v-1.326c0.32 0.137 0.549 0.32 0.549 0.686s-0.229 0.594-0.549 0.64z"></path>
</symbol>
<symbol id="credit-card-selected" viewBox="0 0 32 32">
<title>credit-card-selected</title>
<path fill="#67ead0" style="fill: var(--color5, #67ead0)" d="M32 16c0 8.837-7.163 16-16 16s-16-7.163-16-16c0-8.837 7.163-16 16-16s16 7.163 16 16z"></path>
<path fill="#fff" style="fill: var(--color2, #fff)" d="M23.817 14.354h-2.88v-3.429c0-0.457-0.411-0.869-0.869-0.869h-11.886c-0.457 0-0.869 0.366-0.869 0.869v6.766c0 0.457 0.411 0.869 0.869 0.869h2.88v3.429c0 0.457 0.411 0.869 0.869 0.869h11.886c0.457 0 0.869-0.366 0.869-0.869v-6.766c0-0.457-0.411-0.869-0.869-0.869z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M23.817 14.354h-2.88v-3.429c0-0.457-0.411-0.869-0.869-0.869h-11.886c-0.457 0-0.869 0.366-0.869 0.869v6.766c0 0.457 0.411 0.869 0.869 0.869h2.88v3.429c0 0.457 0.411 0.869 0.869 0.869h11.886c0.457 0 0.869-0.366 0.869-0.869v-6.766c0-0.457-0.411-0.869-0.869-0.869zM8.183 17.874c-0.091 0-0.183-0.091-0.183-0.183v-6.766c0-0.091 0.091-0.183 0.183-0.183h11.886c0.091 0 0.183 0.091 0.183 0.183v6.766c0 0.091-0.091 0.183-0.183 0.183h-11.886zM24 21.989c0 0.091-0.091 0.183-0.183 0.183h-11.886c-0.091 0-0.183-0.091-0.183-0.183v-0.457h12.251v0.457zM24 20.846h-12.251v-1.051h12.251v1.051zM24 19.154h-12.251v-0.594h8.366c0.457 0 0.869-0.366 0.869-0.869v-2.651h2.88c0.091 0 0.183 0.091 0.183 0.183v3.931z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M18.286 11.429c-0.366 0-0.686 0.137-0.914 0.411-0.229-0.274-0.549-0.411-0.914-0.411-0.686 0-1.28 0.549-1.28 1.234s0.549 1.234 1.28 1.234c0.366 0 0.686-0.137 0.914-0.411 0.229 0.274 0.549 0.411 0.914 0.411 0.686 0 1.28-0.549 1.28-1.234-0.046-0.686-0.594-1.234-1.28-1.234zM16.411 13.257c-0.32 0-0.549-0.274-0.549-0.549 0-0.32 0.274-0.549 0.549-0.549 0.32 0 0.549 0.274 0.549 0.549s-0.229 0.549-0.549 0.549zM18.286 13.257c-0.32 0-0.549-0.274-0.549-0.549 0-0.32 0.274-0.549 0.549-0.549 0.32 0 0.549 0.274 0.549 0.549s-0.274 0.549-0.549 0.549z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M10.743 15.817h-1.691c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h1.691c0.183 0 0.366-0.137 0.366-0.366s-0.137-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M13.577 15.817h-1.691c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h1.691c0.183 0 0.366-0.137 0.366-0.366s-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M16.411 15.817h-1.691c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h1.691c0.183 0 0.366-0.137 0.366-0.366-0.046-0.229-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M19.2 15.817h-1.691c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h1.691c0.183 0 0.366-0.137 0.366-0.366s-0.137-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M10.24 11.566h-0.731c-0.366 0-0.686 0.32-0.686 0.686v0.731c0 0.366 0.32 0.686 0.686 0.686h0.731c0.366 0 0.686-0.32 0.686-0.686v-0.731c0-0.366-0.274-0.686-0.686-0.686zM10.24 12.983c0 0 0 0 0 0h-0.731v-0.731h0.731v0.731z"></path>
</symbol>
<symbol id="credit-card" viewBox="0 0 32 32">
<title>credit-card</title>
<path fill="#eff0ee" style="fill: var(--color3, #eff0ee)" d="M32 16c0 8.837-7.163 16-16 16s-16-7.163-16-16c0-8.837 7.163-16 16-16s16 7.163 16 16z"></path>
<path fill="#fff" style="fill: var(--color2, #fff)" d="M23.817 14.354h-2.88v-3.429c0-0.457-0.411-0.869-0.869-0.869h-11.886c-0.457 0-0.869 0.366-0.869 0.869v6.766c0 0.457 0.411 0.869 0.869 0.869h2.88v3.429c0 0.457 0.411 0.869 0.869 0.869h11.886c0.457 0 0.869-0.366 0.869-0.869v-6.766c0-0.457-0.411-0.869-0.869-0.869z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M23.817 14.354h-2.88v-3.429c0-0.457-0.411-0.869-0.869-0.869h-11.886c-0.457 0-0.869 0.366-0.869 0.869v6.766c0 0.457 0.411 0.869 0.869 0.869h2.88v3.429c0 0.457 0.411 0.869 0.869 0.869h11.886c0.457 0 0.869-0.366 0.869-0.869v-6.766c0-0.457-0.411-0.869-0.869-0.869zM8.183 17.874c-0.091 0-0.183-0.091-0.183-0.183v-6.766c0-0.091 0.091-0.183 0.183-0.183h11.886c0.091 0 0.183 0.091 0.183 0.183v6.766c0 0.091-0.091 0.183-0.183 0.183h-11.886zM24 21.989c0 0.091-0.091 0.183-0.183 0.183h-11.886c-0.091 0-0.183-0.091-0.183-0.183v-0.457h12.251v0.457zM24 20.846h-12.251v-1.051h12.251v1.051zM24 19.154h-12.251v-0.594h8.366c0.457 0 0.869-0.366 0.869-0.869v-2.651h2.88c0.091 0 0.183 0.091 0.183 0.183v3.931z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M18.286 11.429c-0.366 0-0.686 0.137-0.914 0.411-0.229-0.274-0.549-0.411-0.914-0.411-0.686 0-1.28 0.549-1.28 1.234s0.549 1.234 1.28 1.234c0.366 0 0.686-0.137 0.914-0.411 0.229 0.274 0.549 0.411 0.914 0.411 0.686 0 1.28-0.549 1.28-1.234-0.046-0.686-0.594-1.234-1.28-1.234zM16.411 13.257c-0.32 0-0.549-0.274-0.549-0.549 0-0.32 0.274-0.549 0.549-0.549 0.32 0 0.549 0.274 0.549 0.549s-0.229 0.549-0.549 0.549zM18.286 13.257c-0.32 0-0.549-0.274-0.549-0.549 0-0.32 0.274-0.549 0.549-0.549 0.32 0 0.549 0.274 0.549 0.549s-0.274 0.549-0.549 0.549z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M10.743 15.817h-1.691c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h1.691c0.183 0 0.366-0.137 0.366-0.366s-0.137-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M13.577 15.817h-1.691c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h1.691c0.183 0 0.366-0.137 0.366-0.366s-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M16.411 15.817h-1.691c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h1.691c0.183 0 0.366-0.137 0.366-0.366-0.046-0.229-0.183-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M19.2 15.817h-1.691c-0.183 0-0.366 0.137-0.366 0.366 0 0.183 0.137 0.366 0.366 0.366h1.691c0.183 0 0.366-0.137 0.366-0.366s-0.137-0.366-0.366-0.366z"></path>
<path fill="#415a77" style="fill: var(--color4, #415a77)" d="M10.24 11.566h-0.731c-0.366 0-0.686 0.32-0.686 0.686v0.731c0 0.366 0.32 0.686 0.686 0.686h0.731c0.366 0 0.686-0.32 0.686-0.686v-0.731c0-0.366-0.274-0.686-0.686-0.686zM10.24 12.983c0 0 0 0 0 0h-0.731v-0.731h0.731v0.731z"></path>
</symbol>
<symbol id="checkbox" viewBox="0 0 32 32">
<title>checkbox</title>
<path fill="#eff0ee" style="fill: var(--color3, #eff0ee)" d="M16 0c-8.832 0-16 7.168-16 16s7.168 16 16 16c8.832 0 16-7.168 16-16s-7.168-16-16-16z"></path>
</symbol>
<symbol id="checkbox-checked" viewBox="0 0 32 32">
<title>checkbox-checked</title>
<path fill="#67ead0" style="fill: var(--color5, #67ead0)" d="M16 0c-8.832 0-16 7.168-16 16s7.168 16 16 16c8.832 0 16-7.168 16-16s-7.168-16-16-16zM23.552 13.952l-8.448 8.576c-0.384 0.384-0.768 0.512-1.152 0.512s-0.896-0.128-1.152-0.512l-4.224-4.352c-0.64-0.64-0.64-1.792 0-2.432s1.664-0.64 2.432 0l3.072 3.072 7.040-7.296c0.64-0.64 1.664-0.64 2.432 0 0.64 0.64 0.64 1.664 0 2.432z"></path>
</symbol>
<symbol id="info" viewBox="0 0 32 32">
<title>info</title>
<path d="M16 0c-8.832 0-16 7.168-16 16s7.168 16 16 16 16-7.168 16-16c0-8.832-7.168-16-16-16zM15.36 10.112c0.128-0.256 0.384-0.512 0.64-0.64s0.512-0.256 0.896-0.256c0.384 0 0.768 0.128 1.024 0.384s0.384 0.64 0.384 1.024c0 0.256-0.128 0.64-0.256 0.896s-0.384 0.512-0.64 0.64c-0.256 0.128-0.512 0.256-0.768 0.256s-0.512-0.128-0.768-0.256c-0.256-0.128-0.384-0.256-0.512-0.512s-0.256-0.512-0.256-0.768c0-0.256 0.128-0.512 0.256-0.768zM15.872 23.040c-0.512 0-0.896-0.128-1.152-0.256s-0.512-0.384-0.768-0.64c-0.128-0.256-0.256-0.64-0.256-0.896 0-0.128 0-0.256 0-0.512 0-0.384 0.128-0.512 0.128-0.768l0.768-3.2h-1.792l0.384-1.792c1.408-0.128 2.688-0.768 3.84-0.768h0.896l-1.28 5.888c-0.128 0.384-0.128 0.64-0.128 0.768s0 0.128 0.128 0.256c0 0 0.128 0.128 0.256 0.128 0.256 0 0.64-0.256 1.024-0.64l0.896 1.152c-0.896 0.896-1.92 1.28-2.944 1.28z"></path>
</symbol>
<symbol id="menu" viewBox="0 0 32 32">
<title>menu</title>
<path d="M22.656 14.336h-21.12c-0.896 0-1.536 0.768-1.536 1.664s0.768 1.664 1.536 1.664h21.12c0.896 0 1.536-0.768 1.536-1.664 0.128-0.896-0.64-1.664-1.536-1.664z"></path>
<path d="M1.536 7.808h28.8c0.896 0 1.536-0.768 1.536-1.664s-0.768-1.664-1.536-1.664h-28.8c-0.768 0-1.536 0.768-1.536 1.664s0.768 1.664 1.536 1.664z"></path>
<path d="M30.336 24.192h-28.8c-0.896 0-1.536 0.768-1.536 1.664s0.768 1.664 1.536 1.664h28.8c0.896 0 1.536-0.768 1.536-1.664 0.128-0.896-0.64-1.664-1.536-1.664z"></path>
</symbol>
</defs>
</svg>

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
                  <a href="<?php echo home_url('/account'); ?>" class="btn btn-warning btn-sm">Open Account</a>
                </div>
                <div class="btn-group" role="group" aria-label="First group">
                  <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn btn-link btn-sm pr-0">Log Out</a>
                </div>
              </div>
            </div>
            <?php require get_template_directory() . "/inc/user-account-status.php"; ?>
            <!-- <div class="section-status <?php echo $status_classname; ?>">
              <p class="mb-0"><i><?php echo $status_message; ?></i></p>
            </div> -->
          <?php } ?>
          <ul class="section-navigation list-unstyled">
            <li class="my-4">
              <a href="<?php echo home_url('/'); ?>">Announcement</a>
            </li>
            <li class="my-4">
              <a href="#">Registration fees</a>
            </li>
            <!-- <li class="my-4">
              <a href="#">Accomodation</a>
            </li>
            <li class="my-4">
              <a href="#">Conference program</a>
            </li> -->
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
