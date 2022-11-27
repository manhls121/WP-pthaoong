<?php
/**
 * The template for displaying search results pages.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package uray
 */

get_header();
do_action( 'uray_banner_heading' );
do_action( 'uray_wrapper_loop_start' );
?>

<?php
if ( have_posts() ) : ?>
	<?php
	/* Start the Loop */
	echo '<div class="wrapper-blog-content">';
	?>

	<?php
	while ( have_posts() ) : the_post();

		/**
		 * Run the loop for the search to output the results.
		 * If you want to overload this in a child theme then include a file
		 * called content-search.php and that will be used instead.
		 */
		get_template_part( 'template-parts/content', 'search' );

	endwhile;
	echo '</div>';
	uray_paging_nav();

else :
	echo '<div class="wrapper-content-search">';
	get_template_part( 'template-parts/content', 'none' );
	echo '</div>';
endif; ?>

<?php
do_action( 'uray_wrapper_loop_end' );
get_footer();
