<div class="block-product">
    <div class="container">
        <h2 class="lh2-title text-center mt-5">
            <div class="title-thc">
                Sản Phẩm nổi bật
            </div>
        </h2>
        <div class="danh-muc">
            <span>
                <ul style="list-style: none;">
                    <!-- danh sách danh mục -->
                    <?php
                    $args = array(
                        'type'      => 'product',
                        'child_of'  => 0,
                        'parent'    => 0,
                        'taxonomy'  => 'product_cat',
                    );
                    $categories = get_categories($args);
                    foreach ($categories as $category) { ?>
                        <li>
                            <a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>"><?php echo $category->name; ?></a>
                        </li>

                    <?php } ?>
                </ul>
            </span>
        </div>

        <div class="row">
            <!-- lấy sản phẩm nổi bất -->
            <?php
            $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN',
            );
            ?>
            <?php $args = array(
                'post_type' => 'product',
                'posts_per_page' => 10,
                'ignore_sticky_posts' => 1,
                'tax_query' => $tax_query
            ); ?>
            <?php $getposts = new WP_query($args); ?>
            <?php global $wp_query;
            $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                <div class="item-product col-lg-3 col-md-6 col-sm-6 col-12">
                    <?php get_template_part("/template-parts/card/card-project") ?>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>

        </div>
    </div>
</div>
<!-- end -->
<!-- các sản phẩm -->
<div class="block-product">
    <div class="container">
        <h2 class="lh2-title text-center mt-5">
            <div class="title-thc">
                CÁC SẢN PHẨM
            </div>
        </h2>
        <div class="row">

            <!-- Get post News Query -->
            <?php $getposts = new WP_query();
            $getposts->query('post_status=publish&showposts=15&post_type=product'); ?>
            <?php global $wp_query;
            $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <!-- // tạo biến để lấy url img -->
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                <!-- code -->
                <div class="item-product col-lg-3 col-md-6 col-sm-6 col-12">
                    <?php get_template_part("/template-parts/card/card-project") ?>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
            <!-- Get post News Query -->
            <!-- end item -->



        </div>
    </div>
</div>