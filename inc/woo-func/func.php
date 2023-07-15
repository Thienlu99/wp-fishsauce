<?php
// Increase WooCommerce Variation Limit
function custom_wc_ajax_variation_threshold( $qty, $product ) {
    return 100;
}

add_filter( 'woocommerce_ajax_variation_threshold', 'custom_wc_ajax_variation_threshold', 100, 2 );
//Thêm VNĐ cho woo
add_filter('woocommerce_currencies', 'add_my_currency');
function add_my_currency($currencies)
{
    $currencies['vnd'] = __('Việt Nam Đồng', 'woocommerce');
    return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol($currency_symbol, $currency)
{
    switch ($currency) {
        case 'vnd':
            $currency_symbol = 'VNĐ';
            break;
    }
    return $currency_symbol;
}
