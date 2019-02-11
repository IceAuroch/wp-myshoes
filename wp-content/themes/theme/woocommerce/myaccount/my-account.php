<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

//wc_print_notices(); ?>

<div class="row">
	<div class="column medium-4 large-3">
		<?php
            $args = array(
                'theme_location' => 'footer_menu',
                'container' => false,
                'items_wrap' => '<ul class="no-bullet account-menu %2$s">%3$s</ul>'
            );
            
            wp_nav_menu( $args );
        ?>
	</div>
	<div class="column medium-8 large-9">
		<p class="myaccount_user">
			<?php
				echo 'Вы вошли как <strong>' . $current_user->display_name . '.</strong> <a class="bordered-button" href="' . wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) . '">Выйти</a>';
			?>
		</p>

		<?php do_action( 'woocommerce_before_my_account' ); ?>

		<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

		<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

		<?php //wc_get_template( 'myaccount/my-address.php' ); ?>

		<?php do_action( 'woocommerce_after_my_account' ); ?>
	</div>
</div>