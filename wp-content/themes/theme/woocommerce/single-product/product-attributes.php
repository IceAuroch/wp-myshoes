<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
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
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$has_row    = false;
$alt        = 1;
$attributes = $product->get_attributes();

ob_start();

?>
<dl class="attributes">

	<?php if ( $product->enable_dimensions_display() ) : ?>

		<?php if ( $product->has_weight() ) : $has_row = true; ?>
			<tr class="<?php if ( ( $alt = $alt * -1 ) === 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Weight', 'woocommerce' ) ?></th>
				<td class="product_weight"><?php echo $product->get_weight() . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $product->has_dimensions() ) : $has_row = true; ?>
			<tr class="<?php if ( ( $alt = $alt * -1 ) === 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Dimensions', 'woocommerce' ) ?></th>
				<td class="product_dimensions"><?php echo $product->get_dimensions(); ?></td>
			</tr>
		<?php endif; ?>

	<?php endif; ?>

	<?php

		$attributes['pa_shoes']['position'] = '1';
		$attributes['pa_manufacturer']['position'] = '2';
		$attributes['pa_sex']['position'] = '3';
		$attributes['pa_season']['position'] = '4';
		$attributes['pa_color']['position'] = '5';

		$tmp = Array();
		foreach( $attributes as $ma ) {
		    $tmp[] = $ma['position'];
		}

		array_multisort( $tmp, $attributes );

	?>

	<?php foreach ( $attributes as $attribute ) :
		if ( $attribute['is_variation'] ) {
            continue;
        }
		else if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
			continue;
		} else {
			$has_row = true;
		}
		?>
			<dt><span><?php echo wc_attribute_label( $attribute['name'] ); ?></span></dt>
			<dd><?php
				if ( $attribute['is_taxonomy'] ) {

					$values = wc_get_product_terms( $product->get_id(), $attribute['name'], array( 'fields' => 'names' ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				} else {

					// Convert pipes to commas and display values
					$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
					echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

				}
			?></dd>
			<div class="clear"></div>
	<?php endforeach; ?>

</dl>
<?php
if ( $has_row ) {
	echo ob_get_clean();
} else {
	ob_end_clean();
}
