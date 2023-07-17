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
            'menu-footer-1' => esc_html__('Menu footer 1', 'menu-footer-1'),
            'menu-footer-2' => esc_html__('Menu footer 2', 'menu-footer-2'),
            'menu-footer-3' => esc_html__('Menu footer 3', 'menu-footer-3'),
            'menu-footer-4' => esc_html__('Menu footer 4', 'menu-footer-4'),
            //menu-top
            'header-top' => esc_html__('Menu Top', 'menu-top'),
        )
    );
    // đăng kí sliderbar
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
