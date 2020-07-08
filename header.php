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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'technian' ); ?></a>

	<header id="masthead" class="site-header">
		<button
			id="navToggle"
			aria-label="menu toggle"
			aria-haspopup="true"
			aria-expanded="false"
			aria-controls="navMenu"
			tabindex="0"
			class="header-button">
				<div class="logo">Technian</div>
				<svg viewBox="0 0 24 11" class="styles__Burger"><g fill="currentColor" stroke="currentColor"><path d="M0,16 L24,16 L24,17 L0,17 L0,16 Z"></path><path d="M0,0 L24,0 L24,1 L0,1 L0,0 Z"></path><path d="M0,8 L24,8 L24,9 L0,9 L0,8 Z"></path></g></svg>
		</button>

		<nav id="site-navigation" class="main-navigation styles__Nav">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div class="contents">
