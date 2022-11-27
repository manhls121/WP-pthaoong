<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uray
 */
?>
</div><!-- #content -->

<?php
if ( uray_get_option( 'top_footer_show' ) == 1 ) {
	if ( is_active_sidebar( 'top_footer' ) ) {
		echo '<div class="footer-top"><div class="container">';
		dynamic_sidebar( 'top_footer' );
		echo '</div></div>';
	}
}

if ( is_active_sidebar( 'footer' ) ) {
	echo '<div id="wrapper-footer" class="wrapper-footer"><div class="container"><hr/><div class="row">';
	dynamic_sidebar( 'footer' );
	echo '</div></div></div>';
}
?>

</div><!--end wrapper-container-->

<?php
if ( uray_get_option( 'totop_show' ) == 1 ) {
	echo '<span class="footer__arrow-top"><i class="zmdi zmdi-chevron-up"></i></span>';
}
wp_footer();
?>
</body>
</html>
