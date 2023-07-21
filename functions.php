<?php

/**
 * THCmedia-company functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package THCmedia-company
 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue/enqueue.php';


require get_template_directory() . '/inc/woo-func/func.php';

/**
 * Enqueue scripts and styles.
 */

foreach (glob(get_template_directory() . '/inc/common/*.php') as $filename) {
    require $filename;
}

foreach (glob(get_template_directory() . '/inc/ajax/*.php') as $filename) {
    require $filename;
}


foreach (glob(get_template_directory() . '/inc/extra-function/*.php') as $filename) {
    require $filename;
}
function thcmedia_company_setup()
{
    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(

            'primary' => esc_html__('Primary', 'primary'),
            'header-top' => esc_html__('Menu Top', 'menu-top'),
            'menu-footer-1' => esc_html__('Menu footer 1', 'menu-footer-1'),
            'menu-footer-2' => esc_html__('Menu footer 2', 'menu-footer-2'),
            'menu-footer-3' => esc_html__('Menu footer 3', 'menu-footer-3'),
            'menu-footer-4' => esc_html__('Menu footer 4', 'menu-footer-4'),
            //menu-top

        )
    );
    // đăng kí sliderbar widget
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => 'Cột bên',
            'id' => 'sidebar',
        ));
    }
    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
}

add_action('after_setup_theme', 'thcmedia_company_setup');


// ---Theme-opption

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Single Product Settings',
        'menu_title' => 'Single Product',
        'parent_slug' => 'theme-general-settings',
    ));
}

// current price


// Support woocommerce để làm template chính cho woocomaerce---------------------------
function my_custom_wc_theme_support()
{

    add_theme_support('woocommerce');

    add_theme_support('wc-product-gallery-lightbox');

    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'my_custom_wc_theme_support');


// xóa breabum woocommerce------------------
function remove_breadcrumb()
{
    remove_action("woocommerce_before_main_content", "woocommerce_breadcrumb", 20);
}
add_action('init', 'remove_breadcrumb');

// --------------------------------------
//  mua ngay
/* them code mua ngay vao phần san pham*/
function show_buynow_product_box()
{
    global $product;
?>
    <div style="background-color:#AE1427;
    border: 1px solid rgba(0,0,0,.125);
    margin:0 auto;
	text-align: center;
    width:50%;
    padding:5px 0px;" class="buynow-pro"><a style="color:#FFFFFF; font-size: 13px;
    font-weight:600;" href="<?php echo get_permalink($product->ID); ?>">Mua ngay</a></div>
<?php
}

add_action('woocommerce_after_shop_loop_item', 'show_buynow_product_box');


/* them code mua ngay vao trang chi tiet san pham*/
add_action('woocommerce_after_add_to_cart_button', 'kids_quickbuy_after_addtocart_button');
function kids_quickbuy_after_addtocart_button()
{
    global $product;
?>
    <button style="background-color:#AE1427;" type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt btn-muangay" id="buy_now_button">Mua Ngay

    </button>
    <input type="hidden" name="is_buy_now" id="is_buy_now" value="0" />
    <script>
        jQuery(document).ready(function() {
            jQuery('body').on('click', '#buy_now_button', function() {
                if (jQuery(this).hasClass('disabled')) return;
                var thisParent = jQuery(this).closest('form.cart');
                jQuery('#is_buy_now', thisParent).val('1');
                thisParent.submit();
            });
        });

        // xử lý slider
        // Instantiate the Bootstrap carousel
        $('.multi-item-carousel').carousel({
            interval: false
        });

        // for every slide in carousel, copy the next slide's item in the slide.
        // Do the same for the next, next item.
        $('.multi-item-carousel .item').each(function() {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            if (next.next().length > 0) {
                next.next().children(':first-child').clone().appendTo($(this));
            } else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
<?php
}
?>

<?php
// nut contact lien he,fanpage--------
add_action('wp_footer', 'contact_footer');
function contact_footer()
{ ?>
    <div class="div-nut">
        <a href="tel:0914282009" class="nut-goi nut-action">
            <div><span class="tooltext">Gọi ngay</span></div>
        </a>
        <a href="http://zalo.me/0914282009" target="_blank" class="nut-zalo nut-action">
            <div><span class="tooltext">Chat với chúng tôi qua Zalo</span></div>
        </a>
        <a href="https://www.facebook.com/nuocmamtungvanhue" target="_blank" class="nut-face nut-action">
            <div><span class="tooltext">Facebook Messenger</span></div>
        </a>
    </div>
    <style>
        .div-nut {
            display: flex;
            flex-direction: column;
            font-size: 14px !important;
            position: fixed;
            z-index: 2147483647;
            bottom: 24px;
            right: 0;
            padding-left: 5px;
        }

        .div-nut:hover .nut-action {
            text-decoration: none !important;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15), 0 4px 15px rgba(0, 0, 0, 0.13);
        }

        .div-nut .nut-goi {
            background-image: url(https://test.nuocmamtungvan.com/wp-content/uploads/2023/07/phone-call.png);
        }

        .div-nut .nut-zalo {
            background-image: url(https://test.nuocmamtungvan.com/wp-content/uploads/2023/07/zalo-icon.png);
        }

        .div-nut .nut-face {
            background-image: url(https://test.nuocmamtungvan.com/wp-content/uploads/2023/07/messenger.png);
        }

        .div-nut>a {
            display: inline-block;
            overflow: visible !important;
            width: 54px !important;
            height: 54px !important;
            margin: 6px !important;
            background-size: 100% !important;
            border: 2px solid #fff !important;
            border-radius: 50% !important;
            margin: 8px;
            text-align: center;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: auto;
            cursor: pointer;
            position: relative;
        }

        a {
            color: #334862;
            text-decoration: none;
        }

        .div-nut .tooltext {
            /* visibility: hidden; */
            font-size: 12px !important;
            line-height: 16px !important;
            text-align: center;
            white-space: nowrap;
            border-radius: 4px;
            padding: 8px;
            position: absolute;
            top: calc(50% - 16px);
            z-index: 1;
            /* opacity: 0; */
            transition: opacity 0.5s;
            right: 120%;
            background-image: linear-gradient(180deg, #e57373 0%, #c62828 100%);
            color: #fff;
        }

        /* nut rieng */
        .nut-goi.nut-action:before {
            content: "";
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%) scale(0);
            -moz-transform: translate(-50%, -50%) scale(0);
            -ms-transform: translate(-50%, -50%) scale(0);
            -o-transform: translate(-50%, -50%) scale(0);
            border: 5px solid #feaf88;
            width: 100px;
            height: 100px;
            border-radius: 100%;
            display: block;
            -webkit-animation: spread-fade 1s ease-in infinite;
            animation: spread-fade 1s ease-in infinite;
        }

        .nut-goi.nut-action:after {
            display: block;
            -webkit-animation: spread-fade 1s .2s ease-in infinite;
            animation: spread-fade 1s .2s ease-in infinite;
            content: "";
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%) scale(0);
            -moz-transform: translate(-50%, -50%) scale(0);
            -ms-transform: translate(-50%, -50%) scale(0);
            -o-transform: translate(-50%, -50%) scale(0);
            border: 5px solid #feaf88;
            width: 100px;
            height: 100px;
            border-radius: 100%;
        }
    </style>

<?php } ?>
<!-- cart  -->

<?php  // <~ don't add me in

add_shortcode('woo_cart_but', 'woo_cart_but');
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but()
{
    ob_start();

    $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
    $cart_url = wc_get_cart_url();  // Set Cart URL

?>
    <li style="list-style:none ;"><a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="Giỏ Hàng">
            <?php
            if ($cart_count > 0) {
            ?>
                <span class="cart-contents-count"><?php echo $cart_count; ?></span>
            <?php
            }
            ?>
        </a></li>
<?php

    return ob_get_clean();
} ?>

<!-- --------- -->
<?php  // <~ don't add me in

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?></a>
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
?>
<!-- -----icon cart -->
<?php  // <~ don't add me in

add_filter( 'wp_nav_menu_primary', 'woo_cart_but_icon', 10, 2 ); // Change menu to suit - example uses 'top-menu'

/**
 * Add WooCommerce Cart Menu Item Shortcode to particular menu
 */
function woo_cart_but_icon ( $items, $args ) {
       $items .=  '[woo_cart_but]'; // Adding the created Icon via the shortcode already created
       
       return $items;
}
?>
