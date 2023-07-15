window.addEventListener('load', function () {
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100,
        delay: 0,
    });
});
jQuery(document).ready(function () {
    $('img').bind('contextmenu', function(e) {
        return false;
    });
    $('.item-wrapper').click(function () {
        $(this).toggleClass('service-title-clicked');
        $(this).find('div.content').slideToggle('fast');
        // $(this).find('.status').toggleClass('rotate');
        // $(this).find('.status').toggleClass('rotate-reset');
    });


    $('.read-more-homedy').click(function () {
        $('.dtcvmodetail').addClass('open-read');
        $('.dtchide').addClass('collapse');
        $('.thc-content-custom').addClass('open-full-height');
    });
    $('.collapse-homedy').click(function () {
        $('.dtcvmodetail').removeClass('open-read');
        $('.dtchide').removeClass('collapse');
        $('.thc-content-custom').removeClass('open-full-height');
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#content").offset().top
        }, 500);
    });
    var process = $('.process-item')
    var activeIndex = $('.process-item.active').attr('index');
    process.click(function () {
        process.removeClass('active');
        $(this).addClass('active');
        activeIndex = $(this).attr('index');
        $('.detail-process').find('.detail').removeClass('active');
        $('.detail-process').find('.detail').eq(activeIndex).addClass('active');
    })
    process.hover(function () {
        $(this).addClass('active');
        const index = $(this).attr('index');
        $('.detail-process').find('.detail').removeClass('active')
        $('.detail-process').find('.detail').eq(index).addClass('active');
    }, function () {
        const index = $(this).attr('index');
        if(index !== activeIndex){
            $(this).removeClass('active');

        }
        $('.detail-process').find('.detail').removeClass('active')
        $('.detail-process').find('.detail').eq(activeIndex).addClass('active');
    });
    // process.addEventListener('mouseenter', () => {
    //
    //     block.classList.add('active');
    //     // $('.detail-process .detail').removeClass('active')
    //
    //
    // });


    const menuCat = $('.sc-banner .menu-danh-muc-san-pham-container');
    const headerHeight = $('header').height();
    const menuHeight = menuCat.height();
    stickyHandle({
        header: '#header',
        target: '.header__bottom ',
        offset: headerHeight,
        offset2: headerHeight - $('.header__bottom ').height(),
        callback: is_sticky => {
            if (is_sticky) {
                $('.scrollToTop').addClass('btn-show');
            } else {
                $('.scrollToTop').removeClass('btn-show');
            }
        }
    });
    if (menuCat[0]) {
        stickyHandle({
            offset: headerHeight + menuHeight,
            offset2: headerHeight + menuHeight,
            callback: is_sticky => {
                if (is_sticky) {
                    $('.header__bottom  .menu-left').addClass('can-hover');
                } else {
                    $('.header__bottom  .menu-left').removeClass('can-hover');
                }
            }
        })
    }


    $('.scrollToTop').click(function () {
        $('html, body').animate({
            scrollTop: 0,
        }, 800);
        return false;
    });
    /**
     * Content: set height
     * @creator Tuyên
     * @time 16/03/2023 11:19
     */
    if ($('.item-small').length > 0) {
        const containerWidth = document.querySelector('.item-small').offsetWidth;
        const imageHeight = containerWidth * 0.8; // 0.67 là tỷ lệ 3:2
        const images = document.querySelectorAll('.item-small');

        images.forEach(image => {
            image.style.height = `${imageHeight}px`;
        });
    }

    /**
     * Content: Tự động noffolow ahref
     * @creator Tuyên
     * @time 2021-09-25 09:50
     */
    var comp = new RegExp(location.host);
    $('a').each(function () {
        if (comp.test($(this).attr('href'))) {
            // a link that contains the current host

        } else {
            // a link that does not contain the current host
            $(this).attr('rel', 'nofollow');
        }
    });
    $(function () {
        $('a[href^="https://daily.captreofansipan.com/ticket/"]').attr('rel', 'nofollow');
    })


    /**
     * Content: chọn màu
     * @creator Tuyên
     * @time 16/03/2023 23:03
     */
    $(".variations").click(function () {

        $(".variations").removeClass('active');
        $(this).addClass('active');
        const src = $(this).attr('image_variation');
        const price = $(this).attr('price_variation');
        const name_variation = $(this).attr('name_variation');
        const sku = $(this).attr('variable_sku');
        $('.image-big').hide()
        $('.image-big_variable').show()
        $('.image-big_variable .img-wrap img').attr('src', src);
        $('.variable_sku').html(sku)
    });
    $(".image-small .item-small img").click(function () {
        const src = $(this).attr('src');
        $('.image-big_variable').hide()
        $('.image-big').show()
        $('.variable_sku').html(main_sku)
    });
    $('.load-more').click(function (event) {
        var cat_ID = $(this).attr('cat_id')
        var offset = $(this).attr('offset')
        var data_fill = $(this).attr('data-fill')
        var cat_count = $(this).attr('cat_count')
        $.ajax({ // Hàm ajax
            type: "post",
            dataType: "html",
            async: true,
            url: '/wp-admin/admin-ajax.php',
            cache: false,
            context: this,
            data: {
                action: "loadmore",
                offset: offset,
                cat_ID: cat_ID,
            },
            beforeSend: function () {
                $(".load-more").html('loading...')
            },
            success: function (response) {
                if (response) {
                    $('.' + data_fill).append(response);
                    offset = parseInt(offset) + 3;
                    if (cat_count > offset) {
                        $(".load-more").html('Xem thêm');
                        $(".load-more").attr('offset', offset);
                    } else {
                        $(".load-more").hide();
                    }

                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                //Làm gì đó khi có lỗi xảy ra
                console.log('The following error occured: ' + textStatus, errorThrown);
            }
        });
    });

    $('.load-more-doc').click(function (event) {
        var cat_ID = $(this).attr('cat_id')
        var offset = $(this).attr('offset')
        var data_fill = $(this).attr('data-fill')
        var cat_count = $(this).attr('cat_count')
        $.ajax({ // Hàm ajax
            type: "post",
            dataType: "html",
            async: true,
            url: '/wp-admin/admin-ajax.php',
            cache: false,
            context: this,
            data: {
                action: "loadmoredoc",
                offset: offset,
                cat_ID: cat_ID,
            },
            beforeSend: function () {
                $(".load-more").html('loading...')
            },
            success: function (response) {
                if (response) {
                    $('.' + data_fill).append(response);
                    offset = parseInt(offset) + 3;
                    if (cat_count > offset) {
                        $(".load-more").html('Xem thêm');
                        $(".load-more").attr('offset', offset);
                    } else {
                        $(".load-more").hide();
                    }

                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                //Làm gì đó khi có lỗi xảy ra
                console.log('The following error occured: ' + textStatus, errorThrown);
            }
        });
    });


});


let lazyLoadInstance = new LazyLoad({});

function stickyHandle({header, target, offset, offset2, callback}) {
    const offsetRemove = offset2 || offset / 2;
    const targetSticky = target || header;
    const dataPading = parseInt($(header).next().css('padding-top'));
    if ($(header)[0] || callback && !header && !target) {
        let prev_sticky = false;
        let is_sticky = false;
        $(window).scroll(function () {
            var window_y = $(window).scrollTop();
            if (window_y > offset) {
                is_sticky = true;
                if (!$(targetSticky).hasClass('sticky')) {
                    $(header).next().css('padding-top', $(targetSticky).height() + dataPading);
                    $(targetSticky).addClass('sticky');
                }
            } else if (window_y <= offsetRemove) {
                is_sticky = false;
                if ($(targetSticky).hasClass('sticky')) {
                    $(targetSticky).removeClass('sticky');
                    $(header).next().css('padding-top', '');
                }
            }
            if (callback && is_sticky != prev_sticky) {
                callback(is_sticky);
                prev_sticky = is_sticky;
            }

        });
    }
}


flexFont = function () {
    var divs = document.getElementsByClassName("price-product");
    for (var i = 0; i < divs.length; i++) {
        var relFontsize = divs[i].offsetWidth * 0.05;
        divs[i].style.fontSize = relFontsize + 'px';
    }
};

window.onload = function (event) {
    flexFont();
};
window.onresize = function (event) {
    flexFont();
};

