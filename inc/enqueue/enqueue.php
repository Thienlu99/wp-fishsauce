<?php

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

function thcmedia_company_scripts() {

    // add css
    wp_enqueue_style('magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css', false, _S_VERSION, 'all');
    //    CSS
    wp_enqueue_style( 'thcmedia-company-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style('jquery-uicss', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css', false, _S_VERSION, 'all');


    wp_enqueue_style('photoswipe', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css', false, _S_VERSION, 'all');
    wp_enqueue_style('skin', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css', false, _S_VERSION, 'all');

    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha3/css/bootstrap.min.css', false, _S_VERSION, 'all');
    wp_enqueue_style('xzoom', 'https://unpkg.com/xzoom@1.0.15/dist/xzoom.css', false, _S_VERSION, 'all');
    wp_enqueue_style('animate-thc', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', false,
        _S_VERSION, 'all');
    wp_enqueue_style('slick-thc', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', false,_S_VERSION, 'all');
    wp_enqueue_style('slick-theme-thc', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css?ver=1.0.0', false,_S_VERSION, 'all');
    wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', false,
        _S_VERSION, 'all');

    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', false, null, 'all');

    /**
     * Content: Default style website
     * @creator Tuyên
     * @time 03/04/2023 20:02
     */

    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', false, _S_VERSION,
        'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', false, _S_VERSION,
        'all');
    wp_enqueue_style('component', get_template_directory_uri() . '/assets/css/component.css', false, _S_VERSION,
        'all');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', false, _S_VERSION,
        'all');
    /**
     * Content: END css
     * @creator Tuyên
     * @time 03/04/2023 20:05
     */

    foreach (glob(get_template_directory() . '/assets/css/default/*.css') as $filename) {
        wp_enqueue_style('default-'.basename($filename, '.css'), get_template_directory_uri().'/assets/css/default/'.basename($filename), false, _S_VERSION,
            'all');
    }

    //JS
    wp_enqueue_script('thcmediatheme-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(),
        null, true);
    wp_enqueue_script('jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js', array(),
        null, true);
    wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha3/js/bootstrap.bundle.min.js', array(),
        null, true);
    wp_enqueue_script('thcmediatheme-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(),
        null, true);
    wp_enqueue_script('vanilla', 'https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/17.8.3/lazyload.min.js', array(),
        null, true);
    wp_enqueue_script('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.0.9/index.min.js', array(),
        null, true);
    wp_enqueue_script('thcmedia-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(),
        null, true);

    wp_enqueue_script('thcmediatheme-photoswipe', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js', array(), null, true);
    wp_enqueue_script('thcmediatheme-photoswipe-ui', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js', array(), null, true);


// components js
    foreach (glob(get_template_directory() . '/assets/js/*.js') as $filename) {
        wp_enqueue_script('thc-'.basename($filename, '.js'), get_template_directory_uri().'/assets/js/'
            .basename($filename), array(), _S_VERSION, true);
    }
    foreach (glob(get_template_directory() . '/assets/js/components/*.js') as $filename) {
        wp_enqueue_script('component-'.basename($filename, '.js'), get_template_directory_uri().'/assets/js/components/'.basename($filename), array(), _S_VERSION, true);
    }

// add js

    wp_enqueue_script('jquery-magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array(),
        null, true);



}
add_action( 'wp_enqueue_scripts', 'thcmedia_company_scripts' );
?>
