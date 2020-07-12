<?php
/**
 * Technian hooks
 *
 * @package technian
 */


/**
 * General Accessibility
 *
 * @see  technian_skip_links()
 */
add_action( 'technian_before_site', 'technian_skip_links', 0 );

/**
 * Header
 *
 * @see  technian_logo()
 * @see  technian_site_branding()
 * @see  technian_naviation()
 */
add_action( 'technian_header', 'technian_logo', 10 );
add_action( 'technian_header', 'technian_site_branding', 20 );
add_action( 'technian_header', 'technian_naviation', 30 );

/**
 * Header
 *
 * @see  technian_menu_hover()
 */
add_action( 'technian_menu', 'technian_menu_hover', 32 );

/**
* Footer
*
* @see  technian_footer_contact_details()
* @see  technian_footer_partner_logos()
* @see  technian_footer_social_medias()
*/
add_action( 'technian_footer_contact', 'technian_footer_contact_details', 10 );
add_action( 'technian_footer_contact', 'technian_footer_partner_logos', 20 );
add_action( 'technian_footer_contact', 'technian_footer_social_medias', 30 );

/**
* Footer
*
* @see  technian_address()
*/
add_action( 'technian_footer_address', 'technian_address', 32 );
/**
* Footer
*
* @see  technian_footer_menu_one()
* @see  technian_footer_menu_two()
*/
add_action( 'technian_footer_menu', 'technian_footer_menu_one', 34 );
add_action( 'technian_footer_menu', 'technian_footer_menu_two', 36 );
