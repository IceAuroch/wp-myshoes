<?php

include_once('includes/myshoes-shortcodes.php');

setlocale(LC_CTYPE, 'ru_RU.utf8');
/*
 * Remove fonts:
 */
if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
endif;
/*
 * Remove RSS:
 */
remove_action('wp_head', 'rsd_link');
/*
 * Remove Wlwmanifest:
 */
remove_action('wp_head', 'wlwmanifest_link');
/*
 * Remove WP Generator:
 */
remove_action('wp_head', 'wp_generator');
/*
 * Show admin bar:
 */
show_admin_bar(false);
/*
 * Theme support:
 */
function theme_setup() {
    add_theme_support( 'title-tag' );

    add_theme_support( 'custom-header' );

    add_theme_support( 'custom-background' );

    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'main_menu' => 'Главное меню',
        'top_menu' => 'Верхнее меню',
        'footer_menu' => 'Меню футера'
    ) );
}
add_action( 'after_setup_theme', 'theme_setup' );
/*
 * Enqueue scripts and styles:
 */
function theme_scripts()
{
//    wp_deregister_script('wp-embed');
//    wp_deregister_script('jquery');
//    wp_deregister_script('jquery-migrate');


    wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.css' );
    wp_enqueue_style( 'colorbox', get_template_directory_uri() . '/css/colorbox.css' );
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
//    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.2.0.min.js', '', '', true );
    wp_enqueue_script( 'colorbox-ru', get_template_directory_uri() . '/js/jquery.colorbox-ru.js', '', '', true );
    wp_enqueue_script( 'maskedinput', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', '', '', true );
    wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', '', '', true );
    wp_enqueue_script( 'colorbox', get_template_directory_uri() . '/js/jquery.colorbox-min.js', '', '', true );
    wp_enqueue_script( 'imagescale', get_template_directory_uri() . '/js/image-scale.min.js', '', '', true );
    wp_enqueue_script( 'scrollreveal', get_template_directory_uri() . '/js/scrollreveal.min.js', '', '', true );
    wp_enqueue_script( 'functions', get_template_directory_uri() . '/js/common.js', '', '', true );

}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/*
 * Create custom post type:
 */
function create_testimonials_post()
{
  $labels = array(
    'name' => 'Отзывы',
    'singular_name' => 'Отзывы',
    'add_new' => 'Добавить отзыв',
    'add_new_item' => 'Добавить отзыв',
    'edit_item' => 'Редактировать отзыв',
    'new_item' => 'Новая отзыв',
    'view_item' => 'Посмотреть отзыв',
    'search_items' => 'Найти отзыв',
    'not_found' =>  'Ничего не найдено',
    'not_found_in_trash' => 'В корзине ничего не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Отзывы'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-format-chat',
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('testimonials',$args);
}
add_action('init', 'create_testimonials_post');

register_sidebar(array(
    'name' => 'Маленькие промо-блоки (2 шт):',
    'id' => 'small-promotion',
    'before_widget' => '<div class="column small-6 medium-6 large-6 small-promotion">',
    'after_widget' => '</div>',
    'before_title' => '<span class="hidden">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'name' => 'Сдвоенный промо-блок:',
    'id' => 'medium-promotion',
    'before_widget' => '<div class="column medium-promotion">',
    'after_widget' => '</div>',
    'before_title' => '<span class="hidden">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'name' => 'Вертикальный промо-блок:',
    'id' => 'vertical-promotion',
    'before_widget' => '<div class="column vertical-promotion">',
    'after_widget' => '</div>',
    'before_title' => '<span class="hidden">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'name' => 'Бренды:',
    'id' => 'brands',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<span class="hidden">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'name' => 'О нас (левая колонка):',
    'id' => 'about-1',
    'before_widget' => '<div class="about-entry about-entry-even">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));

register_sidebar(array(
    'name' => 'О нас (правая колонка):',
    'id' => 'about-2',
    'before_widget' => '<div class="about-entry about-entry-odd">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));

register_sidebar(array(
    'name' => 'Телефоны:',
    'id' => 'phones',
    'before_widget' => '<li><nobr rel="nofollow">',
    'after_widget' => '</nobr></li>',
    'before_title' => '<span class="hidden">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'name' => 'Адрес:',
    'id' => 'address',
    'before_widget' => '<address>',
    'after_widget' => '</address>',
    'before_title' => '<span class="hidden">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'name' => 'E-mail:',
    'id' => 'emails',
    'before_widget' => '<li><span rel="nofollow">',
    'after_widget' => '</span></li>',
    'before_title' => '<span class="hidden">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'name' => 'Социальные сети:',
    'id' => 'social',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => ''
));
/*
register_sidebar(array(
    'name' => 'График работы:',
    'id' => 'graph',
    'before_widget' => '<div class="graph"><nobr>',
    'after_widget' => '</nobr></div>',
    'before_title' => '<span class="hidden">',
    'after_title' => '</span>'
));
*/
register_sidebar(array(
    'name' => 'Слайдер в хедер:',
    'id' => 'top_slider',
    'before_widget' => '<div class="ts-item"><div class="ts-item--inner">',
    'after_widget' => '</div></div>',
    'before_title' => '<span class="ts_title">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'name' => 'Поиск:',
    'id' => 'search',
    'before_widget' => '<div class="searchbox">',
    'after_widget' => '</div>',
    'before_title' => '<div class="close"></div><span class="hidden">',
    'after_title' => '</span>'
));

register_sidebar(array(
    'name' => 'Преимущества:',
    'id' => 'advantages',
    'before_widget' => '<div class="column medium-6 large-3">',
    'after_widget' => '</div>',
    'before_title' => '<div class="advantages-title">',
    'after_title' => '</div>'
));

register_sidebar(array(
    'name' => 'Фильтр:',
    'id' => 'filter',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="filter-category-title">',
    'after_title' => '</h6>'
));

function new_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

add_filter('excerpt_more', function($more) {
    return '...';
});

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action('joe_woocommerce_layered_nav_bottom', 'is_clear_filters');
function is_clear_filters() {
    $filterreset = $_SERVER['REQUEST_URI'];
    if ( strpos($filterreset,'?filter_') !== false ) {
        return true;
    }
}

add_action('joe_woocommerce_layered_nav_bottom', 'clear_filters');
function clear_filters() {
    $filterreset = $_SERVER['REQUEST_URI'];
    $filterreset = strtok($filterreset, '?');
    echo '&times;&nbsp;<a class="underline" href="'.$filterreset.'">Сбросить фильтр</a>';
}

define( 'WOOCOMMERCE_USE_CSS', false );
add_filter( 'woocommerce_enqueue_styles', '__return_false');



function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}
add_action('init','remove_loop_button');


add_filter( 'woocommerce_currencies', 'add_my_currency' );
function add_my_currency( $currencies ) {
  $currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );
  return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
         case 'UAH': $currency_symbol = ' грн.'; break;
     }
     return $currency_symbol;
}

// Remove some checkout billing fields
function filter_billing_fields($fields){
    unset( $fields["billing_country"] );
    unset( $fields["billing_company"] );
    unset( $fields["billing_address_1"] );
    unset( $fields["billing_address_2"] );
    unset( $fields["billing_city"] );
    unset( $fields["billing_state"] );
    unset( $fields["billing_postcode"] );
    unset( $fields["billing_last_name"] );
    return $fields;
}
add_filter( 'woocommerce_billing_fields', 'filter_billing_fields' );


function filter_checkout_fields($fields){
    $fields['extra_fields'] = array(
            'delivery_city' => array(
                'type' => 'hidden',
                'required'=> false,
                'label' => __( 'Город' )
                ),
            'delivery_address' => array(
                'type' => 'hidden',
                'required' => false,
                'label' => __( 'Номер отделения' )
                )
            );

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'filter_checkout_fields' );

// display the extra field on the checkout form
function extra_checkout_fields(){
    //require_once('NovaPoshta/city.php');
    $checkout = WC()->checkout(); ?>

    <div class="extra-fields">
    <h3><?php _e( 'Детали доставки' ); ?></h3>
        <div class="city_checker">
            <input type="text" id="city_input" name="delivery_city" placeholder="Введите свой город" autocomplete="off">
            <label>Например <a href="#" class="city_link dotted">Киев</a>, <a href="#" class="city_link dotted">Львов</a>, <a href="#" class="city_link dotted">Харьков</a></label>
            <select id="city_list"></select>
        </div>
        <select id="street" disabled="disabled"></select>
        <input type="hidden" name="delivery_address" id="delivery_address" value="" />
    </div>

<?php }
add_action( 'woocommerce_checkout_after_customer_details' ,'extra_checkout_fields' );

// save the extra field when checkout is processed
function save_extra_checkout_fields( $order_id, $posted ){
    // don't forget appropriate sanitization if you are using a different field type
    if( isset( $posted['delivery_city'] ) ) {
        update_post_meta( $order_id, '_delivery_city', sanitize_text_field( $posted['delivery_city'] ) );
    }
    if( isset( $posted['delivery_address'] ) ) {
        update_post_meta( $order_id, '_delivery_address', sanitize_text_field( $posted['delivery_address'] ) );
    }
}
add_action( 'woocommerce_checkout_update_order_meta', 'save_extra_checkout_fields', 10, 2 );

// display the extra data on order recieved page and my-account order review
function display_order_data( $order_id ){  ?>
    <h2><?php _e( 'Детали доставки' ); ?></h2>
    <table class="shop_table shop_table_responsive additional_info">
        <tbody>
            <tr>
                <th><?php _e( 'Выберите город:' ); ?></th>
                <td><?php echo get_post_meta( $order_id, '_delivery_city', true ); ?></td>
            </tr>
            <tr>
                <th><?php _e( 'Выберите отделение:' ); ?></th>
                <td><?php echo get_post_meta( $order_id, '_delivery_address', true ); ?></td>
            </tr>
        </tbody>
    </table>
<?php }
add_action( 'woocommerce_thankyou', 'display_order_data', 20 );
add_action( 'woocommerce_view_order', 'display_order_data', 20 );


// display the extra data in the order admin panel
function display_order_data_in_admin( $order ) { ?>
    <p class="order_data_column_delivery">
        <h4><?php _e( 'Детали доставки', 'woocommerce' ); ?></h4>
        <?php
            echo '<p><strong>' . __( 'Город' ) . ': </strong>' . get_post_meta( $order->id, '_delivery_city', true ) . '</p>';
            echo '<p><strong>' . __( 'Отделение' ) . ': </strong>' . get_post_meta( $order->id, '_delivery_address', true ) . '</p>';
        ?>
    </p>
<?php }
add_action( 'woocommerce_admin_order_data_after_order_details', 'display_order_data_in_admin' );

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


add_action( 'add_meta_boxes', 'feature_customfield_add' );
function feature_customfield_add() {
    add_meta_box( 'featured', 'Популярные товары', 'feature_customfield', 'product', 'side', 'default' );
}

function feature_customfield(){
    global $post;
    $custom = get_post_custom($post->ID);

    if( $custom['featured'][0] == 'on' ) {
        $value = 'checked';
    } else {
        $value = '';
    }
    echo "<input type='checkbox' name='featured' id='f' $value />";
    echo "<label for='f' style='vertical-align: baseline;'>Показать в популярных товарах</label>";
}

add_action('save_post', 'update_featurecustomfield');
function update_featurecustomfield(){
    global $post;
    update_post_meta($post->ID, 'featured', $_POST['featured']);
}

add_action('woocommerce_sale_flash', 'sale_flash');
function sale_flash() {
    global $product;

    echo '<div class="percentage">';

    if ($product->is_on_sale() && $product->product_type == 'variable') :
            $available_variations = $product->get_available_variations();
            $maximumper = 0;
            for ($i = 0; $i < count($available_variations); ++$i) {
                $variation_id = $available_variations[$i]['variation_id'];
                $variable_product1 = new WC_Product_Variation( $variation_id );
                $regular_price = $variable_product1 ->regular_price;
                $sales_price = $variable_product1 ->sale_price;
                $percentage = round((( ( $regular_price - $sales_price ) / $regular_price ) * 100),1) ;
                    if ($percentage > $maximumper) {
                        $maximumper = $percentage;
                    }
                }

            echo '<div class="angle"></div>';
            echo $price . sprintf( __('%s', 'woocommerce' ), '-' . round($maximumper) . '%' );

    elseif ($product->is_on_sale() && $product->product_type == 'simple') :

            $percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
            echo $price . sprintf( __('%s', 'woocommerce' ), '-' . $percentage . '%' );

    endif;
    echo '</div>';
}

add_filter( 'get_availability', 'custom_get_availability', 1, 2);
function custom_get_availability() {
    global $product;
    //$stock = $product->get_total_stock();
    //change text "In Stock' to 'SPECIAL ORDER'
    if ( $product->is_in_stock() ) {
        echo '<div class="in-stock">В наличии</div>';
    }
    //change text "Out of Stock' to 'SOLD OUT'
    else {
        echo '<div class="out-of-stock">Нет в наличии</div>';
    }
}


remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

add_action( 'widgets_init', 'override_woocommerce_price_slider', 15 );
function override_woocommerce_price_slider() {
    if ( class_exists( 'WC_Widget_Price_Filter' ) ) {
        unregister_widget( 'WC_Widget_Price_Filter' );
        include_once( 'woocommerce/widgets/class-wc-widget-price-filter.php' );
        register_widget( 'Mymiles_WC_Widget_Price_Filter' );
    }
}

function update_wishlist_count(){
    if( function_exists( 'YITH_WCWL' ) ){
        print_r( YITH_WCWL()->count_products() );
    }
}
add_action( 'wp_ajax_update_wishlist_count', 'update_wishlist_count' );
add_action( 'wp_ajax_nopriv_update_wishlist_count', 'update_wishlist_count' );

function enqueue_custom_wishlist_js(){
    wp_enqueue_script( 'yith-wcwl-custom-js', get_template_directory_uri() . '/js/yith-wcwl-custom.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_wishlist_js' );




add_action( 'widgets_init', 'my_widget' );


function my_widget() {
    register_widget( 'Fa_Social' );
}

class Fa_Social extends WP_Widget {

    function Fa_Social() {
        $widget_ops = array( 'classname' => 'social', 'description' => 'Виджет выводит иконки социальных сетей' );

        $control_ops = array( 'id_base' => 'social-widget' );

        $this->WP_Widget( 'social-widget', __('Социальные сети', 'social'), $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );

        //Our variables from the widget settings.
        $title = apply_filters('widget_title', $instance['title'] );
        $link = $instance['link'];
        //$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

        echo $before_widget;

        if ( $link && $title )
            echo '<a href="' . $link . '" class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-' . $title . ' fa-stack-1x fa-inverse"></i></a>';

        echo $after_widget;
    }

    //Update the widget

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['link'] = strip_tags( $new_instance['link'] );

        return $instance;
    }


    function form( $instance ) {

        //Set up some default widget settings.
        $defaults = array( 'title' => '', 'link' => '' );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Социальная сеть</label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>">Ссылка на социальную сеть</label>
            <input id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" style="width:100%;" />
        </p>

    <?php
    }
}

function one_click_buy() {
    ?>
        <div class="one-click-form">
            <div class="close"></div>
            <form id="fast-form" onsubmit="gtag('event', 'fast-form', {'event_category': 'fast-form', 'event_action': 'submit'}); fbq('track', 'Lead'); return true;">
                <div class="row">
                    <div class="column medium-6 large-6">
                        <div class="images-container">
                            <div id="model-img"></div>
                        </div>
                    </div>
                    <div class="column medium-6 large-6">
                        <h3><span id="model-name"></span></h3>
                        <input type="hidden" name="model" id="model" value="<?php the_title(); ?>" />
                        <h2 id="model-price" class="price"><ins><span class="amount"></span></ins></h2>
                        <div class="user-info">
                            <p>Заполните, пожалуйста, данные чтобы мы могли связаться с Вами.</p>
                            <input type="text" id="o-name" name="name" placeholder="Ваше имя (обязательно)" />
                            <input type="tel" id="o-tel" name="tel" placeholder="Ваш телефон (обязательно)" />
                        </div>
                        <input type="hidden" name="size-of" value="<?php echo apply_filters( 'woocommerce_variation_option_name', $term->name ); ?>">
                        <button type="submit" class="button one-click-buy">Быстрый заказ</button>
                        <div class="success-message"><p>Ваша заявка успешно отправлена.<br><strong>Спасибо!</strong></p></div>
                        <div class="error-message"><p>Ошибки заполнения формы.<br><strong>Укажите все данные.</strong></p></div>
                    </div>
                </div>
            </form>
        </div>
    <?php
}

function one_click_buy_single() {
    ?>
        <div class="one-click-form-single">
            <div class="close"></div>
            <form id="fast-form-single" onsubmit="gtag('event', 'fast-form', {'event_category': 'fast-form', 'event_action': 'submit'}); fbq('track', 'Lead'); return true;">
                <div class="row">
                    <div class="column medium-6 large-6">
                        <div class="images-container">
                            <?php
                                if ( is_single() ) :
                                    if ( has_post_thumbnail( $loop->post->ID ) )
                                        echo get_the_post_thumbnail( $loop->post->ID, 'shop_catalog' );
                                    else
                                        echo '<img src="' . get_template_directory_uri() . '/images/no_image.jpg" alt="No image" />';
                                endif;
                            ?>
                        </div>
                    </div>
                    <div class="column medium-6 large-6">
                        <h3><?php the_title(); ?></h3>
                        <input type="hidden" name="model-single" id="model" value="<?php the_title(); ?>" />
                        <?php woocommerce_template_single_price(); ?>
                        <div class="user-info">
                            <p>Заполните, пожалуйста, данные чтобы мы могли связаться с Вами.</p>
                            <input type="text" id="o-name-single" name="name-single" placeholder="Ваше имя (обязательно)" />
                            <input type="tel" id="o-tel-single" name="tel-single" placeholder="Ваш телефон (обязательно)" />
                        </div>
                        <button type="submit" class="button one-click-buy-single">Быстрый заказ</button>
                        <div class="success-message"><p>Ваша заявка успешно отправлена.<br><strong>Спасибо!</strong></p></div>
                        <div class="error-message"><p>Ошибки заполнения формы.<br><strong>Укажите все данные.</strong></p></div>
                    </div>
                </div>
            </form>
        </div>
    <?php
}

function one_click_buy_button() {
    global $product;

    $output = '<!-- p class="product-link"><span class="button">Купить</span></p -->';
    $output .= '<input type="hidden" id="i-model-name" value="' . get_the_title( $loop->post->ID ) . '" />';
    $output .= '<input type="hidden" id="i-model-img" value="' . wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) . '" />';
    $output .= '<input type="hidden" id="i-model-price" value="' . $product->price . '" />';

    echo $output;
}

add_filter ('woocommerce_cart_shipping_method_full_label', 'wc_cart_totals_shipping_method_label_nofree', 10, 2);
function wc_cart_totals_shipping_method_label_nofree( $label, $method ) {
    $label = $method->label;

    if ( $method->cost > 0 ) {
        if ( WC()->cart->tax_display_cart == 'excl' ) {
            $label .= ': ' . wc_price( $method->cost );
            if ( $method->get_shipping_tax() > 0 && WC()->cart->prices_include_tax ) {
                $label .= ' <small>' . WC()->countries->ex_tax_or_vat() . '</small>';
            }
        } else {
            $label .= ': ' . wc_price( $method->cost + $method->get_shipping_tax() );
            if ( $method->get_shipping_tax() > 0 && ! WC()->cart->prices_include_tax ) {
                $label .= ' <small>' . WC()->countries->inc_tax_or_vat() . '</small>';
            }
        }
    } elseif ( $method->id !== 'free_shipping' ) {
        $label .= ' ';
    }
     return $label;
}

//wc_add_notice( apply_filters( 'wc_add_to_cart_message', $message, $product_id ) );

add_filter('wc_add_to_cart_message', 'handler_function_name', 10, 2);
function handler_function_name($message, $product_id) {
    global $product;
    $return_to  = get_permalink(woocommerce_get_page_id('shop'));
    $go_to_cart = get_permalink(woocommerce_get_page_id('cart'));
    $message = '<p>Товар <strong>«' . get_the_title( $product_id ) . '»</strong> успешно добавлен в корзину!</p>';
    $message .= '<div><a class="button go-to-cart" href="'. $go_to_cart .'">Перейти в корзину</a> <a class="button return-to" href="'. $return_to .'">Вернуться в магазин</a><div class="clear"></div></div>';
    return $message;
}

add_filter( 'woocommerce_billing_fields', 'custom_woocommerce_billing_fields' );

function custom_woocommerce_billing_fields( $fields ) {

   $fields['billing_first_name']    = array(
      'label'          => 'Ваше имя и фамилия',
      'placeholder'    => 'Имя и фамилия',
      'required'       => true,
      'class'          => array('billing-first-name')
   );

   $fields['billing_email']    = array(
      'label'          => 'Укажите e-mail для получения данных о статусе заказа.',
      'placeholder'    => 'Email-адрес',
      'required'       => true,
      'type'           => 'email',
      'class'          => array('billing-email')
   );

   $fields['billing_phone']    = array(
      'label'          => 'Контактный номер телефона',
      'placeholder'    => 'Телефон',
      'required'       => true,
      'type'           => 'tel',
      'class'          => array('billing-phone')
   );

   //$fields['delivery_city']    = array(
   //   'label'          => 'Город доставки',
   //   'placeholder'    => 'Введите свой город',
   //   'required'       => true,
   //   'type'           => 'text',
   //   'class'          => array('billing-city'),
   //   'id'             => 'city_input'
   //);
//
   //$fields['delivery_address']    = array(
   //   'label'          => '',
   //   'placeholder'    => '',
   //   'required'       => false,
   //   'type'           => 'text',
   //   'class'          => array('billing-address'),
   //   'id'             => 'delivery_address'
   //);

   return $fields;

}

$DISABLE_UPDATE = array( 'yith-woocommerce-wishlist');

// запрет обновления выборочных плагинов
function filter_plugin_updates( $update ) {
    global $DISABLE_UPDATE; // см. wp-config.php
    if( !is_array($DISABLE_UPDATE) || count($DISABLE_UPDATE) == 0 ){  return $update;  }
    foreach( $update->response as $name => $val ){
        foreach( $DISABLE_UPDATE as $plugin ){
            if( stripos($name,$plugin) !== false ){
                unset( $update->response[ $name ] );
            }
        }
    }
    return $update;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

add_filter( 'loop_shop_per_page', function ( $cols ) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    return 21;
}, 20 );

function custom_admin() {
   echo '<style type="text/css">
            .order_data_column_container .order_data_column:nth-child(3) { display: none; }
         </style>';
}

add_action('admin_head', 'custom_admin');

/**
 * Add new register fields for WooCommerce registration.
 *
 * @return string Register fields HTML.
 */
function wooc_extra_register_fields() {
    ?>

    <p class="form-row form-row-wide">
    <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>

    <?php
}

add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

/**
 * Validate the extra register fields.
 *
 * @param  string $username          Current username.
 * @param  string $email             Current email.
 * @param  object $validation_errors WP_Error object.
 *
 * @return void
 */
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {

    if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $validation_errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!.', 'woocommerce' ) );
    }
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );

/**
 * Save the extra register fields.
 *
 * @param  int  $customer_id Current customer ID.
 *
 * @return void
 */
function wooc_save_extra_register_fields( $customer_id ) {

    if ( isset( $_POST['billing_phone'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
}

add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

function save_additional_account_details( $user_ID ){
    $phone = ! empty( $_POST['billing_phone'] ) ? wc_clean( $_POST['billing_phone'] ) : '';
    update_user_meta( $user_ID, 'billing_phone', $phone );
}
add_action( 'woocommerce_save_account_details', 'save_additional_account_details' );

add_action('admin_head', 'my_custom_css');

function my_custom_css() {
	$current_user = wp_get_current_user();

    if ( $current_user->user_login != 'admin' ) {
        echo '<script>
            jQuery(document).ready(function($){
                $("#bulk-action-selector-top option[value=delete], #bulk-action-selector-bottom option[value=delete], #delete_all").remove();
            });
        </script>';
    }
}