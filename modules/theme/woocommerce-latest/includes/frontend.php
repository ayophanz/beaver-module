<section class="<?php echo $module->get_classname(); ?>">
	<div class="woocommerce-category-inner woocommerce">
		<div class="products owl-carousel">
			<?php if ( class_exists( 'WooCommerce' ) ) {
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => $settings->total_item,
					'orderby' => 'date',
					'order' => 'DESC',
					);
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) : $loop->the_post();?>
							<div <?php post_class();?>>
								<?php //source = woo/templates/content-product.php
								/**
								 * woocommerce_before_shop_loop_item hook.
								 *
								 * @hooked woocommerce_template_loop_product_link_open - 10
								 */
								do_action( 'woocommerce_before_shop_loop_item' );
								/**
								 * woocommerce_before_shop_loop_item_title hook.
								 *
								 * @hooked woocommerce_show_product_loop_sale_flash - 10
								 * @hooked woocommerce_template_loop_product_thumbnail - 10
								 */
								do_action( 'woocommerce_before_shop_loop_item_title' );
								/**
								 * woocommerce_shop_loop_item_title hook.
								 *
								 * @hooked woocommerce_template_loop_product_title - 10
								 */
								do_action( 'woocommerce_shop_loop_item_title' );
								/**
								 * woocommerce_after_shop_loop_item_title hook.
								 *
								 * @hooked woocommerce_template_loop_rating - 5
								 * @hooked woocommerce_template_loop_price - 10
								 */
								do_action( 'woocommerce_after_shop_loop_item_title' );
								/**
								 * woocommerce_after_shop_loop_item hook.
								 *
								 * @hooked woocommerce_template_loop_product_link_close - 5
								 * @hooked woocommerce_template_loop_add_to_cart - 10
								 */
								do_action( 'woocommerce_after_shop_loop_item' ); ?>
							</div>
					<?php endwhile;
				} else {
					echo '<h6 class="no-found">';
					echo __( 'No products found' );
					echo '</h6>';
				}
			wp_reset_postdata();
			} ?>
		</div>
	</div>
</section>

