<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uray
 */

get_header();

do_action( 'uray_banner_heading' );

do_action( 'uray_wrapper_loop_start' );

$style  = uray_layout_blog();
$class  = '';
$layout = ( $style == 'standard' ) ? '' : $style;
if ( $style == 'masonry' ) {
	$class = ' masonry-column-' . uray_column_masonry();
}

if ( have_posts() ) :
	?>
	<div class="wrapper-blog-content content-blog-<?php echo esc_attr( $style ) . $class; ?>">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', $layout );
		endwhile;
		?>
	</div>
	<?php

	uray_paging_nav();

else :

	get_template_part( 'template-parts/content', 'none' );

endif;

do_action( 'uray_wrapper_loop_end' );

get_footer();