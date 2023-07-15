<?php

/**
 * Content: Hàm này add sản phẩm vào giỏ hàng. Bao gồm ID, Số lượng, các biến thể
 * @creator Tuyên
 * @time 15/12/2022 09:45
 */
 
function add_to_cart()
{
    $id = isset($_POST['id']) ? esc_attr($_POST['id']) : null;
    $variation_id = isset($_POST['variation_id']) ? esc_attr($_POST['variation_id']) : null;
    $quantity = isset($_POST['quantity']) ? esc_attr($_POST['quantity']) : 1;
    $remove = isset($_POST['remove']) ? esc_attr($_POST['remove']) : false;
    $add = isset($_POST['add']) ? esc_attr($_POST['add']) : false;
    $cartId = WC()->cart->generate_cart_id($id);
    $cartItemKey = WC()->cart->find_product_in_cart( $cartId );
    if($add) {
        WC()->cart->add_to_cart( $id,$quantity,$variation_id);
    } elseif($remove) {
        if($variation_id) {
            foreach ( WC()->cart->get_cart() as $item_key => $item ) {
                if ( $item['variation_id'] == $variation_id ) {
                    WC()->cart->remove_cart_item( $item_key );
                    break;
                }
            }
        } else {
            WC()->cart->remove_cart_item( $cartItemKey );
        }
    }  
    get_template_part( 'template-parts/mini-cart');
    die();
}

add_action('wp_ajax_add_to_cart', 'add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart');
