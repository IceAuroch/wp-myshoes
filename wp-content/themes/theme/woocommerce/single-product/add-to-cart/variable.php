<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.1
 */

defined( 'ABSPATH' ) || exit;

global $woocommerce, $product, $post;
?>

<script type="text/javascript">
    var product_variations_<?php echo $post->ID; ?> = <?php echo json_encode( $available_variations ) ?>;
</script>

<?php
	if ( $product->is_in_stock() ) :
	do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo $post->ID; ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">
	<div class="row">

		<div class="column medium-6 large-6">

				<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

				<div class="single_variation_wrap">
					<?php do_action( 'woocommerce_before_single_variation' ); ?>

					<h5 class="bolder">Цена</h5>

					<?php woocommerce_template_single_price(); ?>

					<div class="variations_button">
						<div class="vb-block">
							<strong>Укажите кол-во.: </strong>
						</div>
						<div class="quantity-container vb-block">
							<div class="quantity">
								<a href="#" class="borderless q_down"><i class="fa fa-minus-square"></i></a>
						       	<input type="text" name="quantity" class="quantity_wanted" size="2" value="1">
						        <a href="#" class="borderless q_up"><i class="fa fa-plus-square"></i></a>
					       	</div>
						</div>

						<!--
						<br class="clear" style="margin-bottom: 1rem;" />

						<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>
						<button type="button" id="one-click-single" class="button">Быстрый заказ</button>
						-->
					</div>

					<input type="hidden" name="add-to-cart" value="<?php echo $product->get_id(); ?>" />
					<input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
					<input type="hidden" name="variation_id" value="" />

					<?php do_action( 'woocommerce_after_single_variation' ); ?>
				</div>

				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

				<?php endif; ?>

			</div>

			<div class="column medium-6 large-6">

			<?php if ( ! empty( $available_variations ) ) : ?>
				<h5 class="bolder">Выбери свой размер</h5>
					<dl class="variations">
						<?php $loop = 0; foreach ( $attributes as $name => $options ) : $loop++; ?>
		                        <?php
		                            if ( is_array( $options ) ) {

		                                if ( empty( $_POST ) )
		                                    $selected_value = ( isset( $selected_attributes[ sanitize_title( $name ) ] ) ) ? $selected_attributes[ sanitize_title( $name ) ] : '';
		                                else
		                                    $selected_value = isset( $_POST[ 'attribute_' . sanitize_title( $name ) ] ) ? $_POST[ 'attribute_' . sanitize_title( $name ) ] : '';
										//echo   $selected_value;
		                                // Get terms if this is a taxonomy - ordered
		                                if ( taxonomy_exists( sanitize_title( $name ) ) ) {

		                                    $terms = get_terms( sanitize_title($name), array('menu_order' => 'ASC') );

		                                    foreach ( $terms as $term ) {
		                                        if ( ! in_array( $term->slug, $options ) ) continue;
		                                        echo '<dd><input type="radio" value="' . strtolower($term->slug) . '" ' . checked( strtolower ($selected_value), strtolower ($term->slug), false ) . ' id="size_'. $term->slug .'" name="attribute_'. sanitize_title($name).'"><label for="size_'. $term->slug .'">' . apply_filters( 'woocommerce_variation_option_name', $term->name ).'</label></dd>';
		                                    }
		                                } else {
		                                    foreach ( $options as $option )
		                                        echo '<dd><input type="radio" value="' .esc_attr( sanitize_title( $option ) ) . '" ' . checked( sanitize_title( $selected_value ), sanitize_title( $option ), false ) . ' id="size_'. $term->slug .'" name="attribute_'. sanitize_title($name).'"><label for="size_'. $term->slug .'">' . apply_filters( 'woocommerce_variation_option_name', $term->name ).'</label></dd>';
		                                }
		                            }
		                        ?>
		                    </fieldset>
		                    	<div class="clear"></div>
		                    	<p style="margin-top: 1rem;"><a class="underline" href="<?php echo get_template_directory_uri() . '/images/132-nike-new-balance.jpg'; ?>">Как определить свой размер</a></p>
		                    	<?php
									if ( sizeof( $attributes ) == $loop )
										echo '<p><a class="reset_variations bordered-button" href="#reset">Сбросить</a></p>';
								?>
				        <?php endforeach;?>
				</dl>

			</div>
		</div>

		<div class="row column">
			<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>
			<!-- button type="button" id="one-click-single" class="button">Быстрый заказ</button -->
		</div>


</form>

<?php
	do_action( 'woocommerce_after_add_to_cart_form' );
	endif; ?>