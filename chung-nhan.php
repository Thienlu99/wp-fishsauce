<div class="block-intro">
    <div class="container">
        <h2 class="lh2-title1 text-center">
            <div class="title-thc">
                Chứng nhận
            </div>
        </h2>
        <div class="row">
            <!-- Get post News Query -->
            <?php $getposts = new WP_query();
            $getposts->query('post_status=publish&showposts=10&post_type=chung-nhan'); ?>
            <?php global $wp_query;
            $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <!-- // tạo biến để lấy url img -->
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                <div class="col-lg-4 item-intro">
                    <div class="img-height">
                        <h3 class="text-center" href="<?php the_permalink() ?>"><img style="width: 120px; height: 120px;" src="<?php echo $featured_img_url; ?>" alt="<?php the_title() ?>"></h3>
                    </div>
                    <div class="item-info">
                        <h3 class="text-center" href="<?php the_permalink() ?>"><?php the_title() ?></h3>
                        <p class="text-center"><?php the_content() ?></p>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
            <!-- Get post News Query -->

        </div>
    </div>
</div>
<!--  -->

<!-- <div class="block-intro test-ne mt-5">
    <div class="container">
        <div class="row">
            <?php $getposts = new WP_query();
            $getposts->query('post_status=publish&showposts=10&post_type=chung-nhan'); ?>
            <?php global $wp_query;
            $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
               
            
                <div class="col-md-4 col-sm-6 col-12 item-intro">
                    <?php get_template_part("/template-parts/card/card-product") ?>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>

    </div>
</div> -->