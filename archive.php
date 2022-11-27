<?php
/**
 * The template for displaying archive pages.
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
