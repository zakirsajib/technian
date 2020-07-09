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
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'technian' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'technian' ), 'WordPress' );
					?>
				</a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div> <!-- position: relative -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
