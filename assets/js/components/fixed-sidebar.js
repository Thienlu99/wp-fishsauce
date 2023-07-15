jQuery(document).ready(function ($) {
    const heightBar = $('.bar_2').height();
    const heightHeader = $('.breadcrums').height() + 10;
    const header__bottom = $('.header__bottom').height() + 10;


    /**
     * Content: Function để sticky element khi scroll
     * Mô tả:
     * r: class của Khung lớn chứa el
     * e: Cột chứa phần tử sticky
     * i: Phần tử ngay trên ele sticky
     * o: ele sticky
     * a: khoảng cách từ top đến ele khi sticky scroll
     * @creator Tuyên
     * @time 2021-11-01 10:11
     */
    if(!window.matchMedia("(max-width: 767px)").matches){
        if ($('.product-fixed').length > 0) {
            stickyBox('.block-content', '.block-content-right', '.bar_2', '.bar_3', heightBar);
        }

        if ($('.wrapper-column-sidebar').length > 0) {
            stickyBox('.block-new', '.block__left', '.breadcrums', '.wrapper-column-sidebar', heightHeader);
        }

        if ($('.wrapper-column-sidebar').length > 0) {
            const sidebar_height = $('.wrapper-column-sidebar').height();
            const products_header = $('.woocommerce-products-header').height();
            const body = $('.body-category-product').height();
            const banner = $('.section-banner').height();
            const section_category_product = $('.section-category_product').height();
            if (sidebar_height < (products_header + body + banner + section_category_product)) {
                stickyBox('.archive-wrap', '.sidebar-left', '.breadcrums', '.wrapper-column-sidebar', header__bottom);
            }
        }
    }





    function stickyBox(r, e, i, o, a) {
        var t = $(r).height();
        var n = $(e).height();
        if (n <= t) {
            var s = $(e).width();
            $(window).scroll(function () {
                var e = $(window).scrollTop();
                var t = e - a;
                if ($(i).length > 0) {
                    t = e - $(i).offset().top - $(i).height();
                }
                var n = e - $(r).offset().top - $(r).height() + $(o).height() + a;
                if (t > 0) {
                    $(o).css('position', 'fixed');
                    $(o).css('top', a + 'px');
                    $(o).css('width', s + 'px');
                    $(o).css('margin', '0 auto');
                } else {
                    $(o).removeAttr('style');
                }
                if (n > 0) $(o).css('top', -1 * n);
            });
        }
    }
});




