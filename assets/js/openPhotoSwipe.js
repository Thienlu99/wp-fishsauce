jQuery(document).ready(function ($) {
    var openPhotoSwipe = function (indexImage, selector) {
        // console.log(indexImage);
        var pswpElement = document.querySelectorAll(".pswp")[0];
        var images = document.querySelectorAll(selector);
        var items = [];
        for (var i = 0; i < images.length; i++) {
            var srcList = [
                {
                    src: images[i].src,
                    w: images[i].naturalWidth,
                    h: images[i].naturalHeight,
                },
            ];
            items = items.concat(srcList);
        }
        // define options (if needed)
        var options = {
            history: false,
            focus: false,
            pinchToClose: false,
            closeOnScroll: false,
            showAnimationDuration: 0,
            hideAnimationDuration: 0,
            index: indexImage,
        };

        var gallery = new PhotoSwipe(
            pswpElement,
            PhotoSwipeUI_Default,
            items,
            options
        );
        gallery.init();
    };

    // if ($(".img-wrap.pt.slick-slide")) {
    $(".image_activity .img-wrap").click(function () {
        const index = parseInt($(this).attr("data-index"));
        // console.log(index);
        openPhotoSwipe(index,'#thumb');
    });
    $(".image-big .img-wrap").click(function () {
        const index = $(this).attr("data-slick-index");
        // console.log(index);
        openPhotoSwipe(index,'#thumb');
    });
    $(".certificate .img-wrap").click(function () {
        const index = $(this).attr("data-slick-index");
        // console.log(index);
        openPhotoSwipe(index,'#thumb_cer');
    });
    $(".one-line-image .wrap-img, .two-line-image .wrap-img").click(function () {
        const index = $(this).attr("data-slick-index");
        // console.log(index);
        openPhotoSwipe(index,'#thumb');
    });

});
