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
						<div class="col-6">
							<h4>Contact Number</h4>
							Sales Queries<br />
							<a href="tel:+9999920599">9999920599</a><br />
							HR Related<br />
							<a href="tel:+9714450124-4013999">0124-4013999</a>
						</div>
						<div class="col-4">
							<div class="partners-logo">
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
							</div>
						</div>
						<h4>Social Links</h4>
					</div>
					<div class="col-7">
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
						<h3>Quick Links</h3>
						<?php
							wp_nav_menu(
								array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'footer-menu-1',
								)
							);
						?>
						<?php
							wp_nav_menu(
								array(
								'theme_location' => 'menu-3',
								'menu_id'        => 'footer-menu-2',
								)
							);
						?>
					</div>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div> <!-- .contents -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
