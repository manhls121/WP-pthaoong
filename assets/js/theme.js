(function ($) {
	"use strict";
	$.avia_utilities = $.avia_utilities || {};
	$.avia_utilities.supported = {};
	$.avia_utilities.supports = (function () {
		var div = document.createElement('div'),
			vendors = ['Khtml', 'Ms', 'Moz', 'Webkit', 'O'];
		return function (prop, vendor_overwrite) {
			if (div.style.prop !== undefined) {
				return "";
			}
			if (vendor_overwrite !== undefined) {
				vendors = vendor_overwrite;
			}
			prop = prop.replace(/^[a-z]/, function (val) {
				return val.toUpperCase();
			});

			var len = vendors.length;
			while (len--) {
				if (div.style[vendors[len] + prop] !== undefined) {
					return "-" + vendors[len].toLowerCase() + "-";
				}
			}
			return false;
		};
	}());
	/* Smartresize */
	(function ($, sr) {
		var debounce = function (func, threshold, execAsap) {
			var timeout;
			return function debounced() {
				var obj = this, args = arguments;

				function delayed() {
					if (!execAsap)
						func.apply(obj, args);
					timeout = null;
				}

				if (timeout)
					clearTimeout(timeout);
				else if (execAsap)
					func.apply(obj, args);
				timeout = setTimeout(delayed, threshold || 100);
			}
		}
		// smartresize
		jQuery.fn[sr] = function (fn) {
			return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
		};
	})(jQuery, 'smartresize');
})(jQuery);

var custom_js = {

	init: function () {
		// var navigation_menu = jQuery('.site-header').outerHeight(true);
		jQuery('#preload').delay(100).fadeOut(500, function () {
			jQuery(this).remove();
		});
		if (jQuery().masonry) {
			setTimeout(function () {
				var blog = jQuery('.content-blog-masonry'),
					$grid = blog.masonry({
						itemSelector: '.grid-item'
					});

				$grid.masonry('on', 'layoutComplete', function () {
					if (jQuery().flexslider) {
						jQuery('.flexslider').flexslider({
							slideshow     : true,
							animation     : 'fade',
							pauseOnHover  : true,
							animationSpeed: 400,
							smoothHeight  : true,
							directionNav  : true,
							controlNav    : false,
							prevText      : '',
							nextText      : ''
						});
					}
				});
				var msnry = $grid.data('masonry');
				blog.infiniteScroll({
					path           : ".pagination-next a",
					append         : '.grid-item',
					outlayer       : msnry,
					button         : '.view-more-button',
					// using button, disable loading on scroll
					scrollThreshold: false,
					status         : '.page-load-status',
					history        : false
				});
			}, 300);
		}
		jQuery('.date-social .product-share span').on("click", function () {
			jQuery(this).parent().toggleClass('active')
		})
	},

	mobile_menu: function () {
		/*Hamburger Button*/
		jQuery('.menu-mobile-effect').on("click", function () {
			jQuery(this).toggleClass("is-active");
			jQuery('#js-navbar-fixed .main-menu').slideToggle(200, 'linear');
		});

		jQuery('.navmenu .menu-item-has-children').append('<span class="zmdi zmdi-chevron-down show-submenu-mobile"></span>');
		jQuery('.navmenu .menu-item-has-children .show-submenu-mobile').on('click touch', function (e) {
			e.preventDefault();
			if (jQuery(this).prev().is(':hidden')) {
				jQuery(this).prev().slideDown(200, 'linear');
				jQuery(this).addClass('toggle-open');
			} else {
				jQuery(this).prev().slideUp(200, 'linear');
				jQuery(this).removeClass('toggle-open');
			}
		});
		/*End Mobile Menu*/


	},

	search      : function () {
		jQuery('.search-toggler').on('click', function (e) {
			jQuery('.search-overlay').addClass("search-show");
		});
		jQuery('.closeicon,.background-overlay').on('click', function (e) {
			jQuery('.search-overlay').removeClass("search-show");
		});
		jQuery(document).keyup(function (e) {
			if (e.keyCode == 27) {
				jQuery('.search-overlay').removeClass("search-show");
			}
		});

	},
	canvas_right: function () {
		jQuery('#canvas-btn').on('click', function (e) {
			jQuery('body').addClass("canvas-show");
		});
		jQuery('.closeicon,.background-overlay').on('click', function (e) {
			jQuery('body').removeClass("canvas-show");
		});
		jQuery(document).keyup(function (e) {
			if (e.keyCode == 27) {
				jQuery('body').removeClass("canvas-show");
			}
		});

	},

	scrollToTop: function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.footer__arrow-top').css({bottom: "15px"});
			} else {
				jQuery('.footer__arrow-top').css({bottom: "-100px"});
			}
		});
		jQuery('.footer__arrow-top').on('click', function () {
			jQuery('html, body').animate({scrollTop: '0px'}, 800);
			return false;
		});
	},

	stickyHeaderInit: function () {
		//Add class for masthead
		var height_header_wrap = jQuery('.sticky_header').outerHeight();
		if (height_header_wrap > 0) {
			jQuery('.sticky_header').css({"min-height": height_header_wrap + 'px'});
		}
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 1) {
				jQuery('.header-hp-1').removeClass('affix-top').addClass('affix');
			} else {
				jQuery('.header-hp-1').removeClass('affix').addClass('affix-top');
			}
		});
	},

	post_gallery: function () {
		if (jQuery().flexslider) {
			jQuery('.gallery-slider').flexslider({
				slideshow     : true,
				animation     : 'fade',
				pauseOnHover  : true,
				animationSpeed: 400,
				smoothHeight  : true,
				directionNav  : true,
				controlNav    : false,
				prevText      : '',
				nextText      : ''
			});
		}
	},

	our_teams_slider: function () {
		if (jQuery().slick) {
			jQuery(".our-teams").each(function () {
				var $this = jQuery(this),
					slider = $this.find('.our-teams-sliders'),
					$btn_prev = slider.next().find('.es-nav-prev'),
					$btn_next = slider.next().find('.es-nav-next'),
					speed = slider.data('speed');
				slider.slick({
					infinite     : true,
					arrows       : true,
					speed        : 800,
					dots         : true,
					autoplay     : true,
					autoplaySpeed: speed,
					slidesToShow : 1,
					centerMode   : false,
					prevArrow    : $btn_prev,
					nextArrow    : $btn_next,
					responsive   : [
						{
							breakpoint: 992,
							settings  : {}
						},
						{
							breakpoint: 768,
							settings  : {}
						}
					]
				});
			});
			jQuery(".sc-posts-layout_2").each(function () {
				var $this = jQuery(this),
					slider = $this.find('.inner-list-posts'),
					item = slider.data('item'),
					speed = slider.data('speed');
				slider.slick({
					infinite      : true,
					arrows        : false,
					speed         : 800,
					dots          : true,
					autoplay      : true,
					autoplaySpeed : speed,
					slidesToShow  : item,
					slidesToScroll: item,
					centerMode    : false,
					responsive    : [
						{
							breakpoint: 992,
							settings  : {
								slidesToShow  : 3,
								slidesToScroll: 3,
							}
						},
						{
							breakpoint: 768,
							settings  : {
								slidesToShow  : 2,
								slidesToScroll: 2,
							}
						},
						{
							breakpoint: 480,
							settings  : {
								slidesToShow  : 1,
								slidesToScroll: 1,
							}
						}
					]
				});
			});
		}
	},
	quantity_buttons: function () {
		jQuery('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)').addClass('buttons_added').append('<input type="button" value="+" class="plus modify-qty" />').prepend('<input type="button" value="-" class="minus modify-qty"/>');
		jQuery(document).on("click", ".plus, .minus", function () {
			var a = jQuery(this).closest(".quantity").find(".qty"), t = parseFloat(a.val()),
				l = parseFloat(a.attr("max")), s = parseFloat(a.attr("min")), r = a.attr("step");
			jQuery(this).is(".plus") ? l && (l == t || t > l) ? a.val(l) : a.val(t + parseFloat(r)) : s && (s == t || s > t) ? a.val(s) : t > 0 && a.val(t - parseFloat(r)), a.trigger("change")
		});
	},
	quick_view      : function () {
		jQuery('.quick-view').on('click', function (e) {
			(function (e, t, n, r) {
				e.fn.wc_variation_form = function () {
					e.fn.wc_variation_form.find_matching_variations = function (t, n) {
						var r = [];
						for (var i = 0; i < t.length; i++) {
							var s = t[i], o = s.variation_id;
							e.fn.wc_variation_form.variations_match(s.attributes, n) && r.push(s)
						}
						return r
					};
					e.fn.wc_variation_form.variations_match = function (e, t) {
						var n = !0;
						for (attr_name in e) {
							var i = e[attr_name], s = t[attr_name];
							i !== r && s !== r && i.length != 0 && s.length != 0 && i != s && (n = !1)
						}
						return n
					};
					this.unbind("check_variations update_variation_values found_variation");
					this.find(".reset_variations").unbind("click");
					this.find(".variations select").unbind("change focusin");
					return this.on("click", ".reset_variations", function (t) {
						e(this).closest("form.variations_form").find(".variations select").val("").change();
						var n = e(this).closest(".product").find(".sku"), r = e(this).closest(".product").find(".product_weight"),
							i = e(this).closest(".product").find(".product_dimensions");
						n.attr("data-o_sku") && n.text(n.attr("data-o_sku"));
						r.attr("data-o_weight") && r.text(r.attr("data-o_weight"));
						i.attr("data-o_dimensions") && i.text(i.attr("data-o_dimensions"));
						return !1
					}).on("change", ".variations select", function (t) {
						$variation_form = e(this).closest("form.variations_form");
						$variation_form.find("input[name=variation_id]").val("").change();
						$variation_form.trigger("woocommerce_variation_select_change").trigger("check_variations", ["", !1]);
						e(this).blur();
						e().uniform && e.isFunction(e.uniform.update) && e.uniform.update()
					}).on("focusin", ".variations select", function (t) {
						$variation_form = e(this).closest("form.variations_form");
						$variation_form.trigger("woocommerce_variation_select_focusin").trigger("check_variations", [e(this).attr("name"), !0])
					}).on("check_variations", function (n, r, i) {
						var s = !0, o = !1, u = !1, a = {}, f = e(this), l = f.find(".reset_variations");
						f.find(".variations select").each(function () {
							e(this).val().length == 0 ? s = !1 : o = !0;
							if (r && e(this).attr("name") == r) {
								s = !1;
								a[e(this).attr("name")] = ""
							} else {
								value = e(this).val();
								a[e(this).attr("name")] = value
							}
						});
						var c = parseInt(f.data("product_id")), h = f.data("product_variations");
						h || (h = t.product_variations[c]);
						h || (h = t.product_variations);
						h || (h = t["product_variations_" + c]);
						var p = e.fn.wc_variation_form.find_matching_variations(h, a);
						if (s) {
							var d = p.pop();
							if (d) {
								f.find("input[name=variation_id]").val(d.variation_id).change();
								f.trigger("found_variation", [d])
							} else {
								f.find(".variations select").val("");
								i || f.trigger("reset_image");
								alert(woocommerce_params.i18n_no_matching_variations_text)
							}
						} else {
							f.trigger("update_variation_values", [p]);
							i || f.trigger("reset_image");
							r || f.find(".single_variation_wrap").slideUp("200")
						}
						o ? l.css("visibility") == "hidden" && l.css("visibility", "visible").hide().fadeIn() : l.css("visibility", "hidden")
					}).on("reset_image", function (t) {
						var n = e(this).closest(".product"), r = n.find("div.images img:eq(0)"),
							i = n.find("div.images a.zoom:eq(0)"), s = r.attr("data-o_src"), o = r.attr("data-o_title"),
							u = i.attr("data-o_href");
						s && r.attr("src", s);
						u && i.attr("href", u);
						if (o) {
							r.attr("alt", o).attr("title", o);
							i.attr("title", o)
						}
					}).on("update_variation_values", function (t, n) {
						$variation_form = e(this).closest("form.variations_form");
						$variation_form.find(".variations select").each(function (t, r) {
							current_attr_select = e(r);
							current_attr_select.data("attribute_options") || current_attr_select.data("attribute_options", current_attr_select.find("option:gt(0)").get());
							current_attr_select.find("option:gt(0)").remove();
							current_attr_select.append(current_attr_select.data("attribute_options"));
							current_attr_select.find("option:gt(0)").removeClass("active");
							var i = current_attr_select.attr("name");
							for (num in n) if (typeof n[num] != "undefined") {
								var s = n[num].attributes;
								for (attr_name in s) {
									var o = s[attr_name];
									if (attr_name == i) if (o) {
										o = e("<div/>").html(o).text();
										o = o.replace(/'/g, "\\'");
										o = o.replace(/"/g, '\\"');
										current_attr_select.find('option[value="' + o + '"]').addClass("active")
									} else current_attr_select.find("option:gt(0)").addClass("active")
								}
							}
							current_attr_select.find("option:gt(0):not(.active)").remove()
						});
						$variation_form.trigger("woocommerce_update_variation_values")
					}).on("found_variation", function (t, n) {
						var r = e(this), i = e(this).closest(".product"), s = i.find("div.images img:eq(0)"),
							o = i.find("div.images a.zoom:eq(0)"), u = s.attr("data-o_src"), a = s.attr("data-o_title"),
							f = o.attr("data-o_href"), l = n.image_src, c = n.image_link, h = n.image_title;
						r.find(".variations_button").show();
						r.find(".single_variation").html(n.price_html + n.availability_html);
						if (!u) {
							u = s.attr("src") ? s.attr("src") : "";
							s.attr("data-o_src", u)
						}
						if (!f) {
							f = o.attr("href") ? o.attr("href") : "";
							o.attr("data-o_href", f)
						}
						if (!a) {
							a = s.attr("title") ? s.attr("title") : "";
							s.attr("data-o_title", a)
						}
						if (l && l.length > 1) {
							s.attr("src", l).attr("alt", h).attr("title", h);
							o.attr("href", c).attr("title", h)
						} else {
							s.attr("src", u).attr("alt", a).attr("title", a);
							o.attr("href", f).attr("title", a)
						}
						var p = r.find(".single_variation_wrap"), d = i.find(".product_meta").find(".sku"),
							v = i.find(".product_weight"), m = i.find(".product_dimensions");
						d.attr("data-o_sku") || d.attr("data-o_sku", d.text());
						v.attr("data-o_weight") || v.attr("data-o_weight", v.text());
						m.attr("data-o_dimensions") || m.attr("data-o_dimensions", m.text());
						n.sku ? d.text(n.sku) : d.text(d.attr("data-o_sku"));
						n.weight ? v.text(n.weight) : v.text(v.attr("data-o_weight"));
						n.dimensions ? m.text(n.dimensions) : m.text(m.attr("data-o_dimensions"));
						p.find(".quantity").show();
						!n.is_in_stock && !n.backorders_allowed && r.find(".variations_button").hide();
						n.min_qty ? p.find("input[name=quantity]").attr("min", n.min_qty).val(n.min_qty) : p.find("input[name=quantity]").removeAttr("min");
						n.max_qty ? p.find("input[name=quantity]").attr("max", n.max_qty) : p.find("input[name=quantity]").removeAttr("max");
						if (n.is_sold_individually == "yes") {
							p.find("input[name=quantity]").val("1");
							p.find(".quantity").hide()
						}
						p.slideDown("200").trigger("show_variation", [n])
					})
				};
				e("form.variations_form").wc_variation_form();
				e("form.variations_form .variations select").change()
			})(jQuery, window, document);
 			jQuery(this).addClass('loading');
			e.preventDefault();
			var product_id = jQuery(this).attr('data-prod');
			var data = {action: 'jck_quickview', product: product_id};
			jQuery.post(quick_view.ajaxurl, data, function (response) {
				jQuery.magnificPopup.open({
					mainClass: 'my-mfp-zoom-in',
					items    : {
						src : '<div class="product-lightbox">' + response + '</div>',
						type: 'inline'
					}
				});
				jQuery('.quick-view').removeClass('loading');
				setTimeout(function () {
					if (jQuery().slick) {
						jQuery('.thumbnail_product').slick({
							slidesToShow  : 4,
							slidesToScroll: 1,
							asNavFor      : '.woocommerce-product-gallery__wrapper',
							dots          : !1,
							infinite      : !1,
							arrows        : false,
							centerMode    : !1,
							focusOnSelect : !0,
							responsive    : [
								{
									breakpoint: 480,
									settings  : {
										slidesToShow: 2,
									}
								}
							]
						});

						jQuery('.woocommerce-product-gallery__wrapper').slick({
							slidesToShow  : 1,
							slidesToScroll: 1,
							arrows        : false,
							fade          : true,
							infinite      : !1,
							autoplay      : true,
							asNavFor      : '.thumbnail_product'
						});
					}
					jQuery('.product-lightbox div.quantity:not(.buttons_added)').addClass('buttons_added').append('<input type="button" value="+" class="plus_qv modify-qty" />').prepend('<input type="button" value="-" class="minus_qv modify-qty" />');
					jQuery('.product-lightbox .plus_qv,.product-lightbox .minus_qv').on('click', function (e) {
						e.preventDefault();
						var a = jQuery(this).closest(".quantity").find(".qty"), t = parseFloat(a.val()),
							l = parseFloat(a.attr("max")), s = parseFloat(a.attr("min")), r = a.attr("step");
						jQuery(this).is(".plus_qv") ? l && (l == t || t > l) ? a.val(l) : a.val(t + parseFloat(r)) : s && (s == t || s > t) ? a.val(s) : t > 0 && a.val(t - parseFloat(r)), a.trigger("change")
					});
					jQuery('.product-lightbox form').wc_variation_form();
				}, 300);
			});
			e.preventDefault();
		});
	},
	singleSlider    : function () {
		if (jQuery().slick) {
			// if (jQuery('#slider li').length > 1) {
			jQuery('.thumbnail_product').slick({
				slidesToShow  : 4,
				slidesToScroll: 1,
				asNavFor      : '.woocommerce-product-gallery__wrapper',
				dots          : !1,
				infinite      : !1,
				arrows        : false,
				centerMode    : !1,
				focusOnSelect : !0,
				responsive    : [
					{
						breakpoint: 480,
						settings  : {
							slidesToShow: 2,
						}
					}
				]
			});

			jQuery('.woocommerce-product-gallery__wrapper').slick({
				slidesToShow  : 1,
				slidesToScroll: 1,
				arrows        : false,
				fade          : true,
				infinite      : !1,
				autoplay      : true,
				asNavFor      : '.thumbnail_product'
			});
			// }
		}
		if (jQuery().swipebox) {
			jQuery('.swipebox').swipebox({
				useCSS : true, 
				useSVG : true, 
				initialIndexOnArray : 0, 
				hideCloseButtonOnMobile : false, 
				removeBarsOnMobile : true, 
				hideBarsDelay : 3000, 
				videoMaxWidth : 1140, 
				beforeOpen: function() {}, 
				afterOpen: null, 
				afterClose: function() {}, 
				loopAtEnd: false 
			});
		}
	},

}

jQuery(document).ready(function ($) {
	custom_js.init();
	custom_js.mobile_menu();
	custom_js.search();
	custom_js.canvas_right();
	custom_js.scrollToTop();
	custom_js.stickyHeaderInit();
	custom_js.post_gallery();
	custom_js.our_teams_slider();
	custom_js.quantity_buttons();
	custom_js.quick_view();
	custom_js.singleSlider();	$('.woocommerce-product-gallery__image img').load(function () {
		$('.attachment-shop_thumbnail').trigger('click');
	});
});

