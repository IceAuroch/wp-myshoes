<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php //woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>

<div class="row column container">
		<div class="row column">
			<div class="category-title">
				<h1 itemprop="category">
                    <?php echo single_term_title(); ?>
                </h1>
			</div>
		</div>
		<div class="row">
			<div class="column medium-4 large-3">
				<div class="show-filter">
					<span class="bordered-button"><i class="fa fa-align-left"></i> <span>Показать фильтр</span></span>
				</div>
				<div class="filters">
					<?php if ( is_active_sidebar('filter') ) {
	                    dynamic_sidebar('filter');
	                } ?>
                </div>
			</div>
			<div class="column medium-8 large-9">

				<?php if ( have_posts() ) : ?>

					<?php woocommerce_product_loop_start(); ?>

						<?php //woocommerce_product_subcategories(); ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'product' ); ?>

						<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

				<?php else : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>

			</div>
		</div>

	<?php woocommerce_pagination(); ?>

		<section id="advantages">
			<div class="section-title">
				<h2>Наши преимущества</h2>
			</div>
			<div class="row collapse advantages">
				<?php if ( is_active_sidebar('advantages') ) {
                    dynamic_sidebar('advantages');
                } ?>
			</div>
			<div class="advantage-full-text">
				<div class="close"></div>
				<?php
					$i = 0;
	                $args = array( 'category__in' => 54, 'orderby' => 'date', 'order' => 'asc', 'posts_per_page' => 4 );
	                $query = new WP_Query( $args );
	                    while ( $query->have_posts() ) : $query->the_post();
	                    $i++;
	            ?>
	            	<div class="advantage-item">
	            		<?php the_content(); ?>
	            	</div>
	            <?php endwhile; ?>
			</div>
		</section>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	</div>








<?php get_footer( 'shop' );
