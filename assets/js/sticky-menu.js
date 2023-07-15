jQuery(document).ready(function ($) {
    //Backtotop
    const main_menu_scroll = $('.top-header');
    const header = $('#header');
    const top_menu = $('.top-menu');
    const menu = $('.header-wrap');
    const header_buffer_height = header.outerHeight();
    if (menu) {
        $(window).scroll(function () {
            const start_y = 0;
            var window_y = $(window).scrollTop();
            // console.log(window_y);
            if (window_y > 0) {
                if (!menu.hasClass('sticky')) {
                    menu.addClass('sticky');
                    header.css('margin-bottom', header_buffer_height);
                }
            } else {
                if (menu.hasClass('sticky')) {
                    menu.removeClass('sticky');
                    header.css('margin-bottom', 0);
                }
            }
        });
    }
});
