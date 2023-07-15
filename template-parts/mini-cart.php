<div class="mini-cart ml-2">
    <span class="cart__btn">
        <i class="fas fa-shopping-cart"></i>
        <?php echo sprintf(_n('<span class="amount-cart-item">%d</span>', '<span class="amount-cart-item">%d</span>', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?>
    </span>
    <div class="mini-cart__popup" style="display:none">
        <div class="mini-cart__popup-wrap d-flex flex-column ml-auto p-3 pt-4 position-relavtive">
            <button class="mini-cart__close-btn">&times;</button>
            <div class="d-flex flex-column overflow-hidden p-2">
                <ul class="mini-cart_list position-relative flex-fill">
                <?php 
                    if(WC()->cart->cart_contents_count==0) :?>
                       <?php do_action( 'woocommerce_cart_is_empty' ); ?>
                   <?php else :
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                            <li class="d-flex align-items-center p-2">
                                <div class="mini-cart_thumbnail mr-2">
                                    <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
            
                                        if ( ! $product_permalink ) {
                                            echo $thumbnail; // PHPCS: XSS ok.
                                        } else {
                                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                        }
                                    ?>
                                </div>
                                <div class="mini-cart-detail">
                                    <?php 
                                        if ( ! $product_permalink ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                        } else {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="truncate-text truncate-line-2 text-dark _fs-16" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                        }
                                    ?>
                                    <p class="mb-0 text-danger _fw-600 _fs-14">
                                        <?php echo $cart_item['quantity'].' x '.apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key )?> 
                                    </p>
                                </div>
                                <div class="ml-auto pl-2">
                                    <button class="remove mini-cart_remove" data-id="<?php echo $product_id ?>" <?php echo $cart_item['variation_id']?'variation_id='.$cart_item['variation_id']:null ?>><i class="far fa-trash-alt _fs-14 m-auto"></i></button>
                                </div>
                            </li>
                        <?php 
                        endif;
                        endforeach;?>
                <div class="mini-cart_loading" style="display:none">
                    <i class="fad fa-spinner-third m-auto"></i>
                </div>
                </ul>
                <div class="mini-cart_subtoltal" >
                    <p class="mini-cart-subtoltal-text _fw-600 _fs-19">
                        <span class="mini-cart-subtoltal-title">
                            <?php esc_html_e( 'Subtotal', 'woocommerce' ); ?>:
                        </span>
                        <?php wc_cart_totals_subtotal_html(); ?>
                    </p>
                </div> 
            </div>
            <div class="mt-auto">
                <a class="mini-cart_btn" href="<?php echo wc_get_cart_url(); ?>">Xem giỏ hàng</a>
                <a class="mini-cart_btn mini-cart_btn--checkout" href="<?php echo wc_get_checkout_url(); ?>">Thanh toán</a>
            </div>    
                <?php endif ?>
        </div>
    </div>
</div>
