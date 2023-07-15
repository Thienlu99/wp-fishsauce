<section id="news" class="news">
    <div class="container">
        <?php $title = get_sub_field('title');
        if ($title): ?>
            <div class="title-thc">
                <?php echo $title; ?>
            </div>
        <?php endif; ?>
        <?php $category = get_sub_field('category');
        if ($category):; ?>
            <div class="row list-post">
                <?php
                $args = array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'showposts' => 10,
                    'cat' => $category,
                    'suppress_filters' => false);
                $getposts = new WP_query($args);
                global $wp_query;
                $wp_query->in_the_loop = true;
                while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <div class="col-6 col-md-3 col-lg-3 item" data-aos="fade-up"
                         data-aos-delay="<?php echo $getposts->current_post
                             * 300; ?>">
                        <?php get_template_part('template-parts/card/card-post'); ?>
                    </div>

                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>

        <?php endif; ?>
    </div>
    <?php $link = get_sub_field('link');
    if ($link):;?>
        <div class="button-timi-pri">
            <a href="<?php echo $link; ?>" rel="nofollow">Xem thêm</a>
        </div>
    <?php endif;?>

</section>
