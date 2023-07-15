jQuery(document).ready(function () {
    if ($('.single .variations_form').length) {
        const product_variations = $('.variations_form').attr('data-product_variations');
        const product_arr = $.parseJSON(product_variations);
        const variation = $('.single').find('.variations_form');

        $.each(variation, function (key, value) {
            $(this).find('#pa_size').change(function () {
                var selectedVal =  $(this).find('option').filter(':selected').val();

                $.each(product_arr, function (key, value) {
                    const attribute_pa_size = value.attributes.attribute_pa_size;
                    if (selectedVal === attribute_pa_size) {
                        const img_url = value.image.src;
                        const variation_id = value.variation_id;

                        $('.img-wrap.slick-slide.slick-current.slick-active img').attr('src', img_url)
                        $('.woocommerce-product-gallery__image.slick-slide.slick-current.slick-active img').attr('data-src', img_url)
                        $('.woocommerce-product-gallery__image.slick-slide.slick-current.slick-active img').attr('srcset', img_url)
                        $('.img-wrap.slick-slide.slick-current.slick-active img').attr('xoriginal', img_url)

                        const buy_now_button = $('.single').find('a.buy_now');

                        $.each(buy_now_button, function (key, value) {
                            const buy_now_split = $(this).attr('href').split('?add-to-cart=');
                            const buy_now_url = buy_now_split[0] + '?add-to-cart=' + variation_id;
                            $(this).attr('href', buy_now_url);
                        })
                    }
                });
            });
        });



        $.each(variation, function (key, value) {
            $(this).find('#pa_color').change(function () {
                var selectedVal =  $(this).find('option').filter(':selected').val();

                $.each(product_arr, function (key, value) {
                    const attribute_pa_color = value.attributes.attribute_pa_color;
                    if (selectedVal === attribute_pa_color) {
                        const img_url = value.image.src;
                        const variation_id = value.variation_id;

                        $('.img-wrap.slick-slide.slick-current.slick-active img').attr('src', img_url)
                        $('.woocommerce-product-gallery__image.slick-slide.slick-current.slick-active img').attr('data-src', img_url)
                        $('.woocommerce-product-gallery__image.slick-slide.slick-current.slick-active img').attr('srcset', img_url)
                        $('.img-wrap.slick-slide.slick-current.slick-active img').attr('xoriginal', img_url)

                        const buy_now_button = $('.single').find('a.buy_now');

                        $.each(buy_now_button, function (key, value) {
                            const buy_now_split = $(this).attr('href').split('?add-to-cart=');
                            const buy_now_url = buy_now_split[0] + '?add-to-cart=' + variation_id;
                            $(this).attr('href', buy_now_url);
                        })
                    }
                });
            });
        });

    }


});


