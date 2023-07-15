<?php

/**
 * Template Name: Giao diện Trang Chủ
 * Template Post Type: post, page
 *
 */
$image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'large');
get_header(); ?>


<?php //echo do_shortcode(the_archive_description()); 
?>
<?php
if (have_rows('content')) {
    while (have_rows('content')) {
        the_row();
        //    get_template_part('template-parts/components/component' , get_row_layout());
    }
}
?>
<!-- slider  -->
<div class="container-fluid">
    <!-- phần slider Ảnh -->
    <?php get_template_part('slider'); ?>
</div>

<div class="container-fluid">
    <!-- phần one -->
    <section class="section-one mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php get_template_part('intro'); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- section 2 -->
    <section class="section-two mt-5">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- phần intro.php -->
                    <?php get_template_part('chung-nhan') ?>
                </div>
                <!-- <div class="col-md-4">
                <?php //get_template_part('narbar'); 
                ?>
            </div> -->
            </div>
        </div>
    </section>
    <!-- phầm sản phẩm -->
    <section class="section-product">
        <?php get_template_part("sanpham") ?>
    </section>
</div>


<!-- test -->
<!-- <div class="container">
    <div class="row">
        <?php $list = get_field('list');  ?>

        <?php foreach ($list as $item) :
        ?>
            <div class="col-md-4">
                <div class="div"><?php echo $item['title']; ?></div>
                <div class="img-wrap">
                    <picture>
                        <source media="(max-width:768px)" srcset="<?php echo wp_get_attachment_image_src($item['image'], 'medium')[0]; ?>">
                        <source media="(max-width:1024px)" srcset="<?php echo wp_get_attachment_image_src($item['image'], 'large')[0];
                                                                    ?>">
                        <source media="(max-width:1200px)" srcset="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];
                                                                    ?>">
                        <img src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0];
                                    ?>">
                    </picture>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</div> -->

<?php
//  get_template_part('template-parts/components/component' , 'banner');
//  get_template_part('template-parts/components/component' , 'featured_cat');
//  get_template_part('template-parts/components/component' , 'featured_products');
// get_template_part('template-parts/components/component' , 'reviews');
// get_template_part('template-parts/components/component' , 'videos');
// get_template_part('template-parts/components/component' , 'view_product');
// get_template_part('template-parts/components/component' , 'register');
// get_template_part('template-parts/components/component' , 'card_3');
// get_template_part('template-parts/components/component' , 'featured_content');
// get_template_part('template-parts/components/component' , 'card_video');
// get_template_part('template-parts/components/component' , 'supporter');
// get_template_part('template-parts/components/component' , 'number_counter');
get_footer();
