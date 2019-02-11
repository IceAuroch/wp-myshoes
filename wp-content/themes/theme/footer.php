            <div class="callback-message">
                <div class="close"></div>
                <?php echo do_shortcode('[contact-form-7 id="178" title="Обратный звонок"]'); ?>
            </div>
            <div class="feedback-message">
                <div class="close"></div>
                <?php echo do_shortcode('[contact-form-7 id="982" title="Написать нам"]'); ?>
            </div>
            <?php
                one_click_buy();
                if ( is_singular( 'product' ) ) one_click_buy_single();
            ?>
            <div class="outer"></div>
        </div><!-- .layout-inner -->
    </div><!-- .layout -->
        <footer>
            <div class="row column container">
                <div class="row">
                    <div class="column medium-4 large-6">
                        <?php if ( is_front_page() ) : ?>
                            <p>
                                <span class="logo">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/myshoes_logo3.svg" />
                                </span>
                            </p>
                        <?php else : ?>
                            <p>
                                <a class="logo" href="<?php echo get_site_url(); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/myshoes_logo3.svg" />
                                </a>
                            </p>
                        <?php endif; ?>
                        <ul class="no-bullet">
                            <?php if ( is_active_sidebar('phones') ) {
                                dynamic_sidebar('phones');
                            } ?>
                        </ul>
                    </div>
                    <div class="column medium-4 footer-menu--container">
                        <?php
                            $args = array(
                                'theme_location' => 'top_menu',
                                'container' => false,
                                'items_wrap' => '<ul class="no-bullet footer-menu %2$s">%3$s</ul>'
                            );
                            
                            wp_nav_menu( $args );
                        ?>
                    </div>
                    <div class="column medium-4 large-6 alignright">
                        <p><a class="bordered-button-dark" href="#callback">Обратный звонок</a></p>
                        <p>Задай вопрос в чате:</p>
                        <p>
                            <?php if ( is_active_sidebar('social') ) {
                                dynamic_sidebar('social');
                            } ?>
                        </p>
                    </div>
                </div>
                <div class="row column copyright">
                    <p>&copy; 2015&ndash;<?php echo date('Y'); echo ' '; echo get_bloginfo ('name'); ?></p>
                </div>
            </div>
        </footer>
	<?php wp_footer(); ?>
	<script>

		
        window.sr = ScrollReveal();
        //sr.reveal('.advantages', {
        //    distance: '120px',
        //    origin: 'top',
        //    reset: false,
        //    viewFactor: 0.2,
        //    mobile: false
        //});