<?php

//Custom products layout on archive page
add_filter('loop_shop_columns', 'kidza_loop_shop_columns', 20);
function kidza_loop_shop_columns()
{
	$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : kidza()->get_theme_opt('products_columns', 4);
	return $columns;
}


// Change number of products that are displayed per page (shop page)
add_filter('loop_shop_per_page', 'kidza_loop_shop_per_page', 20);
function kidza_loop_shop_per_page($limit)
{
	$limit = kidza()->get_theme_opt('product_per_page', 9);
	return $limit;
}
if (!function_exists('kidza_woocommerce_catalog_result')) {
	// remove

	// add back
	add_action('woocommerce_before_shop_loop', 'kidza_woocommerce_catalog_result', 20);
	add_action('kidza_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering');
	add_action('kidza_woocommerce_result_count', 'woocommerce_result_count');
	function kidza_woocommerce_catalog_result()
	{
		$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : kidza()->get_theme_opt('products_columns', '2');
		$display_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : kidza()->get_theme_opt('shop_display_type', 'grid');
		$active_grid = 'active';
		$active_list = '';
		if ($display_type == 'list') {
			$active_list = $display_type == 'list' ? 'active' : '';
			$active_grid = '';
		}
		?>
		<div class="pxl-shop-topbar-wrap ">
			<div class="pxl-view-layout-wrap ">
				<ul class="pxl-view-layout d-flex align-items-center">
					<li class="view-icon view-grid <?php echo esc_attr($active_grid) ?>"><a href="javascript:void(0);"
							class="pxl-ttip tt-top-left" data-cls="products columns-<?php echo esc_attr($columns); ?>"
							data-col="grid"><span class="tt-txt">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewBox="0 0 16 13"
									fill="#d9d9d9">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M0 -0.00012207H4V2.99988H0V-0.00012207ZM6 -0.00012207H10V2.99988H6V-0.00012207ZM16 -0.00012207H11V2.99988H16V-0.00012207ZM0 4.99988H4V7.99988H0V4.99988ZM10 4.99988H6V7.99988H10V4.99988ZM11 4.99988H16V7.99988H11V4.99988ZM4 9.99988H0V12.9999H4V9.99988ZM6 9.99988H10V12.9999H6V9.99988ZM16 9.99988H11V12.9999H16V9.99988Z" />
								</svg>
							</span></a></li>
					<li class="view-icon view-list <?php echo esc_attr($active_list) ?>"><a href="javascript:void(0);"
							class="pxl-ttip tt-top-left" data-cls="products shop-view-list" data-col="list">
							<span class="tt-txt">
								<svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13"
									fill="#d9d9d9">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M1.5 2.99988C2.32843 2.99988 3 2.32831 3 1.49988C3 0.671451 2.32843 -0.00012207 1.5 -0.00012207C0.671573 -0.00012207 0 0.671451 0 1.49988C0 2.32831 0.671573 2.99988 1.5 2.99988ZM1.5 7.99988C2.32843 7.99988 3 7.32831 3 6.49988C3 5.67145 2.32843 4.99988 1.5 4.99988C0.671573 4.99988 0 5.67145 0 6.49988C0 7.32831 0.671573 7.99988 1.5 7.99988ZM3 11.4999C3 12.3283 2.32843 12.9999 1.5 12.9999C0.671573 12.9999 0 12.3283 0 11.4999C0 10.6715 0.671573 9.99988 1.5 9.99988C2.32843 9.99988 3 10.6715 3 11.4999ZM15 -0.00012207H4V2.99988H15V-0.00012207ZM4 4.99988H15V7.99988H4V4.99988ZM15 9.99988H4V12.9999H15V9.99988Z" />
								</svg></span>
						</a>
					</li>
				</ul>
				<div class="text-heading number-result">
					<?php do_action('kidza_woocommerce_result_count'); ?>
				</div>
			</div>

			<div class="woocommerce-topbar-ordering">
				<?php woocommerce_catalog_ordering(); ?>
			</div>
		</div>
		<?php
	}
}

/* Remove result count & product ordering & item product category..... */
function kidza_cwoocommerce_remove_function()
{
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0);
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0);
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0);
	remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0);
	remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0);
	remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
}
add_action('init', 'kidza_cwoocommerce_remove_function');

/* Product Category */
//add_action( 'woocommerce_before_shop_loop', 'kidza_woocommerce_nav_top', 2 );
function kidza_woocommerce_nav_top()
{ ?>
	<div class="woocommerce-topbar">
		<div class="woocommerce-result-count">
			<?php woocommerce_result_count(); ?>
		</div>
		<div class="woocommerce-topbar-ordering">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>
<?php }

add_filter('woocommerce_after_shop_loop_item', 'kidza_woocommerce_product');
function kidza_woocommerce_product()
{
	global $product;
	$shop_layout = kidza()->get_theme_opt('shop_layout', 'grid');
	if (isset($_GET['shop-layout'])) {
		$shop_layout = $_GET['shop-layout'];
	}
	?>
	<div class="woocommerce-product-inner item-layout-<?php echo esc_attr($shop_layout); ?>">
		<div class="woocommerce-product-header">
			<?php
			if ($product->is_featured()) {
				$feature_text = get_post_meta($product->get_id(), 'product_feature_text', true);
				if (empty($feature_text)) {
					$feature_text = "NEW";
				}
				?>
				<span class="pxl-featured"><?php echo esc_html($feature_text); ?></span>
				<?php
			}
			?>
			
			<a class="woocommerce-product-link" href="<?php the_permalink(); ?>"></a>
			<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
				<?php woocommerce_template_loop_product_thumbnail(); ?>
			</a>
			<!-- card -->
				<div class="list-menu-woocommerce">
                <div class="woocommerce-btn-item woocommerce-add-to--cart">
					<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
					<?php } else { ?>
						<?php woocommerce_template_loop_add_to_cart(); ?>
					<?php } ?>
				</div>
				<div class="woos woocommerce--quickview">
                    <?php echo do_shortcode('[woosq id="'.esc_attr( $product->get_id() ).'"]'); ?>
                </div>
                <div class="woos woocommerce--heart">
                    <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                </div>
                <?php if(!empty($product_label)) : ?>
                    <div class="woocommerce-product-label pxl-l-10"><?php echo esc_html($product_label); ?></div>
                <?php endif; ?>
            	</div>
			<!-- end cart  -->
		</div>
		<div class="woocommerce-product-content">
			<div class="woocommerce-product-meta">
				<div class="rating">
					<?php woocommerce_template_single_rating(); ?>
				</div>
				<h4 class="woocommerce-product-title">
					<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
				</h4>
				<div class="woocommerce-product--price">
					<?php woocommerce_template_loop_price(); ?>
				</div>
				<div class="woocommerce-product--excerpt" style="display: none;">
					<?php woocommerce_template_single_excerpt(); ?>
				</div>
			</div>

		</div>
	</div>
<?php }

add_filter('woocommerce_loop_add_to_cart_link', 'kidza_woocommerce_loop_add_to_cart_link', 10, 3);
function kidza_woocommerce_loop_add_to_cart_link($button, $product, $args)
{
	return sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s><span class="pxl-cart-text pxl-hidden">%s</span><span class="pxl-cart-label">%s</span>%s</a>',
		esc_url($product->add_to_cart_url()),
		esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
		esc_attr(isset($args['class']) ? $args['class'] : 'button'),
		isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
		esc_html($product->add_to_cart_text()),
		esc_html($product->add_to_cart_text()),
		'<span class="pxl-cart-icon">
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" fill="none">
			<path d="M13.366 0L16.577 5.38395L20 5.38412V7.32012L18.833 7.31993L18.0764 16.1124C18.0332 16.6141 17.5999 17 17.0798 17H2.92014C2.40005 17 1.96678 16.6141 1.92359 16.1124L1.166 7.31993L0 7.32012V5.38412L3.422 5.38395L6.63398 0L8.36602 0.967988L5.732 5.38395H14.267L11.634 0.967988L13.366 0ZM16.826 7.31993L3.173 7.32012L3.84 15.064H16.159L16.826 7.31993ZM11 9.2561V13.128H9.00002V9.2561H11ZM7 9.2561V13.128H5V9.2561H7ZM15 9.2561V13.128H13V9.2561H15Z" fill="currentColor"/>
		</svg>
		</span>'
	);
}

/* Removes the "shop" title on the main shop page */
function kidza_hide_page_title()
{
	return false;
}
add_filter('woocommerce_show_page_title', 'kidza_hide_page_title');

/* Replace text Onsale */
add_filter('woocommerce_sale_flash', 'kidza_custom_sale_text', 10, 3);
function kidza_custom_sale_text($text, $post, $_product)
{
	return '<span class="onsale">' . esc_html__('Sale', 'kidza') . '</span>';
}

add_filter('woocommerce_checkout_before_order_review_heading', 'kidza_checkout_before_order_review_heading', 10);
function kidza_checkout_before_order_review_heading()
{
	echo '<div class="pxl-checkout-order-review">';
}
add_filter('woocommerce_checkout_after_order_review', 'kidza_checkout_after_order_review', 20);
function kidza_checkout_after_order_review()
{
	echo '</div>';
}

/**
 * Modify image width theme support.
 */
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
	$size['width'] = 400;
	$size['height'] = 700;
	$size['crop'] = 1;
	return $size;
});

add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
	$size['width'] = 700;
	$size['height'] = 700;
	$size['crop'] = 1;
	return $size;
});

// add_filter('woocommerce_get_image_size_single', function ($size) {
// 	$size['width'] = 500;
// 	$size['height'] = 500;
// 	$size['crop'] = 1;
// 	return $size;
// });

add_action('woocommerce_before_single_product_summary', 'kidza_woocommerce_single_summer_start', 0);
function kidza_woocommerce_single_summer_start()
{ ?>
	<?php echo '<div class="woocommerce-summary-wrap row">'; ?>
<?php }
add_action('woocommerce_after_single_product_summary', 'kidza_woocommerce_single_summer_end', 5);
function kidza_woocommerce_single_summer_end()
{ ?>
	<?php echo '</div></div>'; ?>
<?php }

add_action('woocommerce_single_product_summary', 'kidza_woocommerce_sg_product_rating', 4);
function kidza_woocommerce_sg_product_rating()
{
	global $product;

	$rating_count = $product->get_rating_count();
	?>
	<div class="woocommerce-sg-product-rating">
		<?php
		if ($rating_count > 0) {
			woocommerce_template_single_rating();
		}
		?>
	</div>
	<?php
}

add_action('woocommerce_single_product_summary', 'kidza_woocommerce_sg_product_title', 5);
function kidza_woocommerce_sg_product_title()
{
	if (!kidza()->get_theme_opt('product_title', true)) {
		return;
	}
	?>
	<h3 class="woocommerce-sg-product-title">
		<?php echo get_the_title(); ?>
	</h3>
	<?php
}

add_action('woocommerce_before_add_to_cart_quantity', 'custom_before_quantity_input_field', 25);
function custom_before_quantity_input_field()
{
	echo '<div class="wooc-product-quantity">';
}


function kidza_woocommerce_sg_product_price()
{ ?>
	<h5 class="woocommerce-sg-product-price">
		<?php woocommerce_template_single_price(); ?>
	</h5>
<?php }

add_action('woocommerce_single_product_summary', 'kidza_woocommerce_sg_product_excerpt', 15);
function kidza_woocommerce_sg_product_excerpt()
{ ?>
	<div class="woocommerce-sg-product-excerpt">
		<?php woocommerce_template_single_excerpt(); ?>
	</div>
<?php }

//
function custom_after_quantity_input_field()
{
	echo "</div>";
	global $product;
	?>
	<div class="wooc-product-meta">
		<div class="wishlist">
			<?php if (class_exists('WPCleverWoosw')) { ?>
				<?php echo do_shortcode('[woosw id="' . esc_attr($product->get_id()) . '"]');  ?><?php echo 'Add to Wishlist' ?>
			<?php } ?>
		</div>
		<div class="compare">
			<?php if (class_exists('WPCleverWoosc')) { ?>
				<?php echo do_shortcode('[woosc id="' . esc_attr($product->get_id()) . '"]'); ?><?php echo 'Compare' ?>
			<?php } ?>
		</div>
	</div> 
<?php }
add_action('woocommerce_after_add_to_cart_quantity', 'custom_after_quantity_input_field', 26);
add_action('woocommerce_single_product_summary', 'kidza_woocommerce_sg_product_price', 11);
add_action('woocommerce_single_product_summary', 'kidza_single_product_meta_before', 40);

function kidza_single_product_meta_before()
{
	global $product;
	echo '<div class="woocommerce-product-info-meta product_meta">';
	if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))): ?>
		<div class="sku_wrapper"><span class="title"><?php esc_html_e('SKU:', 'kidza'); ?> </span> <span
				class="sku"> <?php echo kidza_html($product->get_sku()); ?></span></div>
	<?php endif;
	echo wc_get_product_category_list(
    $product->get_id(), 
    	'<span class="comma">, </span>', 
    	'<div class="posted_in"><span class="title">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'kidza') . '</span> ', 
    	'</div>'
	);
	echo wc_get_product_tag_list($product->get_id(), '', '<div class="tagged_as"><span class="title">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'kidza') . '</span> ', '</div>');
	echo '</div>';
}

add_action('woocommerce_single_product_summary', 'kidza_woocommerce_sg_social_share', 40);
function kidza_woocommerce_sg_social_share(){
	$product_social_share = kidza()->get_theme_opt('product_social_share', true);
	if ($product_social_share): ?>
		<div class="woocommerce-social-share">
			<span class="title"><?php echo esc_html__('Share:', 'kidza'); ?></span>
			<a class="fb-social" title="<?php echo esc_attr__('Facebook', 'kidza'); ?>" target="_blank"
				href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"><i
					class="caseicon-facebook"></i></a>
			<a class="twx-social" title="<?php echo esc_attr__('X', 'kidza'); ?>" target="_blank"
				href="https://x.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"><i
					class="fab fa-x-twitter"></i></a>
			<a class="ig-social" title="<?php echo esc_attr__('Instagram', 'kidza'); ?>" target="_blank"
				href="https://www.instagram.com/?url=<?php echo urlencode(get_permalink()); ?>"><i
					class="fab fa-instagram"></i></a>
			<a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'kidza'); ?>" target="_blank"
				href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>&description=<?php echo urlencode(get_the_title()); ?>"><i
					class="fab fa-pinterest-p"></i></a>
		</div>
	<?php endif;
}
/* Product Single: Gallery */
add_action('woocommerce_before_single_product_summary', 'kidza_woocommerce_single_gallery_start', 0);
function kidza_woocommerce_single_gallery_start()
{ ?>
	<?php echo '<div class="woocommerce-gallery col-xl-5 col-lg-6 col-md-6"><div class="woocommerce-gallery-inner flex-slider-active">'; ?>
<?php }
add_action('woocommerce_before_single_product_summary', 'kidza_woocommerce_single_gallery_end', 30);
function kidza_woocommerce_single_gallery_end()
{ ?>
	<?php echo '</div></div><div class="woocommerce-summary-inner col-xl-7 col-lg-6 col-md-6">'; ?>
<?php }

/* Ajax update cart item */
add_filter('woocommerce_add_to_cart_fragments', 'kidza_woo_mini_cart_item_fragment');
function kidza_woo_mini_cart_item_fragment($fragments)
{
	global $woocommerce;
	$product_subtitle = kidza()->get_page_opt('product_subtitle');
	ob_start();
	?>
	<div class="widget_shopping_cart">
		<div class="widget_shopping_head">
			<div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
			<div class="widget_shopping_title">
				<?php echo esc_html__('Cart', 'kidza'); ?> <span
					class="widget_cart_counter">(<?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'kidza'), WC()->cart->cart_contents_count); ?>)</span>
			</div>
		</div>
		<div class="widget_shopping_cart_content">
			<?php
			$cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;
			?>
			<ul class="cart_list product_list_widget">
				<?php if (!WC()->cart->is_empty()): ?>
					<?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
						$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
						$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
						if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
							$product_name = apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key);
							$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
							$product_price = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
							?>
							<li>
								<?php if (!empty($thumbnail)): ?>
									<div class="cart-product-image">
										<a href="<?php echo esc_url($_product->get_permalink($cart_item)); ?>">
											<?php echo str_replace(array('http:', 'https:'), '', $thumbnail); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="cart-product-meta">
									<h5><a href="<?php echo esc_url($_product->get_permalink($cart_item)); ?>"><?php echo esc_html($product_name); ?></a></h5>
									<?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key); ?>
									<?php
									echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" class="remove_from_cart_button pxl-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
										esc_url(wc_get_cart_remove_url($cart_item_key)),
										esc_attr__('Remove this item', 'kidza'),
										esc_attr($product_id),
										esc_attr($cart_item_key),
										esc_attr($_product->get_sku())
									), $cart_item_key);
									?>
								</div>
							</li>
							<?php
						}
					}
					?>

				<?php else: ?>
					<li class="empty">
						<i class="caseicon-shopping-cart-alt"></i>
						<span><?php esc_html_e('Your cart is empty', 'kidza'); ?></span>
						<a class="btn btn-shop"
							href="<?php echo get_permalink(wc_get_page_id('shop')); ?>"><?php echo esc_html__('Browse Shop', 'kidza'); ?></a>
					</li>
				<?php endif; ?>

			</ul><!-- end product list -->
		</div>
		<?php if (!WC()->cart->is_empty()): ?>
			<div class="widget_shopping_cart_footer">
				<p class="total"><strong><?php esc_html_e('Subtotal', 'kidza'); ?>:</strong>
					<?php echo WC()->cart->get_cart_subtotal(); ?></p>

				<?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

				<p class="buttons">
					<a href="<?php echo esc_url(wc_get_cart_url()); ?>"
						class="btn btn-shop wc-forward"><?php esc_html_e('View Cart', 'kidza'); ?></a>
					<a href="<?php echo esc_url(wc_get_checkout_url()); ?>"
						class="btn checkout wc-forward"><?php esc_html_e('Checkout', 'kidza'); ?></a>
				</p>
			</div>
		<?php endif; ?>
	</div>
	<?php
	$fragments['div.widget_shopping_cart'] = ob_get_clean();
	return $fragments;
}

/* Ajax update cart total number */

add_filter('woocommerce_add_to_cart_fragments', 'kidza_woocommerce_sidebar_cart_count_number');
function kidza_woocommerce_sidebar_cart_count_number($fragments)
{
	ob_start();
	?>
	<span
		class="widget_cart_counter">(<?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'kidza'), WC()->cart->cart_contents_count); ?>)</span>
	<?php
	$fragments['span.widget_cart_counter'] = ob_get_clean();
	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'kidza_woocommerce_sidebar_cart_count_number_header');
function kidza_woocommerce_sidebar_cart_count_number_header($fragments)
{
	ob_start();
	?>
	<span
		class="widget_cart_counter_header"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'kidza'), WC()->cart->cart_contents_count); ?></span>
	<?php
	$fragments['span.widget_cart_counter_header'] = ob_get_clean();
	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'kidza_woocommerce_sidebar_cart_count_number_sidebar');
function kidza_woocommerce_sidebar_cart_count_number_sidebar($fragments)
{
	ob_start();
	?>
	<span
		class="ct-cart-count-sidebar"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'kidza'), WC()->cart->cart_contents_count); ?></span>
	<?php
	$fragments['span.ct-cart-count-sidebar'] = ob_get_clean();
	return $fragments;
}

add_filter('woocommerce_output_related_products_args', 'kidza_related_products_args', 20);
function kidza_related_products_args($args)
{
	$args['posts_per_page'] = 4;
	$args['columns'] = 4;
	return $args;
}

/* Pagination Args */
function kidza_filter_woocommerce_pagination_args($array)
{
	$array['end_size'] = 1;
	$array['mid_size'] = 1;
	return $array;
}
;
add_filter('woocommerce_pagination_args', 'kidza_filter_woocommerce_pagination_args', 10, 1);

/* Flex Slider Arrow */
add_filter('woocommerce_single_product_carousel_options', 'kidza_update_woo_flexslider_options');
function kidza_update_woo_flexslider_options($options)
{
	$options['directionNav'] = true;
	return $options;
}
function kidza_woocommerce_query($type = 'recent_product', $post_per_page = -1, $product_ids = '', $categories = '', $param_args = [])
{
	global $wp_query;
	$product_visibility_term_ids = wc_get_product_visibility_term_ids();
	if (!empty($product_ids)) {

		if (get_query_var('paged')) {
			$pxl_paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$pxl_paged = get_query_var('page');
		} else {
			$pxl_paged = 1;
		}
		$pxl_query = new WP_Query(array(
			'post_type' => 'product',
			'post__in' => array_map('intval', explode(',', $product_ids)),
			'tax_query' => array(
				array(
					'taxonomy' => 'product_visibility',
					'field' => 'term_taxonomy_id',
					'terms' => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
					'operator' => 'NOT IN',
				)
			),
		));
		$posts = $pxl_query;
		$categories = [];
	} else {
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $post_per_page,
			'post_status' => 'publish',
			'post_parent' => 0,
			'date_query' => array(
				array(
					'before' => date('Y-m-d H:i:s', current_time('timestamp'))
				)
			),
			'tax_query' => array(
				array(
					'taxonomy' => 'product_visibility',
					'field' => 'term_taxonomy_id',
					'terms' => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
					'operator' => 'NOT IN',
				)
			),
		);

		if (!empty($categories)) {

			$args['tax_query'][] = array(
				'taxonomy' => 'product_cat',
				'field' => 'slug',
				'operator' => 'IN',
				'terms' => $categories,
			);
		}

		if (!empty($param_args['pro_atts'])) {
			foreach ($param_args['pro_atts'] as $k => $v) {
				$args['tax_query'][] = array(
					'taxonomy' => $k,
					'field' => 'slug',
					'terms' => $v
				);
			}
		}

		$args['meta_query'] = array(
			'relation' => 'AND'
		);

		if (!empty($param_args['min_price']) && !empty($param_args['max_price'])) {
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => array($param_args['min_price'], $param_args['max_price']),
				'compare' => 'BETWEEN',
				'type' => 'DECIMAL(10,' . wc_get_price_decimals() . ')',
			);
		}

		$args = kidza_product_filter_type_args($type, $args);

		if (get_query_var('paged')) {
			$pxl_paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$pxl_paged = get_query_var('page');
		} else {
			$pxl_paged = 1;
		}
		if ($pxl_paged > 1) {
			$args['paged'] = $pxl_paged;
		}

		$posts = $pxl_query = new WP_Query($args);

		if (empty($categories)) {
			$product_categories = get_categories(array('taxonomy' => 'product_cat'));
			$categories = array();
			foreach ($product_categories as $key => $category) {
				$categories[] = $category->slug;
			}
		}
	}
	global $wp_query;
	$wp_query = $pxl_query;
	$pagination = get_the_posts_pagination(array(
		'screen_reader_text' => '',
		'mid_size' => 2,
		'prev_text' => esc_html__('Back', 'kidza'),
		'next_text' => esc_html__('Next', 'kidza'),
	));
	global $paged;
	$paged = $pxl_paged;


	wp_reset_query();
	return array(
		'posts' => $posts,
		'categories' => $categories,
		'query' => $pxl_query,
		'args' => $args,
		'paged' => $paged,
		'max' => $pxl_query->max_num_pages,
		'next_link' => next_posts($pxl_query->max_num_pages, false),
		'total' => $pxl_query->found_posts,
		'pagination' => $pagination
	);
}
function kidza_product_filter_type_args($type, $args)
{
	switch ($type) {
		case 'best_selling':
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
			$args['ignore_sticky_posts'] = 1;
			break;
		case 'featured_product':
			$args['ignore_sticky_posts'] = 1;
			$args['tax_query'][] = array(
				'taxonomy' => 'product_visibility',
				'field' => 'term_taxonomy_id',
				'terms' => $product_visibility_term_ids['featured'],
			);
			break;
		case 'top_rate':
			$args['meta_key'] = '_wc_average_rating';
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
			break;
		case 'recent_product':
			$args['orderby'] = 'date';
			$args['order'] = 'DESC';
			break;
		case 'on_sale':
			$args['post__in'] = wc_get_product_ids_on_sale();
			break;
		case 'recent_review':
			if ($post_per_page == -1)
				$_limit = 4;
			else
				$_limit = $post_per_page;
			global $wpdb;
			$query = $wpdb->prepare("SELECT c.comment_post_ID FROM {$wpdb->prefix}posts p, {$wpdb->prefix}comments c WHERE p.ID = c.comment_post_ID AND c.comment_approved > 0 AND p.post_type = 'product' AND p.post_status = 'publish' AND p.comment_count > 0 ORDER BY c.comment_date ASC LIMIT 0, %d", $_limit);
			$results = $wpdb->get_results($query, OBJECT);
			$_pids = array();
			foreach ($results as $re) {
				$_pids[] = $re->comment_post_ID;
			}

			$args['post__in'] = $_pids;
			break;
		case 'deals':
			$args['meta_query'][] = array(
				'key' => '_sale_price_dates_to',
				'value' => '0',
				'compare' => '>'
			);
			$args['post__in'] = wc_get_product_ids_on_sale();
			break;
		case 'separate':
			if (!empty($product_ids)) {
				$ids = array_map('trim', explode(',', $product_ids));
				if (1 === count($ids)) {
					$args['p'] = $ids[0];
				} else {
					$args['post__in'] = $ids;
				}
			}
			break;
	}
	return $args;
	
}