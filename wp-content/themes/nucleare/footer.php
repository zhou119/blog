<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package nucleare
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info smallPart">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nucleare' ) ); ?>">
			<?php
			/* translators: %s: WordPress name */
			printf( esc_html__( 'Proudly powered by %s', 'nucleare' ), 'WordPress' );
			?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: theme name, 2: theme developer */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'nucleare' ), '<a target="_blank" href="https://crestaproject.com/downloads/nucleare/" rel="nofollow" title="Nucleare Theme">Nucleare Free</a>', 'CrestaProject WordPress Themes' );
			?>
		</div><!-- .site-info -->
		<div class="footer-menu smallPart">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'depth' => '1', 'fallback_cb' => false ) ); ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php $scrollToTopMobile = get_theme_mod('nucleare_theme_options_scroll_top', ''); ?>
<a href="#top" id="toTop" class="<?php echo $scrollToTopMobile ? 'scrolltop_on' : 'scrolltop_off' ?>"><i class="fa fa-angle-up fa-lg"></i></a>
<?php wp_footer(); ?>

</body>
</html>
