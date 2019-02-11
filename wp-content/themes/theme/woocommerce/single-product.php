<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="row column container">
				<div class="row">

					<div class="column medium-6 large-5">
						<div class="images-container">
							<?php woocommerce_show_product_sale_flash(); ?>
							<?php woocommerce_show_product_images(); ?>
						</div>
					</div>

					<div class="column medium-6 large-7">
						<?php
							woocommerce_template_single_title();
							custom_get_availability();
						?>
						<div class="product-description" itemprop="description">
							<?php the_content(); ?>
						</div>
						<?php
							if ( $product->is_in_stock() ) :
								if( $product->is_type( 'simple' ) ){
									woocommerce_simple_add_to_cart();
								} elseif( $product->is_type( 'variable' ) ){
									woocommerce_variable_add_to_cart();
								}
							endif;
						?>
					</div>
					
				</div>

				<div class="row characteristics">
					<div class="column medium-6 large-6">
						<div class="section-title">
							<h3>Характеристики</h3>
						</div>
						<?php include dirname( __FILE__ ) . '/single-product/product-attributes.php'; ?>
					</div>
					<div class="column medium-6 large-6">
						<?php comments_template(); ?>
					</div>
				</div>
				<?php woocommerce_related_products(); ?>
			</div>

		<?php endwhile; // end of the loop. ?>

<?php get_footer( 'shop' ); ?>
