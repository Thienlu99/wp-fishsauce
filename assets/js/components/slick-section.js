jQuery(document).ready(function ($) {
    // $(".image-slider").slick({
    //     infinite: true,
    //     dots: false,
    //     autoplay: false,
    //     autoplaySpeed: 3000,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
    //     nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
    // });
    // $(".list-tes").slick({
    //     infinite: true,
    //     dots: false,
    //     autoplay: false,
    //     autoplaySpeed: 3000,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
    //     nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
    // });
    // $(".slide-certificate").slick({
    //     infinite: true,
    //     dots: false,
    //     autoplay: true,
    //     speed: 1000,
    //     infinite: true,
    //     focusOnSelect: true,
    //     cssEase: 'linear',
    //     autoplaySpeed: 1500,
    //     slidesToShow: 3,
    //     centerMode: true,
    //     slidesToScroll: 1,
    //     prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
    //     nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
    //     responsive: [
    //         {
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: false,
    //             },
    //         },
    //         {
    //             breakpoint: 767,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: false,
    //             },
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //     ],
    // });
    //
    // //Slider Feadback
    // const sliderCount = $(".slide-testimonials .item").length;
    // $(".slide-testimonials").slick({
    //     dots: false,
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: sliderCount >= 3 ? 3 : sliderCount,
    //     slidesToScroll: 3,
    //     prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
    //     nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
    //     responsive: [
    //         {
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: false,
    //             },
    //         },
    //         {
    //             breakpoint: 767,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: false,
    //             },
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //     ],
    // });
    //
    // //Slider news
    // const sliderNews = $(".list-post .item").length;
    // // const wrapper_video = $('.wrapper-video').length
    //
    // $(".list-post").slick({
    //     dots: false,
    //     infinite: true,
    //     arrows: true,
    //     speed: 300,
    //     slidesToShow: sliderNews >= 4 ? 4 : sliderNews,
    //     slidesToScroll: 1,
    //     prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
    //     nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
    //     responsive: [
    //         {
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 4,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: false,
    //             },
    //         },
    //         {
    //             breakpoint: 767,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: false,
    //             },
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //     ],
    // });
    //
    // //Slider logo
    // const sliderLogo = $(".list-logo .item").length;
    // // const wrapper_video = $('.wrapper-video').length
    //
    // $(".list-logo").slick({
    //     dots: false,
    //     infinite: true,
    //     arrows: true,
    //     speed: 300,
    //     slidesToShow: sliderLogo >= 5 ? 5 : sliderLogo,
    //     slidesToScroll: 1,
    //     prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
    //     nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
    //     responsive: [
    //         {
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 5,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: false,
    //             },
    //         },
    //         {
    //             breakpoint: 767,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: false,
    //             },
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //     ],
    // });
    //
    // // Slider View Product
    // const sliderView = $(".list-testimonial .item").length;
    // if (sliderView > 3) {
    //     $(".list-testimonial").slick({
    //         dots: false,
    //         infinite: true,
    //         speed: 300,
    //         autoplay: true,
    //         slidesToShow: 3,
    //         slidesToScroll: 1,
    //         prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
    //         nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
    //         responsive: [
    //             {
    //                 breakpoint: 1024,
    //                 settings: {
    //                     slidesToShow: 3,
    //                     slidesToScroll: 1,
    //                     infinite: true,
    //                     dots: false,
    //                 },
    //             },
    //             {
    //                 breakpoint: 767,
    //                 settings: {
    //                     slidesToShow: 1,
    //                     slidesToScroll: 1,
    //                     infinite: true,
    //                     dots: false,
    //                 },
    //             },
    //             {
    //                 breakpoint: 480,
    //                 settings: {
    //                     slidesToShow: 1,
    //                     slidesToScroll: 1,
    //                 },
    //             },
    //         ],
    //     });
    // }
    //
    //
    // const sliderDetail = $(
    //     ".image-small .item-small"
    // ).length;
    // var turnOnSlick = false;
    // var number_slide = 3;
    // if (sliderDetail >= 4) {
    //     turnOnSlick = true;
    //     number_slide = 4;
    // }
    // // $('.xzoom').xzoom({tint: '#333', Xoffset: 5});
    // //Slider thumbnails
    //
    // // $('.image-big').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    // //     console.log(currentSlide);
    // //     $(".image-big [data-slick-index='" + currentSlide + "']").find('img').removeClass('xzoom');
    // //     $(".image-big [data-slick-index='" + nextSlide + "']").find('img').addClass('xzoom');
    // //     $('.xzoom').xzoom({tint: '#333', Xoffset: 5});
    // // });
    // $(".image-big").slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: false,
    //     fade: true,
    //     asNavFor: ".image-small",
    // });
    // if (turnOnSlick == true) {
    //     $(".image-small").slick({
    //         slidesToShow: 4,
    //         slidesToScroll: 1,
    //         asNavFor: ".image-big",
    //         dots: false,
    //         centerMode: false,
    //         focusOnSelect: true,
    //         arrows: false,
    //         responsive: [
    //             {
    //                 breakpoint: 1024,
    //                 settings: {
    //                     slidesToShow: 3,
    //                     slidesToScroll: 1,
    //                     infinite: true,
    //                     dots: true,
    //                 },
    //             },
    //             {
    //                 breakpoint: 991,
    //                 settings: {
    //                     slidesToShow: 4,
    //                     slidesToScroll: 1,
    //                 },
    //             },
    //             {
    //                 breakpoint: 769,
    //                 settings: {
    //                     slidesToShow: 3,
    //                     slidesToScroll: 1,
    //                 },
    //             },
    //             {
    //                 breakpoint: 480,
    //                 settings: {
    //                     slidesToShow: 2,
    //                     slidesToScroll: 1,
    //                 },
    //             },
    //         ],
    //     });
    // } else {
    //     $(".woocommerce-product-gallery__wrapper img").on("click", function () {
    //         // console.log( $( this ).attr('data-src') );
    //         const img_url = $(this).attr("data-src");
    //         $(".image-big .img-wrap.slick-slide.slick-current.slick-active img").attr(
    //             "src",
    //             img_url
    //         );
    //     });
    // }
});
