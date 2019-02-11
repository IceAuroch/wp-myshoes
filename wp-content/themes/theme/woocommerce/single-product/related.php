<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related();

if ( sizeof( $related ) === 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => 4,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->get_id() )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class="related-products">

		<h3 align="center">Возможно Вам понравится</h3>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); $product = new WC_Product( get_the_ID() ); ?>

				<div class="column medium-6 large-3">
					<div class="prodict-inner">
			        	<?php sale_flash(); ?>
			        	<div class="add-to-favourites"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
			        	<a class="view-product" href="<?php the_permalink(); ?>">

				            <p>
				            <?php
				                if ( has_post_thumbnail( $loop->post->ID ) ) 
				                    echo get_the_post_thumbnail( $loop->post->ID, 'shop_catalog' ); 
				                else 
				                    echo '<img src="' . get_template_directory_uri() . '/images/no_image.jpg" alt="No image" />'; 
				            ?>
				            </p>

				            <p><?php the_title(); ?></p>

				            <h4 class="price"><?php echo $product->get_price_html(); ?></h4>

			            </a>

			            <?php one_click_buy_button(); ?>
			           
			        </div>
				</div>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
