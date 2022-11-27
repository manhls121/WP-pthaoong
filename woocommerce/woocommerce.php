<?php

/**
 * Add action and add filter
 * Class uray_woocommerce_include
 */
class uray_woocommerce_include {
	public function __construct() {
		global $yith_woocompare;
		//Remove each style one by one
		add_filter( 'woocommerce_enqueue_styles', array( $this, 'jk_dequeue_styles' ) );
		add_filter( 'woocommerce_breadcrumb_defaults', array( $this, 'uray_change_breadcrumb_delimiter' ) );
		// remove hook default woocommerce
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25);
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 26 );

//		 hook wrapper inner item
		add_action( 'woocommerce_shop_loop_item_title', array( $this, 'woocommerce_template_category_product' ), 5 );
		add_action( 'woocommerce_before_shop_loop_item', array( $this, 'woocommerce_template_loop_product_div_open' ), 1 );
		add_action( 'woocommerce_after_loop_product_div_close', array( $this, 'woocommerce_template_loop_product_div_close' ), 1 );
		// add button button wishlist
		add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'woocommerce_template_loop_before_box_hover' ), 11 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 12 );
		add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'woocommerce_template_loop_quick_view' ), 13 );
		add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'woocommerce_template_loop_wishlist' ), 14 );
		add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'woocommerce_template_loop_after_box_hover' ), 15 );

		// hook wrapper result_count
		add_action( 'woocommerce_before_shop_loop', array( $this, 'woocommerce_result_count_open' ), 1 );
		add_action( 'woocommerce_before_shop_loop', array( $this, 'woocommerce_result_count_close' ), 90 );

		// hook thumbnail image
		add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'woocommerce_before_shop_loop_item_open' ), 1 );
		add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'woocommerce_before_shop_loop_item_close' ), 90 );


		add_action( 'woocommerce_after_shop_loop_item_wishlist', 'woocommerce_template_loop_add_to_cart', 4 );
		add_action( 'woocommerce_after_shop_loop_item_wishlist', array( $this, 'woocommerce_template_loop_wishlist' ), 5 );
		add_action( 'woocommerce_shop_loop_item_desc', array( $this, 'add_product_description' ), 5 );
		// single product
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 65 );

		// Quick View
		add_action( 'woocommerce_single_product_summary_quick', 'woocommerce_template_single_title', 5 );
		add_action( 'woocommerce_single_product_summary_quick', 'woocommerce_template_single_rating', 10 );
		add_action( 'woocommerce_single_product_summary_quick', 'woocommerce_template_single_excerpt', 20 );
		add_action( 'woocommerce_single_product_summary_quick', 'woocommerce_template_single_meta', 30 );
		add_action( 'woocommerce_single_product_summary_quick', 'woocommerce_template_single_sharing', 40 );
		add_action( 'woocommerce_single_product_summary_quick', 'woocommerce_template_single_add_to_cart', 50 );

		// share product
		add_action( 'woocommerce_share', array( $this, 'uray_wooshare' ) );

		// paging number
		add_filter( 'loop_shop_per_page', array( $this, 'uray_loop_shop_per_page' ), 20 );

		// hidden related product
		add_filter( 'woocommerce_output_related_products_args', array( $this, 'uray_related_products_args' ) );
		add_filter( 'woocommerce_cross_sells_columns', array( $this, 'uray_woocommerce_cross_sale_count_mod' ), 21 );

		///* PRODUCT QUICK VIEW */
		add_action( 'wp_ajax_jck_quickview', array( $this, 'uray_jck_quickview' ) );
		add_action( 'wp_ajax_nopriv_jck_quickview', array( $this, 'uray_jck_quickview' ) );
	}

	function jk_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-layout'] );        // Remove the layout

		return $enqueue_styles;
	}

	// Change the breadcrumb separator
	function uray_change_breadcrumb_delimiter( $defaults ) {
		// Change the breadcrumb delimeter from '/' to ' '
		$defaults['delimiter'] = ' ';

		return $defaults;
	}

	function woocommerce_template_loop_product_div_open() {
		echo '<div class="inner-item-product">';
	}

	function woocommerce_template_loop_product_div_close() {
		echo '</div>';
	}

	// hook wrapper result_count
	function woocommerce_result_count_open() {
		echo '<div class="wrapper-result-count">';
	}

	function woocommerce_template_loop_wishlist_before_div() {
		echo '<div class="box-button">';
	}

	function woocommerce_result_count_close() {
		echo '</div>';
	}

	/*
	 * woocommerce_template_controls_list_button
	 */

	/*
		 * woocommerce_template_controls_list_button
		 */

	function woocommerce_template_loop_quick_view() {
		wp_enqueue_script( 'magnific' );
		wp_enqueue_script( 'slick' );
 		echo '<a href="javascript:void(0)" class="quick-view" data-prod="' . get_the_ID() . '"></a>';
	}

	function woocommerce_template_loop_wishlist() {
		if ( class_exists( 'YITH_WCWL_Init' ) ) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
		}
	}

	function woocommerce_template_loop_before_box_hover() {
		echo '<div class="box-hover">';
	}

	function woocommerce_template_loop_after_box_hover() {
		echo '</div>';
	}

	// hook wrapper thumbnail
	function woocommerce_before_shop_loop_item_open() {
		echo '<div class="product-image">';
	}

	function woocommerce_before_shop_loop_item_close() {
		echo '</div>';
	}

	function woocommerce_before_shop_loo_close() {
		echo '</div>';
	}

	function add_product_description() {
		echo '<div class="description">';
		the_excerpt();
		echo '</div>';
	}

	/* Share Product */
	function uray_wooshare() {
		if ( uray_get_option( 'sharing_facebook' ) == 1 ||
			uray_get_option( 'sharing_twitter' ) == 1 ||
			uray_get_option( 'sharing_pinterset' ) == 1 ||
			uray_get_option( 'sharing_google' ) == 1
		) {
			echo '<div class="product-share">';
			echo '<span>' . esc_html__( 'Share', 'uray' ) . '</span>';
			echo '<div class="item-social">';
			if ( uray_get_option( 'sharing_facebook' ) == 1 ) {
				echo '<a class="face" title="Share on Facebook" href="http://www.facebook.com/sharer.php?u=' . get_the_permalink() . '"><i class="zmdi zmdi-facebook"></i></a>';
			}
			if ( uray_get_option( 'sharing_twitter' ) == 1 ) {
				echo '<a class="twitter" title="Tweet this!" href="https://twitter.com/intent/tweet?text=' . urlencode( get_the_title( get_the_ID() ) ) . '&url=' . urlencode( esc_url( get_permalink( get_the_ID() ) ) ) . '"><i class="zmdi zmdi-twitter"></i></a>';
			}
			if ( uray_get_option( 'sharing_pinterset' ) == 1 ) {
				$url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
				echo '<a class="pinterest" href="http://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . $url . '"><i class="zmdi zmdi-pinterest"></i></a>';
			}
			if ( uray_get_option( 'sharing_google' ) == 1 ) {
				echo '<a class="google" href="https://plus.google.com/share?url=' . get_the_permalink() . '"><i class="zmdi zmdi-google-plus"></i></a>';
			}

			echo '</div></div>';
		}
	}

	// paging number
	function uray_loop_shop_per_page( $cols ) {
		if ( uray_get_option( 'woo_product_per_page' ) ) {
			$cols = uray_get_option( 'woo_product_per_page' );
		} else {
			$cols = 10;
		}

		return $cols;
	}

	function uray_woocommerce_cross_sale_count_mod( $count ) {
		return 3;
	}

	// hidden related product
	function uray_related_products_args( $args ) {
		$args['posts_per_page'] = uray_get_option( 'number_related', '4' );
		$args['columns']        = uray_get_option( 'column_related', '4' );

		return $args;
	}

	// Ajax  minicart
	function uray_add_to_cart_success_ajax( $count_cat_product ) {
		list( $cart_items ) = uray_get_current_cart_info();
		if ( $cart_items < 0 ) {
			$cart_items = '0';
		}
		$count_cat_product['#header-mini-cart .wrapper-items-number'] = '<span class="wrapper-items-number">' . $cart_items . '</span>';

		return $count_cat_product;
	}

	public function woocommerce_template_category_product() {
		global $product;
		echo '<div class="cat_product">';
		echo wc_get_product_category_list( $product->get_id(), ', ', '', '' );
		echo '</div>';
	}

	///* PRODUCT QUICK VIEW */
	function uray_jck_quickview() {
		global $post, $product;
		$prod_id = $_POST["product"];
		$post    = get_post( $prod_id );
		$product = wc_get_product( $prod_id );
		ob_start();
		wc_get_template( 'content-single-product-lightbox.php' );
		$output = ob_get_contents();

		ob_end_clean();
		echo ent2ncr( $output );
		die();
	}
}

new uray_woocommerce_include();


/**
 * Custom current cart
 * @return array
 */
function uray_get_current_cart_info() {
	global $woocommerce;
	$items = '';
	if(!is_admin()){
		$items = count( $woocommerce->cart->get_cart() );
	}

	return array( $items, get_woocommerce_currency_symbol() );
}

if ( !function_exists( 'woocommerce_template_loop_product_title' ) ) {
	function woocommerce_template_loop_product_title() {
		echo '<h2 class="woocommerce-loop-product_title"><a href="' . esc_url( get_the_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '">' . get_the_title() . '</a></h2>';
	}
}
// Override WooCommerce function
if ( !function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		global $product;
		$attachment_ids = $product->get_gallery_image_ids();

		echo '<a href="' . esc_url( get_the_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '" class="wp-post-image">';
		echo woocommerce_get_product_thumbnail();
		if ( isset( $attachment_ids[0] ) ) {
			echo wp_get_attachment_image( $attachment_ids[0], apply_filters( 'shop_catalog', 'shop_catalog' ), '', array( "class" => "product-change-images" ) );
		}

		echo '</a>';
	}
}
