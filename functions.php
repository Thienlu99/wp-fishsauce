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


// Support woocommerce để làm template chính cho woocomaerce
function my_custom_wc_theme_support()
{

    add_theme_support('woocommerce');

    add_theme_support('wc-product-gallery-lightbox');

    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'my_custom_wc_theme_support');


// xóa breabum woocommerce
function remove_breadcrumb()
{
    remove_action("woocommerce_before_main_content", "woocommerce_breadcrumb", 20);
}
add_action('init', 'remove_breadcrumb');
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
