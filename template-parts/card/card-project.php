<?php $placeholder = get_field('logo', 'option');
$url = wp_get_attachment_url(get_post_thumbnail_id(), 'thumbnail');
if (!$url) {
    $url = $placeholder;
}
?>
<!-- product -->
<?php global $product; ?>
<!-- // tạo biến để lấy url img -->
<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
<div class="card">
<div class="card-project">
    <div class="card-wrap">
        <div class="img-height">
            <a class="img" href="<?php the_permalink(); ?>">
                <img class="img-fluid lh2-img" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
            </a>
        </div>


        <div class="card-info text-center">
            <a rel="nofollow" href="<?php the_permalink(); ?>">
                <div class="title-post">
                    <?php the_title(); ?>
                    <p>Xem chi tiết</p>
                </div>
            </a>
            <!-- <a href="?add-to-cart=<?php the_ID(); ?>">Mua Ngay</a>
            <a href="<?php the_permalink() ?>">Yêu thích</a> -->

        </div>



    </div>
    <!-- mô tả -->
    <div class="info-product">
        <h4 class="product-title-h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <div class="price-product"><?php echo $product->get_price_html(); ?></div>

        <?php
        global $product;
        if ($product->is_in_stock()) {
            echo '<a href="' . esc_url($product->add_to_cart_url()) . '" class="button add_to_cart_button">' . esc_html($product->single_add_to_cart_text()) . '</a>';
        }
        ?>
        <br>
        <a class="add_to_single_button" href="<?php the_permalink() ;?>">Mua ngay</a>
    </div>
</div>
</div>

<!-- <div class="bg">
    <div class="img-height" style="width: 250px;">
        <a class="img" href="<?php the_permalink(); ?>">
            <img class="img-fluid lh2-img" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="action">
        <a href="?add-to-cart=<?php the_ID(); ?>">Mua Ngay</a>
        <a href="<?php the_permalink() ?>">Yêu thích</a>
    </div>
    <div class="info-product">
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <div class="price-product"><?php echo $product->get_price_html(); ?></div>
        <a href="?add-to-cart=<?php the_ID(); ?>">Thêm vào giỏ</a>

    </div>
</div> -->