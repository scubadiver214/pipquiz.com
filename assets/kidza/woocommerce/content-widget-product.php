<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
	<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php echo ''.$product->get_image(); ?>
	</a>
	<div class="item-right">
		<?php if ( ! empty( $show_rating ) ) : ?>
			<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
		<?php endif; ?>
		<h6 class="product-title"><?php echo wp_kses_post( $product->get_name() ); ?></h6>
		<?php echo ''.$product->get_price_html(); ?>
	</div>
	
	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
