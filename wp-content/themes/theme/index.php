<?php get_header(); ?>

	<div class="row column container">

		<section id="promotion">
			<?php
				$banners = get_posts('category_name=bannery');
					if ( $banners ) : ?>
			<div class="banners">
				<div class="close"></div>
				<?php
	                $args = array( 'category__in' => 15, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1 );
	                $query = new WP_Query( $args );
	                    while ( $query->have_posts() ) : $query->the_post();
	            ?>
	            	<div class="banner-item">
	            		<?php the_content(); ?>
	            	</div>
	            <?php endwhile; ?>
			</div>
			<?php endif; ?>
			<div class="row collapse">
				<div class="column medium-8 large-8">
					<div class="row collapse">
						<?php if ( is_active_sidebar('small-promotion') ) {
                            dynamic_sidebar('small-promotion');
                        } ?>
					</div>
					<div class="row collapse">
						<?php if ( is_active_sidebar('medium-promotion') ) {
                            dynamic_sidebar('medium-promotion');
                        } ?>
					</div>
				</div>
				<div class="column medium-4 large-4">
					<div class="row collapse">
						<?php if ( is_active_sidebar('vertical-promotion') ) {
                            dynamic_sidebar('vertical-promotion');
                        } ?>
					</div>
				</div>
			</div>
		</section>

		<?php if ( is_active_sidebar('brands') ) { ?>
		<section id="brands">
			<div class="brands-list">
	           	<?php dynamic_sidebar('brands'); ?>
	        </div>
		</section>
		<?php } ?>

		<section id="featured">
			<?php

			    $meta_query   = WC()->query->get_meta_query();
				$meta_query[] = array(
				    'key'   => 'featured',
				    'value' => 'on'
				);
				$args = array(
				    'post_type'   =>  'product',
				    'stock'       =>  '1',
				    'showposts'   =>  '-1',
				    'orderby'     =>  'date',
				    'order'       =>  'DESC',
				    'meta_query'  =>  $meta_query
				);

			    $loop = new WP_Query( $args );
			    while ( $loop->have_posts() ) : $loop->the_post(); ?>

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

			<?php 
			    endwhile;
			    wp_reset_query(); 
			?>
		</section>

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

		<section id="testimonials">
			<div class="section-title">
				<h2>Отзывы</h2>
			</div>
			<div class="testimonials">
				<?php
	                $args = array( 'post_type' => 'testimonials', 'order' => 'DESC' );
	                $query = new WP_Query( $args );
	                while ( $query->have_posts() ) : $query->the_post();
	            ?>
	            	<article>
		            	<div class="testimonial-image" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);"></div>
		            	<div class="testimonial-text">
			            	<h4><?php the_title(); ?></h4>
			            	<p class="date"><strong><?php echo get_the_date(); ?></strong></p>
			            	<?php the_content(); ?>
		            	</div>
	            	</article>
	            <?php endwhile; ?>
			</div>
		</section>
	</div>
<?php get_footer(); ?>