jQuery(document).ready(function() {
    $('body').on('click','.qty_btn',function(){
        const p = $(this).parents('.quantity');
        const ip = p.find('input.qty');
        const s = $(this).attr('data-value');
        let v =  +ip.val();
        if(s=='-') {
            if(v <= +ip.attr('min')) {
                v = +ip.attr('min');
                ip.val(v);
                return;
            }
            ip.val(v-1)
        } else {
            ip.val(v+1)
        }
        $('button[name="update_cart"]').attr('disabled',false);
        $('button[name="update_cart"]').attr('aria-disabled',false);
        $('button[name="update_cart"]').trigger('click');
    })

    $('.single_add_to_cart_button').click(function(e){
        e.preventDefault();
        let id = null;
        let variation_id = null;
        let sl_adult = null;
        const form = $(this).parents('.cart');
        // Nếu form có thuộc tính tùy chỉnh
        if(form.is('.variations_form')) {
            id = form.find('input[name="product_id"]').val();
            variation_id = form.find('input[name="variation_id"]').val();
            sl_adult = form.find('input[name="sl_adult"]').val();
        } else {
            id = $(this).is('.buy_now')?$(this).attr('data-id'):$(this).val();
            sl_adult = form.find('input[name="sl_adult"]').val();
        }
        const qty = form.find('input[name="quantity"]').val();
        $.ajax({
            type : "post",
            dataType : 'html',
            url: '/wp-admin/admin-ajax.php',
            data : {
                action: 'add_to_cart',
                add: true,
                id: id,
                sl_adult: sl_adult,
                variation_id: variation_id,
                quantity: qty
            },
            context: this,
            beforeSend: function(){ 
                //Làm gì đó trước khi gửi dữ liệu vào xử lý
                $(this).attr('disabled',true);
                $(this).addClass('position-relative');
                $(this).append(
                    `<div class="mini-cart_loading">
                        <i class="fad fa-spinner-third m-auto"></i>
                    </div>`
                );
            },
            success: function(response) {
                if($(this).is('.buy_now')) {
                    const url = new URL($(this).attr('href'));
                    const params = new URLSearchParams(url.search);
                    params.delete('add-to-cart');
                    window.location.href=`${url.origin}${url.pathname}${params.toString()}`;
                    return;
                }
                $('.mini-cart__container').html(response);
                $('.mini-cart__popup').fadeIn();
                $('.mini-cart__popup-wrap').addClass('show');
                $('html').css({
                    overflow: 'hidden',
                    paddingRight: 17
                });
            },
            error: function( jqXHR, textStatus, errorThrown ){
                const text = $(this).find('.title-cart').text();
                $(this).find('.title-cart').text('CÓ LỖI XẢY RA');
                setTimeout(()=>{
                    $(this).find('.title-cart').text(text);
                },2000)
                console.log( 'The following error occured: ' + textStatus, errorThrown );
            },
            complete: function(){
                $(this).attr('disabled',false);
                $(this).find('.mini-cart_loading').remove();
                $(this).removeClass('position-relative');
            }
        })
    })

    $('.mini-cart__container').on('click','.mini-cart__close-btn',()=> {
        $('.mini-cart__popup-wrap').removeClass('show');
        setTimeout(()=>{
            $('.mini-cart__popup').fadeOut();
        },200)
        $('html').css({
            overflow: '',
            paddingRight: ''
        });
    })

    $('.mini-cart__container').on('click','.cart__btn', ()=> {
        $('.mini-cart__popup').fadeIn();
        $('.mini-cart__popup-wrap').addClass('show');
        $('html').css({
            overflow: 'hidden',
            paddingRight: 17
        });
    })

    $('.mini-cart__container').on('click','.remove.mini-cart_remove', function() {
        const id = $(this).attr('data-id');
        const variation_id = $(this).attr('variation_id');
        $.ajax({
            type : "post",
            dataType : 'html',
            url: '/wp-admin/admin-ajax.php',
            data : {
                action: 'add_to_cart',
                remove: true,
                id: id,
                variation_id: variation_id
            },
            context: this,
            beforeSend: function(){ 
                //Làm gì đó trước khi gửi dữ liệu vào xử lý
                $(this).attr('disabled',true);
                $(this).addClass('position-relative');
                $(this).append(
                    `<div class="mini-cart_loading">
                        <i class="fad fa-spinner-third m-auto"></i>
                    </div>`
                );
            },
            success: function(response) {
                $('.mini-cart__container').html(response);
                $('.mini-cart__popup').fadeIn();
                $('.mini-cart__popup-wrap').addClass('show');
                $('html').css({
                    overflow: 'hidden',
                    paddingRight: 17
                });
            },
            error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
            },
            complete: function(){
                $(this).attr('disabled',false);
                $(this).find('.mini-cart_loading').remove();
                $(this).removeClass('position-relative');
            }
        })
    })

    $('.mini-cart__container').on('click','.mini-cart__popup',e=> {
        if(!e.target.closest('.mini-cart__popup-wrap')) {
            $('.mini-cart__popup-wrap').removeClass('show');
            setTimeout(()=>{
                $('.mini-cart__popup').fadeOut();
            },200)
            $('html').css({
                overflow: '',
                paddingRight: ''
            });
        }
    })

    


});


