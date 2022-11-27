<?php
if ( !function_exists( 'uray_the_posts_navigation' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 *
	 */
	function uray_the_posts_navigation() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		if ( !$next && !$previous ) {
			return;
		}
		?>
		<div class="links-next-post">
			<?php
			previous_post_link( '<div class="nav-previous">%link</div>', '<i class="zmdi zmdi-long-arrow-left"></i>' . esc_attr__( 'Previous post', 'uray' ) );
			next_post_link( '<div class="nav-next">%link</div>', esc_attr__( 'Next post', 'uray' ) . '<i class="zmdi zmdi-long-arrow-right"></i>' );
			?>
		</div>
		<!-- .nav-links -->
		<?php
	}
endif;

if ( !function_exists( 'uray_paging_nav' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function uray_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );

		$query_args = array();
		$url_parts  = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $GLOBALS['wp_query']->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="zmdi zmdi-chevron-left"></i>',
			'next_text' => '<i class="zmdi zmdi-chevron-right"></i>',
			'type'      => 'list'
		) );
		if ( $links ) {
			if ( uray_layout_blog() == 'masonry' && !is_search() ) {
				echo '<div class="wrapper-view-move"><div class="page-load-status"><div class="loading"><span></span><span></span><span></span></div></div>
						<div class="view-more-button au-btn">' . esc_html__( 'Load more', 'uray' ) . '<i class="zmdi zmdi-arrow-right"></i></div>
					</div>';
				echo '<div class="pagination-next">';
				next_posts_link();
				echo '</div>';
			} else {
				echo '<div class="navigation paging-navigation" role="navigation">' . $links . '</div>';

			}
		}
	}
endif;


/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package uray
 */

if ( !function_exists( 'uray_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function uray_posted_on() {

		$time_string = '%2$s';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '%2$s';
		}

		$time_string     = sprintf( $time_string,
			esc_attr( get_the_date() ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date() ),
			esc_html( get_the_modified_date() )
		);
		$categories_list = get_the_category_list( ', ' );
		echo '<div class="entry-meta">';

		echo '<span class="date">' . $time_string . '</span>';

		printf( '<span class="cat-links">%1$s</span>', $categories_list );

		echo '</div>';
	}
endif;

if ( !function_exists( 'uray_entry_archive' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function uray_entry_archive() {
		echo '<div class="calendar">';
		echo '<span class="date"><i class="zmdi zmdi-calendar-check"></i>' . get_the_date() . '</span>';
		if ( !post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="number-comment"><i class="zmdi zmdi-comment-outline"></i>';
			comments_popup_link( '0', '1', '%' );
			echo '</span>';
		}
		if ( is_singular() || is_multi_author() && get_the_author() ) {
			printf(
				'<span class="byline"><a class="url fn n" href="%1$s"><i class="zmdi zmdi-account"></i>%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}
		echo '</div>';
	}
endif;

if ( !function_exists( 'uray_entry_top_single' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function uray_entry_top_single() {
		echo '<div class="entry-date-footer">';
		echo '<span class="entry-date"><i class="fa fa-clock-o"></i> ' . get_the_date() . '</span>';
		$categories_list = get_the_category_list( ', ' );
		if ( $categories_list ) {
			printf( '<div class="cat-links"><i class="fa fa-folder-open-o"></i> %1$s</div>', $categories_list );
		}
		echo '</div>';

	}
endif;

if ( !function_exists( 'uray_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function uray_entry_footer() {
		// Hide category and tag text for pages.
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', ', ' );
		echo '<div class="final-blog">';
		if ( $tags_list ) {
			if ( $tags_list ) {
				printf( '<div class="tags">%1$s</div>', $tags_list );
			}
		}
		do_action( 'woocommerce_share' );
		echo '</div>';
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function uray_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'uray_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'uray_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so uray_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so uray_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in uray_categorized_blog.
 */
function uray_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'uray_categories' );
}

add_action( 'edit_category', 'uray_category_transient_flusher' );
add_action( 'save_post', 'uray_category_transient_flusher' );
