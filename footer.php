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
						<?php do_action('technian_footer_contact');?>
					</div>
					<div class="col-7">
						<?php do_action('technian_footer_address');?>
						<?php do_action('technian_footer_menu');?>
					</div>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div> <!-- .contents -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
