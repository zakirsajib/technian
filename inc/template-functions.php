<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Technian
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function technian_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'technian_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function technian_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'technian_pingback_header' );

/**
* Loads jQuery and Javascripts in defer mode
*/
function technian_defer_scripts( $tag, $handle, $src ) {
	$defer = array(
		'jquery',
	    'technian-navigation',
	    'technian-app'
	);

	if ( in_array( $handle, $defer ) ) {
	     return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}

    return $tag;
}
add_filter( 'script_loader_tag', 'technian_defer_scripts', 10, 3 );

/**
* Loads jQuery and javascript in async mode
*/
function technian_async_scripts( $tag, $handle, $src ) {
	$async = array(
		'',
	);

	if ( in_array( $handle, $async ) ) {
	    return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
	}

    return $tag;
}
//add_filter( 'script_loader_tag', 'technian_async_scripts', 10, 3 );

/**
* Remove jQuery migrate
*/
function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];

        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}
add_action('wp_default_scripts', 'remove_jquery_migrate');


/**
 * Deregister WordPress jQuery, loaded from Google CDN
 */
function technian_jquery_from_google () {
	if (is_admin()) {
		return;
	}

	global $wp_scripts;
	if (isset($wp_scripts->registered['jquery']->ver)) {
		$ver = $wp_scripts->registered['jquery']->ver;
                $ver = str_replace("-wp", "", $ver);
	} else {
		$ver = '1.12.4';
	}

	wp_deregister_script('jquery');
	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/$ver/jquery.min.js", false, $ver);
}
add_action('init', 'technian_jquery_from_google');

/**
 * Deregister Wp block library style
 */

function technian_deregister_styles() {
	wp_deregister_style( 'wp-block-library' );
}
add_action( 'wp_print_styles','technian_deregister_styles', 100 );

/**
 * Deregister underscores js/navigation.js
 */

function technian_deregister_scripts() {
	wp_deregister_script( 'technian-navigation' );
}
add_action( 'wp_print_styles','technian_deregister_scripts', 100 );

/**
* Admin footer modification
*/
function technian_remove_footer () {
	echo '<b>' . get_bloginfo( 'name' ). '</b>';
	echo ' | ';
	echo '<em>' . get_bloginfo( 'description' ). '</em>';
}
add_filter('admin_footer_text', 'technian_remove_footer');

/**
 * Add SVG capabilities
 */
function technian_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'technian_svg_mime_type' );
/**
 * Preload the icon font files.
 */
//add_action('wp_head', 'shoptimizer_preload_icon_fonts');

	function shoptimizer_preload_icon_fonts() { ?>

	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/star.woff" as="font" type="font/woff" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/Rivolicons-Free.woff2?-uew922" as="font" type="font/woff2" crossorigin="anonymous">

<?php }


if ( ! function_exists( 'technian_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'technian' ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'technian_logo' ) ) {
	/**
	 * Technian logo
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_logo() { ?>
		<div class="styles__Logo">
			<!-- <a
				aria-label="Technian logo - click to navigate back to the home page"
				href="<?php echo esc_url( home_url( '/' ) ); ?>"
				rel="home"
			>
			<img
				class="lazyload"
				data-src="<?php echo get_template_directory_uri();?>/img/logo.svg"
				alt=""
				width="124"
				height="106"
			>
			</a> -->
			<?php the_custom_logo();?>
		</div>

	<?php
	}
}





if ( ! function_exists( 'technian_site_branding' ) ) {
	/**
	 * Technian site branding
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_site_branding() { ?>
		<button
			id="navToggle"
			aria-label="menu toggle"
			aria-haspopup="true"
			aria-expanded="false"
			aria-controls="navMenu"
			tabindex="0"
			class="header-button">
				<div class="logo">We are Technian</div>
				<svg viewBox="0 0 24 11" class="styles__Burger"><g fill="currentColor" stroke="currentColor"><path d="M0,16 L24,16 L24,17 L0,17 L0,16 Z"></path><path d="M0,0 L24,0 L24,1 L0,1 L0,0 Z"></path><path d="M0,8 L24,8 L24,9 L0,9 L0,8 Z"></path></g></svg>
		</button>
	<?php
	}
}

if ( ! function_exists( 'technian_naviation' ) ) {
	/**
	 * Technian Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_naviation() { ?>
		<nav id="site-navigation" class="main-navigation styles__Nav">
			<?php
				wp_nav_menu(
					array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					)
				);
			?>
			<div class="technian-menu-location">
				<address>
					Sales Queries<br />
					<a class="hover-color" href="tel:+97144561122">+91 41 456 1122</a><br /><br />
					HR Related Queries<br />
					<a class="hover-color" href="tel:+97144561122">+91 43 456 1122</a>
				</address>
			</div>
		</nav>
	<?php
	}
}

if ( ! function_exists( 'technian_menu_hover' ) ) {
	/**
	 * Technian Menu hover images
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_menu_hover() { ?>
		<div class="menu1">
			<img
				class="lazyload"
				data-src="<?php echo get_template_directory_uri();?>/img/menu_agency.jpg"
				alt="capabilities"
			>
		</div>
		<div class="menu2">
			<img
				class="lazyload"
				data-src="<?php echo get_template_directory_uri();?>/img/menu_work.jpg"
				alt="About us"
			>
		</div>
		<div class="menu3">
			<img
				class="lazyload"
				data-src="<?php echo get_template_directory_uri();?>/img/menu_careers.jpg"
				alt="Work"
			>
		</div>
		<div class="menu4">
			<img
			 	class="lazyload"
				data-src="<?php echo get_template_directory_uri();?>/img/menu_connect.jpg"
				alt="Resource"
			>
		</div>
		<div class="menu5">
			<img
				class="lazyload"
				data-src="<?php echo get_template_directory_uri();?>/img/menu_services.jpg"
				alt="Award"
			>
		</div>
		<div class="menu6">
			<img
				class="lazyload"
				data-src="<?php echo get_template_directory_uri();?>/img/menu_connect.jpg"
				alt="Blog"
			>
		</div>
		<div class="menu7">
			<img
				class="lazyload"
				data-src="<?php echo get_template_directory_uri();?>/img/menu_work.jpg"
				alt="Reach Us"
			>
		</div>
	<?php
	}
}


if ( ! function_exists( 'technian_footer_contact_details' ) ) {
	/**
	 * Technian Footer Contact Details
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_footer_contact_details() { ?>
		<div class="col-6">
			<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
        		<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
    		<?php else : ?>
				<h4>Contact Number</h4>
				Sales Queries<br />
				<a href="tel:+9999920599">9999920599</a><br />
				HR Related<br />
				<a href="tel:+9714450124-4013999">0124-4013999</a>
    		<?php endif; ?>
		</div>
	<?php
	}
}
if ( ! function_exists( 'technian_footer_partner_logos' ) ) {
	/**
	 * Technian Footer Partner Logos
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_footer_partner_logos() { ?>
		<div class="col-4">
			<div class="partners-logo">
				<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
	        		<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
	    		<?php else : ?>
					<img
						class="lazyload"
						data-src="<?php echo get_template_directory_uri();?>/img/Microsoft-Partner.png"
						alt="Microsoft Partner"
					>
					<img
						class="lazyload"
						data-src="<?php echo get_template_directory_uri();?>/img/google-partners.png"
						alt="Google Partner"
					>
	    		<?php endif; ?>
			</div>
		</div>
	<?php
	}
}
if ( ! function_exists( 'technian_footer_social_medias' ) ) {
	/**
	 * Technian Footer Social Medias
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_footer_social_medias() { ?>
		<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
			<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
		<?php endif; ?>
	<?php
	}
}

if ( ! function_exists( 'technian_address' ) ) {
	/**
	 * Technian Footer Address
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_address() { ?>
		<?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
			<h4>Address</h4>
			<div class="technian-details">
				<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
			</div>
		<?php else: ?>
			<h4>Address</h4>
			<div class="technian-details">
				<div class="col-4">
					Unit 549-550 5th Floor, Tower B2, Spaze<br>
					I-Tech Park, Sohana Road, Sector 49<br>
					Gurgaon, Haryana, 122018, India
				</div>
				<div class="col-4">
					E-24, Basement, Lajpat Nagar - III <br>
					Delhi, Delhi, 110024, India
				</div>
				<div class="col-4">
					G4, Sector 3, Noida, Uttar Pradesh<br>
					201301, India
				</div>
			</div>
		<?php endif; ?>
	<?php
	}
}

if ( ! function_exists( 'technian_footer_menu_one' ) ) {
	/**
	 * Technian Footer Menu One
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_footer_menu_one() {?>
		<?php if ( is_active_sidebar( 'footer-sidebar-5' ) ) :
			dynamic_sidebar( 'footer-sidebar-5' );
		else:
			wp_nav_menu(
				array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'footer-menu-1',
				)
			);
		endif;
	}
}

if ( ! function_exists( 'technian_footer_menu_two' ) ) {
	/**
	 * Technian Footer Menu Two
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function technian_footer_menu_two() {
		if ( is_active_sidebar( 'footer-sidebar-6' ) ) :
			dynamic_sidebar( 'footer-sidebar-6' );
		else:
			wp_nav_menu(
				array(
				'theme_location' => 'menu-3',
				'menu_id'        => 'footer-menu-2',
				)
			);
		endif;
	}
}
