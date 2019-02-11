<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="google-site-verification" content="gYEh9zcsdwbYO9TjgRKVJsT_NoceHKxA9xHMzU3KoUk" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115783458-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-115783458-1');
</script>
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PZB4W7Q');</script>
<!-- End Google Tag Manager -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<style type="text/css">
    .gradient {
       filter: none;
    }
</style>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php if ( is_page('contacts') ) $class = 'contacts-page'; body_class( $class ); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZB4W7Q"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <div class="show-phones"><i class="fa fa-phone"></i></div>
    <div class="hidden-phones">
        <div>
            <ul class="no-bullet phones">
                <?php if ( is_active_sidebar('phones') ) {
                    dynamic_sidebar('phones');
                } ?>
            </ul>
        </div>
    </div>
	<div class="layout">
        <div class="layout-inner">
            <header>
                <div class="row column container top-menu--container">
                    <div class="row">
                        <div class="column medium-12 large-8">
                            <?php
                                $args = array(
                                    'theme_location' => 'top_menu',
                                    'container' => false,
                                    'items_wrap' => '<ul class="no-bullet top-menu %2$s">%3$s</ul>'
                                );

                                wp_nav_menu( $args );
                            ?>
                        </div>
                        <div class="column large-4 top-phones">
                            <div class="contact-info">
                                <ul class="no-bullet">
                                    <li>
										<a href="tel:+380672808136"> 067 280 81 36 </ a>
                                        <ul class="no-bullet">
                                        <?php if ( is_active_sidebar('phones') ) {
                                            dynamic_sidebar('phones');
                                        } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-menu--container">
                    <div class="row column container">
                        <div class="row">
                            <div class="column medium-3 large-3">
                                <?php if ( is_front_page() ) : ?>
                                    <h1 class="logo">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/myshoes_logo3.svg" />
                                    </h1>
                                <?php else : ?>
                                    <div class="logo">
                                        <a href="<?php echo get_site_url(); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/myshoes_logo3.svg" />
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="column medium-9 large-6">
                                <ul class="no-bullet main-menu menu">
                                    <li><a href="<?php echo get_site_url(); ?>/shoes/man-shoes/">Мужская обувь</a>
                                        <div class="sub-menu">
                                            <ul class="no-bullet">
                                                <li class="sub-menu-title"><strong>Категория</strong></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_shoes=ugg-boots">Угги</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&source_id=12&source_tax=product_cat&filter_shoes=boots">Ботинки</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_shoes=keds">Кеды</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_shoes=sneakers">Кроссовки</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_shoes=sandals-slippers">Сандалии и шлепки</a></li>
                                            </ul>
                                            <ul class="no-bullet">
                                                <li class="sub-menu-title"><strong>Бренд</strong></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=ugg">UGG</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=timberland">Timberland</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=balenciaga">Balenciaga</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=nike">Nike</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=nb">New Balance</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=converse">Converse</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shoes/man-shoes">Vans</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=puma">Puma</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=adidas">Adidas</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=reebok">Reebok</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=under-armour">Under Armour</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=fila">Fila</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=asics">Asics</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=jordan">Jordan</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=man-shoes&filter_manufacturer=lv">Louis Vuitton</a></li>
                                            </ul>
                                            <br class="clear" />
                                            <div class="category-link"><a class="bordered-button" href="<?php echo get_site_url(); ?>/shoes/man-shoes/">Весь раздел &#8250;</a></div>
                                        </div>
                                    </li>
                                    <li><a href="<?php echo get_site_url(); ?>/shoes/women-shoes/">Женская обувь</a>
                                        <div class="sub-menu">
                                            <ul class="no-bullet">
                                                <li class="sub-menu-title"><strong>Категория</strong></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_shoes=ugg-boots">Угги</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&source_id=13&source_tax=product_cat&filter_shoes=boots">Ботинки</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_shoes=keds">Кеды</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_shoes=sneakers">Кроссовки</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_shoes=sandals-slippers">Сандалии и шлепки</a></li>
                                            </ul>
                                            <ul class="no-bullet">
                                                <li class="sub-menu-title"><strong>Бренд</strong></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=ugg">UGG</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=timberland">Timberland</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=balenciaga">Balenciaga</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=nike">Nike</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=nb">New Balance</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=converse">Converse</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shoes/women-shoes/">Vans</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=puma">Puma</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=adidas">Adidas</a></li>
                                                <li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=reebok">Reebok</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=under-armour">Under Armour</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=fila">Fila</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=asics">Asics</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=jordan">Jordan</a></li>
												<li><a href="<?php echo get_site_url(); ?>/shop/?product_cat=women-shoes&filter_manufacturer=lv">Louis Vuitton</a></li>
                                            </ul>
                                            <br class="clear" />
                                            <div class="category-link"><a class="bordered-button" href="<?php echo get_site_url(); ?>/shoes/man-shoes/">Весь раздел &#8250;</a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="column medium-12 large-3">
                                <div class="cart-container">
                                    <?php if ( is_active_sidebar('search') ) {
                                        dynamic_sidebar('search');
                                    } ?>
                                    <span class="open-search"></span>
                                    <a class="favourites" href="<?php echo get_site_url(); ?>/wishlist/view/">
                                        <span><?php echo update_wishlist_count(); ?></span>
                                    </a>
                                    <a class="cart" href="<?php echo WC()->cart->get_cart_url(); ?>">
                                        <?php if ( ! WC()->cart->get_cart_contents_count() == '0' ) echo '<span>' . WC()->cart->get_cart_contents_count() . '</span>'; ?>
                                    </a>
                                    <?php if ( is_user_logged_in() ) : ?>
                                        <a class="user" href="<?php the_permalink(7); ?>"></a>
                                    <?php else : ?>
                                        <span class="user"></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <?php wc_print_notices(); ?>
        <div class="auth">
            <div class="close"></div>
            <?php echo do_shortcode('[woocommerce_my_account]'); ?>
        </div>
        <div class="top-slider">
            <?php if ( is_active_sidebar('top_slider') ) {
                dynamic_sidebar('top_slider');
            } ?>
        </div>