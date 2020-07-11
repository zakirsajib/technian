<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Technian
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<?php do_action( 'technian_before_site' ); ?>

	<header id="masthead" class="site-header">

		<?php
		/**
		 * Functions hooked into technian_header action
		 *
		 * @hooked technian_logo                    - 10
		 * @hooked technian_site_branding           - 20
		 * @hooked technian_naviation               - 30
		 */

		do_action( 'technian_header' ); ?>

	</header><!-- #masthead -->

	<div class="menu-expand">

		<?php
		/**
		 * Functions hooked into technian menu hover action
		 *
		 * @hooked technian_menu_hover               - 32
		 */
		do_action( 'technian_menu' ); ?>

	</div>

	<div class="contents">
