<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="row column container">
			<?php if ( is_page( 'warranty' ) ) : get_template_part( 'templates/page', 'warranty' );
			elseif ( is_page( 'about' ) ) : ?>
				<div class="post-media">
					<?php echo the_post_thumbnail(); ?>
				</div>
				<div class="row">
					<div class="column medium-6 large-6">
						<?php if ( is_active_sidebar('about-1') ) {
		                    dynamic_sidebar('about-1');
		                } ?>
	                </div>
	                <div class="column medium-6 large-6">
						<?php if ( is_active_sidebar('about-2') ) {
		                    dynamic_sidebar('about-2');
		                } ?>
	                </div>
                </div>
            <?php elseif ( is_page('contacts') ) : ?>
            	<div class="row equalizer">
            		<div class="column small-6 medium-6 large-3">
            			<h4>Наш адрес</h4>
            			<?php if ( is_active_sidebar('address') ) {
                            dynamic_sidebar('address');
                        } ?>
            		</div>
            		<div class="column small-6 medium-6 large-3">
            			<h4>Мессенджеры</h4>
            			<ul class="no-bullet">
	            			<?php if ( is_active_sidebar('emails') ) {
	                            dynamic_sidebar('emails');
	                        } ?>
                        </ul>
            		</div>
            		<div class="column small-6 medium-6 large-3">
            			<h4>Телефоны:</h4>
            			<ul class="no-bullet">
            				<?php if ( is_active_sidebar('phones') ) {
                                dynamic_sidebar('phones');
                            } ?>
            			</ul>
            		</div>
            		<div class="column small-6 medium-6 large-3">
            			<h5>Мы в социальных сетях:</h5>
            			<p>
	            			<?php if ( is_active_sidebar('social') ) {
					            dynamic_sidebar('social');
					        } ?>
				        </p>
				        <p><a class="button" href="#feedback">Написать нам</a></p>
            		</div>
		        </div>
		    </div>

		    <div class="row column container">
			<?php else : ?>
				<?php woocommerce_template_single_title(); ?>
				<div class="content-entry">				
					<div class="post-entry">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php endwhile; ?>
<?php get_footer(); ?>