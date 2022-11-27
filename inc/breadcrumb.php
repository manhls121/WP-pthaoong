<?php
/**
 * Retrieve category parents with separator.
 *
 * @since 1.2.0
 *
 */
function uray_get_category_parents( $id, $link = false, $separator = '', $nicename = false, $visited = array() ) {
	$chain  = '';
	$parent = get_term( $id, 'category' );
	if ( is_wp_error( $parent ) ) {
		return $parent;
	}

	if ( $nicename ) {
		$name = $parent->slug;
	} else {
		$name = $parent->name;
	}
	if ( $parent->parent && ( $parent->parent != $parent->term_id ) && ! in_array( $parent->parent, $visited ) ) {
		$visited[] = $parent->parent;
		$chain     .= get_category_parents( $parent->parent, $link, $separator, $nicename, $visited );
	}

	if ( $link ) {
		$chain .= '<a href="' . esc_url( get_category_link( $parent->term_id ) ) . '"><span>' . $name . '</span></a>' . $separator;
	} else {
		$chain .= $name . $separator;
	}

	return $chain;
}

/**
 * Create breadcrumb on site
 */
function uray_breadcrumbs() {
	global $post;
	$show_on   = get_option( 'show_on_front' );
	$page_id   = get_option( 'page_for_posts' );
	$delimiter = "";
	echo '<ul class="phys-breadcrumb">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '" class="home">' . esc_html__( "Home", 'uray' ) . '</a>' . $delimiter . '</li>';
	if ( is_category() ) {
		$catTitle = single_cat_title( "", false );
		$cat      = get_cat_ID( $catTitle );
		echo '<li>' . get_category_parents( $cat, true, $delimiter ) . '</li>';
	} elseif ( is_post_type_archive() ) {
		echo '<li>' . post_type_archive_title( '', false ) . $delimiter . '</li>';
	} elseif ( is_tax() ) {

		echo '<li>' . single_term_title( '', false ) . $delimiter . '</li>';
	} elseif ( is_search() ) {
		echo '<li>' . esc_html__( "Search Result", "uray" ) . $delimiter . '</li>';
	} elseif ( is_404() ) {
		echo '<li>' . esc_html__( "404 Not Found", "uray" ) . $delimiter . '</li>';
	} elseif ( is_single( $post ) ) {
		if ( get_post_type() == 'post' ) {
			$category = get_the_category();
			if ( isset( $categories[0] ) ) {
				$category_id = get_cat_ID( $category[0]->cat_name );
				echo '<li>' . uray_get_category_parents( $category_id, true, $delimiter ) . '</li>';
			}
			echo '<li>' . the_title( '', '', false ) . $delimiter . '</li>';
		} else {
			echo '<li>' . get_post_type() . $delimiter . '</li>';
			echo '<li>' . get_the_title() . $delimiter . '</li>';
		}
	} elseif ( is_page() || ( $show_on == 'page' && get_queried_object_id() == $page_id ) ) {
		$post = get_queried_object();
		if ( $post->post_parent == 0 ) {
			echo "<li>" . the_title( '', '', false ) . $delimiter . "</li>";
		} else {
			$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
			array_push( $ancestors, $post->ID );
			foreach ( $ancestors as $ancestor ) {
				if ( $ancestor != end( $ancestors ) ) {
					echo '<li><a href="' . esc_url( get_permalink( $ancestor ) ) . '"><span>' . strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) . '</span></a>' . $delimiter . '</li>';
				} else {
					echo '<li>' . strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) . $delimiter . '</li>';
				}
			}
		}

	} elseif ( is_attachment() ) {
		$parent = get_post( $post->post_parent );
		if ( $parent->post_type == 'page' || $parent->post_type == 'post' ) {
			$cat = get_the_category( $parent->ID );
			$cat = $cat[0];
			echo '<li>' . get_category_parents( $cat, true, $delimiter ) . '</li>';
		}

		echo '<li><a href="' . esc_url( get_permalink( $parent ) ) . '"><span>' . $parent->post_title . '</span></a>' . $delimiter . '</li>';
		echo '<li>' . get_the_title() . $delimiter . '</li>';
	}

	// End the UL
	echo "</ul>";
}