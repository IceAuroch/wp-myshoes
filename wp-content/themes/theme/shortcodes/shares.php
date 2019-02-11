<div class="row products shares equalizer">
<?php
    if($id != 0 && is_single()) {
            
        $products = explode(',', $id);

        $query = new WP_Query( 
            array( 'post_type' => 'product', 'post__in' => $products ) 
        );

        while ( $query->have_posts() ) : $query->the_post();
            global $product;
    ?>
            <div class="column medium-6 large-4">
            <div class="prodict-inner">
                <?php sale_flash(); ?>
                <div class="add-to-favourites"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
                <a class="view-product" href="<?php the_permalink(); ?>">
                    <p>
                        <?php
                            if ( has_post_thumbnail( $query->post->ID ) ) 
                                echo get_the_post_thumbnail( $query->post->ID, 'shop_catalog' ); 
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
    <?php                 
        endwhile;
        wp_reset_query();        
    } ?>
</div>                                                                