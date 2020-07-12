<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Technian
 */

?>

		<footer id="colophon" class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-4">
						<?php
						/**
						 * Functions hooked into technian_footer_contact action
						 *
						 * @hooked technian_footer_contact_details         - 10
						 * @hooked technian_footer_partner_logos           - 20
						 * @hooked technian_footer_social_medias           - 30
						 */
						do_action('technian_footer_contact');?>
					</div>
					<div class="col-7">
						<?php
						/**
						 * Functions hooked into technian_address action
						 *
						 * @hooked technian_address                    - 32
						 */
						do_action('technian_footer_address');?>
						<?php
						/**
						 * Functions hooked into technian_footer_menu action
						 *
						 * @hooked technian_footer_menu_one           - 34
						 * @hooked technian_footer_menu_two           - 36
						 */
						do_action('technian_footer_menu');?>
					</div>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div> <!-- .contents -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
