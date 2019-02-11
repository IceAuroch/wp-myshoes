<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product, $woocommerce_loop;;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="column medium-6 large-4">
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
