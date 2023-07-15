jQuery(document).ready(function ($) {
  $("#slider-range").slider({
    range: true,
    min: 0,
    max: 2000000,
    values: [100000, 1000000],
    slide: function (event, ui) {
      $("#amount").val("đ" + ui.values[0] + " - đ" + ui.values[1]);
    },
  });
  $("#amount").val(
    "đ" +
      $("#slider-range").slider("values", 0) +
      " - đ" +
      $("#slider-range").slider("values", 1)
  );

  /**sticky sidebar
     //      * Content: Function để sticky element khi scroll
     //      * Mô tả:
     //      * r: class của Khung lớn chứa el
     //      * e: Cột chứa phần tử sticky
     //      * i: Phần tử ngay trên ele sticky
     //      * o: ele sticky
     //      * a: khoảng cách từ top đến ele khi sticky scroll
     //      * @creator Tuyên
     //      * @time 2021-11-01 10:11
     //      */
  if (!window.matchMedia("(max-width: 991px)").matches) {
    if ($(".sidebar-cate").length > 0) {
      stickyBox(
        ".archive-wrap",
        ".sidebar-left",
        ".section-banner",
        ".sidebar-cate",
        120
      );
    }
    if ($(".sidebar-single").length > 0) {
      stickyBox(
        ".single-content",
        ".single-content .col-lg-4",
        ".related",
        ".sidebar-single .card",
        120
      );
    }
    if ($(" .column-sidebar  ").length > 0) {
      stickyBox(
        ".block-new",
        " .block__left",
        ".section-banner-new",
        ".column-sidebar",
        120
      );
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
          $(o).css("position", "fixed");
          $(o).css("top", a + "px");
          $(o).css("width", s + "px");
          $(o).css("margin", "0 auto");
        } else {
          $(o).removeAttr("style");
        }
        if (n > 0) $(o).css("top", -1 * n);
      });
    }
  }


  const sidebar_filter = $("#woocommerce_price_filter-2 .footer_title");
  if (sidebar_filter) {
    sidebar_filter.addClass("sidebar-cate-title mb-4 mt-4");
  }

  function uncheckAll() {
    $('input[type="checkbox"]:checked').prop("checked", false);
  }

  $(".other-service .card a").each(function () {
    $(this).attr("rel", "nofollow");
  });
});
